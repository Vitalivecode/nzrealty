<?php
function publish_action($gps)
{
    if ($gps->get('primary'))
    {
        $db = GPS_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'1\' WHERE id = ' . (int)$gps->get('primary');
        $db->query($query);
    }
}
function unpublish_action($gps)
{
    if ($gps->get('primary'))
    {
        $db = GPS_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'0\' WHERE id = ' . (int)$gps->get('primary');
        $db->query($query);
    }
}

function exception_example($postdata, $primary, $gps)
{
    // get random field from $postdata
    $postdata_prepared = array_keys($postdata->to_array());
    shuffle($postdata_prepared);
    $random_field = array_shift($postdata_prepared);
    // set error message
    $gps->set_exception($random_field, 'This is a test error', 'error');
}

function test_column_callback($value, $fieldname, $primary, $row, $gps)
{
    return $value . ' - nice!';
}

function after_upload_example($field, $file_name, $file_path, $params, $gps)
{
    $ext = trim(strtolower(strrchr($file_name, '.')), '.');
    if ($ext != 'pdf' && $field == 'uploads.simple_upload')
    {
        unlink($file_path);
        $gps->set_exception('simple_upload', 'This is not PDF', 'error');
    }
}

function movetop($gps)
{
    if ($gps->get('primary') !== false)
    {
        $primary = (int)$gps->get('primary');
        $db = GPS_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != 0)
            {
                array_splice($result, $key - 1, 0, array($item));
                unset($result[$key + 1]);
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}
function movebottom($gps)
{
    if ($gps->get('primary') !== false)
    {
        $primary = (int)$gps->get('primary');
        $db = GPS_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != $count - 1)
            {
                unset($result[$key]);
                array_splice($result, $key + 1, 0, array($item));
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}

function show_description($value, $fieldname, $primary_key, $row, $gps)
{
    $result = '';
    if ($value == '1')
    {
        $result = '<i class="fa fa-check" />' . 'OK';
    }
    elseif ($value == '2')
    {
        $result = '<i class="fa fa-circle-o" />' . 'Pending';
    }
    return $result;
}

function custom_field($value, $fieldname, $primary_key, $row, $gps)
{
    return '<input type="text" readonly class="gps-input" name="' . $gps->fieldname_encode($fieldname) . '" value="' . $value .
        '" />';
}
function unset_val($postdata)
{
    $postdata->del('Paid');
}

function format_phone($new_phone)
{
    $new_phone = preg_replace("/[^0-9]/", "", $new_phone);

    if (strlen($new_phone) == 7)
        return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $new_phone);
    elseif (strlen($new_phone) == 10)
        return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $new_phone);
    else
        return $new_phone;
}

function before_list_example($list, $gps)
{
    var_dump($list);
}

function after_update_test($pd, $pm, $xc)
{
    $xc->search = 0;
}

