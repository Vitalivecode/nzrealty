<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Lists extends CI_Controller {
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
	public function load_header($title = "List")
	{
        $data['site'] = $this->site->settings();
		$data['title'] = $title;
		$this->load->view('include/header',$data);
	}
	public function load_body()
	{
		$data['title'] = "List";
		$this->load->view('list',$data);
	}
	public function districts()
	{
	    $where = array('status' => 1);
	    if(isset($_GET['region']) && $_GET['region'] != '')
	        $where['region'] = $_GET['region'];
        $order_by = array('district' => 'ASC');
    	$districts = $this->get->table('districts', $where, '', $order_by);
    	$data = '';
    	if($districts != false)
    	{
    	    foreach($districts as $district)
    	    {
    	        $data .= '<option value="'.$district->sno.'">'.$district->district.'</option>';
    	    }
    	}
    	echo $data;
	}
	public function suburbs()
	{
	    $where = array('status' => 1);
	    if(isset($_GET['region']) && $_GET['region'] != '')
	        $where['region'] = $_GET['region'];
	    if(isset($_GET['district']) && $_GET['district'] != '')
	        $where['district'] = $_GET['district'];
    	$order_by = array('suburb' => 'ASC');
    	$suburbs = $this->get->table('suburbs', $where, '', $order_by);
    	$data = '';
    	if($suburbs != false)
    	{
    	    foreach($suburbs as $suburb)
    	    {
    	        $data .= '<option value="'.$suburb->sno.'">'.$suburb->suburb.'</option>';
    	    }
    	}
    	echo $data;
	}
	public function load_footer()
	{
		$this->load->view('include/footer');
	}
}
