<?php
class MbatchTgl extends CI_Model {
	
	function deletedata($tgl_batch){		
		$data = array(
				'tgl_batch'=>$tgl_batch
				);		
		$this->db->delete('batch',$data);		
	}
	
	function updatedata(){
		$tgl_batch = $this->input->post('tgl_batch');
		$status = $this->input->post('status');		
		$data = array(
				'status'=>$status				
				);		
		$this->db->where(array('tgl_batch'=>$tgl_batch));		
		$this->db->update('batch',$data);		
	}
	
	function bacadata(){
		$baca = $this->db->get('batch');
		if($baca->num_rows() > 0){
			foreach ($baca->result() as $data){
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	
	function tambah(){
		$tgl_batch = $this->input->post('tgl_batch');
		$status = $this->input->post('status');		
		$data = array(
				'tgl_batch'=>$tgl_batch,
				'status'=>$status
				);
		$this->db->insert('batch',$data);		
	}	
	
	function filterdata($tgl_batch){
		return $this->db->get_where('batch',
		                  array('tgl_batch'=>$tgl_batch))->row();		
	}
	
	// function2 dibawah ini belum dipakai, nanti dihapus saja kalau tidak dipakai
	
	function gettglentry(){
		//$this->db->order_by("tgl_entry", "desc"); 
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
	
	function get_saldo_awal($tgl_entry){
		return $this->db->get_where('saldo',
		                  array('tgl_entry'=>$tgl_entry))->row();		
	}		

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
}
?> 
