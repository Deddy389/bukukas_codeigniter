<?php
class MopnameKasBank extends CI_Model {

		
	function bacadatafilter_uk($tgl_entry){				 
		$this->db->select('*');
		$this->db->from('HASIL_OPNAME');
		$this->db->join('KODE_RINCIAN_UANG', 'HASIL_OPNAME.kd_rincian_uang  = KODE_RINCIAN_UANG.kd_rincian_uang');
		$this->db->where ('tgl_OPNAME',$tgl_entry);
		$this->db->like('HASIL_OPNAME.kd_rincian_uang', 'uk', 'after'); 
		$this->db->order_by("urutan", "asc");
		//echo 'disini';die;
		$baca = $this->db->get();
		if($baca->num_rows() > 0){
			foreach ($baca->result() as $data){
				$hasil[] = $data;				
			}
			return $hasil;
		}
		
		/*
		$this->db->like('kd_rincian_uang', 'uk', 'after');
		$this->db->where('tgl_entry', $tgl_entry);	
		$baca = $this->db->get('hasil_opname');
		if($baca->num_rows() > 0){
			foreach ($baca->result() as $data){
				$hasil[] = $data;
			}
			return $hasil;
		}
		*/
	}
	
	function bacadatafilter_ul($tgl_entry){		
		$this->db->select('*');
		$this->db->from('HASIL_OPNAME');
		$this->db->join('KODE_RINCIAN_UANG', 'HASIL_OPNAME.kd_rincian_uang  = KODE_RINCIAN_UANG.kd_rincian_uang');
		$this->db->where ('tgl_OPNAME',$tgl_entry);
		$this->db->like('HASIL_OPNAME.kd_rincian_uang', 'ul', 'after'); 
		$this->db->order_by("urutan", "asc");
		//echo 'disini';die;
		$baca = $this->db->get();
		if($baca->num_rows() > 0){
			foreach ($baca->result() as $data){
				$hasil[] = $data;				
			}
			return $hasil;
		}
		/*
		$this->db->like('kd_rincian_uang', 'ul', 'after'); 
		$this->db->where('tgl_entry', $tgl_entry);	
		$baca = $this->db->get('hasil_opname');
		if($baca->num_rows() > 0){
			foreach ($baca->result() as $data){
				$hasil[] = $data;
			}
			return $hasil;
		}
		*/
	}
	
	function bacadatarekeningbank($tgl_entry){		
		$this->db->select('*');
		$this->db->from('uang_bank');
		$this->db->join('rekening_bank', 'uang_bank.giro_bank  = rekening_bank.kode_bank');
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


	function deletedata($tgl_opname,$kd_rincian_uang){		
		$data = array(
				'tgl_opname'=>$tgl_opname,
				'kd_rincian_uang'=>$kd_rincian_uang
				);				
		$this->db->delete('hasil_opname',$data);		
	}
	
	function updatedata(){
		$tgl_opname = $this->input->post('tgl_opname');
		$kd_rincian_uang = $this->input->post('kd_rincian_uang');
		$nilai = $this->input->post('nilai');
		$data = array(
				'tgl_opname'=>$tgl_opname,
				'kd_rincian_uang'=>$kd_rincian_uang,
				'nilai'=>$nilai
				);		
		//$this->db->where('tgl_opname',$tgl_opname,'kd_rincian_uang',$kd_rincian_uang);		
		$this->db->where(array('tgl_opname'=>$tgl_opname,
								'kd_rincian_uang'=>$kd_rincian_uang));		
		$this->db->update('hasil_opname',$data);		
	}
	
	function filterdata($tgl_opname,$kd_rincian_uang){
		return $this->db->get_where('hasil_opname',
		                  array('tgl_opname'=>$tgl_opname,
								'kd_rincian_uang'=>$kd_rincian_uang))->row();		
	}
	
	function bacadata(){
		$baca = $this->db->get('hasil_opname');
		if($baca->num_rows() > 0){
			foreach ($baca->result() as $data){
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function tambah(){
		$tgl_opname = $this->input->post('tgl_opname'); 
		$uk100rb =  $this->input->post('uk100rb'); 
		$data1 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'uk100rb',
						'nilai'=>$uk100rb); 
		$this->db->insert('hasil_opname',$data1);
		
		$uk50rb =  $this->input->post('uk50rb'); 
		$data2 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'uk50rb',
						'nilai'=>$uk50rb); 
		$this->db->insert('hasil_opname',$data2);
		
		$uk20rb =  $this->input->post('uk20rb'); 
		$data3 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'uk20rb',
						'nilai'=>$uk20rb); 
		$this->db->insert('hasil_opname',$data3);
		
		$uk10rb =  $this->input->post('uk10rb'); 
		$data4 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'uk10rb',
						'nilai'=>$uk10rb); 
		$this->db->insert('hasil_opname',$data4);
		
		$uk5rb =  $this->input->post('uk5rb'); 
		$data5 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'uk5rb',
						'nilai'=>$uk5rb); 
		$this->db->insert('hasil_opname',$data5);
		
		$uk2rb =  $this->input->post('uk2rb'); 
		$data6 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'uk2rb',
						'nilai'=>$uk2rb); 
		$this->db->insert('hasil_opname',$data6);
		
		$uk1rb =  $this->input->post('uk1rb'); 
		$data7 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'uk1rb',
						'nilai'=>$uk1rb); 
		$this->db->insert('hasil_opname',$data7);
		
		$uk5rts =  $this->input->post('uk5rts'); 
		$data8 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'uk5rts',
						'nilai'=>$uk5rts); 
		$this->db->insert('hasil_opname',$data8);
		
		$uk1rts =  $this->input->post('uk1rts'); 
		$data9 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'uk1rts',
						'nilai'=>$uk1rts);
		$this->db->insert('hasil_opname',$data9);
		
		$ul1rb =  $this->input->post('ul1rb'); 
		$data10 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'ul1rb',
						'nilai'=>$ul1rb); 
		$this->db->insert('hasil_opname',$data10);
		
		$ul5rts =  $this->input->post('ul5rts'); 
		$data11 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'ul5rts',
						'nilai'=>$ul5rts); 
		$this->db->insert('hasil_opname',$data11);
		
		$ul2rts =  $this->input->post('ul2rts'); 
		$data12 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'ul2rts',
						'nilai'=>$ul2rts); 
		$this->db->insert('hasil_opname',$data12);
		
		$ul5plh =  $this->input->post('ul5plh'); 
		$data13 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'ul5plh',
						'nilai'=>$ul5plh); 
		$this->db->insert('hasil_opname',$data13);
		
		$ul1rts =  $this->input->post('ul1rts'); 
		$data14 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'ul1rts',
						'nilai'=>$ul1rts); 
		$this->db->insert('hasil_opname',$data14);
		
		$ul25plh =  $this->input->post('ul25plh'); 
		$data15 = array('tgl_opname'=>$tgl_opname,
						'kd_rincian_uang'=>'ul25plh',
						'nilai'=>$ul25plh); 
		$this->db->insert('hasil_opname',$data15);
				
		$nilai = $this->input->post('alasan');
		$data = array(
				'alasan'=>$nilai,
				);		
		//$this->db->where('tgl_opname',$tgl_opname,'kd_rincian_uang',$kd_rincian_uang);		
		$this->db->where(array('tgl_opname'=>$tgl_opname));		
		$this->db->update('hasil_opname',$data);		
		
	}	
}
?> 
