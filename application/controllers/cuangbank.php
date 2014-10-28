<?php
class CuangBank extends CI_Controller {
	
	 public $data = array();

	 public function __construct()
	 {
		parent::__construct();
		//echo $this->config->item('base_url');
		$this->data['base']= $this->config->item('base_url');
		$this->data['css']= $this->config->item('css');
		$this->data['css2']= $this->config->item('css2');			
   	 }
	function gen_report_periksa_kasbank($tgl_entry){
		$this->load->model('muangbank');
		$this->data['hasil'] = $this->muangbank->get_detail_bap($tgl_entry);
		$this->load->view('vbapkasbank',$this->data);
	}


	function rinciantglopnamebank(){		
		$this->load->model('muangbank');
		$this->data['hasil'] = $this->muangbank->gettglopname();	
		$this->load->view('includes/upper',$this->data);
		$this->load->view('vriciantglopnamebank',$this->data);
		$this->load->view('includes/lower',$this->data);
	}
	

	function deletedata($tgl_entry,$giro_bank){			
			$this->load->model('muangbank');			
			$this->muangbank->deletedata($tgl_entry,$giro_bank);
			redirect('cuangbank');
	}

	
	function updatedata($tgl_entry,$giro_bank){		
		if($_POST==NULL){
			$this->load->model('muangbank');
			$this->data['hasil'] = $this->muangbank->filterdata($tgl_entry,$giro_bank);	
			$this->load->view('includes/upper',$this->data);
			$this->load->view('vupdateuangbank',$this->data);
			$this->load->view('includes/lower',$this->data);							
		}	
		else{
			$this->load->model('muangbank');
			$this->muangbank->updatedata();
			redirect('cuangbank');
		}
	}		
	
	function index(){
		$this->load->model('muangbank');
		$this->data['hasil'] = $this->muangbank->bacadata();	
		$this->load->view('includes/upper',$this->data);
		$this->load->view('vbacauangbank',$this->data);
		$this->load->view('includes/lower',$this->data);
	}
	function tambahdata(){
		
		if($this->input->post('submit')){
			$this->load->model('muangbank');
			$this->muangbank->tambah();
			redirect('cuangbank');
		}
		$this->load->view('includes/upper',$this->data);
		$this->load->view('vuangbank');
		$this->load->view('includes/lower',$this->data);
	}	
}
?> 
