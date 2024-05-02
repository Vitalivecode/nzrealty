<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Site');
		$this->site->maintenance();
        $this->load->model('get');
	}
	public function index()
	{
	    if(isset($_POST['email']))
		{
			$role = isset($_POST['type'])?$this->input->post('type'):'user';
		    $table = 'customers';
		    if($role == 'user')
				$table = 'customers';
			if($role == 'landlord')
			    $table = 'landlords';
			if($role == 'agents')
			    $table = 'agents';
			if($role == 'company')
			    $table = 'companies';
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('', '');
			if(isset($_POST['type']))
			    $this->form_validation->set_rules('type', 'Type', 'trim|required');
			if($role == 'company')
			    $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[50]|is_unique['.$table.'.name]');
			else
			    $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique['.$table.'.email]');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|min_length[9]|max_length[12]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
			//$this->form_validation->set_rules('terms', ' ', 'trim|required|numeric|min_length[1]');
			if(isset($_POST['package']))
			    $this->form_validation->set_rules('package', 'Package', 'trim|numeric|required');
			if ($this->form_validation->run() == FALSE)
			{
			    if(isset($_POST['type']))
                    $msg[] = array('class' => 'type', 'error' => form_error('type', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                $msg[] = array('class' => 'name', 'error' => form_error('name', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                $msg[] = array('class' => 'email', 'error' => form_error('email', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                $msg[] = array('class' => 'phone', 'error' => form_error('phone', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                $msg[] = array('class' => 'password', 'error' => form_error('password', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                if(isset($_POST['package']))
                    $msg[] = array('class' => 'package', 'error' => form_error('package', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                //$msg[] = array('class' => 'terms', 'error' => form_error('terms', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
			}
			else
			{
			    if($role == 'company' && !isset($_POST['package']))
			    {
			        $msg[] = array('heading' => ' ', 'msg' => ' ', 'alert' => 'none', 'loadurl' => base_url('packages/list?type='.$role));
		            echo json_encode($msg);
		            exit();
			    }
			    else
    			{
    			    if($role == 'company' && isset($_POST['package']))
        			{
        			    $package = $this->input->post('package');
        			    $packages = $this->get->table('packages', array('sno' => $package, 'user_type' => ucfirst($role), 'status' => 1));
        			    if($packages == false)
        			    {
        			        $msg[] = array('class' => 'package', 'error' => '<i class="fa fa-arrow-up" aria-hidden="true"></i> Invalid Package..!');
        		            echo json_encode($msg);
        		            exit();
        			    }
        			}   
    				$datetime = date('Y-m-d H:i:s');
    				$password = $this->input->post('password');
        			$data = array(
        				'name' =>  ucwords(strtolower($this->input->post('name'))),
        				'email' =>  $this->input->post('email'),
        				'phone' =>  $this->input->post('phone'),
        				'password' =>  md5($password),
        				'created_date' => $datetime
        			);
    				if($role == 'company')
    				{
    				    $data['login_status'] = 'pending';
    				    $data['package'] = $package;
    				}
    				else
    				{
    				    $data['login_status'] = 'approve';
    				}
    				$result = false;
    				$result = $this->get->insert($table, $data);
    				if($result == true)
    				{
                        $res['site'] = $this->site->settings();
    				    if($role == 'company' && isset($_POST['package']))
        				{
        				    $insert_package_details = array(
        				        'package' => $package,
        				        'details' => json_encode($packages[0]),
        				        'role' => $role,
        				        'user' => $result,
        				        'amount' => $packages[0]->price,
        				        'created_date' => $datetime
        				    );
        				    $this->get->insert('subscriptions', $insert_package_details);
        				}
    				    if(isset($_POST['email']) && $_POST['email'] != '')
                        {
                            $res['name'] = $this->input->post('name');
                			$subject='You have successfully registered with us';
                			$body = $this->load->view('emails/signup.php',$res,TRUE);
                // 			if($role == 'company')
                // 			    $body = 'You have successfully registered with us, your account is under review. Our team will reach you soon..';
                // 			else
                // 			    $body = 'You have successfully registered with us. Our team will reach you soon..';
                            sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $this->input->post('email'), $subject, $body);
                        }
                        /*
                        if($role == 'company')
                            $message = 'Your account is under review. Our team will reach you soon.';
                        else
                            $message = 'Our team will reach you soon.';
                        if($role == 'company')
                            $msg[] = array('heading' => $heading,'msg' => $message,'alert' => 'success', 'reset' => 'yes', 'clear' => 'yes');
                        else
    					    $msg[] = array('heading' => $heading,'msg' => $message,'alert' => 'success', 'reset' => 'yes');
    					*/
    				    $site = $res['site'];
    					$this->_loginLog($role, $result);
    					$messTitle = "Welcome to ".ucfirst($site[0]->title);
    					$message = array(
    						"title" => $messTitle,
    						"message" => $data['name'],
    						"status" => "info",
    					);
    					$this->session->set_flashdata('alertMessage', $message);
    					$refererURL = $_SERVER['HTTP_REFERER'];
                    	$redirect = ($refererURL != '')?$refererURL:base_url('myaccount');
    				    $sess_array = array('name' => $data['name'], 'email' => $data['email'], 'id' => $result, 'role' => $role, 'img' => '300x300.png');
    					$this->session->set_userdata('logged_in', $sess_array);
                    	$msg[] = array('heading' => '', 'msg' => '', 'alert' => 'none', 'redirect' => $redirect);
    				}
    				else
    				{
    					$msg[] = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
    				}
    			}
			}
		}
		else
		    $msg[] = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
		echo json_encode($msg);
                        
	}
	private function _loginLog($role, $user)
    {
        $getPreviousData = $this->get->table('loginlog', [
            'user'       => $user,
            'role'       => $role,
            'ip'         => $this->site->ipaddress(),
            'browser'    => $this->site->browser()->name,
            'logout'     => null
        ]);
        if ($getPreviousData != false) {
            $this->get->update('loginlog', ['logout' => ($getPreviousData[0]->login + ( 60 * 5 ))], ['sno' => $getPreviousData[0]->sno]);
        }
        $this->get->insert('loginlog', [
            'ip'              => $this->site->ipaddress(),
            'browser'         => $this->site->browser()->name,
            'operatingsystem' => $this->site->browser()->platform,
            'login'           => strtotime(date('YmdHis')),
            'role'            => $role,
            'user'            => $user,
        ]);
    }
	public function check_captcha($string)
    {
        if($string != $this->session->userdata('captchaCode')):
            $this->form_validation->set_message('check_captcha', 'The Captcha Code is incorrect.');
            return false;
        else:
            return true; 
        endif;
    }
}
