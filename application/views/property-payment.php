<?php
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
    	
    	if (!isProcessed($TxnId))
    	{
    		# Send emails, generate invoices, update order status etc.
    	}
    	
      }
      else
      {
        $result = "The transaction was declined.";
      }
    print_r($rsp);
    }
    else
    {
      $request = new PxPayRequest();
      $http_host   = getenv("HTTP_HOST");
      $request_uri = getenv("SCRIPT_NAME");
      $script_url = base_url('payment/property/'.$properties[0]->accesskey);
      $MerchantReference = $_REQUEST["Reference"];  
      $Address1 = $_REQUEST["Address1"];
      $Address2 = $_REQUEST["Address2"];
      $Address3 = $_REQUEST["Address3"];
      $propertyprice = 0; 
      if(isset($agents) && $agents != false){ }else{ $propertyprice = prop(); }
      $addonsprice = 0;
      if(!empty($addons)){ foreach($addons as $key => $addon){ if(isset($properties) && $properties != false && $properties[0]->$key === '1'){ if($propertyprice != 0 || $key == 'boost'){ $addonsprice = $addonsprice+$addon->price; } } } } 
      $subtotal = $propertyprice+$addonsprice;
      $AmountInput = $subtotal;
      
      $TxnId = uniqid("ID");
      
      #Set PxPay properties
      $request->setMerchantReference($MerchantReference);
      $request->setAmountInput($AmountInput);
      $request->setTxnData1($properties[0]->accesskey);
      $request->setTxnData2($Address2);
      $request->setTxnData3($Address3);
      $request->setTxnType("Purchase");
      $request->setCurrencyInput("NZD");
      $request->setEmailAddress($logged['email']);
      $request->setUrlFail($script_url);			# can be a dedicated failure page
      $request->setUrlSuccess($script_url);			# can be a dedicated success page
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
      header("Location: ".$url);
  }

function isProcessed($TxnId)
{
	# Check database if order relating to TxnId has alread been processed
	return false;
}
?>
