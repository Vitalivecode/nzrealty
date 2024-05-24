<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Agencies extends CI_Controller {
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
	public function load_header($title = "Agencies")
	{
        $data['site'] = $this->site->settings();
		$data['title'] = $title;
		$this->load->view('include/header',$data);
	}
	public function load_body()
	{
		//$data['title'] = "Agencies";
		//$this->load->view('agencies',$data);
	}
	public function page()
	{
		$data['title'] = "Agencies";
		$like = null;
		$where = array('login_status' => 'approve', 'status' => 1);
		if(isset($_GET) && !empty($_GET['search'])){
		    $like = array('name' => $_GET['search']);
		}
        $order_by = array('created_date' => 'DESC');
        $data["total_rows"] = ($this->get->table('companies',$where,$like))?count($this->get->table('companies',$where,$like)):0;
        $base_url = base_url('agencies/page/');
        $per_page = 12;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = pagination($base_url, $data["total_rows"], $per_page);
        $data['agencies'] = $this->get->table('companies',$where, $like, $order_by, $per_page, $page);
		$this->load_header();
		$this->load->view('agencies',$data);
		$this->load_footer();
	}
	public function single()
	{
	    if($agency = $this->uri->segment(2))
	    {
	       // print_r($agency);
	        $agency = str_replace('-',' ',urldecode($agency));
    		$where = array('name' => $agency, 'login_status' => 'approve', 'status' => 1);
    		$data['company'] = $this->get->table('companies', $where);
    		if($data['company'] != false)
	        {
        	    $data['title'] = strtoupper($agency);
        	    $this->load_header($data['title']);
        	    $data['properties'] = false;
        	    $where = array('company' => $data['company'][0]->sno, 'status' => 1);
    	        $data['agents'] = $this->get->table('agents', $where, '', array('name' => 'asc'));
    	        if($data['agents'] != false)
    	        {
    	            $agnts = array();
    	            foreach($data['agents'] as $agent)
    	                $agnts[] = $agent->sno;
    	            $wherein = array('p.agent', $agnts);
        	        $order_by = array('p.created_date' => 'DESC');
                	$joinwhere = 'p.sno = g.property';
                	$select = 'p.*,p.type as ptype,g.images,g.type';
    	            $where = array('p.role' => 'agents', 'p.status' => 1, 'g.type' => 'thumbnail', 'g.status' => 1);
    	            $data['properties'] = $this->get->leftJoin('properties as p', 'p_gallery as g', $where, $joinwhere, $select, '', $order_by,'','',$wherein);
    	        }
        		$this->load->view('agency',$data);
        		$this->load_footer();
    	    }
    	    else
    	        redirect(base_url('agencies'));
	    }
	    else
	        redirect(base_url('agencies'));
	}
	
	public function request()
	{
	    $logged = $this->session->userdata('logged_in');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|min_length[9]|max_length[12]');
		$this->form_validation->set_rules('message', 'Message', 'trim|max_length[1000]');
		if ($this->form_validation->run() == FALSE)
		{
			$msg[] = array('class' => 'name', 'error' => form_error('name', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            $msg[] = array('class' => 'email', 'error' => form_error('email', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            $msg[] = array('class' => 'phone', 'error' => form_error('phone', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
			$msg[] = array('class' => 'message', 'error' => form_error('message', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
		}
		else
		{  
    		$result = false;
    		$referer = '';
        	$refererURL = $_SERVER['HTTP_REFERER'];
            $refererExplode = explode('/',$refererURL);
            $referer = end($refererExplode);
            $agency = str_replace('-',' ',$referer);
    		$where = array('name' => $agency, 'status' => 1);
    		$company = $this->get->table('companies', $where);
    		if($company != false)
        	{
        		$datetime = date('Y-m-d H:i:s');
            	$data = array(
            	    'company' => $company[0]->sno,
            		'name' =>  $this->input->post('name'),
            		'email' =>  $this->input->post('email'),
            		'phone' =>  $this->input->post('phone'),
            		'message' =>  $this->input->post('message'),
            		'created_date' => $datetime
            	);
        		if($logged)
        		    $data['user'] = $logged['id'];
        		$result = $this->get->insert('companies_request', $data);
        	    if($result == true)
        		{
        			if(isset($_POST['email']) && $_POST['email'] != '')
                    {
                        $res['site'] = $this->site->settings();
                        $res['name'] = $this->input->post('name');
                    	$subject='You have successfully requested.';
                    	//$body = $this->load->view('emails/register.php',$res,TRUE);
                    	$body = 'You have successfully requested. Our team will reach you soon..';
                        sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $this->input->post('email'), $subject, $body);
                    }
                    $heading = 'You have successfully requested';
                    $message = 'Our team will reach you soon.';
                    $msg[] = array('heading' => $heading,'msg' => $message,'alert' => 'success', 'reset' => 'yes');
        		}
        		else
        		{
        			$msg[] = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
        		}
        	}
        	else
        	{
        		$msg[] = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
        	}
		}
		echo json_encode($msg);
	}
	public function load_footer()
	{
		$this->load->view('include/footer');
	}
}
