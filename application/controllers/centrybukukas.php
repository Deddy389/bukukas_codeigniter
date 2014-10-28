<?php
class CentryBukuKas extends CI_Controller {

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
		$this->load->model('mentrybukukas');
		$this->data['hasil0'] = $this->mentrybukukas->get_saldoakhir_sebelum($tgl_entry);
		$this->data['hasil1'] = $this->mentrybukukas->get_saldo_awal($tgl_entry);
		$this->data['hasil2'] = $this->mentrybukukas->get_detail_bukukas($tgl_entry);		
		$this->load->view('vreportbukukas',$this->data);
	}
	
	
	function deletedata($no_bukti,$tgl_entry){				
			$this->load->model('mentrybukukas');			
			$this->mentrybukukas->deletedata($no_bukti,$tgl_entry);
			redirect('centrybukukas');
	}
	
	function updatedata($no_bukti,$tgl_entry){		
		if($_POST==NULL){
			$this->load->model('mentrybukukas');
			$this->data['hasil'] = $this->mentrybukukas->filterdata($no_bukti,$tgl_entry);				
			$this->load->view('includes/upper',$this->data);
			$this->load->view('vupdatebukukas',$this->data);
			$this->load->view('includes/lower',$this->data);			
		}	
		else{
			$this->load->model('mentrybukukas');
			$this->mentrybukukas->updatedata();
			redirect('centrybukukas');
		}
	}
	
	function index(){		
		$this->load->model('mentrybukukas');
		$this->data['hasil'] = $this->mentrybukukas->bacadata();
		$this->load->view('includes/upper',$this->data);
		$this->load->view('vbacabukukas',$this->data);
		$this->load->view('includes/lower',$this->data);
	}
		
	function rinciantglentry(){		
		$this->load->model('mentrybukukas');
		$this->data['hasil'] = $this->mentrybukukas->gettglentry();	
		$this->load->view('includes/upper',$this->data);
		$this->load->view('vriciantglentry',$this->data);
		$this->load->view('includes/lower',$this->data);
	}
	
	function tambahdata(){
		
		if($this->input->post('submit')){
			$this->load->model('mentrybukukas');
			$this->mentrybukukas->tambah();
			redirect('centrybukukas');
		}		
		$this->load->view('includes/upper',$this->data);
		$this->load->view('ventrybukukas',$this->data);
		$this->load->view('includes/lower',$this->data);
	}	
}
?> 
