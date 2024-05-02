<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
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
	public function load_header()
	{
        $data['site'] = $this->site->settings();
		$data['title'] = "Home";
		$this->load->view('include/header',$data);
	}
	public function load_body()
	{
		$data['title'] = "Home";
		$data['cities'] = $this->get->table('popular_cities', array('status' => '1'),'','sno');
		$data['testimonials'] = $this->get->table('testimonials', array('status' => '1'),'','sno');
		$data['clients'] = $this->get->table('client_logos', array('status' => '1'),'','sno');
		$this->load->view('home',$data);
	}
	public function updates_form()
	{}
	public function newsletter_form()
	{
	    if(isset($_POST['email']))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="text-left"><font color="red"><i class="bi bi-long-arrow-down"></i> ', '</font></div>');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			if ($this->form_validation->run() == FALSE)
			{
                $msg[] = array('class' => 'email', 'error' => form_error('email', '<i class="fa fa-arrow-up" aria-hidden="true"></i> ', ''));
			}
			else
			{
				$datetime = date('Y-m-d H:i:s');
				$data = array(
					'email' =>  $this->input->post('email'),
					'createdDate' => $datetime
				);
				$result = $this->get->insert('newsletter_form',$data);
				if($result == true)
				{
				    if(isset($_POST['email']) && $_POST['email'] != '')
                    {   /*
                        $res['site'] = $this->site->settings();
                        $res['name'] = $this->input->post('name');
                    	$this->email->from($res['site'][0]->sentmail, $res['site'][0]->title);
            			$subject='Thank you for contacting us.';
            			$this->email->to($this->input->post('email'));
            			$this->email->subject($subject); 
            			$body = $this->load->view('emails/contact.php',$res,TRUE);
            			$this->email->message($body);  
            			$this->email->send();
            			/******* Admin Email *******/ /*
            			$this->email->from($res['site'][0]->sentmail, $res['site'][0]->title);
            			$res['name'] = 'Admin';
            			$res['form'] = $data;
            			$subject='New Enquiry From '.$res['site'][0]->title;
            			$this->email->to('sripoojithataxconsultants@gmail.com');
            			$this->email->subject($subject); 
            			$body = $this->load->view('emails/admin_contact.php',$res,TRUE);
            			$this->email->message($body);  
            			$this->email->send(); */
                    }
					$msg[] = array('heading' => 'Thank you for subscribing!','msg' => 'We will send you text messages promotions','alert' => 'success', 'reset' => 'yes');
				}
				else
				{
					$msg[] = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
				}
			}
		}
		else
		    $msg[] = array('heading' => 'Please try again','msg' => ' ','alert' => 'error');
		echo json_encode($msg);
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
	public function load_footer()
	{
		$this->load->view('include/footer');
	}
}
