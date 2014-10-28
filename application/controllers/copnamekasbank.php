<?php
class CopnameKasBank extends CI_Controller {

	 public $data = array();

	 public function __construct()
	 {
		parent::__construct();
		//echo $this->config->item('base_url');
		$this->data['base']= $this->config->item('base_url');
		$this->data['css']= $this->config->item('css');
		$this->data['css2']= $this->config->item('css2');			
   	 }

	function gen_report_opname_kasbank($tgl_entry){
		$this->load->model('mopnamekasbank');
		$this->load->model('muangbank');
		$this->data['hasil'] = $this->muangbank->get_detail_bap($tgl_entry);		
		$this->data['hasil0'] = $this->mopnamekasbank->bacadatafilter_uk($tgl_entry);
		$this->data['hasil1'] = $this->mopnamekasbank->bacadatafilter_ul($tgl_entry);
		$this->data['hasil2'] = $this->mopnamekasbank->bacadatarekeningbank($tgl_entry);		
		//$data['hasil2'] = $this->muangbank->bacadatafilterjoin($tgl_entry);		
		$this->load->view('vreportopnamekasbank',$this->data);
	}
	
	function rinciantglopnamekas(){		
		$this->load->model('muangbank');
		$this->data['hasil'] = $this->muangbank->gettglopname();	
		$this->load->view('includes/upper',$this->data);
		$this->load->view('vriciantglopnamekas',$this->data);
		$this->load->view('includes/lower',$this->data);
	}
	
	function deletedata($tgl_opname,$kd_rincian_uang){			
			$this->load->model('mopnamekasbank');			
			$this->mopnamekasbank->deletedata($tgl_opname,$kd_rincian_uang);
			redirect('copnamekasbank');
	}


	function updatedata($tgl_opname,$kd_rincian_uang){
		
		if($_POST==NULL){
			$this->load->model('mopnamekasbank');
			$this->data['hasil'] = $this->mopnamekasbank->filterdata($tgl_opname,$kd_rincian_uang);	
			$this->load->view('includes/upper',$this->data);
			$this->load->view('vupdateopnamekasbank',$this->data);
			$this->load->view('includes/lower',$this->data);		
		}	
		else{
			$this->load->model('mopnamekasbank');
			$this->mopnamekasbank->updatedata();
			redirect('copnamekasbank');
		}
	}

	function index(){
		$this->load->model('mopnamekasbank');
		$this->data['hasil'] = $this->mopnamekasbank->bacadata();
		$this->load->view('includes/upper',$this->data);
		$this->load->view('vbacaopnamekasbank',$this->data);
		$this->load->view('includes/lower',$this->data);
	}
	function tambahdata(){
		
		if($this->input->post('submit')){
			$this->load->model('mopnamekasbank');
			$this->mopnamekasbank->tambah();
			redirect('copnamekasbank');
		}
		$this->load->view('includes/upper',$this->data);
		$this->load->view('ventryopnamekasbank');
		$this->load->view('includes/lower',$this->data);
	}			
}
?> 
