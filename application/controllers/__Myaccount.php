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
		    $this->load->view('dashboard',$data);
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
    			$this->form_validation->set_error_delimiters('<div class="text-left"><font color="red"><i class="bi bi-long-arrow-down"></i> ', '</font></div>');
    			$this->form_validation->set_rules('name', 'Fullame', 'trim|required|min_length[3]|max_length[50]');
    			if(isset($agents) && $agents != false && ($agents[0]->email == $_POST['email']))
    			    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    			else
    			    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[agents.email]');
    			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]|max_length[15]');
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
    			$this->form_validation->set_rules('about', 'About', 'trim');
    			if ($this->form_validation->run() == FALSE)
    			{
    			    $msg[] = array('class' => 'name', 'error' => form_error('name', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'email', 'error' => form_error('email', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'mobile', 'error' => form_error('mobile', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'password', 'error' => form_error('password', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'cpassword', 'error' => form_error('cpassword', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'about', 'error' => form_error('about', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
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
                			'email' =>  $this->input->post('email'),
                			'phone' =>  $this->input->post('mobile'),
                			'password' =>  md5($password),
                			'about' =>  $this->input->post('about'),
                			'company' => $logged['id'],
                			'login_status' => 'approve',
                		);
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
                                $msg[] = array('heading' => $heading,'msg' => 'Successfully Updated','alert' => 'success');
                            else
                                $msg[] = array('heading' => $heading,'msg' => 'Successfully Saved','alert' => 'success', 'reset' => 'yes');
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
	    if($logged['role'] != 'user')
	    {
	        $schedules = $this->get->table('property_visits', array('status' => 1));
	        if($schedules != false)
	        {
	            $data['name'] = pluck_multi_array($schedules,'name','property');
	            $data['day'] = pluck_multi_array($schedules,'day_date','property');
	            $data['time'] = pluck_multi_array($schedules,'time','property');
	        }
	        $order_by = array('p.created_date' => 'DESC');
        	$joinwhere = 'p.sno = g.property';
        	$select = 'p.*,g.images,g.type';
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
        	$select = 'p.*,g.images,g.type';
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
	    if($logged['role'] != 'user' && $logged['role'] != 'company')
	    {
    	    if($this->uri->segment(3) && $this->uri->segment(3) == 'add')
    	    {
    	        $referer = '';
    	        $refererURL = $_SERVER['HTTP_REFERER'];
                $refererExplode = explode('/',$refererURL);
            	$referer = end($refererExplode);
            	$date = new DateTime('2022-08-14'); 
    	        $this->load->library('form_validation');
    			$this->form_validation->set_error_delimiters('<div class="text-left"><font color="red"><i class="bi bi-long-arrow-down"></i> ', '</font></div>');
    			if(!is_numeric($referer))
    			    $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[1]|max_length[255]');
    			$this->form_validation->set_rules('property_type', 'Property Type', 'trim|required');
    			$this->form_validation->set_rules('afrom', 'Available From', 'trim|required');
    			$this->form_validation->set_rules('build_year', 'Built Year', 'trim|required|numeric');
    			$this->form_validation->set_rules('area', 'Area', 'trim|required|numeric');
    			$this->form_validation->set_rules('bedrooms', 'Bedrooms', 'trim|required|numeric');
    			$this->form_validation->set_rules('bathrooms', 'Bathrooms', 'trim|required|numeric');
    			$this->form_validation->set_rules('parkings', 'Parkings', 'trim|required|numeric');
    			$this->form_validation->set_rules('offshoreparking', 'Offshore Parking', 'trim|required|numeric');
    			$this->form_validation->set_rules('description', 'Description', 'trim|required');
    			
    			$this->form_validation->set_rules('address', 'Address', 'trim|required');
    			$this->form_validation->set_rules('region', 'Region', 'trim|required|numeric');
    			$this->form_validation->set_rules('district', 'District', 'trim|required|numeric');
    			$this->form_validation->set_rules('suburb', 'Suburb', 'trim|required|numeric');
    			$this->form_validation->set_rules('zip', 'Zip', 'trim|required');
    			$this->form_validation->set_rules('aprice', ' ', 'trim|required|numeric');
    			$this->form_validation->set_rules('oprice', ' ', 'trim|required|numeric');
    			$this->form_validation->set_rules('featured', ' ', 'trim|numeric');
    			$this->form_validation->set_rules('premium', ' ', 'trim|numeric');
    			
    			if(empty($_FILES['property_thumbnail']['name'][0]) && !is_numeric($referer))
    			    $this->form_validation->set_rules('property_thumbnail', 'Property Thumbnail', 'trim|required');
    			if(!$this->session->userdata('property_pics'))
    			    $this->form_validation->set_rules('property_pics', ' ', 'trim|required');
    			
    			for($days = 7; $days--;) { $day = $date->modify( '+1 days' )->format( 'l' );
    			    $this->form_validation->set_rules('schedule['.strtolower($day).'][from]', ' ', 'trim|required');
    			    $this->form_validation->set_rules('schedule['.strtolower($day).'][to]', ' ', 'trim|required');
    			    $this->form_validation->set_rules('schedule['.strtolower($day).'][slots]', ' ', 'trim|required');
    			}
    			if ($this->form_validation->run() == FALSE)
    			{
    			    if(!is_numeric($referer))
                        $msg[] = array('class' => 'title', 'error' => form_error('title', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'property_type', 'error' => form_error('property_type', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'afrom', 'error' => form_error('afrom', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'build_year', 'error' => form_error('build_year', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'area', 'error' => form_error('area', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'bedrooms', 'error' => form_error('bedrooms', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'bathrooms', 'error' => form_error('bathrooms', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'parkings', 'error' => form_error('parkings', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'offshoreparking', 'error' => form_error('offshoreparking', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'description', 'error' => form_error('description', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    
                    $msg[] = array('class' => 'address', 'error' => form_error('address', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'region', 'error' => form_error('region', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'district', 'error' => form_error('district', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'suburb', 'error' => form_error('suburb', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'zip', 'error' => form_error('zip', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'aprice', 'error' => form_error('aprice', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'oprice', 'error' => form_error('oprice', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'featured', 'error' => form_error('featured', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    $msg[] = array('class' => 'premium', 'error' => form_error('premium', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    
                    if(empty($_FILES['property_thumbnail']['name'][0]) && !is_numeric($referer))
                        $msg[] = array('class' => 'property_thumbnail', 'error' => form_error('property_thumbnail', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    if(!$this->session->userdata('property_pics'))
                        $msg[] = array('class' => 'property_pics', 'error' => form_error('property_pics', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    
                    for($days = 7; $days--;) { $day = $date->modify( '+1 days' )->format( 'l' );
                        $msg[] = array('class' => 'schedule_'.strtolower($day).'_from', 'error' => form_error('schedule['.strtolower($day).'][from]', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'schedule_'.strtolower($day).'_to', 'error' => form_error('schedule['.strtolower($day).'][to]', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                        $msg[] = array('class' => 'schedule_'.strtolower($day).'_slots', 'error' => form_error('schedule['.strtolower($day).'][slots]', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                    }
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
        			        'role' => $logged['role'],
        			        'agent' => $logged['id'],
        			        'p_type' => $this->input->post('property_type'),
        			        'available_from' => date('Y-m-d', strtotime($this->input->post('afrom'))),
        			        'built_year' => $this->input->post('build_year'),
        			        'sqft' => $this->input->post('area'),
        			        'bedrooms' => $this->input->post('bedrooms'),
        			        'bathrooms' => $this->input->post('bathrooms'),
        			        'parkings' => $this->input->post('parkings'),
        			        'offshoreparking' => $this->input->post('offshoreparking'),
        			        'description' => $this->input->post('description'),
        			        'address' => $this->input->post('address'),
        			        'region' => $this->input->post('region'),
        			        'district' => $this->input->post('district'),
        			        'suburb' => $this->input->post('suburb'),
        			        'zip' => $this->input->post('zip'),
        			        'actual_price' => $this->input->post('aprice'),
        			        'price' => $this->input->post('oprice'),
        			        'featured' => $this->input->post('featured'),
        			        'premium' => $this->input->post('premium'),
        			        'aminities' => $this->input->post('features')?implode(',',$this->input->post('features')):null,
        			        'accesskey' => is_numeric($referer)?(int)$referer:rand(999,999999).round(microtime(true)*1000),
        			    );
        			    if((!is_numeric($referer) || ($this->input->post('title') && $this->input->post('title') != '')))
        			        $insert['title'] = $this->input->post('title');
            		    $where = array('accesskey' => (int)$referer, 'role' => $logged['role'], 'agent' => $logged['id'], 'status' => 1);
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
            				for($days = 7; $days--;) { 
            				    $day = $date->modify( '+1 days' )->format( 'l' );
            				    $from_time = $this->input->post('schedule['.strtolower($day).'][from]');
            				    $to_time = $this->input->post('schedule['.strtolower($day).'][to]');
            				    $slots = $this->input->post('schedule['.strtolower($day).'][slots]');
                				$schedules_insert = array(
                			        'property' => $result,
                			        'day' => $day,
                			        'from_time' => $from_time,
                			        'to_time' => $to_time,
                			        'slots' => $slots,
                			    );
                				$where = array('property' => $result, 'day' => $day, 'status' => 1);
                				if(is_numeric($referer))
                				   $this->get->update('property_schedules', $schedules_insert, $where); 
                				else    
                				    $this->get->insert('property_schedules', $schedules_insert); 
            				}
        				    /*
        				    if($logged && $logged['email'] != '')
                            {
                                $email = $logged['email'];
                                $res['site'] = $this->site->settings();
                                $res['name'] = $this->input->post('name');
                    			$subject='You have successfully registered with us';
                    			//$body = $this->load->view('emails/register.php',$res,TRUE);
                    			$body = 'You have successfully registered with us, your account is under review. Our team will reach you soon..';
                                sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $email, $subject, $body);
                            }
                            */
                            if(is_numeric($referer))
                                $msg[] = array('heading' => 'Successfully Updated','msg' => ' ','alert' => 'success');
                            else
                            {
                                $this->session->unset_userdata('property_pics');
        					    $msg[] = array('heading' => 'Successfully Saved','msg' => ' ','alert' => 'success', 'reset' => 'yes');
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
    	        $this->session->unset_userdata('property_pics');
        	    $data['title'] = "Add Property";
        	    $where = array('status' => 1);
        	    $order_by = array('name' => 'ASC');
        	    $data['amenities'] = $this->get->table('p_amenities', $where, '', $order_by);
        	    $order_by = array('region_name' => 'ASC');
        	    $data['regions'] = $this->get->table('regions', $where, '', $order_by);
        	    if($this->uri->segment(3) && $this->uri->segment(2) != '' && $this->uri->segment(2) == 'edit-property')
        	    {
        	        $data['title'] = "Edit Property";
        	        $accesskey = $this->uri->segment(3);
        	        $where = array('accesskey' => $accesskey, 'role' => $logged['role'], 'agent' => $logged['id'], 'status' => 1);
        	        $data['properties'] = $this->get->table('properties', $where);
        	        if($data['properties'] != false)
        	        {
        	            $where = array('region' => $data['properties'][0]->region, 'status' => 1);
        	            $data['districts'] = $this->get->table('districts', $where);
        	            $where = array('region' => $data['properties'][0]->region, 'district' => $data['properties'][0]->district, 'status' => 1);
        	            $data['suburbs'] = $this->get->table('suburbs', $where);
        	            $where = array('property' => $data['properties'][0]->sno, 'status' => 1);
        	            $schedules = $this->get->table('property_schedules', $where);
        	            if($schedules != false)
        	            {
            	            $data['schedule_from'] = pluck($schedules, 'from_time', 'day');
            	            $data['schedule_to'] = pluck($schedules, 'to_time', 'day');
            	            $data['schedule_slot'] = pluck($schedules, 'slots', 'day');
        	            }
        	            $gallery = $this->get->table('p_gallery', $where, '', array('order' => 'asc'));
        	            if($gallery != false)
        	            {
        	                $data['gallery'] = pluck_multi_array($gallery, 'images', 'type');
        	            }
        	        }
        	    }
        	    $this->load_header($data['title']);
        		$this->load->view('property-add',$data);
        		$this->load_footer();
    	    }
	    }
	    else
	        redirect(base_url('myaccount'));
	}
	public function favorites()
	{
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
	    if($logged['role'] == 'company')
	    {
    	    $data['title'] = "Invoices";
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
	    else
	        redirect(base_url('myaccount'));
	}
	public function invoice()
	{
	    $this->auth_user->checkUserLoginStatus();
	    $logged = $this->session->userdata('logged_in');
	    if($logged['role'] == 'company' && ($id = $this->uri->segment(3)))
	    {
	        $where = array('sno' => $id, 'role' => $logged['role'], 'user' => $logged['id'], 'status' => 1);
            $package = $this->get->table('subscriptions', $where);
	        if($package != false)
	        {
        	    $data['title'] = "Invoice";
        	    $this->load_header($data['title']);
        	    $data['package'] = $package[0];
        	    $data['company'] = user('company', $package[0]->user);
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
    		$this->form_validation->set_error_delimiters('<div class="text-left"><font color="red"><i class="bi bi-long-arrow-down"></i> ', '</font></div>');
    		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
    		if(isset($_POST['subject']) && $_POST['subject'] == 'profile')
    		{
        		$this->form_validation->set_rules('name', 'Fullame', 'trim|required|min_length[3]|max_length[50]');
        		if($logged['email'] == $_POST['email'])
        		    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        		else
        		    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique['.$table.'.email]');
        		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[9]|max_length[15]');
        		if($logged['role'] == 'agents' || $logged['role'] == 'company')
        		{
        		    $this->form_validation->set_rules('about', 'About', 'trim|max_length[255]');
        		}
        		if($logged['role'] == 'company')
        		{
        		    $this->form_validation->set_rules('fax', 'Fax', 'trim|required|numeric|min_length[6]|max_length[15]');
        		    $this->form_validation->set_rules('website', 'Website', 'trim|valid_url');
        		    $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[4]|max_length[255]');
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
                    }
                    if($logged['role'] == 'company')
            		{
            		    $msg[] = array('class' => 'fax', 'error' => form_error('fax', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            		    $msg[] = array('class' => 'website', 'error' => form_error('website', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            		    $msg[] = array('class' => 'address', 'error' => form_error('address', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
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
                        	'name' =>  $this->input->post('name'),
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
                        }
            			if($logged['role'] == 'company')
            			{
            			    $data['fax'] = $this->input->post('fax');
            			    $data['website'] = $this->input->post('website');
            			    $data['address'] = $this->input->post('address');
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
	            $update = array('status' => 1);
    	        $delete = $this->get->activeInactive('agents', $update, $where, '', 'modified_date');
	            $title = ucfirst($agent[0]->name);
	            if($delete)
	                $message = "Successfully active";
	            else
	                $message = "Successfully Inactive";
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
    	$property_pics_files['image'] = upload_files($title, $_FILES['file']);
    	if ($property_pics_files['image'] === FALSE) {
    		$filename = 'Property Pictures';
            $error = $this->upload->display_errors();
            //$msg[] = array('heading' => 'Please try again', 'msg' => $error, 'alert' => 'error');
            $img = $error;
        }
        else
        {
            //$msg[] = array('heading' => 'Successfully Saved','msg' => ' ', 'data' => $property_pics_files['image'], 'alert' => 'success');
            $img = $property_pics_files['image'][0];
            $images = array();
            if($this->session->userdata('property_pics'))
            {
                $old = $this->session->userdata('property_pics');
                array_push($old, $img);
                //$this->session->unset_userdata('property_pics');
                $this->session->set_userdata('property_pics', $old);
                
            }
            else
            {
                $images = array($img);
                $this->session->set_userdata('property_pics', $images);
            }
        }
        //echo json_encode($msg);
        echo $img;
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
	public function delete()
	{
	    $this->auth_user->checkUserLoginStatus();
	    if(isset($_GET['file']) && $_GET['file'] != '' && $this->session->userdata('property_pics'))
	    {
	        $array = $this->session->userdata('property_pics');
	        if (($key = array_search($_GET['file'], $array)) !== false) {
                unset($array[$key]);
                $this->session->set_userdata('property_pics', $array);
	            $msg[] = array('heading' => 'Deleted!','msg' => 'Your image file has been deleted.', 'alert' => 'success');
            }
            else
               $msg[] = array('heading' => 'Please try again','msg' => array_search($_GET['file'], $array),'alert' => 'error');
	    } 
	    else
	        $msg[] = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
	    echo json_encode($msg);
	}
	public function p()
	{
	    $this->auth_user->checkUserLoginStatus();
	    print_r($this->session->userdata('property_pics'));
	}
	public function load_footer()
	{
		$this->load->view('include/dashboard/footer');
	}
}