function after_upload_test($field, &$filename, $file_path, $upload_config)
{
    $filename = 'bla-bla-bla';
}
function checkPhone($postdata, $gps)
{
    date_default_timezone_set("Asia/Kolkata");
    $db = gps_db::get_instance();
    //$table = $gps->get_var('table');
    $phone = $db->escape($postdata->get('phone'));
    $query = 'SELECT phone FROM `users` WHERE phone = '.$phone.' AND isActive = 1';
    $db->query($query);
    $result = $db->result();
    $count = count($result);
    if ($count > 0) {
        $gps->set_exception('phone', 'This phone no. is already in use','error');
        echo "<script>jQuery.toast({
    			heading: 'This phone no. is already in use',
    			text: '',
    			position: 'top-right',
    			loaderBg: '#ff6849',
    			icon: 'error',
    			hideAfter: 3500,
    			stack: 6
    		})</script>";
    }
    created_date($postdata, $gps);
}
function checkUpdatePhone($postdata, $primary, $gps)
{
    date_default_timezone_set("Asia/Kolkata");
    $db = gps_db::get_instance();
    $phone = $db->escape($postdata->get('phone'));
    $query = 'SELECT phone FROM `users` WHERE phone = '.$phone.' AND id != '.$primary.' AND isActive = 1';
    $db->query($query);
    $result = $db->result();
    $count = count($result);
    if ($count > 0) {
        $gps->set_exception('phone', 'This phone no. is already in use','error');
        echo "<script>jQuery.toast({
    			heading: 'This phone no. is already in use',
    			text: '',
    			position: 'top-right',
    			loaderBg: '#ff6849',
    			icon: 'error',
    			hideAfter: 3500,
    			stack: 6
    		})</script>";
    }
    modify_date($postdata, $gps);
}
function uniqueId($postdata)
{
    date_default_timezone_set("Asia/Kolkata");
    $sybl = str_split('!@#$%^&*'); 
    $alpha = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'); 
    $num = str_split('0123456789'); 
    shuffle($sybl); 
    $randsybl = '';
    foreach (array_rand($sybl, 2) as $k) $randsybl .= $sybl[$k];
    shuffle($alpha); 
    $randalpha = '';
    foreach (array_rand($alpha, 3) as $k) $randalpha .= $alpha[$k];
    shuffle($num); 
    $randnum = '';
    foreach (array_rand($num, 3) as $k) $randnum .= $num[$k];
    $unique = $randsybl.$randalpha.$randnum;
    $empId = str_shuffle($unique);
    $postdata->set('login_id', $empId);
    $postdata->set('pass', md5($empId));
}
function created_date($postdata, $gps)
{
    date_default_timezone_set("Asia/Kolkata");
    $postdata->set('created_date', date('Y-m-d H:i:s'));
}
function modify_date($postdata, $gps)
{
    date_default_timezone_set("Asia/Kolkata");
    $postdata->set('modified_date', date('Y-m-d H:i:s'));
}
function user_notification_insert($postdata, $gps)
{
    $db = GPS_db::get_instance();
    $userID = $postdata->get('userID');
    $title = strip_tags($postdata->get('title'));
    $message = strip_tags($postdata->get('message'));
    if($title != '')
    {
        //user_notification($userID,$title,$message);
    }
    created_date($postdata, $gps);
}
function user_notification_update($postdata, $gps)
{
    $db = GPS_db::get_instance();
    $userID = $postdata->get('userID');
    $title = strip_tags($postdata->get('title'));
    $message = strip_tags($postdata->get('message'));
    if($title != '')
    {
        //user_notification($userID,$title,$message);
    }
    modify_date($postdata, $gps);
}
function user_notification($userID,$title,$message){
        $db = GPS_db::get_instance();
        if($userID == '0')
            $sql = 'SELECT `web_token`,`id` FROM `users`  WHERE  `web_token` != "" AND `isActive` = "1" limit 1000 ';
        else
            $sql = 'SELECT `web_token`,`id` FROM `users`  WHERE `id` = "'.$userID.'" AND `web_token` != "" AND `isActive` = "1" limit 1000 ';
		$db->query($sql);
		$results = $db->result();
		$count = count($results);
		if($count > 0)
		{
    		$badge = '1'; 
    		$img = '';
    		$uniqTokens = array();
    		$msg = array
    		(
    			'body'=> ($message != '')?$message:'',
        		'title'=> $title,
                'badge' => $badge,
                'sound' => 'default',
        		'largeIcon'=> $img
    		);
			$tokens = array();
			foreach($results as $result)
			{
				$tokens[] = $result['web_token'];
			}
			$uniqTokens = array_unique($tokens);
			if($uniqTokens != '')
			{
				$fields = array
				(
					'registration_ids' => $uniqTokens,
					'notification'	=> $msg
				);
				$headers = array
				(
					'Authorization: key=' .GPS_config::$fcm_access_key,
					'Content-Type: application/json'
				);	
				$ch = curl_init();
				curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
				curl_setopt( $ch,CURLOPT_POST, true );
				curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
				curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($fields) );
				$result = curl_exec($ch );
				curl_close( $ch );
			}	
		}
}
function delete_action($gps)
{
    if ($gps->get('primary'))
    {
        $db = GPS_db::get_instance();
        $query = 'UPDATE '.$gps->get('table').' SET `isActive` = b\'0\' WHERE id = ' . (int)$gps->get('primary');
        $db->query($query);
    }
}
function delete_user_action($gps)
{
    if ($gps->get('primary'))
    {
        $db = GPS_db::get_instance();
        $query = 'UPDATE '.$gps->get('table').' SET `status` = \'inactive\' WHERE sno = ' . (int)$gps->get('primary');
        $db->query($query);
    }
}
function delete_post_action($gps)
{
    if ($gps->get('primary'))
    {
        $db = GPS_db::get_instance();
        $query = 'UPDATE '.$gps->get('table').' SET `status` = \'0\' WHERE sno = ' . (int)$gps->get('primary');
        $db->query($query);
    }
}
function url($postdata, $gps)
{
    $db = gps_db::get_instance();
    $url = $postdata->get('url');
    if(!empty($url))
        $postdata->set('url', 'https://'.$url);
    $applylink = $postdata->get('apply_link');
    if(!empty($applylink))
        $postdata->set('apply_link', 'https://'.$applylink);
    $website = $postdata->get('website');
    if(!empty($website))
        $postdata->set('website', 'https://'.$website);
    $twitter = $postdata->get('twitter');
    if(!empty($twitter))
        $postdata->set('twitter', 'https://'.$twitter);
    $facebook = $postdata->get('facebook');
    if(!empty($facebook))
        $postdata->set('facebook', 'https://'.$facebook);
    $instagram = $postdata->get('instagram');
    if(!empty($instagram))
        $postdata->set('instagram', 'https://'.$instagram);
    $linkedin = $postdata->get('linkedin');
    if(!empty($linkedin))
        $postdata->set('linkedin', 'https://'.$linkedin);
        
    $created_date = $postdata->get('created_date');
    if((!empty($created_date)) && ($created_date == ''))
        created_date($postdata, $gps);
    else
        modify_date($postdata, $gps);
}

