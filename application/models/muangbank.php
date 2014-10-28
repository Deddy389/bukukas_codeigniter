<?php
class MuangBank extends CI_Model {
	
	function bacadatafilterjoin($tgl_entry){		
		$this->db->select('*');
		$this->db->from('uang_bank');
		$this->db->join('REKENING_BANK', 'uang_bank.GIRO_BANK  = REKENING_BANK.KODE_BANK');
		$this->db->where ('tgl_entry',$tgl_entry);
		//echo 'disini';die;
		$baca = $this->db->get();
		if($baca->num_rows() > 0){
			foreach ($baca->result() as $data){
				$hasil[] = $data;				
			}
			return $hasil;
		}
	}
	
	
	function deletedata($tgl_entry,$giro_bank){		
		$data = array('tgl_entry'=>$tgl_entry,
					  'giro_bank'=>$giro_bank);				
		$this->db->delete('uang_bank',$data);		
	}
	
	function gettglopname(){
		$this->db->order_by("tgl_opname", "asc"); 
		$this->db->select('tgl_opname');
		$this->db->distinct();
		$baca = $this->db->get('hasil_opname');
	
		//$baca = $this->db->get('request');
		if($baca->num_rows() > 0){
			foreach ($baca->result() as $data){
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function get_detail_bap($tgl_entry){
		$sql = "SELECT *
				FROM 
				(SELECT  case dayname('$tgl_entry') 
						 when 'Sunday' then 'Minggu'
						 when 'Monday' then 'Senin'
						 when 'Tuesday' then 'Selasa'
						 when 'Wednesday' then 'Rabu'
						 when 'Thursday' then 'Kamis'
						 when 'Friday' then 'Jumat'
						 when 'Saturday' then 'Sabtu'
						 end hari, 
						 '$tgl_entry' tgl_entry, SUM( (
				NILAI * 
				CASE WHEN LEFT( no_bukti, 2 ) =  'KD'
				THEN 1
				ELSE -1
				END )
				) saldo_tanggal
				FROM entry_buku_kas
				WHERE TGL_ENTRY <=  '$tgl_entry') z,
				(SELECT sum(nilai * (select pengali 
									 from kode_rincian_uang 
									 where kd_rincian_uang = a.kd_rincian_uang)) uang_opname,max(alasan) alasan_kas 
				 FROM hasil_opname a
				where tgl_opname = '$tgl_entry') y,
				(SELECT SUM( buku_bank ) buku_bank, SUM( rk_bank ) rk_bank,max(alasan) alasan_bank
				FROM  uang_bank 
				WHERE tgl_entry =  '$tgl_entry') x";
		return $this->db->query($sql)->row();			
		//return $this->db->query($sql)->result();
	}
	
	function updatedata(){		
		$tgl_entry = $this->input->post('tgl_entry');		
		$giro_bank = $this->input->post('giro_bank');		
		$rk_bank = $this->input->post('rk_bank');		
		$buku_bank = $this->input->post('buku_bank');		
		$data = array(
				'tgl_entry'=>$tgl_entry,
				'giro_bank'=>$giro_bank,				
				'rk_bank'=>$rk_bank,
				'buku_bank'=>$buku_bank
				);		
		$this->db->where(array('tgl_entry'=>$tgl_entry,
							   'giro_bank'=>$giro_bank));		
		$this->db->update('uang_bank',$data);		
	}
	
	function filterdata($tgl_entry,$giro_bank){
		return $this->db->get_where('uang_bank',
		                  array('tgl_entry'=>$tgl_entry,
							    'giro_bank'=>$giro_bank))->row();		
	}
	
	function bacadata(){
		$baca = $this->db->get('uang_bank');
		if($baca->num_rows() > 0){
			foreach ($baca->result() as $data){
				$hasil[] = $data;
			}
			return $hasil;
		}
	}		
	
	function tambah(){
		$tgl_entry = $this->input->post('tgl_entry');		
		$giro_bank = $this->input->post('giro_bank');		
		$rk_bank = $this->input->post('rk_bank');		
		$buku_bank = $this->input->post('buku_bank');				
		$alasan = $this->input->post('alasan');				
		$data = array(
				'tgl_entry'=>$tgl_entry,
				'giro_bank'=>$giro_bank,				
				'rk_bank'=>$rk_bank,
				'buku_bank'=>$buku_bank,
				'alasan'=>$alasan
				);
		$this->db->insert('uang_bank',$data);		
	}	
}
?> 
