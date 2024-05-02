<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends CI_Controller {
	public function __construct(){
		parent::__construct();
        include APPPATH . 'third_party/pxPay/PxPay_Curl.inc.php';
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
		$data['title'] = "Payment";
		$this->load->view('include/header',$data);
	}
	public function load_body()
	{
		$data['title'] = "Payment";
		$this->load->view('pxPay',$data);
	}
	public function property()
	{
	    $this->auth_user->checkUserLoginStatus();
		$logged = $this->session->userdata('logged_in');
	    if(($logged['role'] != 'user') && $this->uri->segment(3) && ($this->uri->segment(2) != ''))
	    {
            $role = $logged['role'];
            $agentId = $logged['id'];
            $where = array('status' => 1);
            $accesskey = $this->uri->segment(3);
        	if($role == 'company')
        	    $where = array('accesskey' => $accesskey, 'status' => 1);
        	if($role == 'agents')
        	    $where = array('accesskey' => $accesskey, 'role' => $role, 'agent' => $agentId, 'status' => 1);
        	if($role == 'landlord')
        	    $where = array('accesskey' => $accesskey, 'role' => $role, 'agent' => $agentId, 'status' => 1);
        	$data['properties'] = $this->get->table('properties', $where);
        	if($data['properties'] === false)
        	    redirect(base_url('myaccount'));
        	if($role == 'agents')
        	{
        	    $user = user('agents', $agentId);
        	    $where = array('company' => $user[0]->company, 'sno !=' => $agentId, 'status' => 1);
                $data['agents'] = $this->get->table('agents', $where, '', array('name' => 'asc'));
        	}
        	$data['property_type'] = property_type();
        	$data['addons'] = addons();
        	$data['logged'] = $logged;
        	$data['role'] = $role;
		    $data['title'] = "Payment";
		    $pxpay = new PxPay_Curl(PxPay_Url, PxPay_Userid, PxPay_Key);
		    if (isset($_REQUEST["result"]))
            {
                $enc_hex = $_REQUEST["result"];
                $rsp = $pxpay->getResponse($enc_hex);
                $Success           = $rsp->getSuccess();
                $AmountSettlement  = $rsp->getAmountSettlement();
                $AuthCode          = $rsp->getAuthCode();
                $CardName          = $rsp->getCardName();
                $CardNumber        = $rsp->getCardNumber();
                $DateExpiry        = $rsp->getDateExpiry();
                $DpsBillingId      = $rsp->getDpsBillingId();
                $BillingId    	 = $rsp->getBillingId();
                $CardHolderName    = $rsp->getCardHolderName();
                $DpsTxnRef	     = $rsp->getDpsTxnRef();
                $TxnType           = $rsp->getTxnType();
                $TxnData1          = $rsp->getTxnData1();
                $TxnData2          = $rsp->getTxnData2();
                $TxnData3          = $rsp->getTxnData3();
                $CurrencySettlement= $rsp->getCurrencySettlement();
                $ClientInfo        = $rsp->getClientInfo();
                $TxnId             = $rsp->getTxnId();
                $CurrencyInput     = $rsp->getCurrencyInput();
                $EmailAddress      = $rsp->getEmailAddress();
                $MerchantReference = $rsp->getMerchantReference();
                $ResponseText		 = $rsp->getResponseText();
                $TxnMac            = $rsp->getTxnMac();
            
                if ($rsp->getSuccess() == "1")
                {
                    $result = "The transaction was approved.";
                	
                // 	if (!isProcessed($TxnId))
                // 	{
                // 		# Send emails, generate invoices, update order status etc.
                // 	}
                	
                }
                else
                {
                    $result = "The transaction was declined.";
                }
                if((!empty($TxnData1)) && $TxnData1 != '')
                {
                    $txnstatus = (($Success == '1')?'Success':'Failed');
                    if($Success == '1')
                    {
                        $TotalAmount = $AmountSettlement+$TxnData3;
                        $update = array('txnid' => $TxnId, 'txnstatus' => $txnstatus, 'txnamount' => $TotalAmount, 'txndate' => date('Y-m-d'), 'response' => json_encode($rsp));
                        $TxnData2 = (!empty($TxnData2))?explode('.',$TxnData2):'';
                        if((!empty($TxnData2)) && is_array($TxnData2))
                        {
                            foreach($TxnData2 as $value)
                            {
                                $update[$value] = '1';
                            }
                        }
                        elseif(!empty($TxnData2))
                        {
                            $update[$TxnData2] = '1';
                        }
                        if($role != 'landlord')
                            $update['property_status'] = 'Available';
                        //print_r($update);
                        $where = array('accesskey' => $TxnData1);
                        $res = $this->get->updateInsertTableDetails('properties', $update, $where, 'created_date', 'modified_date');
                        if($res)
                        {
                            $res['propertyDetails'] = $data['properties'];
                            if($res['propertyDetails'] != false)
                            {
                                $refererURL = base_url('properties/single/'.$res['propertyDetails'][0]->accesskey);
                                $res['role'] = $role;
                                $res['site'] = $this->site->settings();
                                $res['refererURL'] = $refererURL;
                                $res['addons'] = addons();
                            	$subject = 'Your property is successfully submitted and waiting for approval.';
                                $res['agentDetails'] = user($res['propertyDetails'][0]->role, $res['propertyDetails'][0]->agent);
                                $res['name'] = $res['agentDetails'][0]->name;
                            	$body = $this->load->view('emails/property-added.php',$res,TRUE);
                            	if($res['agentDetails'] != false)
                                    sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $res['agentDetails'][0]->email, $subject, $body);
                                if(($res['propertyDetails'][0]->role == 'agents') && isset($res['agentDetails'][0]->company) && ($res['agentDetails'][0]->company != 0))
                    	        {
                    	            $res['company'] = user('company', $res['agentDetails'][0]->company);
                    	            $subject = 'Your property is listed and is live.';
                    	            $body = $this->load->view('emails/property-added.php',$res,TRUE);
                    	            sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $res['company'][0]->email, $subject, $body);
                    	        }
                            }
                            $messTitle = "Successfully Saved";
                        }
                    }
                    else
                    {
                        $messTitle = "Please try again"; 
                    }
                    $message = array(
    				    "title" => $messTitle,
    					"message" => $result,
    					"status" => (($Success == '1')?'success':'danger'),
    				);
    				//print_r($rsp);
                    //exit();
					$this->session->set_flashdata('alertMessage', $message);
                    redirect(base_url('myaccount/properties'));
                }
            }
            else
            {
    		    $params   = $_SERVER['QUERY_STRING'];
                $current_url = str_replace('index.php/','',current_url()). '?' . $params;
                $request = new PxPayRequest();
                $http_host   = getenv("HTTP_HOST");
                $request_uri = getenv("SCRIPT_NAME");
                $script_url = $current_url;
                $MerchantReference = $_REQUEST["Reference"];  
                $Address1 = $_REQUEST["Address1"];
                $addAddons = array();
                if(isset($_GET))
                {
                    foreach($_GET as $keyName => $typeValue)
                    {
                        if($_GET[$keyName] == '1')
                            $addAddons[] = $keyName;
                    }
                }
                $Address2 = implode('.',$addAddons);
                $Address3 = $data['properties'][0]->txnamount;
                $propertyprice = 0; 
                if(isset($data['agents']) && $data['agents'] != false){ }else{ $propertyprice = prop(); }
                if((isset($data['properties'])) && ($data['properties'] != false) && ($data['properties'][0]->txnstatus == 'Success'))
                $propertyprice = 0;
                $addonsprice = 0;
                //if(!empty($data['addons'])){ foreach($data['addons'] as $key => $addon){ if((isset($data['properties'])) && ($data['properties'] != false) && ($data['properties'][0]->$key == '1')){ if(($propertyprice != 0) || ($key == 'boost')){ $addonsprice = $addonsprice+$addon->price; } } } }
                if((!empty($data['addons'])) && ($role == 'agents')){ if((isset($_GET)) && (isset($_GET['boost'])) && ($_GET['boost'] == '1')){ $addonsprice = $data['addons']['boost']->price; } }
                if((!empty($data['addons'])) && ($role == 'landlord')){ foreach($data['addons'] as $key => $addon){ if((isset($_GET)) && ($_GET[$key] == '1')){ $addonsprice = $addonsprice+$addon->price; } } }
            	 $subtotal = $propertyprice+$addonsprice;
                //   if((isset($data['properties'])) && ($data['properties'] != false) && ($data['properties'][0]->txnstatus == 'Success'))
                //     $subtotal = $subtotal-$data['properties'][0]->txnamount;
                $AmountInput = $subtotal;
                //   echo $Address2;
                //   echo $propertyprice; 
                //   print_r($current_url);
                //   print_r($AmountInput);
                //   exit();
                if($subtotal == '0')
                {
                    $res['propertyDetails'] = $data['properties'];
                    if($res['propertyDetails'] != false)
                    {
                        $refererURL = base_url('properties/single/'.$res['propertyDetails'][0]->accesskey);
                        $res['role'] = $role;
                        $res['site'] = $this->site->settings();
                        $res['refererURL'] = $refererURL;
                        $subject = 'Your property is successfully submitted and waiting for approval.';
                        $res['agentDetails'] = user($res['propertyDetails'][0]->role, $res['propertyDetails'][0]->agent);
                        $res['name'] = $res['agentDetails'][0]->name;
                        $body = $this->load->view('emails/property-added.php',$res,TRUE);
                        if($res['agentDetails'] != false)
                            sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $res['agentDetails'][0]->email, $subject, $body);
                        if(($res['propertyDetails'][0]->role == 'agents') && isset($res['agentDetails'][0]->company) && ($res['agentDetails'][0]->company != 0))
                    	{
                    	    $res['company'] = user('company', $res['agentDetails'][0]->company);
                    	    $subject = 'Your property is listed and is live.';
                    	    $body = $this->load->view('emails/property-added.php',$res,TRUE);
                    	    sendmail($res['site'][0]->title, $res['site'][0]->sentmail, $res['company'][0]->email, $subject, $body);
                    	}
                    }
                    $messTitle = "Successfully Saved";
                    $message = array(
						"title" => $messTitle,
						"message" => " ",
						"status" => "success",
					);
					$this->session->set_flashdata('alertMessage', $message);
                    redirect(base_url('myaccount/properties'));
                    exit();
                }
                else
                {
                    $TxnId = uniqid("ID");
                    #Set PxPay properties
                    $request->setMerchantReference($MerchantReference);
                    $request->setAmountInput($AmountInput);
                    $request->setTxnData1($data['properties'][0]->accesskey);
                    $request->setTxnData2($Address2);
                    $request->setTxnData3($Address3);
                    $request->setTxnType("Purchase");
                    $request->setCurrencyInput("NZD");
                    $request->setEmailAddress($logged['email']);
                    $request->setUrlFail($script_url);
                    $request->setUrlSuccess($script_url);
                    $request->setTxnId($TxnId);  
                  
                    #The following properties are not used in this case
                    # $request->setEnableAddBillCard($EnableAddBillCard);    
                    # $request->setBillingId($BillingId);
                    # $request->setOpt($Opt);
                  
                    #Call makeRequest function to obtain input XML
                    $request_string = $pxpay->makeRequest($request);
                    $response = new MifMessage($request_string);
                    $url = $response->get_element_text("URI");
                    $valid = $response->get_attribute("valid");
                // print_r($request_string);exit();
                    //   print_r($request);
                    //   exit();
                    redirect($url);
                    //header("Location: ".$url);
              }
            }
		    //$this->load->view('property-payment',$data);
	    }
	    else
	        redirect(base_url('myaccount'));
	}
	public function invoice()
	{
	    $this->auth_user->checkUserLoginStatus();
		$logged = $this->session->userdata('logged_in');
        $where = array('sno' => $this->uri->segment(3), 'role' => $logged['role'], 'user' => $logged['id'], 'status' => 1);
        $package = $this->get->table('subscriptions', $where);
	    if(($logged['role'] != 'user') && ($id = $this->uri->segment(3)) && ($this->uri->segment(2) != '') && ($package != false))
	    {
        	$data['company'] = user('company', $package[0]->user);
        	$agnts = array(0);
    	    $where = array('company' => $logged['id'], 'status' => 1);
    	    if($data['agents'] = $this->get->table('agents', $where))
    	    {
    	        foreach($data['agents'] as $agent)
    	            $agnts[] = $agent->sno;
    	    }
        	$where = array('role' => 'agents', 'status' => 1);
    	    $properties = $this->get->whereIn('properties', $where, 'agent', $agnts);
    	    $premium = ($properties != false)?pluck_multi_array($properties, 'premium', 'premium'):[];
    	    $featured = ($properties != false)?pluck_multi_array($properties, 'featured', 'featured'):[];
		    $data['title'] = "Payment";
		    $pxpay = new PxPay_Curl( PxPay_Url, PxPay_Userid, PxPay_Key );
		    if (isset($_REQUEST["result"]))
            {
              $enc_hex = $_REQUEST["result"];
              $rsp = $pxpay->getResponse($enc_hex);
              $Success           = $rsp->getSuccess();   # =1 when request succeeds
              $AmountSettlement  = $rsp->getAmountSettlement();
              $AuthCode          = $rsp->getAuthCode();  # from bank
              $CardName          = $rsp->getCardName();  # e.g. "Visa"
              $CardNumber        = $rsp->getCardNumber(); # Truncated card number
              $DateExpiry        = $rsp->getDateExpiry(); # in mmyy format
              $DpsBillingId      = $rsp->getDpsBillingId();
              $BillingId    	 = $rsp->getBillingId();
              $CardHolderName    = $rsp->getCardHolderName();
              $DpsTxnRef	     = $rsp->getDpsTxnRef();
              $TxnType           = $rsp->getTxnType();
              $TxnData1          = $rsp->getTxnData1();
              $TxnData2          = $rsp->getTxnData2();
              $TxnData3          = $rsp->getTxnData3();
              $CurrencySettlement= $rsp->getCurrencySettlement();
              $ClientInfo        = $rsp->getClientInfo(); # The IP address of the user who submitted the transaction
              $TxnId             = $rsp->getTxnId();
              $CurrencyInput     = $rsp->getCurrencyInput();
              $EmailAddress      = $rsp->getEmailAddress();
              $MerchantReference = $rsp->getMerchantReference();
              $ResponseText		 = $rsp->getResponseText();
              $TxnMac            = $rsp->getTxnMac(); # An indication as to the uniqueness of a card used in relation to others
            
              if ($rsp->getSuccess() == "1")
              {
                $result = "The transaction was approved.";
            	
            // 	if (!isProcessed($TxnId))
            // 	{
            // 		# Send emails, generate invoices, update order status etc.
            // 	}
            	
              }
              else
              {
                $result = "The transaction was declined.";
              }
              if((!empty($TxnData1)) && $TxnData1 != '')
              {
                  $txnstatus = (($Success == '1')?'Success':'Failed');
                  $update = array('invoice_no' => $TxnData1, 'user' => $logged['id'], 'role' => $logged['role'], 'txnid' => $TxnId, 'txnstatus' => $txnstatus, 'txnamount' => $AmountSettlement, 'total' => $AmountSettlement, 'paid' => $AmountSettlement, 'response' => json_encode($rsp));
                  $where = array('invoice_no' => $TxnData1);
                  $res = $this->get->updateInsertTableDetails('invoice', $update, $where, 'created_date', 'modified_date');
                  if($res)
                  {
                    $messTitle = "Successfully Paid";
                    $message = array(
						"title" => $messTitle,
						"message" => $result,
						"status" => (($Success == '1')?'success':'danger'),
					);
					$this->session->set_flashdata('alertMessage', $message);
                    redirect(base_url('myaccount/invoices'));
                  }
              }
            }
            else
            {
              $request = new PxPayRequest();
              $http_host   = getenv("HTTP_HOST");
              $request_uri = getenv("SCRIPT_NAME");
              $script_url = base_url('payment/invoice/'.$id);
              $MerchantReference = $_REQUEST["Reference"];  
              $Address1 = $_REQUEST["Address1"];
              $Address2 = $_REQUEST["Address2"];
              $Address3 = $_REQUEST["Address3"];
              $total = promotional_price($package[0]->created_date,$package[0]->amount);
              $premium_addon = ($properties != false && !empty($premium['1']))?($total = $total+(count($premium['1']))*(addons()['premium']->price)):0; $featured_addon = ($properties != false && !empty($featured['1']))?($total = $total+(count($featured['1']))*(addons()['featured']->price)):0;
              $AmountInput = $total;
              if($total == '0')
              {
                    $messTitle = "Successfully Paid";
                    $message = array(
						"title" => $messTitle,
						"message" => " ",
						"status" => "success",
					);
					$this->session->set_flashdata('alertMessage', $message);
                    redirect(base_url('myaccount/invoices'));
                    exit();
              }
              else
              {
                  $TxnId = uniqid("ID");
                  #Set PxPay properties
                  $request->setMerchantReference($MerchantReference);
                  $request->setAmountInput($AmountInput);
                  $request->setTxnData1($id);
                  $request->setTxnData2($Address2);
                  $request->setTxnData3($Address3);
                  $request->setTxnType("Purchase");
                  $request->setCurrencyInput("NZD");
                  $request->setEmailAddress($logged['email']);
                  $request->setUrlFail($script_url);
                  $request->setUrlSuccess($script_url);
                  $request->setTxnId($TxnId);  
                  
                  #The following properties are not used in this case
                  # $request->setEnableAddBillCard($EnableAddBillCard);    
                  # $request->setBillingId($BillingId);
                  # $request->setOpt($Opt);
                  
                  #Call makeRequest function to obtain input XML
                  $request_string = $pxpay->makeRequest($request);
                  $response = new MifMessage($request_string);
                  $url = $response->get_element_text("URI");
                  $valid = $response->get_attribute("valid");
                  //exit();
                  redirect($url);
              }
            }
	    }
	    else
	        redirect(base_url('myaccount/invoices'));
	}
	public function load_footer()
	{
		$this->load->view('include/footer');
	}
}