function blocked_action($gps)
{
    if ($gps->get('primary'))
    {
        $db = GPS_db::get_instance();
        $title = $gps->get('title');
        $query = 'UPDATE '.$gps->get('table').' SET `block` = \'1\' WHERE id = ' . (int)$gps->get('primary');
        $db->query($query);
        echo '<script type="text/javascript">jQuery.toast({
        		heading: "Successfully Blocked",
        		text: "'.$title.'",
        		position: "top-right",
        		loaderBg: "#ff6849",
        		icon: "success",
        		hideAfter: 3500,
        		stack: 6
        	})</script>';
    }
}
function unblocked_action($gps)
{
    if ($gps->get('primary'))
    {
        $db = GPS_db::get_instance();
        $title = $gps->get('title');
        $query = 'UPDATE '.$gps->get('table').' SET `block` = \'0\' WHERE id = ' . (int)$gps->get('primary');
        $db->query($query);
        echo '<script type="text/javascript">jQuery.toast({
        		heading: "Successfully Unblocked",
        		text: "'.$title.'",
        		position: "top-right",
        		loaderBg: "#ff6849",
        		icon: "success",
        		hideAfter: 3500,
        		stack: 6
        	})</script>';
    }
}
function empty_checkbox($value, $fieldname, $primary_key, $row, $gps)
{
    return '<input type="checkbox" class="gps-input" name="id[]" value="'.$value.'" />';
}

function curl_post($to = null, $subject = null, $body = null, $page = null)
{
    $post = array(
        'to' => $to,
        'subject' => $subject,
        'body' => $body,
        'page' => $page,
    );
    $ch = curl_init();
    $base_url = GPS_config::$base_url;
    curl_setopt($ch, CURLOPT_URL, $base_url."admin/emails");
    curl_setopt($ch, CURLOPT_POST, 1);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, "to=$to&subject=$subject&body=$body&page=$page");
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close ($ch);
    return $server_output;
}

