<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Suppliers extends CI_Controller {
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
	public function load_header($title = "Suppliers")
	{
        $data['site'] = $this->site->settings();
		$data['title'] = $title;
		$this->load->view('include/header',$data);
	}
	public function load_body()
	{
		//$data['title'] = "Suppliers";
		//$this->load->view('suppliers',$data);
	}
	public function page()
	{
		$data['title'] = "Suppliers";
		$where = array('status' => 1);
        $order_by = array('created_date' => 'DESC');
        $data["total_rows"] = ($this->get->table('suppliers',$where))?count($this->get->table('suppliers',$where)):0;
        $base_url = base_url('suppliers/page/');
        $per_page = 12;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = pagination($base_url, $data["total_rows"], $per_page);
        $data['suppliers'] = $this->get->table('suppliers',$where, '', $order_by, $per_page, $page);
        $data['suburbs'] = $this->get->table('suburbs',$where);
        if($data['suburbs'] != false)
            $data['suburb'] = pluck($data['suburbs'], 'suburb', 'sno');
        $data['categories'] = $this->get->table('supplier_categories',$where);
        if($data['categories'] != false)
            $data['category'] = pluck($data['categories'], 'category', 'sno');
        $data['services'] = $this->get->table('supplier_services',$where);
        if($data['services'] != false)
            $data['service'] = pluck($data['services'], 'service_name', 'sno');
		$this->load_header();
		$this->load->view('suppliers',$data);
		$this->load_footer();
	}	
	public function single()
	{
	    $data['title'] = "Supplier";
	    $this->load_header($data['title']);
		$this->load->view('supplier',$data);
		$this->load_footer();
	}
	public function load_footer()
	{
		$this->load->view('include/footer');
	}
}
