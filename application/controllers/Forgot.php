<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Forgot extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->library('Site');
		$this->site->maintenance();
		$this->load->model('get');
	}
	public function index()
	{
	    if($this->session->userdata('logged_in'))
			redirect(base_url('home'));
		else
		{
		    $this->load_header();
    		$this->load_body();
    		$this->load_footer();
		}
	}
	public function load_header()
	{
	    $data['site']=$this->site->settings();
		$data['title'] = "Forgot Password";
		$this->load->view('include/header',$data);
	}
	public function load_body()
	{
		$this->load->view('forgot-password');
	}
	public function send()		
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
		$this->form_validation->set_rules('type', ' ', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE)
		{
		    $msg[] = array('class' => 'type', 'error' => form_error('type', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', '')); 
			$msg[] = array('class' => 'email', 'error' => form_error('email', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
		}
		else
		{
			$where = array(
				'email' => $this->input->post('email'),
				'status' => 1
			);
			$result['data'] = $this->get->table($table,$where);
			if ($result['data'] == TRUE) {
			    $randomkey = hash('sha256', time().rand(1000,9999));
				$this->get->update($table,array('forgot_key' => $randomkey),$where);
				$result['forgot_key'] = $randomkey;
				$result['id'] = base64_encode($result['data'][0]->sno);
				$result['site'] = $this->site->settings();
				$result['role'] = $role;
				$subject = 'Password reset';
				$body = $this->load->view('emails/forgot.php',$result,TRUE);
				$mail = sendmail($result['site'][0]->title, $result['site'][0]->sentmail, $where['email'], $subject, $body);
				$msg[] = array('heading' => 'Your password reset link sent to email','msg' => ' ','alert' => 'success','report' => $mail,'reset' => 'yes');
			}
			else{
				$msg[] = array('class' => 'email', 'error' => '<i class="fa fa-arrow-up" aria-hidden="true"></i>Enter valid Email.');
			}
		}
		echo json_encode($msg);
	}
	public function password()			
	{
	    $role = (isset($_GET['type']) && $_GET['type'] !== '')?$this->input->get('type'):'user';
        $table = 'customers';
        if($role == 'user')
        	$table = 'customers';
        if($role == 'landlord')
        	$table = 'landlords';
        if($role == 'agents')
        	$table = 'agents';
        if($role == 'company')
        	$table = 'companies';
		$forgot_key = $this->uri->segment(3);
		$where = array(
			'forgot_key' => $forgot_key,
			'status' => 1
		);
		$checkLostPassword = $this->get->table($table, $where);
		if($this->uri->segment(3) && $checkLostPassword == true)
		{ 
			if($this->session->userdata('logged_in'))
			{
				redirect(base_url());
			}
			else
			{
				if(isset($_POST['npass']))
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
					$this->form_validation->set_rules('npass', 'New Password', 'trim|required|callback_valid_password');
					$this->form_validation->set_rules('vpass', 'Confirm Password', 'trim|required|matches[npass]');
					if ($this->form_validation->run() == FALSE)
					{
						$msg[] = array('class' => 'npass', 'error' => form_error('npass', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
						$msg[] = array('class' => 'vpass', 'error' => form_error('vpass', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
					}
					else
					{
					    $newpass = $this->input->post('npass');
			            $conpass = $this->input->post('vpass');
					    if($newpass == $conpass)
			            {
    						$update = array(
    						    'forgot_key' => '',
    							'password' => md5($this->input->post('npass')),
    							'modified_date' => date('Y-m-d H:i:s')
    						);
    						$where = array(
    						    'forgot_key' => $forgot_key,
    							'status' => 1
    						);
    						if ($this->get->update($table,$update, $where)) {
    							$msg[] = array('heading' => 'Successfully Changed. Please Login!','msg' => ' ','alert' => 'success','reset' => 'yes');
        						echo json_encode($msg);
        						exit();
    						}
    						else
    							$msg[] = array('heading' => 'Something went wrong!','msg' => 'Please try again','alert' => 'error');
					    }
            			else
            				$msg[] = array('heading' => 'New password and confirm password didn`t match','msg' => ' ','alert' => 'error');
					}
					echo json_encode($msg);
					exit();
				}
				else
				{
					$this->load_header();
					$this->load->view('lost-password');
					$this->load_footer();
				}
			}
		}
		else
           	redirect(base_url());
	}
	public function valid_password($password = '')
	{
		$password = trim($password);
		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';
		if (empty($password))
		{
			$this->form_validation->set_message('valid_password', 'The {field} field is required.');
			return FALSE;
		}
		if (preg_match_all($regex_lowercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
			return FALSE;
		}
		if (preg_match_all($regex_uppercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
			return FALSE;
		}
		if (preg_match_all($regex_number, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
			return FALSE;
		}
		if (preg_match_all($regex_special, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>ยง~'));
			return FALSE;
		}
		if (strlen($password) < 8)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least 8 characters in length.');
			return FALSE;
		}
		if (strlen($password) > 32)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
			return FALSE;
		}
		return TRUE;
	}
	public function load_footer()
	{
		$this->load->view('include/footer');
	}
}