function login_status_gps($postdata, $gps)
{
    $base_url = GPS_config::$base_url;
    $created_date = $postdata->get('created_date');
    $login_status = $postdata->get('login_status');
    if ($login_status == 'approve') {
        $name = $postdata->get('name');
        $to = $postdata->get('email');
        $rand = rand(9999,999999);
        $password = md5($rand);
        //$postdata->set('password', $password);
        $subject = 'Welcome to NZ Realestate. Your account is active and is ready to use.';
        $body = json_encode(array(array('name' => $name)));
        //$body = 'Your login information:<br/>Website URL: '.$base_url.'<br/>Email: '.$to.'<br/>Password: '.$rand;
        //$body = 'Your login information:<br/>Website URL: '.$base_url.'<br/>Email: '.$to;
        $page = 'account-approval.php';
        $curl = curl_post($to,$subject,$body,$page);
    }
    if($created_date == '')
        created_date($postdata, $gps);
    else
        modify_date($postdata, $gps);
}

function is_json_string($json_str)
{
	json_decode($json_str);
	return json_last_error() === JSON_ERROR_NONE;
}

function property_others($value, $fieldname, $primary_key, $row, $gps)
{
    if(!empty($value) && is_json_string($value))
    {
        $data = '';
        $decodeJson = (array)json_decode($value);
        foreach($decodeJson as $key => $val)
        {
            if($val == 'plusgst')
                $data .= ucfirst($key) .'&nbsp;:&nbsp;Plus<br/>';
            elseif($val == 'ingst')
                $data .= ucfirst($key) .'&nbsp;:&nbsp;Inclusive<br/>';
            elseif($val == 'plusout')
                $data .= ucfirst($key) .'&nbsp;:&nbsp;Plus<br/>';
            elseif($val == 'inout')
                $data .= ucfirst($key) .'&nbsp;:&nbsp;Inclusive<br/>';
            else
                $data .= ucfirst($key) .'&nbsp;:&nbsp;'.$val.'<br/>';
        }
        return $data;
    }
    else
        return $value;
}

function property_gst($value, $fieldname, $primary_key, $row, $gps)
{
    $data = array();
    if(!empty($value) && is_json_string($value))
    {
        $data = (array)json_decode($value);
    }
    return '<div class="custom-control custom-checkbox p-20 commercial" style="width:80%">
                <fieldset class="form-group" style="width:100%;margin:0px;">
                    <div class="row">                                                                                      
                        <div class="col-sm-6">
                            <label for="property-type" class="text-heading"> GST </label>
                            <div class="form-check">
                                <input class="form-check-input gps-input" type="radio" name="'.$gps->fieldname_encode('properties.gst').'" id="plusgst" value="plusgst" '.((!empty($data) && !empty($data['gst']) && ($data['gst'] == 'plusgst'))?'checked':'').'>
                                <label class="form-check-label" for="plusgst">&nbsp;Plus GST</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input gps-input" type="radio" name="'.$gps->fieldname_encode('properties.gst').'" id="ingst" value="ingst" '.((!empty($data) && !empty($data['gst']) && ($data['gst'] == 'ingst'))?'checked':'').'>
                                <label class="form-check-label" for="ingst">&nbsp;Inclusive GST</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="property-type" class="text-heading"> Outgoings </label>
                            <div class="form-check">
                                <input class="form-check-input gps-input" type="radio" name="'.$gps->fieldname_encode('properties.outgoings').'" id="plusout" value="plusout" '.((!empty($data) && !empty($data['gst']) && ($data['outgoings'] == 'plusout'))?'checked':'').'>
                                <label class="form-check-label" for="plusout">&nbsp;Plus Outgoings</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input gps-input" type="radio" name="'.$gps->fieldname_encode('properties.outgoings').'" id="inout" value="inout" '.((!empty($data) && !empty($data['gst']) && ($data['outgoings'] == 'inout'))?'checked':'').'>
                                <label class="form-check-label" for="inout">&nbsp;Inclusive Outgoings</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>';
}

