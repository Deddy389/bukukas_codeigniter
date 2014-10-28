<?php
class MentryBukuKas extends CI_Model {
	
	function get_saldo_awal($tgl_entry){
		/*return $this->db->get_where('saldo',
		                  array('tgl_entry'=>$tgl_entry))->row();*/
		$sql = "SELECT '$tgl_entry' tgl_entry,SUM((NILAI * 
        case when left(no_bukti,2) = 'KD' THEN
			1
		ELSE
			-1
		END)) awal
		FROM entry_buku_kas
		WHERE TGL_ENTRY < '$tgl_entry'";	
		return $this->db->query($sql)->row();		  		
	}		


	// kyknya calon dihapus dah dibawah ini
	function get_detail_bukukas($tgl_entry){
		$sql = "SELECT TGL_ENTRY,CASE WHEN LEFT(no_bukti,2) = 'KD' THEN
				MID(NO_BUKTI,3,LENGTH(NO_BUKTI)-2)
				   END KD,
				   CASE WHEN LEFT(no_bukti,2) = 'KC' THEN
				MID(NO_BUKTI,3,LENGTH(NO_BUKTI)-2)
				   END KC,keterangan,	
				CASE WHEN LEFT(no_bukti,2) = 'KD' THEN
					NILAI
			    ELSE
					0	       
				END PENERIMAAN,
				CASE WHEN LEFT(no_bukti,2) = 'KC' THEN
					NILAI
				ELSE
					0
				END PENGELUARAN
				FROM entry_buku_kas
				WHERE TGL_ENTRY = '$tgl_entry'";
		
		return $this->db->query($sql)->result();
	}
	
	function get_saldoakhir_sebelum($tgl_entry){
		$sql = "SELECT max(tgl_entry) tgl_entry
				FROM entry_buku_kas
				WHERE tgl_entry < '$tgl_entry'";										
		return $this->db->query($sql)->row();
	}
		
	
	function deletedata($no_bukti,$tgl_entry){		
		$data = array(
				'no_bukti'=>$no_bukti,
				'tgl_entry'=>$tgl_entry
				);		
		$this->db->delete('entry_buku_kas',$data);		
	}
	
	function updatedata(){
		$no_bukti = $this->input->post('no_bukti');
		$tgl_entry = $this->input->post('tgl_entry');
		$nilai = $this->input->post('nilai');
		$keterangan = $this->input->post('keterangan');
		$data = array(
				'no_bukti'=>$no_bukti,
				'tgl_entry'=>$tgl_entry,
				'nilai'=>$nilai,
				'keterangan'=>$keterangan
				);		
		$this->db->where(array('no_bukti'=>$no_bukti,
								'tgl_entry'=>$tgl_entry));		
		$this->db->update('entry_buku_kas',$data);		
	}
	
	function gettglentry(){
		$this->db->order_by("tgl_entry", "desc"); 
		$this->db->select('tgl_entry');
		$this->db->distinct();
		$baca = $this->db->get('entry_buku_kas');
	
		//$baca = $this->db->get('request');
		if($baca->num_rows() > 0){
			foreach ($baca->result() as $data){
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function filterdata($no_bukti,$tgl_entry){
		return $this->db->get_where('entry_buku_kas',
		                  array('no_bukti'=>$no_bukti,
								'tgl_entry'=>$tgl_entry))->row();		
	}
	
	function bacadata(){
		$this->db->order_by("tgl_entry", "asc"); 
		$baca = $this->db->get('entry_buku_kas');
		if($baca->num_rows() > 0){
			foreach ($baca->result() as $data){
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function tambah(){
		$no_bukti = $this->input->post('no_bukti');
		$tgl_entry = $this->input->post('tgl_entry');
		$nilai = $this->input->post('nilai');
		$keterangan = $this->input->post('keterangan');
		$data = array(
				'no_bukti'=>$no_bukti,
				'tgl_entry'=>$tgl_entry,
				'nilai'=>$nilai,
				'keterangan'=>$keterangan
				);
		$this->db->insert('entry_buku_kas',$data);		
	}	
}
?> 
