<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Myaccount extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Site');
		$this->site->maintenance();
        $this->load->model('get');
        $this->load->library('auth_user');
        $this->auth_user->checkUserLogin();
	}
	public function index()
	{
	    $this->load_header();
		$this->load_body();
		$this->load_footer();
	}
	public function load_header($title = "Dashboard")
	{
        $data['site'] = $this->site->settings();
		$data['title'] = $title;
		$data['logged'] = $this->session->userdata('logged_in');
		$this->load->view('include/dashboard/header',$data);
	}
	public function load_body()
	{
		$data['title'] = "Dashboard";
		$logged = $this->session->userdata('logged_in');
        $email = $logged['email'];
    	$table = 'customers';
    	if($logged['role'] == 'landlord')
    		$table = 'landlords';
    	if($logged['role'] == 'agents')
    		$table = 'agents';
		if($logged['role'] == 'company')
		    $table = 'companies';
    	$where = array('email' => $email, 'login_status' => 'approve', 'status' => 1);
    	$res = $this->get->table($table, $where);
    	if ($res != false)
    	{
    	    $properties = false;
    	    $total_properties = false;
    	    $order_by = array('p.created_date' => 'DESC');
        	$select = 'p.*,p.type as ptype';
        	if($logged['role'] == 'company')
    	    {
    	        $data['packages'] = $this->get->query("SELECT * FROM `subscriptions` as `s` WHERE `s`.`status` = '1' AND `s`.`role` = 'company' AND `s`.`user` = '".$logged['id']."' AND `s`.`sno` NOT IN (IFNULL((SELECT `invoice_no` FROM `invoice` WHERE `invoice_no` = `s`.`sno` AND `status` = '1' AND `txnstatus` = 'Success'),0))");
    	        $where = array('company' => $logged['id'], 'status' => 1);
    	        if($agents = $this->get->table('agents', $where, '', array('name' => 'asc')))
    	        {
    	            if($agents != false)
    	            {
    	                $agnts = array();
    	                foreach($agents as $agent)
    	                    $agnts[] = $agent->sno;
    	                $wherein = $agnts;
        	            $where = array('p.property_status' => 'Available', 'p.role' => 'agents', 'p.status' => 1);
    	                $properties = $this->get->whereIn('properties as p', $where,'p.agent',$wherein);
    	                $total_where = array('p.role' => 'agents', 'p.status' => 1);
    	                $total_properties = $this->get->whereIn('properties as p', $total_where,'p.agent',$wherein);
    	            }
    	        }
    	    }
    	    else
    	    {
        	    $where = array('p.property_status' => 'Available', 'p.role' => $logged['role'], 'p.agent' => $logged['id'], 'p.status' => 1);
        	    $properties = $this->get->table('properties as p', $where);
        	    $total_where = array('p.role' => $logged['role'], 'p.agent' => $logged['id'], 'p.status' => 1);
        	    $total_properties = $this->get->table('properties as p', $total_where);
    	    }
    	    $propertyids = array('0');
    	    if(($properties != false) && (!empty($properties)))
    	    {
    	        foreach($properties  as $property)
    	        {
    	            $propertyids[] = $property->sno;
    	        }
    	    }
    	    $totalpropertyids = array('0');
    	    if(($total_properties != false) && (!empty($total_properties)))
    	    {
    	        foreach($total_properties  as $property)
    	        {
    	            $totalpropertyids[] = $property->sno;
    	        }
    	    }
    	    $today = date('Y-m-d');
    	    $startdate = date('Y-m-d', strtotime($today.' -7 day'));
    	    $fromdate = date('Y-m-d', strtotime($today.' -7 day'));
    	    while (strtotime($fromdate) <= strtotime($today)) {
                $data['dateLabels'][] = date('M d',strtotime($fromdate));
                $dateLabels[] = date('Y-m-d',strtotime($fromdate));
                $fromdate = date ("Y-m-d", strtotime("+1 days", strtotime($fromdate)));
            }
    	    //$where = array('DATE(datetime) >=' => $startdate, 'DATE(datetime) <=' => $today);
    	    $data['count_properties'] = $properties;
            $data['count_views'] = $this->get->whereIn('property_views', '','property',$propertyids,'','','','COUNT(property_views.sno) as count');
            $data['count_request'] = $this->get->whereIn('property_request', '','property',$propertyids,'','','','COUNT(property_request.sno) as count');
    	    $data['count_wishlist'] = $this->get->whereIn('wishlist', array('status' => 1),'property',$propertyids,'','','','COUNT(wishlist.sno) as count');
            $data['count_schedules'] = $this->get->whereIn('property_schedules', '','property',$propertyids,'','','','COUNT(property_schedules.sno) as count');
    	    $data['count_visits'] = $this->get->whereIn('property_visits', array('status' => 1),'property',$propertyids,'','','','COUNT(property_visits.sno) as count');
    	    $data['count_apply'] = $this->get->whereIn('properties', array('apply_link !=' => '', 'status' => 1),'sno',$propertyids,'','','','COUNT(properties.sno) as count');
    	    
    	    $data['count_total_properties'] = $total_properties;
            $data['count_total_views'] = $this->get->whereIn('property_views', '','property',$totalpropertyids,'','','','COUNT(property_views.sno) as count');
            $data['count_total_request'] = $this->get->whereIn('property_request', '','property',$totalpropertyids,'','','','COUNT(property_request.sno) as count');
    	    $data['count_total_wishlist'] = $this->get->whereIn('wishlist', array('status' => 1),'property',$totalpropertyids,'','','','COUNT(wishlist.sno) as count');
            $data['count_total_schedules'] = $this->get->whereIn('property_schedules', '','property',$totalpropertyids,'','','','COUNT(property_schedules.sno) as count');
    	    $data['count_total_visits'] = $this->get->whereIn('property_visits', array('status' => 1),'property',$totalpropertyids,'','','','COUNT(property_visits.sno) as count');
    	    $data['count_total_apply'] = $this->get->whereIn('properties', array('apply_link !=' => '', 'status' => 1),'sno',$totalpropertyids,'','','','COUNT(properties.sno) as count');
            
            $tomonth = date('Y-m');
    	    $startmonth = date('Y-m-01', strtotime($tomonth.' -11 month'));
    	    $frommonth = date('Y-m-01', strtotime($tomonth.' -11 month'));
    	    while (strtotime($frommonth) <= strtotime($tomonth)) {
                $data['monthLabels'][] = date('M',strtotime($frommonth));
                $monthLabels[] = date('n',strtotime($frommonth));
                $frommonth = date ("Y-m-01", strtotime("+1 month", strtotime($frommonth)));
            }
            $tomonth = date('Y-m-31');
    	    $where = array('DATE(datetime) >=' => $startmonth, 'DATE(datetime) <=' => $tomonth);
    	    if(($properties != false) && (!empty($properties)))
    	    {
    	        foreach($properties  as $property)
    	        {
    	            $propertyids[] = $property->sno;
    	        }
    	    }
            $property_views = $this->get->whereIn('property_views', $where,'property',$propertyids,'','','','property_views.*,MONTH(property_views.datetime) as month,DATE(property_views.datetime) as date');
            if($property_views != false)
            {
                $property_views_months = pluck_multi_array($property_views,'sno','month');
                foreach($monthLabels as $label)
                {
                    $data['monthviews'][] = (isset($property_views_months[$label]))?count($property_views_months[$label]):0;
                }
                $property_views_dates = pluck_multi_array($property_views,'sno','date');
                foreach($dateLabels as $label)
                {
                    $data['views'][] = (isset($property_views_dates[$label]))?count($property_views_dates[$label]):0;
                }
            }
            else
            {
                $data['monthviews'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
                $data['views'] = array(0,0,0,0,0,0,0,0); 
            }   
            
                
            $where = array('DATE(created_date) >=' => $startmonth, 'DATE(created_date) <=' => $tomonth);
            $property_request = $this->get->whereIn('property_request', $where,'property',$propertyids,'','','','property_request.*,MONTH(property_request.created_date) as month,DATE(property_request.created_date) as date');
            if($property_request != false)
            {
                $property_request_months = pluck_multi_array($property_request,'sno','month');
                foreach($monthLabels as $label)
                {
                    $data['monthenquiries'][] = (isset($property_request_months[$label]))?count($property_request_months[$label]):0;
                }
                $property_request_dates = pluck_multi_array($property_request,'sno','date');
                foreach($dateLabels as $label)
                {
                    $data['enquiries'][] = (isset($property_request_dates[$label]))?count($property_request_dates[$label]):0;
                }
            }
            else
            {
                $data['monthenquiries'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
                $data['enquiries'] = array(0,0,0,0,0,0,0,0);
            }
                
            $where = array('date >=' => $startmonth, 'date <=' => $tomonth);
            $property_schedules = $this->get->whereIn('property_schedules', $where,'property',$propertyids,'','','','property_schedules.*,MONTH(property_schedules.date) as month');
            if($property_schedules != false)
            {
                $property_schedules_months = pluck_multi_array($property_schedules,'sno','month');
                foreach($monthLabels as $label)
                {
                    $data['monthschedules'][] = (isset($property_schedules_months[$label]))?count($property_schedules_months[$label]):0;
                }
                $property_schedules_dates = pluck_multi_array($property_schedules,'sno','date');
                foreach($dateLabels as $label)
                {
                    $data['schedules'][] = (isset($property_schedules_dates[$label]))?count($property_schedules_dates[$label]):0;
                }
            }
            else
            {
                $data['monthschedules'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
                $data['schedules'] = array(0,0,0,0,0,0,0,0);
            }
		    $this->load->view('dashboard',$data);
    	}
		else
		    $this->load->view('myaccount-pending',$data);
	}		
	public function agents()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    if($logged['role'] == 'company')
	    {
    	    $data['title'] = "Agents";
    	    $this->load_header($data['title']);
    	    $where = array('company' => $logged['id']);
    	    $data['agents'] = $this->get->table('agents', $where, '', array('name' => 'asc'));
        	$this->load->view('my-agents',$data);
    		$this->load_footer();
	    }
	    else
	        redirect(base_url('myaccount'));
	}		
	public function addagent()
	{
	    $this->auth_user->checkUserLoginStatus();
		$logged = $this->session->userdata('logged_in');
		if($logged['role'] == 'company')
	    {
	        $companySubscription = packageCheck('company', $logged['id']);
            $companyAgentSubscription = (($companySubscription != false) && (!empty($companySubscription[0]->details)))?json_decode($companySubscription[0]->details)->agents:0;
    	    $agentsList = $this->get->table('agents', array('company' => $logged['id'], 'status' => '1'));
    	    $companyAgents = ($agentsList != false)?count($agentsList):0;
    	    $packageAgentAlert = array(
				"title" => 'Your limit has been reached',
				"message" => 'You can add only '.$companyAgentSubscription.' agents. Please update your package.',
				"status" => "warning",
			);
    		$data['title'] = "Add Agent";
            if($this->uri->segment(3) && $this->uri->segment(2) != '' && $this->uri->segment(2) == 'edit-agent')
        	{
        	   $data['title'] = "Edit Agent";
        	   $id = $this->uri->segment(3);
        	   $where = array('sno' => $id, 'company' => $logged['id']);
        	   $data['agents'] = $this->get->table('agents', $where);
        	}
    	    if($this->uri->segment(3) && $this->uri->segment(3) == 'add')
    	    {
        		$referer = '';
        	    $refererURL = $_SERVER['HTTP_REFERER'];
                $refererExplode = explode('/',$refererURL);
                $referer = end($refererExplode);
            	$id = is_numeric($referer)?$referer:0;
            	$where = array('sno' => $id, 'company' => $logged['id']);
            	$agents = $this->get->table('agents', $where);
    			$this->load->library('form_validation');
    			$this->form_validation->set_error_delimiters('', '');
    			$this->form_validation->set_rules('name', 'Fullame', 'trim|required|min_length[3]|max_length[50]');
    			if(isset($agents) && $agents != false)
    			    echo '';
    			else
    			    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[agents.email]');
    			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[9]|max_length[12]');
    			if(isset($agents) && $agents != false)
    			{
    			    $this->form_validation->set_rules('password', 'Password', 'trim|min_length[4]');
    			    $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|min_length[4]|matches[password]');
    			}
    			else
    			{
    			    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
    			    $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|min_length[4]|matches[password]');
    			}
    			$this->form_validation->set_rules('about', 'About', 'trim|max_length[1200]');
        		$this->form_validation->set_rules('position', 'Position', 'trim|max_length[255]');
        		$this->form_validation->set_rules('exp_years', 'Year', 'trim|numeric|max_length[2]');
        		$this->form_validation->set_rules('exp_months', 'Months', 'trim|numeric|max_length[2]');
        		$this->form_validation->set_rules('qualification', 'Qualification', 'trim|max_length[9999]');
    			if ($this->form_validation->run() == FALSE)
    			{
    			    $msg[] = array('class' => 'name', 'error' => form_error('name', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'email', 'error' => form_error('email', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'mobile', 'error' => form_error('mobile', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'password', 'error' => form_error('password', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'cpassword', 'error' => form_error('cpassword', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'about', 'error' => form_error('about', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            		$msg[] = array('class' => 'position', 'error' => form_error('position', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            		$msg[] = array('class' => 'exp_years', 'error' => form_error('exp_years', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            		$msg[] = array('class' => 'exp_months', 'error' => form_error('exp_months', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            		$msg[] = array('class' => 'qualification', 'error' => form_error('qualification', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
    			}
    			else
    			{
    			    $result = false;
    				if(!empty($_FILES['profile']['name'][0]))
    				{
        				$title = 'profile';
        				$profile_file['image'] = upload_files($title, $_FILES['profile']);
        				if ($profile_file['image'] === FALSE) {
        				    $filename = 'Profile';
                            $error = $this->upload->display_errors();
                        }
    				}
    			    if(empty($error))
    			    {
        			    $datetime = date('Y-m-d H:i:s');
            			$password = $this->input->post('password');
                		$data = array(
                			'name' =>  $this->input->post('name'),
                			'phone' =>  $this->input->post('mobile'),
                			'about' =>  $this->input->post('about'),
                			'position' => $this->input->post('position'),
                			'experience' => ($this->input->post('exp_years')?$this->input->post('exp_years'):'0').'-'.($this->input->post('exp_months')?$this->input->post('exp_months'):'0'),
                			'qualification' => $this->input->post('qualification'),
                			'company' => $logged['id'],
                			'login_status' => 'approve',
                		);
                		if($this->input->post('email'))
                		    $data['email'] = $this->input->post('email');
                		if($this->input->post('password'))
                		    $data['password'] = md5($password);
                		$data['languages'] = $this->input->post('language')?implode(',',$this->input->post('language')):null;
                		$data['twitter'] = $this->input->post('twitter');
                		$data['facebook'] = $this->input->post('facebook');
                		$data['instagram'] = $this->input->post('instagram');
                		$data['linkedin'] = $this->input->post('linkedin');
                		if(!empty($_FILES['profile']['name'][0]))
    				    {
    				        foreach($profile_file['image'] as $key => $name)
    				        {
    				            resize($name,300,300);
    				            $data['img'] = $name;
    				        }
    				    }
    				    if(isset($agents) && $agents != false)
    				    {
    				        $data['modified_date'] = $datetime;
    				        $where = array('sno' => $id, 'company' => $logged['id']);
    				        $result = $this->get->update('agents', $data, $where);
    				    }
    				    else
    				    {
    				        $data['created_date'] = $datetime;
    				        if($companyAgentSubscription <= $companyAgents)
                	            $msg[] = $packageAgentAlert;
                	        else
            			        $result = $this->get->insert('agents', $data);
    				    }
            			if($result == true)
            			{
            			    if(isset($_POST['email']) && $_POST['email'] != '' && $agents == false)
                            {
                                $res['site'] = $this->site->settings();
                                $res['name'] = $data['name'];
                        		$subject='You have successfully registered.';
                        		//$body = $this->load->view('emails/register.php',$res,TRUE);
                        		$body = 'You have successfully registered.';
                                sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $this->input->post('email'), $subject, $body);
                            }
                            $heading = $data['name'];
                            if(is_numeric($referer))
                                $msg[] = array('heading' => $heading, 'msg' => 'Successfully Updated', 'alert' => 'success', 'redirect' => base_url('myaccount/agents'));
                            else
                                $msg[] = array('heading' => $heading, 'msg' => 'Successfully Saved', 'alert' => 'success', 'reset' => 'yes', 'redirect' => base_url('myaccount/agents'));
            			}
            			else
            			{
            				$msg[] = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
            			}
    			    }
    				else
    				    $msg[] = array('heading' => 'The '.$filename.' file is not accept','msg' => strip_tags($error),'alert' => 'error');
    			}
    			echo json_encode($msg);
    		}
    	    else
    	    {
    	        if(($companyAgentSubscription <= $companyAgents) && (($this->uri->segment(2) == 'add-agent') || ($this->uri->segment(2) == 'addagent')))
    	        {
					$this->session->set_flashdata('alertMessage', $packageAgentAlert);
    	            redirect(base_url('myaccount/agents'));
    	        }
            	$this->load_header($data['title']);
                $this->load->view('add-agent',$data);
            	$this->load_footer();
    	    }
	    }
	    else
	        redirect(base_url('myaccount'));
	}
	public function schedules()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    $data['logged'] = $logged;
	    if($logged['role'] != 'user')
	    {
	        $schedules = $this->get->table('property_visits', array('status' => 1), '', 'day_date');
	        if($schedules != false)
	        {
	            $property_schedules = $this->get->table('property_schedules', array('status' => 1));
	            $data['visiters'] = pluck_multi_array($schedules,'sno','property');
	            $data['name'] = pluck($schedules,'name','sno');
	            $data['email'] = pluck($schedules,'email','sno');
	            $data['phone'] = pluck($schedules,'phone','sno');
	            $data['link'] = pluck($schedules,'send_link','sno');
	            $data['day'] = pluck_multi_array($schedules,'day_date','property');
	            //$data['time'] = pluck_multi_array($schedules,'time','property');
	            $data['schedule_id'] = pluck($schedules,'schedule_id','sno');
	            $data['visited'] = pluck($schedules,'visited','sno');
	            $data['from_time'] = pluck($property_schedules,'from_time','sno');
	            $data['to_time'] = pluck($property_schedules,'to_time','sno');
	        }
	        $order_by = array('p.created_date' => 'DESC');
        	$joinwhere = 'p.sno = g.property';
        	$select = 'p.*,p.type as ptype,g.images,g.type';
        	if($logged['role'] == 'company')
    	    {
    	        $data['properties'] = false;
    	        $where = array('company' => $logged['id'], 'status' => 1);
    	        if($agents = $this->get->table('agents', $where, '', array('name' => 'asc')))
    	        {
    	            if($agents != false)
    	            {
    	                $agnts = array();
    	                foreach($agents as $agent)
    	                    $agnts[] = $agent->sno;
    	                $wherein = array('p.agent', $agnts);
        	            $where = array('p.role' => 'agents', 'p.status' => 1, 'g.type' => 'thumbnail', 'g.status' => 1);
    	                $data['properties'] = $this->get->leftJoin('properties as p', 'p_gallery as g', $where, $joinwhere, $select, '', $order_by,'','',$wherein);
    	            }
    	        }
    	    }
    	    else
    	    {
        	    $where = array('p.role' => $logged['role'], 'p.agent' => $logged['id'], 'p.status' => 1, 'g.type' => 'thumbnail', 'g.status' => 1);
        	    $data['properties'] = $this->get->leftJoin('properties as p', 'p_gallery as g', $where, $joinwhere, $select, '', $order_by);
    	    }
    		$data['title'] = "Schedules";
	        $this->load_header($data['title']);
    		$this->load->view('schedules',$data);
    		$this->load_footer();
	    }
	    else if($logged['role'] == 'user')
	    {
	        $data['properties'] = false;
	        $schedules = $this->get->table('property_visits', array('user' => $logged['id']), '', 'day_date');
	        if($schedules != false)
	        {
	            $property_schedules = $this->get->table('property_schedules', array('status' => 1));
	            $data['visiters'] = pluck_multi_array($schedules,'sno','property');
	            $data['name'] = pluck($schedules,'name','sno');
	            $data['email'] = pluck($schedules,'email','sno');
	            $data['phone'] = pluck($schedules,'phone','sno');
	            $data['link'] = pluck($schedules,'send_link','sno');
	            $data['day'] = pluck_multi_array($schedules,'day_date','property');
	            $data['schedule_id'] = pluck($schedules,'schedule_id','sno');
	            $data['from_time'] = pluck($property_schedules,'from_time','sno');
	            $data['to_time'] = pluck($property_schedules,'to_time','sno');
	            $data['status'] = pluck($schedules,'status','sno');
    	        $order_by = array('p.created_date' => 'DESC');
            	$joinwhere = 'p.sno = g.property';
            	$select = 'p.*,p.type as ptype,g.images,g.type';
            	$where = array('p.status' => 1, 'g.type' => 'thumbnail', 'g.status' => 1);
            	$data['properties'] = $this->get->leftJoin('properties as p', 'p_gallery as g', $where, $joinwhere, $select, '', $order_by);
	        }
	        $data['title'] = "Schedules";
	        $this->load_header($data['title']);
    		$this->load->view('schedules',$data);
	        $this->load_footer();
	    }
	    else
	        redirect(base_url('myaccount'));
	}
	public function properties()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    if($logged['role'] != 'user')
	    {
        	$order_by = array('p.created_date' => 'DESC');
        	$joinwhere = 'p.sno = g.property';
        	$select = 'p.*,p.type as ptype,g.images,g.type';
        	if($logged['role'] == 'company')
    	    {
    	        $data['properties'] = false;
    	        $where = array('company' => $logged['id'], 'status' => 1);
    	        if($agents = $this->get->table('agents', $where, '', array('name' => 'asc')))
    	        {
    	            if($agents != false)
    	            {
    	                $agnts = array();
    	                foreach($agents as $agent)
    	                    $agnts[] = $agent->sno;
    	                $wherein = array('p.agent', $agnts);
        	            $where = array('p.role' => 'agents', 'p.status' => 1, 'g.type' => 'thumbnail', 'g.status' => 1);
    	                $data['properties'] = $this->get->leftJoin('properties as p', 'p_gallery as g', $where, $joinwhere, $select, '', $order_by,'','',$wherein);
    	            }
    	        }
    	    }
    	    else
    	    {
        	    $where = array('p.role' => $logged['role'], 'p.agent' => $logged['id'], 'p.status' => 1, 'g.type' => 'thumbnail', 'g.status' => 1);
        	    $data['properties'] = $this->get->leftJoin('properties as p', 'p_gallery as g', $where, $joinwhere, $select, '', $order_by);
    	    }
    	    $data['title'] = "Properties";
    	    $this->load_header($data['title']);
        	$this->load->view('my-properties',$data);
    		$this->load_footer();
	    }
	    else
	        redirect(base_url('myaccount'));
	}		
	public function addproperty()
	{
	    $this->auth_user->checkUserLoginStatus();
		$logged = $this->session->userdata('logged_in');
	    if($logged['role'] != 'user')
	    {
        	$role = $logged['role'];
        	$agentId = $logged['id'];
	        if($role == 'agents')
        	{
        	    $user = user('agents', $agentId);
        	    $companyId = $user[0]->company;
        	    $companySubscription = false;
        	    $companyProperties = 0;
        	    if(!empty($companyId) && ($companyId != 0))
        	    {
        	        $where = array('company' => $companyId, 'status' => 1);
        	        if($agents = $this->get->table('agents', $where))
        	        {
        	            if($agents != false)
        	            {
        	                $wherein = array();
        	                foreach($agents as $agent)
        	                    $wherein[] = $agent->sno;
            	            $where = array('p.role' => 'agents', 'p.status' => 1);
        	                $propertiesList = $this->get->whereIn('properties as p', $where, 'p.agent', $wherein);
        	                $companyProperties = ($propertiesList != false)?count($propertiesList):0;
        	                $companySubscription = packageCheck('company', $companyId);
        	            }
        	        }
        	    }
        	} 
        	if($role == 'company')
        	{
        	    $companyId = $agentId;
        	}
    	    if($this->uri->segment(3) && $this->uri->segment(3) == 'add')
    	    {
    	        $referer = '';
    	        $refererURL = $_SERVER['HTTP_REFERER'];
                $refererExplode = explode('/',$refererURL);
            	$referer = end($refererExplode);
            	if(($role == 'agents') && !is_numeric($referer))
        	    {
                    if(($companySubscription != false) && (!empty($companySubscription[0]->details)))
                    {
                        $companyPropertiesSubscription = json_decode($companySubscription[0]->details)->properties;
                        $packagePropertyAlert = array(
                    	    "heading" => 'Your limit has been reached',
                    		"msg" => 'You can add only '.$companyPropertiesSubscription.' properties. Please update your package.',
                    		"alert" => "warning",
                    		"redirect" => base_url('myaccount/properties')
                    	);
                    	if($companyPropertiesSubscription <= $companyProperties)
                    	{
                		    $msg[] = $packagePropertyAlert;
                		    echo json_encode($msg);
                		    exit();
                    	}
                    }
        	    }
            	$date = new DateTime('2022-08-14'); 
    	        $this->load->library('form_validation');
    			$this->form_validation->set_error_delimiters('', '');
    			if(!is_numeric($referer))
    			    $this->form_validation->set_rules('title', 'Title', 'trim|min_length[1]|max_length[255]');
    			$this->form_validation->set_rules('type', 'Property Type', 'trim|required');
    			$this->form_validation->set_rules('property_type', 'Property Category', 'trim|required');
    			if($this->input->post('type') == 'residential')
    			{
    			    $this->form_validation->set_rules('bedrooms', 'Bedrooms', 'trim|required|numeric');
        			$this->form_validation->set_rules('bathrooms', 'Bathrooms', 'trim|required|numeric');
        			$this->form_validation->set_rules('garage', 'Garage', 'trim|numeric');
        			$this->form_validation->set_rules('carport', 'Car Port', 'trim|numeric');
        			$this->form_validation->set_rules('offshoreparking', 'Offshore Parking', 'trim|numeric');
        			$this->form_validation->set_rules('afrom', 'Available From', 'trim|required');
        			$this->form_validation->set_rules('build_year', 'Built Year', 'trim|numeric');
        			$this->form_validation->set_rules('area', 'Area', 'trim|numeric');
        			$this->form_validation->set_rules('tenants', 'Tenants', 'trim|numeric');
    			    $this->form_validation->set_rules('oprice', ' ', 'trim|required|numeric');
    			    $this->form_validation->set_rules('bond', ' ', 'trim|numeric');
    			}
    			else
    			{
    			    $this->form_validation->set_rules('floor_area', 'Floor Area', 'trim|required|numeric');
        			$this->form_validation->set_rules('larea', 'Land Area', 'trim|numeric');
        			$this->form_validation->set_rules('parkings', 'Parking', 'trim|numeric');
        			$this->form_validation->set_rules('toilets', 'Toilets', 'trim|numeric');
        			$this->form_validation->set_rules('cbathrooms', 'Bathrooms', 'trim|numeric');
        			$this->form_validation->set_rules('cafrom', 'Available From', 'trim|required');
        			$this->form_validation->set_rules('duration', ' ', 'trim|required');
        			$this->form_validation->set_rules('negotiation', ' ', 'trim|numeric');
        			if($this->input->post('negotiation') == '0')
    			        $this->form_validation->set_rules('mprice', ' ', 'trim|required|numeric');
    			    else
    			        $this->form_validation->set_rules('mprice', ' ', 'trim|numeric');
    			}
    			$this->form_validation->set_rules('description', 'Description', 'trim|required');
    			
    // 			if(in_array('add-property',$refererExplode))
    // 			{
    // 			    $this->form_validation->set_rules('sdate', 'Date', 'trim|required');
    // 			    $this->form_validation->set_rules('sfrom', 'From', 'trim|required');
    // 			    $this->form_validation->set_rules('sto', 'To', 'trim|required');
    // 			}
    			
    			$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required|numeric');
    			$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required|numeric');
    			$this->form_validation->set_rules('address', 'Address', 'trim|required');
    			$this->form_validation->set_rules('region', 'Region', 'trim|required|numeric');
    			$this->form_validation->set_rules('district', 'District', 'trim|required|numeric');
    			$this->form_validation->set_rules('suburb', 'Suburb', 'trim|required|numeric');
    			$this->form_validation->set_rules('zip', 'Zip', 'trim');
    			
    			$this->form_validation->set_rules('property_status', ' ', 'trim');
    			$this->form_validation->set_rules('apply_link', ' ', 'trim');
    			//$this->form_validation->set_rules('assignto', ' ', 'trim');
    			
    			$this->form_validation->set_rules('featured', ' ', 'trim|numeric');
    			$this->form_validation->set_rules('premium', ' ', 'trim|numeric');
    			$this->form_validation->set_rules('boost', ' ', 'trim|numeric');
    			
    			if(empty($_FILES['property_thumbnail']['name'][0]) && !is_numeric($referer))
    			    $this->form_validation->set_rules('property_thumbnail', 'Property Thumbnail', 'trim|required');
    			if(!$this->session->userdata('property_pics'))
    			    $this->form_validation->set_rules('property_pics', ' ', 'trim|required');
    			/*
    			for($days = 7; $days--;) { $day = $date->modify( '+1 days' )->format( 'l' );
    			    $this->form_validation->set_rules('schedule['.strtolower($day).'][from]', ' ', 'trim|required');
    			    $this->form_validation->set_rules('schedule['.strtolower($day).'][to]', ' ', 'trim|required');
    			    $this->form_validation->set_rules('schedule['.strtolower($day).'][slots]', ' ', 'trim|required');
    			}
    			*/
    			if ($this->form_validation->run() == FALSE)
    			{
    			    if(!is_numeric($referer))
                        $msg[] = array('class' => 'title', 'error' => form_error('title', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'type', 'error' => form_error('type', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'property_type', 'error' => form_error('property_type', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    if($this->input->post('type') == 'residential')
    			    {
                        $msg[] = array('class' => 'afrom', 'error' => form_error('afrom', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'build_year', 'error' => form_error('build_year', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'area', 'error' => form_error('area', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'tenants', 'error' => form_error('tenants', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'bedrooms', 'error' => form_error('bedrooms', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'bathrooms', 'error' => form_error('bathrooms', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'garage', 'error' => form_error('garage', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'parkings', 'error' => form_error('parkings', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'carport', 'error' => form_error('carport', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'offshoreparking', 'error' => form_error('offshoreparking', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'oprice', 'error' => form_error('oprice', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'bond', 'error' => form_error('bond', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
    			    }
    			    else
    			    {
    			        $msg[] = array('class' => 'floor_area', 'error' => form_error('floor_area', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
    			        $msg[] = array('class' => 'larea', 'error' => form_error('larea', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
    			        $msg[] = array('class' => 'parkings', 'error' => form_error('parkings', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
    			        $msg[] = array('class' => 'toilets', 'error' => form_error('toilets', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
    			        $msg[] = array('class' => 'cbathrooms', 'error' => form_error('cbathrooms', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
    			        $msg[] = array('class' => 'cafrom', 'error' => form_error('cafrom', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
    			        $msg[] = array('class' => 'duration', 'error' => form_error('duration', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
    			        $msg[] = array('class' => 'negotiation', 'error' => form_error('negotiation', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
    			        $msg[] = array('class' => 'mprice', 'error' => form_error('mprice', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
    			    }
                    $msg[] = array('class' => 'description', 'error' => form_error('description', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    
        //             if(in_array('add-property',$refererExplode))
        // 			{
        // 			    $msg[] = array('class' => 'sdate', 'error' => form_error('sdate', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
        // 			    $msg[] = array('class' => 'sfrom', 'error' => form_error('sfrom', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
        // 			    $msg[] = array('class' => 'sto', 'error' => form_error('sto', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
        // 			}
                    
                    $msg[] = array('class' => 'latitude', 'error' => form_error('latitude', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'longitude', 'error' => form_error('longitude', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'address', 'error' => form_error('address', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'region', 'error' => form_error('region', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'district', 'error' => form_error('district', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'suburb', 'error' => form_error('suburb', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'zip', 'error' => form_error('zip', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    
                    $msg[] = array('class' => 'property_status', 'error' => form_error('property_status', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'apply_link', 'error' => form_error('apply_link', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    //$msg[] = array('class' => 'assignto', 'error' => form_error('assignto', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    
                    $msg[] = array('class' => 'featured', 'error' => form_error('featured', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'premium', 'error' => form_error('premium', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'boost', 'error' => form_error('boost', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    
                    if(empty($_FILES['property_thumbnail']['name'][0]) && !is_numeric($referer))
                        $msg[] = array('class' => 'property_thumbnail', 'error' => form_error('property_thumbnail', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    if(!$this->session->userdata('property_pics'))
                        $msg[] = array('class' => 'property_pics', 'error' => form_error('property_pics', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    /*
                    for($days = 7; $days--;) { $day = $date->modify( '+1 days' )->format( 'l' );
                        $msg[] = array('class' => 'schedule_'.strtolower($day).'_from', 'error' => form_error('schedule['.strtolower($day).'][from]', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'schedule_'.strtolower($day).'_to', 'error' => form_error('schedule['.strtolower($day).'][to]', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'schedule_'.strtolower($day).'_slots', 'error' => form_error('schedule['.strtolower($day).'][slots]', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    }
                    */
                    // echo validation_errors();
    			}
    			else
    			{
    			    $result = false;
    				if(!empty($_FILES['property_thumbnail']['name'][0]))
    				{
        				$title = 'property_thumbnail';
        				$property_thumbnail_files['image'] = upload_files($title, $_FILES['property_thumbnail']);
        				if ($property_thumbnail_files['image'] === FALSE) {
        				    $filename = 'Property Thumbnail';
                            $error = $this->upload->display_errors();
                        }
    				}
    			    if(empty($error))
    			    {
        			    $insert = array(
        			        'type' => $this->input->post('type'),
        			        'p_type' => $this->input->post('property_type'),
        			        'available_from' => ($this->input->post('type') == 'residential')?date('Y-m-d', strtotime($this->input->post('afrom'))):date('Y-m-d', strtotime($this->input->post('cafrom'))),
        			        'built_year' => $this->input->post('build_year'),
        			        'sqft' => ($this->input->post('type') == 'residential')?$this->input->post('area'):$this->input->post('larea'),
        			        'floor_area' => $this->input->post('floor_area'),
        			        'tenants' => $this->input->post('tenants'),
        			        'bedrooms' => $this->input->post('bedrooms'),
        			        'bathrooms' => ($this->input->post('type') == 'residential')?$this->input->post('bathrooms'):$this->input->post('cbathrooms'),
        			        'parkings' => ($this->input->post('type') == 'residential')?$this->input->post('garage'):$this->input->post('parkings'),
        			        'carport' => $this->input->post('carport'),
        			        'offshoreparking' => $this->input->post('offshoreparking'),
        			        'toilets' => $this->input->post('toilets'),
        			        'description' => $this->input->post('description'),
        			        'address' => $this->input->post('address'),
        			        'region' => $this->input->post('region'),
        			        'district' => $this->input->post('district'),
        			        'suburb' => $this->input->post('suburb'),
        			        'zip' => $this->input->post('zip'),
        			        'bond' => $this->input->post('bond'),
        			        'price' => ($this->input->post('type') == 'residential')?$this->input->post('oprice'):$this->input->post('mprice'),
        			        'duration' => ($this->input->post('type') == 'residential')?'Week':$this->input->post('duration'),
        			        'other' => $this->input->post('other')?json_encode($this->input->post('other')):null,
        			        'negotiation' => $this->input->post('negotiation')?1:0,
        			        'apply_link' => $this->input->post('apply_link'),
        			        'assignto' => $this->input->post('assignto')?implode(',',$this->input->post('assignto')):null,
        			        //'featured' => $this->input->post('featured'),
        			        //'premium' => $this->input->post('premium'),
        			        //'boost' => $this->input->post('boost'),
        			        'features' => $this->input->post('features')?json_encode($this->input->post('features')):null,
        			        'aminities' => $this->input->post('aminities')?implode(',',$this->input->post('aminities')):null,
        			        //'accesskey' => is_numeric($referer)?$referer:rand(999,999999).round(microtime(true)*1000),
        			        'latitude' => $this->input->post('latitude')?$this->input->post('latitude'):null,
        			        'longitude' => $this->input->post('longitude')?$this->input->post('longitude'):null,
        			        'pointer' => $this->input->post('latitude').','.$this->input->post('longitude'),
        			        'accesskey' => is_numeric($referer)?$referer:random_int(100000, 999999),
        			        //'property_status' => $this->input->post('property_status')?$this->input->post('property_status'):'Pending',
        			    );
        			    
        			    if(!empty($this->input->post('property_status')))
        			    {
        			        $insert['property_status'] = $this->input->post('property_status');
        			    }
        			    if(!empty($this->input->post('featured')))
        			    {
        			        $insert['featured'] = $this->input->post('featured');
        			        if($logged['role'] == 'landlord')
        			            $insert['featured'] = '0';
        			    }
        			    if(!empty($this->input->post('premium')))
        			    {
        			        $insert['premium'] = $this->input->post('premium');
        			        if($logged['role'] == 'landlord')
        			            $insert['premium'] = '0';
        			    }
        			    if(!empty($this->input->post('boost')))
        			    {
        			        $insert['boost'] = $this->input->post('boost');
        			        $insert['boost'] = '0';
        			    }
        			    if((!is_numeric($referer) || ($this->input->post('title') && $this->input->post('title') != '')))
        			        $insert['title'] = $this->input->post('title');
        			    if($logged['role'] == 'company')
            	        {
            	            $where = array('accesskey' => $referer, 'status' => 1);
            	        }
            	        else
            	        {
            	            $insert['role'] = $logged['role'];
        			        $insert['agent'] = $logged['id'];
        			        $where = array('accesskey' => $referer, 'role' => $logged['role'], 'agent' => $logged['id'], 'status' => 1);
            	        }
        				$result = $this->get->updateInsertTableDetails('properties', $insert, $where, 'created_date', 'modified_date');
        				if($result == true)
        				{
        				    if(!empty($_FILES['property_thumbnail']['name'][0]))
    				        {
    				            foreach($property_thumbnail_files['image'] as $key => $name)
    				            {
    				                resize($name,714,420);
                				    $gallery_insert = array(
                    			        'property' => $result,
                    			        'images' => $name,
                    			        'type' => 'thumbnail',
                    			    );
                    			    $where = array('property' => $result, 'type' => 'thumbnail', 'status' => 1);
                    			    if(is_numeric($referer))
                    			        $this->get->update('p_gallery', $gallery_insert, $where);
                    			    else
                    				    $this->get->insert('p_gallery', $gallery_insert);
    				            }
    				        }
            				if($this->session->userdata('property_pics'))
    				        {
    				            if(is_numeric($referer))
    				            {
    				                $where = array(
                    			        'property' => $result,
                    			        'type' => 'normal'
                    			    );
    				                $gallery_insert = array(
                    			        'property' => $result,
                    			        'type' => 'normal',
                    			        'status' => 0
                    			    );
    				                $this->get->update('p_gallery', $gallery_insert, $where);
    				            }
    				            $property_pics = $this->session->userdata('property_pics');
    				            foreach($property_pics as $key => $name)
    				            {
    				                $where = array(
                    			        'property' => $result,
                    			        'images' => $name,
                    			        'type' => 'normal'
                    			    );
                				    $gallery_insert = array(
                    			        'property' => $result,
                    			        'images' => $name,
                    			        'type' => 'normal',
                    			        'order' => $key,
                    			        'status' => 1
                    			    );
                    				if(is_numeric($referer))
                    				{
                    				   $this->get->updateInsertTableDetails('p_gallery', $gallery_insert, $where); 
                    				}
                    				else 
                        				$this->get->insert('p_gallery', $gallery_insert);
    				            }
    				        }
                            
                            if(is_numeric($referer))
                            {
                    	        $where = array('accesskey' => $insert['accesskey'], 'status' => 1);
                    	        $data['properties'] = $this->get->table('properties', $where);
                                if(!empty($this->input->post('featured')) || !empty($this->input->post('premium')) || !empty($this->input->post('boost')))
                                {
                                    if($logged['role'] == 'agents')
                                    {
                                        if(($this->get->table('agents', array('sno' => $logged['id'], 'company !=' => '0', 'status' => 1)) != false) && empty($this->input->post('boost')))
                                            $msg[] = array('heading' => 'Successfully Updated','msg' => ' ','alert' => 'success');
                                        else
                                            $msg[] = array('heading' => 'Please Wait...','msg' => ' ','alert' => 'warning', 'redirect' => base_url('payment/property/'.$insert['accesskey'].'?featured='.$this->input->post('featured').'&premium='.$this->input->post('premium').'&boost='.$this->input->post('boost')));
                                    }
                                    else
                                        $msg[] = array('heading' => 'Please Wait...','msg' => ' ','alert' => 'warning', 'redirect' => base_url('payment/property/'.$insert['accesskey'].'?featured='.$this->input->post('featured').'&premium='.$this->input->post('premium').'&boost='.$this->input->post('boost')));
                                }
                                else
                                {
                                    if(($logged['role'] == 'agents') && ($data['properties'][0]->txnamount != '') && ($data['properties'][0]->txnstatus != 'Success'))
                                    {
                                        $msg[] = array('heading' => 'Please Wait...','msg' => ' ','alert' => 'warning', 'redirect' => base_url('payment/property/'.$insert['accesskey'].'?featured='.$this->input->post('featured').'&premium='.$this->input->post('premium').'&boost='.$this->input->post('boost')));
                                    }
                                    elseif(($logged['role'] == 'landlord') && ($data['properties'][0]->txnamount != '') && ($data['properties'][0]->txnstatus != 'Success'))
                                    {
                                        $msg[] = array('heading' => 'Please Wait...','msg' => ' ','alert' => 'warning', 'redirect' => base_url('payment/property/'.$insert['accesskey'].'?featured='.$this->input->post('featured').'&premium='.$this->input->post('premium').'&boost='.$this->input->post('boost')));
                                    }
                                    else
                                        $msg[] = array('heading' => 'Successfully Updated','msg' => ' ','alert' => 'success');
                                }
                            }
                            else
                            {
                                $this->session->unset_userdata('property_pics');
                                $msg[] = array('heading' => 'Please Wait...','msg' => ' ','alert' => 'warning', 'redirect' => base_url('payment/property/'.$insert['accesskey'].'?featured='.$this->input->post('featured').'&premium='.$this->input->post('premium').'&boost='.$this->input->post('boost')));
        					    //$msg[] = array('heading' => 'Successfully Saved','msg' => ' ','alert' => 'success', 'reset' => 'yes');
                            }
        				}
        				else
        				{
        					$msg[] = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
        				}
    			    }
    				else
    				    $msg[] = array('heading' => 'The '.$filename.' file is not accept','msg' => strip_tags($error),'alert' => 'error');
    			}
        		echo json_encode($msg);
    	    }
    	    else
    	    {
    	       // print_r($this->session->userdata('property_pics'));
    	        $this->session->unset_userdata('property_pics');
    	        if($role == 'agents')
        	    {
                    if(($companySubscription != false) && (!empty($companySubscription[0]->details)))
                    {
                        $companyPropertiesSubscription = json_decode($companySubscription[0]->details)->properties;
                        $packagePropertyAlert = array(
                    	    "title" => 'Your limit has been reached',
                    		"message" => 'You can add only '.$companyPropertiesSubscription.' properties. Please update your package.',
                    		"status" => "warning",
                    	);
                    	if(($companyPropertiesSubscription <= $companyProperties) && (($this->uri->segment(2) == 'add-property') || ($this->uri->segment(2) == 'addproperty')))
                    	{
                		    $this->session->set_flashdata('alertMessage', $packagePropertyAlert);
                    	    redirect(base_url('myaccount/properties'));
                    	}
                    }
        	    }
        	    $data['title'] = "Add Property";
        	    $where = array('status' => 1);
        	    $order_by = array('name' => 'ASC');
        	    $data['amenities'] = $this->get->table('p_amenities', $where, '', $order_by);
        	    $order_by = array('region_name' => 'ASC');
        	    $data['regions'] = $this->get->table('regions', $where, '', $order_by);
        	    $data['me'] = $logged;
        	    if($this->uri->segment(3) && $this->uri->segment(2) != '' && $this->uri->segment(2) == 'edit-property')
        	    {
        	        $data['title'] = "Edit Property";
        	        $accesskey = $this->uri->segment(3);
        	        if($role == 'company')
        	            $where = array('accesskey' => $accesskey, 'status' => 1);
        	        if($role == 'agents')
        	            $where = array('accesskey' => $accesskey, 'role' => $role, 'agent' => $agentId, 'status' => 1);
        	        if($role == 'landlord')
        	            $where = array('accesskey' => $accesskey, 'role' => $role, 'agent' => $agentId, 'status' => 1);
        	        $data['properties'] = $this->get->table('properties', $where);
        	        if($data['properties'] != false)
        	        {
            	        if($role == 'company')
            	        {
            	            $role = 'agents';
            	            $agentId = $data['properties'][0]->agent;
            	        }
        	            $where = array('region' => $data['properties'][0]->region, 'status' => 1);
        	            $data['districts'] = $this->get->table('districts', $where);
        	            $where = array('region' => $data['properties'][0]->region, 'district' => $data['properties'][0]->district, 'status' => 1);
        	            $data['suburbs'] = $this->get->table('suburbs', $where);
        	            $where = array('property' => $data['properties'][0]->sno, 'status' => '1');
        	            $data['schedules'] = $this->get->table('property_schedules', $where, '', array('from_time' => 'desc', 'date' => 'desc'));
        	            $gallery = $this->get->table('p_gallery', $where, '', array('order' => 'asc'));
        	            if($gallery != false)
        	            {
        	                $data['gallery'] = pluck_multi_array($gallery, 'images', 'type');
        	            }
        	        }
        	    }
        	    if($role == 'agents')
        	    {
        	        $where = array('company' => $companyId, 'sno !=' => $agentId, 'status' => 1);
                	$data['agents'] = $this->get->table('agents', $where, '', array('name' => 'asc'));
        	    }
        	    $data['property_type'] = property_type();
        	    $data['addons'] = addons();
        	    $data['role'] = $role;
        	    $data['crole'] = $logged['role'];
        	    $this->load_header($data['title']);
        		$this->load->view('property-add',$data);
        		$this->load_footer();
    	    }
	    }
	    else
	        redirect(base_url('myaccount'));
	}
	public function propertyschedulesview()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    if(isset($_GET['id']) && $_GET['id'] != '')
	    {
	        $id = $_GET['id'];
    	    $where = array('property' => $id, 'date >=' => date('Y-m-d', strtotime(date('Y-m-d').' -7 day')));
            $data['schedules'] = $this->get->table('property_schedules', $where, '', array('from_time' => 'desc', 'date' => 'desc'));
            $data['id'] = $id;
    	    $this->load->view('modal-schedule-view',$data);  
	    }
	}
	public function propertyschedulesadd()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	   // $referer = '';
    //     $refererURL = $_SERVER['HTTP_REFERER'];
    //     $refererExplode = explode('/',$refererURL);
    //     $referer = end($refererExplode);
    //     $accesskey = is_numeric($referer)?$referer:0;
    //     $schedules = array();
        $msg = array('heading' => 'Something went wrong','msg' => 'Please try again','alert' => 'error');
	    //$where = array('accesskey' => $accesskey, 'role' => $logged['role'], 'agent' => $logged['id'], 'status' => 1);
	    $accesskey = $this->uri->segment(3);
	    $where = array('sno' => $accesskey, 'role' => $logged['role'], 'agent' => $logged['id'], 'status' => 1);
        $data['properties'] = $this->get->table('properties', $where);
        if($data['properties'] != false)
        {
	        $schedules_insert = array(
                'property' => $data['properties'][0]->sno,
                'day' => date('l', strtotime($this->input->post('sdate'))),
                'date' => date('Y-m-d', strtotime($this->input->post('sdate'))),
                'from_time' => $this->input->post('sfrom'),
                'to_time' => $this->input->post('sto'),
                'slots' => 1,
            );
            $inserted_id = $this->get->updateInsertTableDetails('property_schedules', $schedules_insert, $schedules_insert);
            $msg = array('heading' => 'Successfully Saved','msg' => ' ','alert' => 'success', 'tr' => '<tr class="shadow-hover-xs-2 bg-hover-white"><td class="align-middle text-center py-3">'.date('d F, Y', strtotime($this->input->post('sdate'))).'</td><td class="align-middle text-center">'.date('h:ia', strtotime($this->input->post('sfrom'))).' - '.date('h:ia', strtotime($this->input->post('sto'))).'</td><td class="align-middle text-center"><a href="javascript:void(0);" title="Cancel Viewing" class="d-inline-block fs-18 text-muted hover-primary delete-schedule" data-id="'.$inserted_id.'"><i class="fal fa-trash-alt"></i></a></td></tr>');
        }
        echo json_encode($msg);
	}
	public function propertyreport()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    if($logged['role'] != 'user')
	    {
	        $accesskey = $this->uri->segment(3);
            $where = array('accesskey' => $accesskey, 'status' => 1);
        	$data['properties'] = $this->get->table('properties', $where);
        	if($data['properties'] != false)
        	{
        	    $data['title'] = "Reports";
        	    $this->load_header($data['title']);
        	    $where = array('property' => $data['properties'][0]->sno, 'type' => 'thumbnail');
        	    $data['gallery'] = $this->get->table('p_gallery', $where);
    	        $data['user'] = user($data['properties'][0]->role, $data['properties'][0]->agent);
    	        if(($data['properties'][0]->role == 'agents') && ($data['user'] != false) && ($data['user'][0]->company != 0))
    	        {
    	            $data['company'] = user('company', $data['user'][0]->company);
    	        }
    	        $tomonth = date('Y-m');
        	    $startmonth = date('Y-m-01', strtotime($tomonth.' -11 month'));
        	    $frommonth = date('Y-m-01', strtotime($tomonth.' -11 month'));
        	    $where = array('property' => $data['properties'][0]->sno);
        	    if(isset($_GET) && isset($_GET['from']) && ($_GET['from'] != ''))
        	        $where['DATE(datetime) >= '] = date('Y-m-d', strtotime($_GET['from']));
        	    if(isset($_GET) && isset($_GET['to']) && ($_GET['to'] != ''))
        	        $where['DATE(datetime) <= '] = date('Y-m-31', strtotime($_GET['to']));
    	        $data['views'] = $this->get->table('property_views', $where);
    	        $where['status'] = '1';
    	        unset($where['DATE(datetime) >= ']);
    	        unset($where['DATE(datetime) <= ']);
        	    if(isset($_GET) && isset($_GET['from']) && ($_GET['from'] != ''))
        	        $where['DATE(created_date) >= '] = date('Y-m-d', strtotime($_GET['from']));
        	    if(isset($_GET) && isset($_GET['to']) && ($_GET['to'] != ''))
        	        $where['DATE(created_date) <= '] = date('Y-m-31', strtotime($_GET['to']));
    	        $data['enquiries'] = $this->get->table('property_request', $where);
    	        $data['wishlist'] = $this->get->table('wishlist', $where);
    	        unset($where['DATE(created_date) >= ']);
    	        unset($where['DATE(created_date) <= ']);
        	    if(isset($_GET) && isset($_GET['from']) && ($_GET['from'] != ''))
        	        $where['date >= '] = date('Y-m-d', strtotime($_GET['from']));
        	    if(isset($_GET) && isset($_GET['to']) && ($_GET['to'] != ''))
        	        $where['date <= '] = date('Y-m-31', strtotime($_GET['to']));
    	        $data['schedules'] = $this->get->table('property_schedules', $where);
    	        $where['visited'] = '1';
    	        unset($where['date >= ']);
    	        unset($where['date <= ']);
        	    if(isset($_GET) && isset($_GET['from']) && ($_GET['from'] != ''))
        	        $where['day_date >= '] = date('Y-m-d', strtotime($_GET['from']));
        	    if(isset($_GET) && isset($_GET['to']) && ($_GET['to'] != ''))
        	        $where['day_date <= '] = date('Y-m-31', strtotime($_GET['to']));
    	        $data['visits'] = $this->get->table('property_visits', $where);
    	        $data['logged'] = $logged;
        	    while (strtotime($frommonth) <= strtotime($tomonth)) {
                    $data['monthLabels'][] = date('M',strtotime($frommonth));
                    $monthLabels[] = date('n',strtotime($frommonth));
                    $frommonth = date ("Y-m-01", strtotime("+1 month", strtotime($frommonth)));
                }
                $tomonth = date('Y-m-31');
                if(isset($_GET) && isset($_GET['from']) && ($_GET['from'] != ''))
        	        $startmonth = date('Y-m-d', strtotime($_GET['from']));
        	    if(isset($_GET) && isset($_GET['to']) && ($_GET['to'] != ''))
        	        $tomonth = date('Y-m-31', strtotime($_GET['to']));
        	    $where = array('DATE(datetime) >=' => $startmonth, 'DATE(datetime) <=' => $tomonth);
        	    if(($data['properties'] != false) && (!empty($data['properties'])))
        	    {
        	        foreach($data['properties']  as $property)
        	        {
        	            $propertyids[] = $property->sno;
        	        }
        	    }
                $property_views = $this->get->whereIn('property_views', $where,'property',$propertyids,'','','','property_views.*,MONTH(property_views.datetime) as month,DATE(property_views.datetime) as date');
                if($property_views != false)
                {
                    $property_views_months = pluck_multi_array($property_views,'sno','month');
                    foreach($monthLabels as $label)
                    {
                        $data['monthviews'][] = (isset($property_views_months[$label]))?count($property_views_months[$label]):0;
                    }
                }
                else
                {
                    $data['monthviews'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
                }   
                
                    
                $where = array('DATE(created_date) >=' => $startmonth, 'DATE(created_date) <=' => $tomonth);
                $property_request = $this->get->whereIn('property_request', $where,'property',$propertyids,'','','','property_request.*,MONTH(property_request.created_date) as month,DATE(property_request.created_date) as date');
                if($property_request != false)
                {
                    $property_request_months = pluck_multi_array($property_request,'sno','month');
                    foreach($monthLabels as $label)
                    {
                        $data['monthenquiries'][] = (isset($property_request_months[$label]))?count($property_request_months[$label]):0;
                    }
                }
                else
                {
                    $data['monthenquiries'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
                }
                    
                $where = array('date >=' => $startmonth, 'date <=' => $tomonth);
                $property_schedules = $this->get->whereIn('property_schedules', $where,'property',$propertyids,'','','','property_schedules.*,MONTH(property_schedules.date) as month');
                if($property_schedules != false)
                {
                    $property_schedules_months = pluck_multi_array($property_schedules,'sno','month');
                    foreach($monthLabels as $label)
                    {
                        $data['monthschedules'][] = (isset($property_schedules_months[$label]))?count($property_schedules_months[$label]):0;
                    }
                }
                else
                {
                    $data['monthschedules'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
                }
        		$this->load->view('property-report', $data);
        		$this->load_footer();
        	}
        	else
        	    redirect(base_url('myaccount'));
	    }
	    else
	        redirect(base_url('myaccount'));
	}
	public function favorites()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    if($logged['role'] == 'user')
	    {
    	    if(isset($_GET['key']) && $_GET['key'] != '' && isset($_GET['type']) && $_GET['type'] == 'json')
    	    {
    	        $property = $this->get->table('properties', array('accesskey' => $_GET['key'], 'status' => 1));
    	        if($property != false)
    	        {
    	            if(($property[0]->agent == $logged['id']) && ($property[0]->role == $logged['role']))
    	            {
    	                $msg = array('heading' => 'Please Try Again','msg' => 'Something Went Wrong.','alert' => 'error');
    	            }
    	            else
    	            {
    	                $refererURL = $_SERVER['HTTP_REFERER'];
                        $refererExplode = explode('/',$refererURL);
                    	$referer = end($refererExplode);
                    	$deleteColumn = ($referer == 'favorites')?true:false;
        	            $where = array('property' => $property[0]->sno, 'role' => $logged['role'], 'user' => $logged['id']);
        	            $data = array('property' => $property[0]->sno, 'role' => $logged['role'], 'user' => $logged['id'], 'status' => 1);
        	            $wishlist = $this->get->activeInactive('wishlist', $data, $where, 'created_date', 'modified_date');
        	            $where = array('role' => $logged['role'], 'user' => $logged['id'], 'status' => 1);
        	            $count = ($list = $this->get->table('wishlist',$where))?count($list):0;
        	            if($wishlist)
        	                $msg = array('heading' => 'Successfully Added','msg' => ' ','alert' => 'success','count' => $count,'active' => true,'text' => 'Saved');
        	            else
        	                $msg = array('heading' => 'Successfully Removed','msg' => ' ','alert' => 'success','count' => $count,'active' => false,'delete' => $deleteColumn,'text' => 'Save');
    	            }
    	        }
    	        else
    	            $msg = array('heading' => 'Please Try Again','msg' => 'Something Went Wrong.','alert' => 'error');
    	        echo json_encode($msg);
    	    }
    	    else
    	    {
        	    $this->auth_user->checkUserLoginStatus();
        	    $data['title'] = "Favorites";
        	    $this->load_header($data['title']);
        	    $where = array('role' => $logged['role'], 'user' => $logged['id'], 'status' => 1);
        	    $favorites = $this->get->table('wishlist', $where);
        	    $data['favorite'] = ($favorites != false)?pluck_multi_array($favorites, 'property', 'user')[$logged['id']]:array();
        		$this->load->view('favorites',$data);
        		$this->load_footer();
    	    }
	    }
	    else
	       redirect(base_url('myaccount')); 
	}
	public function package()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    if($logged['role'] == 'company')
	    {
    	    $data['title'] = "Package";
    	    $this->load_header($data['title']);
    	    $where = array('role' => $logged['role'], 'user' => $logged['id'], 'status' => 1);
    	    $data['packages'] = $this->get->table('subscriptions', $where);
    	    $agnts = array(0);
	        $where = array('company' => $logged['id'], 'status' => 1);
	        if($data['agents'] = $this->get->table('agents', $where))
	        {
	            foreach($data['agents'] as $agent)
	                $agnts[] = $agent->sno;
	        }
    	    $where = array('role' => 'agents', 'status' => 1);
	        $data['properties'] = $this->get->whereIn('properties', $where, 'agent', $agnts);
	        $data['premium'] = ($data['properties'] != false)?pluck_multi_array($data['properties'], 'premium', 'premium'):[];
	        $data['featured'] = ($data['properties'] != false)?pluck_multi_array($data['properties'], 'featured', 'featured'):[];
    		$this->load->view('my-package',$data);
		    $this->load_footer();
	    }
	    else
	        redirect(base_url('myaccount'));
	}
	public function invoices()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    $data['role'] = $logged['role'];
    	$data['title'] = "Invoices";
	    if($logged['role'] == 'company')
	    {
    	    $this->load_header($data['title']);
    	    $where = array('role' => $logged['role'], 'user' => $logged['id'], 'status' => 1);
    	    $data['packages'] = $this->get->table('subscriptions', $where);
    	    $agnts = array(0);
	        $where = array('company' => $logged['id'], 'status' => 1);
	        if($data['agents'] = $this->get->table('agents', $where))
	        {
	            foreach($data['agents'] as $agent)
	                $agnts[] = $agent->sno;
	        }
    	    $where = array('role' => 'agents', 'status' => 1);
	        $data['properties'] = $this->get->whereIn('properties', $where, 'agent', $agnts);
	        $data['premium'] = ($data['properties'] != false)?pluck_multi_array($data['properties'], 'premium', 'premium'):[];
	        $data['featured'] = ($data['properties'] != false)?pluck_multi_array($data['properties'], 'featured', 'featured'):[];
    		$this->load->view('invoices',$data);
		    $this->load_footer();
	    }
	    else if($logged['role'] == 'agents')
	    {
    	    $this->load_header($data['title']);
    	    $where = array('agent' => $logged['id'], 'role' => 'agents', 'status' => 1);
	        $data['properties'] = $this->get->table('properties', $where);
    		$this->load->view('invoices',$data);
	        $this->load_footer();
	    }
	    else if($logged['role'] == 'landlord')
	    {
    	    $this->load_header($data['title']);
    	    $where = array('agent' => $logged['id'], 'role' => 'landlord', 'status' => 1);
	        $data['properties'] = $this->get->table('properties', $where);
    		$this->load->view('invoices',$data);
	        $this->load_footer();
	    }
	    else
	        redirect(base_url('myaccount'));
	}
	public function invoice()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    $data['name'] = $logged['name'];
	    $data['email'] = $logged['email'];
	    $data['role'] = $logged['role'];
        $data['title'] = "Invoice";
	    if(($logged['role'] == 'company') && ($id = $this->uri->segment(3)))
	    {
	        $where = array('sno' => $id, 'role' => $logged['role'], 'user' => $logged['id'], 'status' => 1);
            $package = $this->get->table('subscriptions', $where);
	        if($package != false)
	        {
        	    $this->load_header($data['title']);
        	    $data['package'] = $package[0];
        	    $data['company'] = user('company', $package[0]->user);
        	    $agnts = array(0);
    	        $where = array('company' => $logged['id'], 'status' => 1);
    	        if($data['agents'] = $this->get->table('agents', $where))
    	        {
    	            foreach($data['agents'] as $agent)
    	                $agnts[] = $agent->sno;
    	        }
        	    $where = array('role' => 'agents', 'status' => 1);
    	        $data['properties'] = $this->get->whereIn('properties', $where, 'agent', $agnts);
    	        $data['premium'] = ($data['properties'] != false)?pluck_multi_array($data['properties'], 'premium', 'premium'):[];
    	        $data['featured'] = ($data['properties'] != false)?pluck_multi_array($data['properties'], 'featured', 'featured'):[];
        		$this->load->view('invoice',$data);
    		    $this->load_footer();
	        }
    	    else
    	        redirect(base_url('myaccount/invoices'));
	    }
	    else if(($logged['role'] == 'agents') && ($id = $this->uri->segment(3)))
	    {
            $where = array('sno' => $id, 'agent' => $logged['id'], 'role' => 'agents', 'status' => 1);
    	    $data['property'] = $this->get->table('properties', $where);
    	    $where = array('sno' => $logged['id'], 'status' => 1);
    	    $agent = $this->get->table('agents', $where);
    	    if(($data['property'] != false) && ($agent != false))
    	    {
        	    $this->load_header($data['title']);
        	    $data['company'] = user('company', $agent[0]->company);
    	       // $data['premium'] = ($data['property'] != false)?pluck_multi_array($data['property'], 'premium', 'premium'):[];
    	       // $data['featured'] = ($data['property'] != false)?pluck_multi_array($data['property'], 'featured', 'featured'):[];
    	       // $data['boost'] = ($data['property'] != false)?pluck_multi_array($data['property'], 'boost', 'boost'):[];
        		$this->load->view('invoice',$data);
    	        $this->load_footer();
    	    }
        	else
        	    redirect(base_url('myaccount/invoices'));
	    }
	    else if(($logged['role'] == 'landlord') && ($id = $this->uri->segment(3)))
	    {
            $where = array('sno' => $id, 'agent' => $logged['id'], 'role' => 'landlord', 'status' => 1);
    	    $data['property'] = $this->get->table('properties', $where);
    	    $where = array('sno' => $logged['id'], 'status' => 1);
    	    $data['landlord'] = $this->get->table('landlords', $where);
    	    if(($data['property'] != false) && ($data['landlord'] != false))
    	    {
        	    $this->load_header($data['title']);
    	       // $data['premium'] = ($data['property'] != false)?pluck_multi_array($data['property'], 'premium', 'premium'):[];
    	       // $data['featured'] = ($data['property'] != false)?pluck_multi_array($data['property'], 'featured', 'featured'):[];
    	       // $data['boost'] = ($data['property'] != false)?pluck_multi_array($data['property'], 'boost', 'boost'):[];
        		$this->load->view('invoice',$data);
    	        $this->load_footer();
    	    }
        	else
        	    redirect(base_url('myaccount/invoices'));
	    }
	    else
	        redirect(base_url('myaccount'));
	}
	public function profile()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    $msg = array();
    	$table = 'customers';
    	if($logged['role'] == 'landlord')
    		$table = 'landlords';
    	if($logged['role'] == 'agents')
    		$table = 'agents';
		if($logged['role'] == 'company')
		    $table = 'companies';
	    $where = array('sno' => $logged['id'], 'status' => 1);
	    if($this->uri->segment(3) && $this->uri->segment(3) == 'update')
    	{
    		$this->load->library('form_validation');
    		$this->form_validation->set_error_delimiters('', '');
    		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
    		if(isset($_POST['subject']) && $_POST['subject'] == 'profile')
    		{
    		    if($logged['role'] == 'company')
    		    {
    		        
    			    if($this->input->post('name') && ($this->input->post('name') != $logged['name']))
    		            $this->form_validation->set_rules('name', 'Company Name', 'trim|required|min_length[3]|max_length[50]|is_unique['.$table.'.name]');
    		        else
    		            $this->form_validation->set_rules('name', 'Company Name', 'trim|required|min_length[3]|max_length[50]');
    		    }
    		    else
        		    $this->form_validation->set_rules('name', 'Fullame', 'trim|required|min_length[3]|max_length[50]');
        		if($logged['email'] == $_POST['email'])
        		    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        		else
        		    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique['.$table.'.email]');
        		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[9]|max_length[12]');
        		if($logged['role'] == 'agents' || $logged['role'] == 'company')
        		{
        		    $this->form_validation->set_rules('about', 'About', 'trim|max_length[1200]');
        		    $this->form_validation->set_rules('position', 'Position', 'trim|max_length[255]');
        		    $this->form_validation->set_rules('exp_years', 'Year', 'trim|numeric|max_length[2]');
        		    $this->form_validation->set_rules('exp_months', 'Months', 'trim|numeric|max_length[2]');
        		    $this->form_validation->set_rules('qualification', 'Qualification', 'trim|max_length[9999]');
        		}
        		if($logged['role'] == 'company')
        		{
        		    $this->form_validation->set_rules('fax', 'Fax', 'trim|required|numeric|min_length[6]|max_length[15]');
        		    $this->form_validation->set_rules('website', 'Website', 'trim|valid_url');
        		    $this->form_validation->set_rules('latitude', 'Latitude', 'trim|max_length[50]');
        		    $this->form_validation->set_rules('longitude', 'Longitude', 'trim|max_length[50]');
        		    $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[4]|max_length[255]');
        		    $this->form_validation->set_rules('companyBgcolor', 'Background Color', 'trim|min_length[3]|max_length[10]');
        		}
        		if($logged['role'] != 'user')
        		{
        		    $this->form_validation->set_rules('language[]', 'Languages', 'trim');
        		    $this->form_validation->set_rules('twitter', 'Twitter', 'trim|max_length[255]');
        		    $this->form_validation->set_rules('facebook', 'Facebook', 'trim|max_length[255]');
        		    $this->form_validation->set_rules('instagram', 'Instagram', 'trim|max_length[255]');
        		    $this->form_validation->set_rules('linkedin', 'Linkedin', 'trim|max_length[255]');
        		}
    		}
    		if(isset($_POST['subject']) && $_POST['subject'] == 'changepassword')
    		{
    		    $this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required|min_length[4]');
    		    $this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[4]');
    		    $this->form_validation->set_rules('cpassword', 'Confirm New Password', 'trim|required|min_length[4]|matches[password]');
    		}
    		if ($this->form_validation->run() == FALSE)
    		{
    		    $msg[] = array('class' => 'subject', 'error' => form_error('subject', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
    		    if(isset($_POST['subject']) && $_POST['subject'] == 'profile')
    		    {
    		        $msg[] = array('class' => 'name', 'error' => form_error('name', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'email', 'error' => form_error('email', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'mobile', 'error' => form_error('mobile', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    if($logged['role'] == 'agents' || $logged['role'] == 'company')
                    {
            		    $msg[] = array('class' => 'about', 'error' => form_error('about', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            		    $msg[] = array('class' => 'position', 'error' => form_error('position', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            		    $msg[] = array('class' => 'exp_years', 'error' => form_error('exp_years', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            		    $msg[] = array('class' => 'exp_months', 'error' => form_error('exp_months', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            		    $msg[] = array('class' => 'qualification', 'error' => form_error('qualification', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    }
                    if($logged['role'] == 'company')
            		{
            		    $msg[] = array('class' => 'fax', 'error' => form_error('fax', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            		    $msg[] = array('class' => 'website', 'error' => form_error('website', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            		    $msg[] = array('class' => 'address', 'error' => form_error('address', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            		    $msg[] = array('class' => 'companyBgcolor', 'error' => form_error('companyBgcolor', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            		}
            		if($logged['role'] != 'user')
                	{
                	    $msg[] = array('class' => 'languages', 'error' => form_error('language', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                	    $msg[] = array('class' => 'twitter', 'error' => form_error('twitter', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                	    $msg[] = array('class' => 'facebook', 'error' => form_error('facebook', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                	    $msg[] = array('class' => 'instagram', 'error' => form_error('instagram', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                	    $msg[] = array('class' => 'linkedin', 'error' => form_error('linkedin', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                	}
    		    }
                if(isset($_POST['subject']) && $_POST['subject'] == 'changepassword')
    		    {
                    $msg[] = array('class' => 'oldpassword', 'error' => form_error('oldpassword', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'password', 'error' => form_error('password', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'cpassword', 'error' => form_error('cpassword', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
    		    }
    		}
    		else
    		{
    			$result = false;
            	$datetime = date('Y-m-d H:i:s');
    			if(isset($_POST['subject']) && $_POST['subject'] == 'changepassword')
    		    {
    		        $oldpassword = $this->input->post('oldpassword');
    		        $password = $this->input->post('password');
        		    $data = array(
                        'password' =>  md5($password),
                    );
                    if($this->get->table($table, array('sno' => $logged['id'], 'password' => md5($oldpassword), 'status' => 1)) == false)
                    {
                        $msg[] = array('class' => 'oldpassword', 'error' => '<i class="fa fa-arrow-up" aria-hidden="true"></i> The old password did`t match');
    			        echo json_encode($msg);
    			        exit();
                    }
    		    }
    		    if(isset($_POST['subject']) && $_POST['subject'] == 'profile')
    		    {
        			if(!empty($_FILES['profile']['name'][0]))
        			{
            			$title = 'profile';
            			$profile_file['image'] = upload_files($title, $_FILES['profile']);
            			if ($profile_file['image'] === FALSE) {
            			    $filename = 'Profile';
                            $error = $this->upload->display_errors();
                        }
        			}
        			if(empty($error))
        			{
                        $data = array(
                        	'name' =>  ucwords(strtolower($this->input->post('name'))),
                        	'email' =>  $this->input->post('email'),
                        	'phone' =>  $this->input->post('mobile'),
                        );
                        if(!empty($_FILES['profile']['name'][0]))
            			{
            			    foreach($profile_file['image'] as $key => $name)
            			    {
            			        resize($name,300,300);
            			        $data['img'] = $name;
            			    }
                        }
                        if($logged['role'] == 'agents' || $logged['role'] == 'company')
                        {
            			    $data['about'] = $this->input->post('about');
            			    if($logged['role'] == 'agents')
            			    {
                			    $data['position'] = $this->input->post('position');
                			    $data['experience'] = $this->input->post('exp_years').($this->input->post('exp_months')?'-'.$this->input->post('exp_months'):'');
                			    $data['qualification'] = $this->input->post('qualification');
            			    }
                        }
            			if($logged['role'] == 'company')
            			{
            			    $data['fax'] = $this->input->post('fax');
            			    $data['website'] = $this->input->post('website');
            			    $data['latitude'] = $this->input->post('latitude');
            			    $data['longitude'] = $this->input->post('longitude');
            			    $data['pointer'] = $this->input->post('latitude').','.$this->input->post('longitude');
            			    $data['address'] = $this->input->post('address');
            			    $data['bgcolor'] = ($this->input->post('companyBgcolor'))?$this->input->post('companyBgcolor'):'#163c5d';
            			}
                		if($logged['role'] != 'user')
                		{
                		    $data['languages'] = $this->input->post('language')?implode(',',$this->input->post('language')):null;
                		    $data['twitter'] = $this->input->post('twitter');
                		    $data['facebook'] = $this->input->post('facebook');
                		    $data['instagram'] = $this->input->post('instagram');
                		    $data['linkedin'] = $this->input->post('linkedin');
                		}
        			}
    			    else
    			    {
    			        $msg[] = array('heading' => 'The '.$filename.' file is not accept','msg' => strip_tags($error),'alert' => 'error');
    			        echo json_encode($msg);
    			        exit();
    		        }
    		    }
    			$data['modified_date'] = $datetime;
    			$result = $this->get->update($table, $data, $where);
            	if($result == true)
            	{
            	    if(isset($_POST['subject']) && $_POST['subject'] == 'profile')
            	    {
                	    $sess_array = array('name' => $data['name'], 'email' => $data['email'], 'id' => $logged['id'], 'role' => $logged['role'], 'img' => !empty($_FILES['profile']['name'][0])?$data['img']:$logged['img']);
    					$this->session->set_userdata('logged_in', $sess_array);
            	    }
                    $heading = $logged['name'];
                    if(isset($_POST['subject']) && $_POST['subject'] == 'changepassword')
                        $msg[] = array('heading' => $heading,'msg' => 'Successfully Changed','alert' => 'success', 'reset' => 'yes');
                    else
                        $msg[] = array('heading' => $heading,'msg' => 'Successfully Updated','alert' => 'success');
            	}
            	else
            	{
            		$msg[] = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
            	}
    		}
    		echo json_encode($msg);
    	}
    	else
    	{
            $data['title'] = "Profile";
        	$this->load_header($data['title']);
        	$data['me'] = me();
        	$this->load->view('profile',$data);
            $this->load_footer();
        }
	}
	public function deleteagent()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    $title = "Something Went Wrong";
	    $message = "Please try again";
	    $status = "error";
	    if($this->uri->segment(3) && $this->uri->segment(3) != '' && $logged && $logged['role'] == 'company')
	    {
	        $where = array('company' => $logged['id'], 'sno' => $this->uri->segment(3));
	        if($agent = $this->get->table('agents', $where))
	        {
	            $update = array('status' => 0, 'modified_date' => date('Y-m-d H:i:s'));
    	       // $delete = $this->get->activeInactive('agents', $update, $where, '', 'modified_date');
	           // if($delete)
	           //     $message = "Successfully active";
	           // else
	           //     $message = "Successfully Inactive";
	            $title = ucfirst($agent[0]->name);
	            $message = "Successfully Inactive";
    	        $delete = $this->get->update('agents', $update, $where);
	            $status = "success";
	        }
	    }
	    $message = array(
			"title" => $title,
			"message" => $message,
			"status" => $status,
		);
		$this->session->set_flashdata('alertMessage', $message);
	    redirect(base_url('myaccount/agents'));
	}
	public function deleteproperty()
	{
	    $this->auth_user->checkUserLoginStatus();
	    if($this->uri->segment(3) && $this->uri->segment(3) != '')
	    {
	        $logged = $this->session->userdata('logged_in');
	        $where = array('role' => $logged['role'], 'accesskey' => $this->uri->segment(3), 'agent' => $logged['id'], 'status' => 1);
	        if($this->get->table('properties', $where))
	        {
	            $update = array('status' => 0, 'modified_date' => date('Y-m-d H:i:s'));
	            $this->get->update('properties', $update, $where);
	            redirect(base_url('myaccount/properties'));
	        }
	        else
	            redirect(base_url('myaccount/properties'));
	    }
	    else
	        redirect(base_url('myaccount/properties'));
	}
	public function upload()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $title = 'property_pics';
	    $img = '';
	    $maxFiles = (isset($_GET['maxFiles']) && !empty($_GET['maxFiles']))?$_GET['maxFiles']:0;
	    $countSessiondata = !empty($this->session->userdata('property_pics'))?count($this->session->userdata('property_pics')):0;
	    if(($countSessiondata <= $maxFiles))
	    {
	        $property_pics_files['image'] = upload_files($title, $_FILES['file']);
        	if ($property_pics_files['image'] === FALSE) {
        		$filename = 'Property Pictures';
                $error = $this->upload->display_errors();
                $msg[] = array('heading' => 'Please try again', 'msg' => strip_tags($error), 'alert' => 'error');
            }
            else
            {
                $img = $property_pics_files['image'][0];
                $images = array($img => $img);
                if(!empty($this->session->userdata('property_pics')))
                {
                    $old = $this->session->userdata('property_pics');
                    // array_push($old, $images);
                    $mergeArray = $old+$images;
                    $this->session->set_userdata('property_pics', $mergeArray);
                }
                else
                {
                    $this->session->set_userdata('property_pics', $images);
                }
                $msg[] = array('heading' => 'Successfully Saved','msg' => ' ', 'data' => $img, 'alert' => 'success');
            }  
	    }
	    else
	        $msg[] = array('heading' => 'Please try again','msg' => 'You can upload a maximum of '.$maxFiles.' images', 'alert' => 'error');
        echo json_encode($msg);
	}
	public function delete()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $fileName = ' ';
	    if((isset($_GET['file']) && $_GET['file'] != '') && $this->session->userdata('property_pics'))
	    {
            $fileName = $_GET['file'];
	        $array = $this->session->userdata('property_pics');
	       // if (($key = array_search($fileName, $array)) !== false) {
                // unset($array[$key]);
            if (in_array($fileName, $array)) {
                unset($array[$fileName]);
                $this->session->set_userdata('property_pics', $array);
                $referer = '';
                $refererURL = $_SERVER['HTTP_REFERER'];
                $refererExplode = explode('/',$refererURL);
                $referer = end($refererExplode);
                $where = array('accesskey' => $referer, 'status' => 1);
        	    $properties = $this->get->table('properties', $where);
        	    if(!empty($referer) && ($properties != false))
        	        $this->get->update('p_gallery', array('status' => '0'), array('property' => $properties[0]->sno, 'images' => $fileName));
	            $msg[] = array('heading' => 'Deleted!','msg' => 'Your image file has been deleted.', 'alert' => 'success');
            }
            else
               $msg[] = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
	    } 
	    else
	        $msg[] = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
	    echo json_encode($msg);
	}
	public function cancelschedule()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	   // $referer = '';
    //     $refererURL = $_SERVER['HTTP_REFERER'];
    //     $refererExplode = explode('/',$refererURL);
    //     $referer = end($refererExplode);
    //     $accesskey = is_numeric($referer)?$referer:0;
        $accesskey = $this->uri->segment(3);
        $msg = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
	    if($accesskey && $accesskey != '')
	    {
	        $logged = $this->session->userdata('logged_in');
	        //$where = array('role' => $logged['role'], 'accesskey' => $accesskey, 'agent' => $logged['id'], 'status' => 1);
	        $where = array('role' => $logged['role'], 'sno' => $accesskey, 'agent' => $logged['id'], 'status' => 1);
	        if($this->get->table('properties', $where))
	        {
	            $update = array('status' => 0, 'reason' => $this->input->get('reason'));
	            $where = array('sno' => $this->input->get('id'));
	            $this->get->update('property_schedules', $update, $where);
	            $msg = array('heading' => 'Successfully Cancelled','msg' => ' ','alert' => 'success');
	        }
	    }
        echo json_encode($msg);
	}
	public function schedulecancel()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
        $msg = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
	    $logged = $this->session->userdata('logged_in');
	    $update = array('status' => 0);
	    $where = array('sno' => $this->input->get('id'),'user' => $logged['id'], 'status' => 1);
	    $this->get->update('property_visits', $update, $where);
	    if($this->db->affected_rows())
	        $msg = array('heading' => 'Successfully Cancelled','msg' => ' ','alert' => 'success');
        echo json_encode($msg);
	}
	public function sendschedulelink()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    if(($logged['role'] != 'user') && (isset($_POST['email']) && $_POST['email'] != '') && (isset($_POST['link']) && $_POST['link'] != '') && (isset($_POST['id']) && $_POST['id'] != ''))
	    {
	        $update = array('visited' => 1, 'send_link' => 1, 'modified_date' => date('Y-m-d H:i:s'));
	        $where = array('sno' => $this->input->post('id'), 'email' => $this->input->post('email'));
	        $result = $this->get->update('property_visits', $update, $where);
	        if($result)
	        {
				$result = $this->get->table('property_visits', $where);
	            if($result && isset($_POST['email']) && $_POST['email'] != '')
                {
	                $referer = $result[0]->property;
	                $res['propertyDetails'] = property_details(array('p.sno' => $referer));
                    if($res['propertyDetails'] != false)
                    {
                        $refererURL = base_url('properties/single/'.$res['propertyDetails'][0]->accesskey);
                        $res['site'] = $this->site->settings();
                        $res['refererURL'] = $refererURL;
                        $res['name'] = $this->input->post('name');
                    	$subject = 'Thank you for viewing the property';
                        $res['userDetails'] = $_POST;
                        $res['agentDetails'] = user($res['propertyDetails'][0]->role, $res['propertyDetails'][0]->agent);
                        if(($res['propertyDetails'][0]->role == 'agents') && isset($res['agentDetails'][0]->company) && ($res['agentDetails'][0]->company != 0))
            	        {
            	            $res['company'] = user('company', $res['agentDetails'][0]->company);
            	        }
                    	$body = $this->load->view('emails/send-link.php',$res,TRUE);
                    	if($res['agentDetails'] != false)
                            sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $this->input->post('email'), $subject, $body);
                    }
                }
				
	            $msg = array('heading' => 'Sent','msg' => ' ','alert' => 'success','visited' => 'Visited');
	        }
	        else
	            $msg = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
	    }
	    else
	        $msg = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
	   echo json_encode($msg);
	}
	public function schedulevisited()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    if(($logged['role'] != 'user') && (isset($_POST['email']) && $_POST['email'] != '') && (isset($_POST['id']) && $_POST['id'] != ''))
	    {
	        $update = array('visited' => 1, 'modified_date' => date('Y-m-d H:i:s'));
	        $where = array('sno' => $this->input->post('id'), 'email' => $this->input->post('email'));
	        $result = $this->get->update('property_visits', $update, $where);
	        if($result)
	        {
	            $result = $this->get->table('property_visits', $where);
	            if($result && isset($_POST['email']) && $_POST['email'] != '')
                {
	                $referer = $result[0]->property;
	                $res['propertyDetails'] = property_details(array('p.sno' => $referer));
                    if($res['propertyDetails'] != false)
                    {
                        $refererURL = base_url('properties/single/'.$res['propertyDetails'][0]->accesskey);
                        $res['site'] = $this->site->settings();
                        $res['refererURL'] = $refererURL;
                        $res['name'] = $this->input->post('name');
                    	$subject = 'Thank you for viewing the property';
                        $res['userDetails'] = $_POST;
                        $res['agentDetails'] = user($res['propertyDetails'][0]->role, $res['propertyDetails'][0]->agent);
                        if(($res['propertyDetails'][0]->role == 'agents') && isset($res['agentDetails'][0]->company) && ($res['agentDetails'][0]->company != 0))
            	        {
            	            $res['company'] = user('company', $res['agentDetails'][0]->company);
            	        }
                    	$body = $this->load->view('emails/send-link.php',$res,TRUE);
                    	if($res['agentDetails'] != false)
                            sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $this->input->post('email'), $subject, $body);
                    }
                }
	            $msg = array('heading' => 'Visited','msg' => ' ','alert' => 'success');
	        }
	        else
	            $msg = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
	    }
	    else
	        $msg = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
	   echo json_encode($msg);
	}
	public function sort()
	{
	    $this->auth_user->checkUserLoginStatus();
	    if(isset($_POST['files']) && $this->session->userdata('property_pics'))
	    {
	        $this->session->unset_userdata('property_pics');
            $this->session->set_userdata('property_pics', $_POST['files']);
	    }
	}
	public function addons()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    if(!empty(addons()) && !empty(addons()[strtolower($_GET['addon'])]))
	        $addon_price = addons()[strtolower($_GET['addon'])]->price;
	    else
	        $addon_price = 1000;
	    echo json_encode((int)$addon_price);
	}
	public function prop()
	{
	    $this->auth_user->checkUserLoginStatus();
	    echo json_encode(prop());
	}
	public function p()
	{
	    $this->auth_user->checkUserLoginStatus();
	    print_r($this->session->userdata('property_pics'));
	}
	public function pdf()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    $data['name'] = $logged['name'];
	    $data['email'] = $logged['email'];
	    $data['role'] = $logged['role'];
        $data['title'] = "Invoice";
	    $where = array('sno' => '9', 'agent' => $logged['id'], 'role' => 'agents', 'status' => 1);
    	$data['property'] = $this->get->table('properties', $where);
    	$where = array('sno' => $logged['id'], 'status' => 1);
    	$agent = $this->get->table('agents', $where);
    	if(($data['property'] != false) && ($agent != false))
    	{
    	    $this->load->library('m_pdf');
        	$data['company'] = user('company', $agent[0]->company);
            $html = $this->load->view('invoice', $data, true);
            $pdfFilePath = FCPATH.'/uploads/invoice/#'.$data['title'].'-RL'.sprintf("%06d", $data['property'][0]->sno).'.pdf';
            $pdfFilePath = '#'.$data['title'].'-RL'.sprintf("%06d", $data['property'][0]->sno).'.pdf';
        	$pdf = $this->m_pdf->load();
        	$stylesheet  = '';
            $stylesheet .= file_get_contents('bootstrap/dist/css/bootstrap.min.css');
            //$stylesheet .= file_get_contents('layout/css/themes.min.css');
            $stylesheet .= file_get_contents('css/shashi.css');
            $pdf->WriteHTML($stylesheet,1);
        	$pdf->WriteHTML($html,2);
        	$pdf->Output($pdfFilePath, "I");
    	}
	}
	public function load_footer()
	{
		$this->load->view('include/dashboard/footer');
	}
}