function property_features($value, $fieldname, $primary_key, $row, $gps)
{
    $data = array();
    if(!empty($value) && is_json_string($value))
    {
        $data = (array)json_decode($value);
    }
    return '<div class="custom-control custom-checkbox p-20 residential" style="width:100%">
                <fieldset class="form-group" style="width:100%;margin:0px;">
                    <div class="row">                                                                                      
                        <div class="col-sm-3">
                            <label for="property-type" class="text-heading"> Pets </label>
                            <div class="form-check">
                                <input class="form-check-input gps-input" type="radio" name="'.$gps->fieldname_encode('properties.pet').'" id="petyes" value="yes" '.((!empty($data) && !empty($data['pet']) && ($data['pet'] == 'yes'))?'checked':'').'>
                                <label class="form-check-label" for="petyes">&nbsp;Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input gps-input" type="radio" name="'.$gps->fieldname_encode('properties.pet').'" id="petno" value="no" '.((!empty($data) && !empty($data['pet']) && ($data['pet'] == 'no'))?'checked':'').'>
                                <label class="form-check-label" for="petno">&nbsp;No</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input gps-input" type="radio" name="'.$gps->fieldname_encode('properties.pet').'" id="petnegotiable" value="negotiable" '.((!empty($data) && !empty($data['pet']) && ($data['pet'] == 'negotiable'))?'checked':'').'>
                                <label class="form-check-label" for="petnegotiable">&nbsp;Negotiable</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="property-type" class="text-heading"> Smokers </label>
                            <div class="form-check">
                                <input class="form-check-input gps-input" type="radio" name="'.$gps->fieldname_encode('properties.smokers').'" id="smokersyes" value="yes" '.((!empty($data) && !empty($data['smokers']) && ($data['smokers'] == 'yes'))?'checked':'').'>
                                <label class="form-check-label" for="smokersyes">&nbsp;Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input gps-input" type="radio" name="'.$gps->fieldname_encode('properties.smokers').'" id="smokersno" value="no" '.((!empty($data) && !empty($data['smokers']) && ($data['smokers'] == 'no'))?'checked':'').'>
                                <label class="form-check-label" for="smokersno">&nbsp;No</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="property-type" class="text-heading"> Furnished </label>
                            <div class="form-check">
                                <input class="form-check-input gps-input" type="radio" name="'.$gps->fieldname_encode('properties.furnished').'" id="furnishedyes" value="yes" '.((!empty($data) && !empty($data['furnished']) && ($data['furnished'] == 'yes'))?'checked':'').'>
                                <label class="form-check-label" for="furnishedyes">&nbsp;Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input gps-input" type="radio" name="'.$gps->fieldname_encode('properties.furnished').'" id="furnishedno" value="no" '.((!empty($data) && !empty($data['furnished']) && ($data['furnished'] == 'no'))?'checked':'').'>
                                <label class="form-check-label" for="furnishedno">&nbsp;No</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="property-type" class="text-heading"> Healthy Homes Compliant </label>
                            <div class="form-check">
                                <input class="form-check-input gps-input" type="radio" name="'.$gps->fieldname_encode('properties.compliant').'" id="compliantyes" value="yes" '.((!empty($data) && !empty($data['compliant']) && ($data['compliant'] == 'yes'))?'checked':'').'>
                                <label class="form-check-label" for="compliantyes">&nbsp;Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input gps-input" type="radio" name="'.$gps->fieldname_encode('properties.compliant').'" id="compliantno" value="no" '.((!empty($data) && !empty($data['compliant']) && ($data['compliant'] == 'no'))?'checked':'').'>
                                <label class="form-check-label" for="compliantno">&nbsp;No</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input gps-input" type="radio" name="'.$gps->fieldname_encode('properties.compliant').'" id="compliantprogress" value="in-progress" '.((!empty($data) && !empty($data['compliant']) && ($data['compliant'] == 'in-progress'))?'checked':'').'>
                                <label class="form-check-label" for="compliantprogress">&nbsp;In-progress</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>';
}

function property_gst_outgoings($postdata, $gps)
{
    $gstOutgoings = array('gst' => $postdata->get('gst'), 'outgoings' => $postdata->get('outgoings'));
    $postdata->set('other', json_encode($gstOutgoings));
    $features = array('pet' => $postdata->get('pet'), 'smokers' => $postdata->get('smokers'), 'furnished' => $postdata->get('furnished'), 'compliant' => $postdata->get('compliant'));
    $postdata->set('features', json_encode($features));
    if(($pointer = explode(',',$postdata->get('pointer'))) && is_array($pointer))
    {
        $postdata->set('latitude', $pointer[0]);
        $postdata->set('longitude', $pointer[1]);
    }
        
    $created_date = $postdata->get('created_date');
    if((!empty($created_date)) && ($created_date == ''))
        created_date($postdata, $gps);
    else
        modify_date($postdata, $gps);
}

