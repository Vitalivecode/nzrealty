<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
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
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == FALSE)
			{
			    if(isset($_POST['type']))
                    $msg[] = array('class' => 'type', 'error' => form_error('type', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                $msg[] = array('class' => 'email', 'error' => form_error('email', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
                $msg[] = array('class' => 'password', 'error' => form_error('password', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
			}
			else
			{
				$password = $this->input->post('password');
				$where = array(
    			    'email' =>  $this->input->post('email'),
    				'password' =>  md5($password),
    				//'login_status' => 'approve',
    				'status' => 1
    			);
				$result = false;
				$result = $this->get->table($table, $where);
				if($result == true)
				{
				    $name = $result[0]->name;
				    $sess_array = array('name' => $name, 'email' => $result[0]->email, 'id' => $result[0]->sno, 'role' => $role, 'img' => $result[0]->img);
				    if($role == 'agents')
				        $sess_array['company'] = $result[0]->company;
					$this->session->set_userdata('logged_in', $sess_array);
					if(isset($_POST['signin_rem']))
					{
						$email = $this->input->post('email');
						$this->input->set_cookie('user_email', $email, 99999999);
						$this->input->set_cookie('user_password', $this->input->post('password'), 99999999);
					}
				    $site = $this->site->settings();
					$this->_loginLog($role, $result[0]->sno);
					$messTitle = "Welcome to ".ucfirst($site[0]->title);
					$message = array(
						"title" => $messTitle,
						"message" => $name,
						"status" => "info",
					);
					$this->session->set_flashdata('alertMessage', $message);
					$refererURL = $_SERVER['HTTP_REFERER'];
					if($role != 'user')
					    $refererURL = base_url('myaccount');
                	$redirect = ($refererURL != '')?$refererURL:base_url('myaccount');
					$msg[] = array('heading' => '', 'msg' => '', 'alert' => 'none', 'redirect' => $redirect);
				}
				else
				{
					$msg[] = array('heading' => 'Email and Password did not match!','msg' => ' ','alert' => 'error');
				}
			}
		}
		else
		    $msg[] = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
		echo json_encode($msg);
	}
	public function logout()
	{
	    $this->session->unset_userdata('logged_in');
	    $this->session->sess_destroy();
	    redirect(base_url('home'), 'refresh');	
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
