<?php
class CbatchTgl extends CI_Controller {
	 public $data = array();

	 public function __construct()
	 {
		parent::__construct();
		//echo $this->config->item('base_url');
		$this->data['base']= $this->config->item('base_url');
		$this->data['css']= $this->config->item('css');
		$this->data['css2']= $this->config->item('css2');			
   	 }
	 
	function gen_report_bukukas($tgl_entry){
		$this->load->model('mbatchtgl');
		$this->data['hasil0'] = $this->mbatchtgl->get_saldoakhir_sebelum($tgl_entry);
		$this->data['hasil1'] = $this->mbatchtgl->get_saldo_awal($tgl_entry);
		$this->data['hasil2'] = $this->mbatchtgl->get_detail_bukukas($tgl_entry);		
		$this->load->view('vreportbukukas',$this->data);
	}
	
	
	function deletedata($no_bukti,$tgl_entry){				
			$this->load->model('mbatchtgl');			
			$this->mbatchtgl->deletedata($no_bukti,$tgl_entry);
			redirect('cbatchtgl');
	}
	
	function updatedata($no_bukti,$tgl_entry){		
		if($_POST==NULL){
			$this->load->model('mbatchtgl');
			$this->data['hasil'] = $this->mbatchtgl->filterdata($no_bukti,$tgl_entry);
			$this->load->view('includes/upper',$this->data);
			$this->load->view('vupdatebukukas',$this->data);
			$this->load->view('includes/lower',$this->data);			
		}	
		else{
			$this->load->model('mbatchtgl');
			$this->mbatchtgl->updatedata();
			redirect('cbatchtgl');
		}
	}
	
	function index(){
		$this->load->model('mbatchtgl');
		$this->data['hasil'] = $this->mbatchtgl->bacadata();
		$this->load->view('includes/upper',$this->data);
		$this->load->view('vrincianbatch',$this->data);
		$this->load->view('includes/lower',$this->data);
	}
		
	function rinciantglentry(){
		
		$this->load->model('mbatchtgl');
		$this->data['hasil'] = $this->mbatchtgl->gettglentry();
		$this->load->view('includes/upper',$this->data);
		$this->load->view('vrincianbatch',$this->data);
		$this->load->view('includes/lower',$this->data);
	}
	
	function tambahdata(){
		
		if($this->input->post('submit')){
			$this->load->model('mbatchtgl');
			$this->mbatchtgl->tambah();
			redirect('cbatchtgl');
		}
		$this->data['base']= $this->config->item('base_url');
		$this->load->view('includes/upper',$this->data);
		$this->load->view('ventrybatch',$this->data);
		$this->load->view('includes/lower',$this->data);
	}	
}
?> 