function pointer($postdata, $gps)
{
    if(($pointer = explode(',',$postdata->get('pointer'))) && is_array($pointer))
    {
        $postdata->set('latitude', $pointer[0]);
        $postdata->set('longitude', $pointer[1]);
    }
    $package = $postdata->get('package');
    if(!empty($package))
    {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        $db = GPS_db::get_instance();
        $queryCompanies = "SELECT * FROM `companies` WHERE `sno` = $gps AND `package` = $package AND `status` = '1'";
        $db->query($queryCompanies);
        if(count($db->result()) == 0){
            $queryPackages = "SELECT * FROM `packages` WHERE `sno` = $package AND `status` = '1'";
            $db->query($queryPackages);
            $packages = $db->result();
            $details = json_encode($packages[0]);
            $price = $packages[0]['price'];
            $query = "INSERT INTO `subscriptions`(`package`, `details`, `role`, `user`, `amount`, `created_date`) VALUES ('".$package."','".$details."','company','".(int)$gps."',$price,'".$date."')";
            // print_r($query);exit();
            $db->query($query);
        }
    }
    url($postdata, $gps);
}
function property_aminities($value, $fieldname, $primary_key, $row, $gps)
{
    $db = GPS_db::get_instance();
    $amnty = '';
	$query = "SELECT * FROM `p_amenities` WHERE `status` = '1'";
	$db->query($query);
	$amenities = $db->result();
	if(count($amenities))
	{
	    $values = explode(',',$value);
	    foreach($amenities as $amenity)
		{
			 $amnty .= '<div class="'.strtolower($amenity['property_type']).'"><label class="gps-checkboxes-label"><input class="gps-input" data-type="checkboxes" type="checkbox" name="'.$gps->fieldname_encode($fieldname).'" maxlength="255" value="'.$amenity['sno'].'" '.(in_array($amenity['sno'],$values)?'checked':'').'>&nbsp;'.$amenity['name'].'</label></div>';
		}
	}
	return $amnty;
}

function agent_experience($value, $fieldname, $primary_key, $row, $gps)
{
    $data = array();
    if(!empty($value))
    {
        $data = explode('-',$value);
    }
    return '<div class="row">
        <div class="col-md-2">
            <div class="form-group form-inline">
                <input class="gps-input form-control w-50" type="text" data-pattern="numeric" data-type="int" value="'.(!empty($data)?((!empty($data[0]))?$data[0]:0):'0').'" name="'.$gps->fieldname_encode('agents.experienceyear').'" id="experienceyear" maxlength="2">
                <label class="" for="experienceyear">&nbsp;Years</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group form-inline">
                <input class="gps-input form-control w-50" type="text" data-pattern="numeric" data-type="int"  value="'.(!empty($data)?((!empty($data[1]))?$data[1]:0):'0').'" name="'.$gps->fieldname_encode('agents.experiencemonth').'" id="experiencemonth" maxlength="2">
                <label class="" for="experiencemonth">&nbsp;Months</label>
            </div>
        </div>
    </div>';
}
function experience($postdata, $gps)
{
    $postdata->set('experience', $postdata->get('experienceyear').'-'.$postdata->get('experiencemonth'));
    url($postdata, $gps);
}
function agent_experience_view($value, $fieldname, $primary_key, $row, $gps)
{
    $data = array();
    if(!empty($value))
    {
        $data = explode('-',$value);
    }
    return (!empty($data)?((!empty($data[0]))?$data[0]:0):'0').'y&nbsp;-&nbsp;'.(!empty($data)?((!empty($data[1]))?$data[1]:0):'0').'m';
}
function days($postdata, $gps)
{
    date_default_timezone_set("Asia/Kolkata");
    $day = date('l',strtotime($postdata->get('date')));
    $postdata->set('day',$day);
}
