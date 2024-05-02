<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Agents extends CI_Controller {
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
	public function load_header($title = "Agents")
	{
        $data['site'] = $this->site->settings();
		$data['title'] = $title;
		$this->load->view('include/header',$data);
	}
	public function load_body()
	{
		//$data['title'] = "Agents";
		//$this->load->view('agents',$data);
	}
	public function page()
	{
		$data['title'] = "Agents";
		$orderby = 'a.created_date';
        if(isset($_GET['sortby']) && $_GET['sortby'] == 'desc')
            $orderby = 'properties';
        $query = $this->get->query("SELECT a.*, (SELECT COUNT(p.sno) FROM properties as p WHERE p.agent = a.sno AND p.role = 'agents' AND p.status = '1') as properties FROM agents as a WHERE a.login_status = 'approve' AND a.status = '1' ORDER BY $orderby DESC");
        $data["total_rows"] = ($query)?count($query):0;
		$base_url = base_url('agents/page/');
        $per_page = 12;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = pagination($base_url, $data["total_rows"], $per_page);
		//$where = array('a.login_status' => 'approve', 'a.status' => 1);
        //$order_by = array('a.created_date' => 'DESC');
        //$data['agents'] = $this->get->table('agents as a',$where, '', $order_by, $per_page, $page);
        $data['agents'] = $this->get->query("SELECT a.*, (SELECT COUNT(p.sno) FROM properties as p WHERE p.agent = a.sno AND p.role = 'agents' AND p.status = '1') as properties FROM agents as a WHERE a.login_status = 'approve' AND a.status = '1' ORDER BY $orderby DESC LIMIT $page, $per_page");
		$this->load_header();
		$this->load->view('agents',$data);
		$this->load_footer();
	}
	public function single()
	{
	    if($agent = $this->uri->segment(2))
	    {
	        $agent = decode($agent);
    		$where = array('sno' => $agent, 'status' => 1);
    	    $data['agent'] = $this->get->table('agents', $where, '', array('name' => 'asc'));
    	    if($data['agent'] != false)
    	    {
        	    $data['title'] = ucwords($data['agent'][0]->name);
        	    $this->load_header($data['title']);
        	    $order_by = array('p.created_date' => 'DESC');
                $joinwhere = 'p.sno = g.property';
                $select = 'p.*,p.type as ptype,g.images,g.type';
    	        $where = array('p.agent' => $data['agent'][0]->sno, 'p.role' => 'agents', 'p.status' => 1, 'g.type' => 'thumbnail', 'g.status' => 1);
    	        $data['properties'] = $this->get->leftJoin('properties as p', 'p_gallery as g', $where, $joinwhere, $select, '', $order_by);
    	        $this->load->view('agent',$data);
        		$this->load_footer();
    	    }
    	    else
    	        redirect(base_url('agents'));
	    }
	    else
	        redirect(base_url('agents'));
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
            $agent = decode($referer);
    		$datetime = date('Y-m-d H:i:s');
        	$data = array(
        	    'agent' => $agent,
        		'name' =>  $this->input->post('name'),
        		'email' =>  $this->input->post('email'),
        		'phone' =>  $this->input->post('phone'),
        		'message' =>  $this->input->post('message'),
        		'created_date' => $datetime
        	);
    		if($logged)
    		    $data['user'] = $logged['id'];
    		$result = $this->get->insert('agents_request', $data);
    	    if($result == true)
    		{
    			if(isset($_POST['email']) && $_POST['email'] != '')
                {
                    $res['site'] = $this->site->settings();
                    $res['name'] = $this->input->post('name');
                	$subject='You have successfully requested.';
                	//$body = $this->load->view('emails/register.php',$res,TRUE);
                	$body = 'You have successfully requested. Our agent will reach you soon..';
                    sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $this->input->post('email'), $subject, $body);
                }
                $heading = 'You have successfully requested';
                $message = 'Our agent will reach you soon.';
                $msg[] = array('heading' => $heading,'msg' => $message,'alert' => 'success', 'reset' => 'yes');
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
