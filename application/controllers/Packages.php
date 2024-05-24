<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Packages extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Site');
		$this->site->maintenance();
        $this->load->model('get');
	}
	public function index()
	{
		$this->load_header();
		$this->load_body();
		$this->load_footer();
	}
	public function load_header()
	{
        $data['site'] = $this->site->settings();
		$this->load->view('include/header',$data);
	}
	public function load_body()
	{
		$data['title'] = "Packages";
		$this->load->view('packages',$data);
	}	
	public function list()
	{
	    if(isset($_GET['type']) && $_GET['type'] != '')
	    {
	        $where = array('user_type' => ucfirst($_GET['type']),'Web' => 1, 'status' => 1);
	        $data['packages'] = $this->get->table('packages', $where);
	        if($data['packages'] != false)
	        {
                $data['small'] = (isset($_GET['size']) && $_GET['size'] == 'big')?4:6;
	            $this->load->view('show-packages',$data);
	        }
	    }
	}
	public function load_footer()
	{
		$this->load->view('include/footer');
	}
}
