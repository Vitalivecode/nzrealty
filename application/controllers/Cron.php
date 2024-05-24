<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cron extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Site');
		$this->site->maintenance();
        $this->load->model('get');
	}
	public function index()
	{
    	$date_before_14 = date('Y-m-d', strtotime('-14 days'));
	    $where = array('role' => 'company', 'amount !=' => '0', 'DATE(created_date) <=' => $date_before_14, 'status' => '1');
	    $subscriptions = $this->get->table('subscriptions', $where);
	    if($subscriptions != false)
	    {
	        foreach($subscriptions as $package)
	        {
	            $where = array('role' => 'company', 'user' => $package->user, 'txnstatus != ' => 'Success', 'status' => '1');
        	    $invoice = $this->get->table('invoice', $where);
	            $company = user('company', $package->user);
	            if(($invoice == false) && ($company != false))
	            {
	                $where = array('company' => $company[0]->sno, 'status' => '1');
	                $agents = $this->get->table('agents', $where);
	                if($agents != false)
	                {
	                    $agnt = array();
	                    foreach($agents as $agent)
	                    {
	                        $agnt[] = $agent->sno;
	                    }
                	    $res['site'] = $this->site->settings();
                	    $where = array('role' => 'agents', 'status' => '1');
                	    $column = 'agent';
                	    $where_in = $agnt;
                	    $properties = $this->get->whereIn('properties', $where, $column, $where_in);
                	    if($properties != false)
                	    {
                    	    $email = $company[0]->email;
                    	    //$email = 'rudra.pranay@gmail.com';
                    	    $subject = 'Invoice of '.$res['site'][0]->title;
                    	    $res['name'] = $company[0]->name;
                    	    $res['package'] = $package->sno;
                    	    if(date('Y-m-d', strtotime($package->created_date)) == $date_before_14)
                    	    {
                    	        $res['message'] = 'You can view and pay your bill through your dashboard or click the below button.';
                    	    }
                		    else
                		    {
                		        $premium = pluck_multi_array($properties, 'premium', 'premium');
    	                        $featured = pluck_multi_array($properties, 'featured', 'featured');
                		        $total = $package->amount;
                		        $premium_addon = ($properties != false && !empty($premium['1']))?($total = $total+(count($premium['1']))*(addons()['premium']->price)):0; $featured_addon = ($properties != false && !empty($featured['1']))?($total = $total+(count($featured['1']))*(addons()['featured']->price)):0;
                		        $res['message'] = 'Your account is overdue and please pay the outstanding of '.currency().$total.' as soon as possible.
Please ignore, if it’s already paid.';
                		    }
                    	    $body = $this->load->view('emails/invoice.php',$res,TRUE); //print_r($body);
                		    sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $email, $subject, $body);
                	    }
	                }
	            }
	        }
	    }
	}
}
