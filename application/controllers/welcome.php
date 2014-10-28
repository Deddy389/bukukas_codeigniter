<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public $data = array();

	public function __construct()
	{
		parent::__construct();
		//echo $this->config->item('base_url');
		$this->data['base']= $this->config->item('base_url');
		$this->data['css']= $this->config->item('css');
		$this->data['css2']= $this->config->item('css2');			
   	}
	  
	public function index()
	{
		//$this->load->view('ventrybatch.php');
		$this->load->model('mentrybukukas');
		$this->data['hasil'] = $this->mentrybukukas->bacadata();
		$this->load->view('includes/upper',$this->data);
		$this->load->view('vbacabukukas',$this->data);
		$this->load->view('includes/lower',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */