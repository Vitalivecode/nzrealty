<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Properties extends CI_Controller {
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
	public function load_header($title = "Properties", $data = null)
	{
        $data['site'] = $this->site->settings();
		$data['title'] = ucwords(strtolower($title));
		$this->load->view('include/header',$data);
	}
	public function load_body()
	{
	    
	}
	public function page()
	{
		$data['title'] = "Properties";
		$like = null;
		$wherein = null;
		$find_in_set = null;
		$where = array('p.property_status' => 'Available', 'p.status' => 1, 'g.type' => 'thumbnail', 'g.status' => 1);
		if(isset($_GET)){
		    foreach($_GET as $key => $value)
            {
                if(($_GET[$key] !== '') && ($key !== 'address') && ($key !== 'price') && ($key !== 'area') && ($key !== 'hh_compliant') && ($key !== 'pets') && ($key !== 'furnished') && ($key !== 'floor_area') && ($key !== 'parkings') && ($key !== 'aminities') && ($key !== 'duration') && ($key !== 'suburb') && ($key !== 'district') && ($key !== 'p_type') && ($key !== 'sortby'))
                    $where['p.'.$key] = $value;
                if(($key === 'district') && ($_GET['district'] !== '') && ($_GET['district'] !== '0'))
                    $where['p.'.$key] = $value;
                if(($key === 'p_type') && ($_GET['p_type'] !== '') && ($_GET['p_type'] !== '0'))
                    $where['p.'.$key] = $value;
                if(($key === 'suburb') && !empty($_GET['suburb']) && ($_GET['suburb'] !== ''))
                {
                    $subursArray = $_GET['suburb'];
                    if (($sub_array = array_search('0', $subursArray)) !== false) {
                        unset($subursArray[$sub_array]);
                    }
                    if(!empty($subursArray))
                        $wherein = array('p.suburb',$subursArray);
                }
                if(($key === 'address') && ($_GET['address'] !== ''))
                {
                    if(is_numeric($_GET['address']))
                        $where['p.accesskey'] = $_GET['address'];
                    else
                        $like = array('p.address' => $_GET['address'],'p.title' => $_GET['address']);
                }
                if(($key === 'price') && ($_GET['price'] !== ''))
                {
                    $price = explode('to',$_GET['price']);
                    $price_from = str_replace(array('$',','),'',$price[0]);
                    $price_to = str_replace(array('$',','),'',$price[1]);
                    $where['p.price >='] = $price_from;
                    $where['p.price <='] = $price_to;
                }
                if(($key === 'hh_compliant') && ($_GET['hh_compliant'] !== ''))
                    $where['JSON_EXTRACT(features,"$.compliant")'] = $_GET['hh_compliant'];
                if(($key === 'pets') && ($_GET['pets'] !== ''))
                    $where['JSON_EXTRACT(features,"$.pet")'] = $_GET['pets'];
                if(($key === 'furnished') && ($_GET['furnished'] !== ''))
                    $where['JSON_EXTRACT(features,"$.furnished")'] = $_GET['furnished'];
                if(($key === 'aminities') && !empty($_GET['aminities']) && ($_GET['aminities'] !== ''))
                    $find_in_set = array('p.aminities', $_GET['aminities']);
                if(($key === 'parkings') && ($_GET['parkings'] !== ''))
                {
                    //$where['p.parkings >='] = 1;
                    $where['p.parkings'] = (int)$_GET['parkings'];
                }
                if(($key === 'floor_area') && isset($_GET['floor_area']) && $_GET['floor_area'] !== '')
                {
                    $floor_area = explode('to',$_GET['floor_area']);
                    $floor_area_from = str_replace(array('$',',','sqmt'),'',$floor_area[0]);
                    $floor_area_to = str_replace(array('$',',','sqmt'),'',$floor_area[1]);
                    $where['p.floor_area >='] = $floor_area_from;
                    $where['p.floor_area <='] = $floor_area_to;
                }
                if(($key === 'area') && isset($_GET['area']) && $_GET['area'] !== '')
                {
                    $area = explode('to',$_GET['area']);
                    $area_from = str_replace(array('$',',','sqmt'),'',$area[0]);
                    $area_to = str_replace(array('$',',','sqmt'),'',$area[1]);
                    $where['p.sqft >='] = $area_from;
                    $where['p.sqft <='] = $area_to;
                }
                if(($key === 'duration') && !empty($_GET['duration']) && ($_GET['duration'] === 'Negotiation'))
                    $where['p.negotiation'] = '1';
                elseif(($key === 'duration') && !empty($_GET['duration']))
                    $where['p.duration'] = $_GET['duration'];
                
            }
		}
		//print_r($where);
		if(isset($_GET['sortby']) && $_GET['sortby'] === 'newest')
		    $order_by = array('p.created_date' => 'DESC');
		elseif(isset($_GET['sortby']) && $_GET['sortby'] === 'high')
		    $order_by = array('p.price' => 'DESC');
		elseif(isset($_GET['sortby']) && $_GET['sortby'] === 'low')
		    $order_by = array('p.price' => 'ASC');
		else
            $order_by = array('p.created_date' => 'ASC');
        $joinwhere = 'p.sno = g.property';
        $select = 'p.*,p.type as ptype,g.images,g.type';
        $data["total_rows"] = ($this->get->leftJoin('properties as p', 'p_gallery as g', $where, $joinwhere, $select, $like, '', '', '', $wherein, $find_in_set))?count($this->get->leftJoin('properties as p', 'p_gallery as g', $where, $joinwhere, $select, $like, '', '', '', $wherein, $find_in_set)):0;
        $base_url = base_url('properties/page/');
        $per_page = 12;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = pagination($base_url, $data["total_rows"], $per_page);
        $data['properties'] = $this->get->leftJoin('properties as p', 'p_gallery as g', $where, $joinwhere, $select, $like, $order_by, $per_page, $page, $wherein, $find_in_set);
        //print_r($this->db->last_query());
		$where = array('status' => 1);
    	$order_by = array('name' => 'ASC');
    	$data['amenities'] = $this->get->table('p_amenities', $where, '', $order_by);
		$this->load_header();
		$this->load->view('properties',$data);
		$this->load_footer();
	}
	public function single($accesskey = '')
	{
	    if($accesskey && $this->uri->segment(2) != '' && $this->uri->segment(2) == 'single')
    	{
    	    $where = array('property_status' => 'Available', 'accesskey' => $accesskey, 'status' => 1);
    	    $data['properties'] = $this->get->table('properties', $where);
    	    if($data['properties'] != false)
    	    {
    	        $user = user($data['properties'][0]->role, $data['properties'][0]->agent);
    	        if($user)
    	        {
        	        $data['title'] = "Single Property";
            	    $where = array('status' => 1);
            	    $order_by = array('name' => 'ASC');
            	    //$data['amenities'] = $this->get->table('p_amenities', $where, '', $order_by);
            	    $whereIn = explode(',',$data['properties'][0]->aminities);
            	    $data['amenities'] = $this->get->whereIn('p_amenities', $where, 'sno', $whereIn, '', $order_by);
        	        $where = array('region' => $data['properties'][0]->region, 'status' => 1);
        	        $data['districts'] = $this->get->table('districts', $where);
        	        $where = array('region' => $data['properties'][0]->region, 'district' => $data['properties'][0]->district, 'status' => 1);
        	        $data['suburbs'] = $this->get->table('suburbs', $where);
        	        //$where = array('property' => $data['properties'][0]->sno, 'status' => 1);
        	        $fromdate = date('Y-m-d', strtotime(date('Y-m-d').' +1 day'));
        	        $todate = date('Y-m-d', strtotime($fromdate.' +30 day'));
        	        $where = array('property' => $data['properties'][0]->sno, 'date >=' => $fromdate, 'date <=' => $todate, 'status' => 1);
        	        $data['schedules'] = $this->get->table('property_schedules', $where, '', array('date' => 'asc'), 30);
        	        if($data['schedules'] != false)
        	        {
            	       // $data['schedule_from'] = pluck($data['schedules'], 'from_time', 'date');
            	       // $data['schedule_to'] = pluck($data['schedules'], 'to_time', 'date');
            	       // $data['schedule_slot'] = pluck($data['schedules'], 'slots', 'date');
            	        
            	        $data['schedule_from'] = pluck($data['schedules'], 'from_time', 'sno');
            	        $data['schedule_to'] = pluck($data['schedules'], 'to_time', 'sno');
            	        $data['schedule_slot'] = pluck($data['schedules'], 'slots', 'sno');
        	        }
        	        $where = array('property' => $data['properties'][0]->sno, 'status' => 1);
        	        $gallery = $this->get->table('p_gallery', $where, '', array('order' => 'asc'));
        	        if($gallery != false)
        	        {
        	            $data['gallery'] = pluck_multi_array($gallery, 'images', 'type');
        	        }
        	        $data['user'] = user($data['properties'][0]->role, $data['properties'][0]->agent);
        	        if(($data['properties'][0]->role == 'agents') && ($data['user'] != false) && ($data['user'][0]->company != 0))
        	        {
        	            $data['company'] = user('company', $data['user'][0]->company);
        	        }
        	        $datetime = date('Y-m-d H:i:s');
        	        $insert = array('property' => $data['properties'][0]->sno, 'ipaddress' => $this->site->ipaddress(), 'datetime' => $datetime);
        	        //$where = array('property' => $data['properties'][0]->sno, 'ipaddress' => $this->site->ipaddress(), 'DAY(datetime)' => date('d', strtotime($datetime)), 'MONTH(datetime)' => date('m', strtotime($datetime)), 'YEAR(datetime)' => date('Y', strtotime($datetime)));
        	        if($this->get->table('property_views', array('property' => $data['properties'][0]->sno, 'DATE(datetime)' => date('Y-m-d'))) == false)
        	            $this->get->insert('property_views', $insert);
        	        
        	        $data['dayViews'] = $this->get->table('property_views', array('property' => $data['properties'][0]->sno, 'DATE(datetime)' => date('Y-m-d')));
        	        $last7 = Date('Y-m-d', strtotime('-7 days'));
        	        $data['weekViews'] = $this->get->table('property_views', array('property' => $data['properties'][0]->sno, 'DATE(datetime) >=' => $last7, 'DATE(datetime) <=' => date('Y-m-d')));
        	        $data['monthViews'] = $this->get->table('property_views', array('property' => $data['properties'][0]->sno, 'YEAR(datetime)' => date('Y')));
        	        $data['views'] = $this->get->table('property_views', array('property' => $data['properties'][0]->sno));
            	    $data['wishlist'] = ($logged = $this->session->userdata('logged_in'))?$this->get->table('wishlist', array('property' => $data['properties'][0]->sno, 'role' => $logged['role'], 'user' => $logged['id'], 'status' => 1)):false;
            	    
            	    /****** Mapbox Api ***********/
            	   // $data['restaurants'] = json_decode(curl_get('https://api.mapbox.com/geocoding/v5/mapbox.places/restaurant.json?type=poi&proximity='.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).','.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).'&access_token='.mapbox_token))->features;
            	   // $data['schools'] = json_decode(curl_get('https://api.mapbox.com/geocoding/v5/mapbox.places/education%20school.json?type=poi&proximity='.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).','.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).'&access_token='.mapbox_token))->features;
            	   // $data['colleges'] = json_decode(curl_get('https://api.mapbox.com/geocoding/v5/mapbox.places/college%20university.json?type=poi&proximity='.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).','.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).'&access_token='.mapbox_token))->features;
            	   // $data['hospitals'] = json_decode(curl_get('https://api.mapbox.com/geocoding/v5/mapbox.places/hospital.json?type=poi&proximity='.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).','.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).'&access_token='.mapbox_token))->features;
            	   // $data['pharmacy'] = json_decode(curl_get('https://api.mapbox.com/geocoding/v5/mapbox.places/pharmacy.json?type=poi&proximity='.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).','.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).'&access_token='.mapbox_token))->features;
            	   // $data['transportations'] = json_decode(curl_get('https://api.mapbox.com/geocoding/v5/mapbox.places/bus%20station%20bus%20stop%20bus.json?type=poi&proximity='.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).','.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).'&access_token='.mapbox_token))->features;
            	    /****** Mapbox Api ***********/
            	    
            	    $data['restaurants'] = json_decode(curl_get('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).','.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).'&radius=15000&type=restaurant&key=AIzaSyCiBMTZ2nYdB6y9_iRvq8hbsg7Ho1XqIgU'));
            	    $data['schools'] = json_decode(curl_get('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).','.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).'&radius=15000&type=school&key=AIzaSyCiBMTZ2nYdB6y9_iRvq8hbsg7Ho1XqIgU'));
            	    $data['universities'] = json_decode(curl_get('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).','.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).'&radius=15000&type=university&key=AIzaSyCiBMTZ2nYdB6y9_iRvq8hbsg7Ho1XqIgU'));
            	    //echo 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).','.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).'&radius=15000&types=school,university&key=AIzaSyCiBMTZ2nYdB6y9_iRvq8hbsg7Ho1XqIgU';
            	    $data['hospitals'] = json_decode(curl_get('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).','.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).'&radius=15000&type=hospital&key=AIzaSyCiBMTZ2nYdB6y9_iRvq8hbsg7Ho1XqIgU'));
            	    $data['pharmacies'] = json_decode(curl_get('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).','.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).'&radius=15000&type=pharmacy&key=AIzaSyCiBMTZ2nYdB6y9_iRvq8hbsg7Ho1XqIgU'));
            	    $data['doctors'] = json_decode(curl_get('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).','.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).'&radius=15000&type=doctor&key=AIzaSyCiBMTZ2nYdB6y9_iRvq8hbsg7Ho1XqIgU'));
            	    $data['transportations'] = json_decode(curl_get('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).','.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).'&radius=15000&type=train_station&key=AIzaSyCiBMTZ2nYdB6y9_iRvq8hbsg7Ho1XqIgU'));
            	    $data['bus_stations'] = json_decode(curl_get('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).','.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).'&radius=15000&type=bus_station&key=AIzaSyCiBMTZ2nYdB6y9_iRvq8hbsg7Ho1XqIgU'));
            	    $data['light_rail_stations'] = json_decode(curl_get('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).','.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).'&radius=15000&type=light_rail_station&key=AIzaSyCiBMTZ2nYdB6y9_iRvq8hbsg7Ho1XqIgU'));
            	    $data['subway_stations'] = json_decode(curl_get('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.(!empty($data['properties'][0]->latitude)?$data['properties'][0]->latitude:lnglat()[1]).','.(!empty($data['properties'][0]->longitude)?$data['properties'][0]->longitude:lnglat()[0]).'&radius=15000&type=subway_station&key=AIzaSyCiBMTZ2nYdB6y9_iRvq8hbsg7Ho1XqIgU'));
            	    
            	    
            	    $data['title'] = $data['properties'][0]->title;
            	    $this->load_header($data['title'], $data);
        	        $this->load->view('single-property',$data);
    		        $this->load_footer();
    	        }
        	    else
        	        redirect(base_url('home'));
    	    }
    	    else
    	        redirect(base_url('home'));
    	}
    	else
		    redirect(base_url('home'));
	}
	public function request()
	{
	    $logged = $this->session->userdata('logged_in');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|min_length[10]|max_length[15]');
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
            $property = propertyid($referer);
    		$datetime = date('Y-m-d H:i:s');
        	$data = array(
        	    'property' => $property,
        		'name' =>  $this->input->post('name'),
        		'email' =>  $this->input->post('email'),
        		'phone' =>  $this->input->post('phone'),
        		'message' =>  $this->input->post('message'),
        		'created_date' => $datetime
        	);
    		if($logged)
    		    $data['user'] = $logged['id'];
    		$result = $this->get->insert('property_request', $data);
    	    if($result == true)
    		{
    			if(isset($_POST['email']) && $_POST['email'] != '')
                {
	                $res['propertyDetails'] = property_details(array('p.accesskey' => $referer));
                    $res['site'] = $this->site->settings();
                    $res['refererURL'] = $refererURL;
                    $res['name'] = $this->input->post('name');
                    $res['datetime'] = $datetime;
                	$subject = 'You have successfully requested.';
                	$body = $this->load->view('emails/request-info.php',$res,TRUE);
                	//$body = 'You have successfully requested. Our team will reach you soon..';
                    sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $this->input->post('email'), $subject, $body);
                    if($res['propertyDetails'] != false)
                    {
                        $res['userDetails'] = $data;
                        $res['agentDetails'] = user($res['propertyDetails'][0]->role, $res['propertyDetails'][0]->agent);
                        $subject = 'You have an enquiry for '.$res['propertyDetails'][0]->address;
                        $res['subject'] = 'You have an enquiry for ';
                        $body = $this->load->view('emails/property-enquiry.php',$res,TRUE);
                        if($res['agentDetails'] != false)
                            sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $res['agentDetails'][0]->email, $subject, $body);
                    }
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
		echo json_encode($msg);
	}
	public function schedule()
	{
	    $logged = $this->session->userdata('logged_in');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('sdate', 'Date', 'trim|required');
		$this->form_validation->set_rules('schedule', 'Time', 'trim|required');
		$this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|min_length[10]|max_length[15]');
		if ($this->form_validation->run() == FALSE)
		{
			$msg[] = array('class' => 'sdate', 'error' => form_error('sdate', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
			$msg[] = array('class' => 'time', 'error' => form_error('schedule', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
			$msg[] = array('class' => 'name', 'error' => form_error('name', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            $msg[] = array('class' => 'email', 'error' => form_error('email', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
            $msg[] = array('class' => 'phone', 'error' => form_error('phone', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
		}
		else
		{  
    		$result = false;
    		$referer = '';
        	$refererURL = $_SERVER['HTTP_REFERER'];
            $refererExplode = explode('/',$refererURL);
            $referer = end($refererExplode);
            $property = propertyid($referer);
    		$datetime = date('Y-m-d H:i:s');
        	$data = array(
        	    'property' => $property,
        	    'day_date' =>  date('Y-m-d', strtotime($this->input->post('sdate'))),
        	    'schedule_id' => $this->input->post('schedule'),
        		'name' =>  $this->input->post('name'),
        		'email' =>  $this->input->post('email'),
        		'phone' =>  $this->input->post('phone'),
        		'created_date' => $datetime
        	);
    		if($logged)
    		    $data['user'] = $logged['id'];
    		$result = $this->get->insert('property_visits', $data);
    	    if($result == true)
    		{
                if(isset($_POST['email']) && $_POST['email'] != '')
                {
	                $res['propertyDetails'] = property_details(array('p.accesskey' => $referer));
                    if($res['propertyDetails'] != false)
                    {
                        $res['site'] = $this->site->settings();
                        $res['refererURL'] = $refererURL;
                        $res['name'] = $this->input->post('name');
                        $res['datetime'] = $datetime;
                    	$subject = 'You have successfully scheduled.';
                        $res['userDetails'] = $data;
                        $res['agentDetails'] = user($res['propertyDetails'][0]->role, $res['propertyDetails'][0]->agent);
                        if(($res['propertyDetails'][0]->role == 'agents') && isset($res['agentDetails'][0]->company) && ($res['agentDetails'][0]->company != 0))
            	        {
            	            $res['company'] = user('company', $res['agentDetails'][0]->company);
            	        }
                    	$body = $this->load->view('emails/book-a-viewing.php',$res,TRUE);
                    	//$body = 'You have successfully scheduled. Our team will reach you soon..';
                    	if($res['agentDetails'] != false)
                            sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $this->input->post('email'), $subject, $body);
                        $subject = 'There is a new booking request for '.$res['propertyDetails'][0]->address;
                        $res['subject'] = 'You hava a new booking request for ';
                        $body = $this->load->view('emails/property-enquiry.php',$res,TRUE);
                        if($res['agentDetails'] != false)
                            sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $res['agentDetails'][0]->email, $subject, $body);
                    }
                }
                $heading = 'You have successfully scheduled';
                $message = 'Our team will reach you soon.';
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
