<?php
function escapeString($val) {
    $t = & get_instance();
    $driver = $t->db->dbdriver;

    if( $driver == 'mysql') {
        $val = mysql_real_escape_string($val);
    } elseif($driver == 'mysqli') {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
    }

    return $val;
}
function inicompute( $array ) {
    if($array != false)
    {
        if ( is_object($array) ) {
            if ( count(get_object_vars($array)) ) {
                return count(get_object_vars($array));
            }
            return 0;
        } elseif ( is_array($array) ) {
            if ( count($array) ) {
                return count($array);
            }
            return 0;
        } elseif ( is_string($array) ) {
            return 1;
        } elseif ( is_null($array) ) {
            return 0;
        } elseif ( is_int($array) ) {
            return (int) $array;
        } else {
            return count($array);
        }
    }
    else
        return false;
}
function pluck($array, $value, $key=NULL) {
    $returnArray = array();
    if(count($array)) {
        foreach ($array as $item) {
            if($key != NULL) {
                $returnArray[$item->$key] = strtolower($value) == 'obj' ? $item : $item->$value;
            } else {
                $returnArray[] = $item->$value;
            }
        }
    }
    return $returnArray;
}
function pluck_multi_array($arrays, $val, $key = NULL) {
    $retArray = array();
    if(count($arrays)) {
        $i = 0;
        foreach ($arrays as $array) {
            if(!empty($key)) {
                if(strtolower($val) == 'obj') {
                    $retArray[$array->$key][] = $array;
                } else {
                    $retArray[$array->$key][] = $array->$val;
                }
            } else {
                if(strtolower($val) == 'obj') {
                    $retArray[$i][] = $array;
                } else {
                    $retArray[$i][] = $array->$val;
                }
                $i++;
            }
        }
    }
    return $retArray;
}
function pluck_bind($array, $value, $concatFirst, $concatLast, $key=NULL) {
    $returnArray = array();
    if(count($array)) {
        foreach ($array as $item) {
            if($key != NULL) {
                $returnArray[$item->$key] = $concatFirst.$item->$value.$concatLast;
            } else {
                if($value!=NULL) {
                    $returnArray[] = $concatFirst.$item->$value.$concatLast;
                } else {
                    $returnArray[] = $concatFirst.$item.$concatLast;
                }
            }
        }
    }
    return $returnArray;
}
function namesorting($string, $len = 14) {
    $return = $string;
    if(isset($string) && $len) {
        if(strlen($string) >  $len) {
            $return = substr($string, 0,$len-2).'..';
        } else {
            $return = $string;
        }
    }
    return $return;
}
function array_of_object($array) {
    foreach($array as $key => $object)
    {
        $return[] = (object)array('id' => $key, 'name' => $object);
    }
    return $return;
}
function count_all_results($table = NULL) {
    $return = 0;
    if($table != '')
    {
        $where = array('status' => 1);
        $res = get($table, $where);
        if($res != false)
            $return = count($res);
    }
    return $return;
}
function get($table, $where = NULL,$like = NULL,$orderby = NULL,$limit = NULL,$start = NULL) {
    $return = false;
    $t = & get_instance();
    $t->load->model('get');
    $res = $t->get->table($table, $where,$like,$orderby,$limit,$start);
    return $res;
}
function leftJoin($table1,$table2 = NULL,$where = NULL,$joinwhere,$select = '*',$like = NULL,$orderby = NULL,$limit = NULL,$start = NULL,$wherein = NULL,$find_in_set = NULL) {
	$return = false;
    $t = & get_instance();
    $t->load->model('get');
    $res = $t->get->leftJoin($table1,$table2,$where,$joinwhere,$select,$like,$orderby,$limit,$start,$wherein,$find_in_set);
    return $res;
}
function countries() {
    $countries = array(
    	"Afghanistan",
    	"Albania",
    	"Algeria",
    	"American Samoa",
    	"Andorra",
    	"Angola",
    	"Anguilla",
    	"Antarctica",
    	"Antigua and Barbuda",
    	"Argentina",
    	"Armenia",
    	"Aruba",
    	"Australia",
    	"Austria",
    	"Azerbaijan",
    	"Bahamas (the)",
    	"Bahrain",
    	"Bangladesh",
    	"Barbados",
    	"Belarus",
    	"Belgium",
    	"Belize",
    	"Benin",
    	"Bermuda",
    	"Bhutan",
    	"Bolivia (Plurinational State of)",
    	"Bonaire, Sint Eustatius and Saba",
    	"Bosnia and Herzegovina",
    	"Botswana",
    	"Bouvet Island",
    	"Brazil",
    	"British Indian Ocean Territory (the)",
    	"Brunei Darussalam",
    	"Bulgaria",
    	"Burkina Faso",
    	"Burundi",
    	"Cabo Verde",
    	"Cambodia",
    	"Cameroon",
    	"Canada",
    	"Cayman Islands (the)",
    	"Central African Republic (the)",
    	"Chad",
    	"Chile",
    	"China",
    	"Christmas Island",
    	"Cocos (Keeling) Islands (the)",
    	"Colombia",
    	"Comoros (the)",
    	"Congo (the Democratic Republic of the)",
    	"Congo (the)",
    	"Cook Islands (the)",
    	"Costa Rica",
    	"Croatia",
    	"Cuba",
    	"Curaçao",
    	"Cyprus",
    	"Czechia",
    	"Côte d'Ivoire",
    	"Denmark",
    	"Djibouti",
    	"Dominica",
    	"Dominican Republic (the)",
    	"Ecuador",
    	"Egypt",
    	"El Salvador",
    	"Equatorial Guinea",
    	"Eritrea",
    	"Estonia",
    	"Eswatini",
    	"Ethiopia",
    	"Falkland Islands (the) [Malvinas]",
    	"Faroe Islands (the)",
    	"Fiji",
    	"Finland",
    	"France",
    	"French Guiana",
    	"French Polynesia",
    	"French Southern Territories (the)",
    	"Gabon",
    	"Gambia (the)",
    	"Georgia",
    	"Germany",
    	"Ghana",
    	"Gibraltar",
    	"Greece",
    	"Greenland",
    	"Grenada",
    	"Guadeloupe",
    	"Guam",
    	"Guatemala",
    	"Guernsey",
    	"Guinea",
    	"Guinea-Bissau",
    	"Guyana",
    	"Haiti",
    	"Heard Island and McDonald Islands",
    	"Holy See (the)",
    	"Honduras",
    	"Hong Kong",
    	"Hungary",
    	"Iceland",
    	"India",
    	"Indonesia",
    	"Iran (Islamic Republic of)",
    	"Iraq",
    	"Ireland",
    	"Isle of Man",
    	"Israel",
    	"Italy",
    	"Jamaica",
    	"Japan",
    	"Jersey",
    	"Jordan",
    	"Kazakhstan",
    	"Kenya",
    	"Kiribati",
    	"Korea (the Democratic People's Republic of)",
    	"Korea (the Republic of)",
    	"Kuwait",
    	"Kyrgyzstan",
    	"Lao People's Democratic Republic (the)",
    	"Latvia",
    	"Lebanon",
    	"Lesotho",
    	"Liberia",
    	"Libya",
    	"Liechtenstein",
    	"Lithuania",
    	"Luxembourg",
    	"Macao",
    	"Madagascar",
    	"Malawi",
    	"Malaysia",
    	"Maldives",
    	"Mali",
    	"Malta",
    	"Marshall Islands (the)",
    	"Martinique",
    	"Mauritania",
    	"Mauritius",
    	"Mayotte",
    	"Mexico",
    	"Micronesia (Federated States of)",
    	"Moldova (the Republic of)",
    	"Monaco",
    	"Mongolia",
    	"Montenegro",
    	"Montserrat",
    	"Morocco",
    	"Mozambique",
    	"Myanmar",
    	"Namibia",
    	"Nauru",
    	"Nepal",
    	"Netherlands (the)",
    	"New Caledonia",
    	"New Zealand",
    	"Nicaragua",
    	"Niger (the)",
    	"Nigeria",
    	"Niue",
    	"Norfolk Island",
    	"Northern Mariana Islands (the)",
    	"Norway",
    	"Oman",
    	"Pakistan",
    	"Palau",
    	"Palestine, State of",
    	"Panama",
    	"Papua New Guinea",
    	"Paraguay",
    	"Peru",
    	"Philippines (the)",
    	"Pitcairn",
    	"Poland",
    	"Portugal",
    	"Puerto Rico",
    	"Qatar",
    	"Republic of North Macedonia",
    	"Romania",
    	"Russian Federation (the)",
    	"Rwanda",
    	"Réunion",
    	"Saint Barthélemy",
    	"Saint Helena, Ascension and Tristan da Cunha",
    	"Saint Kitts and Nevis",
    	"Saint Lucia",
    	"Saint Martin (French part)",
    	"Saint Pierre and Miquelon",
    	"Saint Vincent and the Grenadines",
    	"Samoa",
    	"San Marino",
    	"Sao Tome and Principe",
    	"Saudi Arabia",
    	"Senegal",
    	"Serbia",
    	"Seychelles",
    	"Sierra Leone",
    	"Singapore",
    	"Sint Maarten (Dutch part)",
    	"Slovakia",
    	"Slovenia",
    	"Solomon Islands",
    	"Somalia",
    	"South Africa",
    	"South Georgia and the South Sandwich Islands",
    	"South Sudan",
    	"Spain",
    	"Sri Lanka",
    	"Sudan (the)",
    	"Suriname",
    	"Svalbard and Jan Mayen",
    	"Sweden",
    	"Switzerland",
    	"Syrian Arab Republic",
    	"Taiwan",
    	"Tajikistan",
    	"Tanzania, United Republic of",
    	"Thailand",
    	"Timor-Leste",
    	"Togo",
    	"Tokelau",
    	"Tonga",
    	"Trinidad and Tobago",
    	"Tunisia",
    	"Turkey",
    	"Turkmenistan",
    	"Turks and Caicos Islands (the)",
    	"Tuvalu",
    	"Uganda",
    	"Ukraine",
    	"United Arab Emirates (the)",
    	"United Kingdom of Great Britain and Northern Ireland (the)",
    	"United States Minor Outlying Islands (the)",
    	"United States of America (the)",
    	"Uruguay",
    	"Uzbekistan",
    	"Vanuatu",
    	"Venezuela (Bolivarian Republic of)",
    	"Viet Nam",
    	"Virgin Islands (British)",
    	"Virgin Islands (U.S.)",
    	"Wallis and Futuna",
    	"Western Sahara",
    	"Yemen",
    	"Zambia",
    	"Zimbabwe",
    	"Åland Islands"
    );
    return $countries;
}
function sendmail($title = null, $from = null, $to = null, $subject = null, $body = null )
{
    $t = & get_instance();
    $t->load->library('email');
    $t->email->set_mailtype("html");
    if (!empty($to)) {
        $emailsetting = get('emailsetting');
        if($emailsetting != false)
        {
            $emailsetting = pluck($emailsetting,'value','fieldoption');
            $emailsetting = (object)$emailsetting;
            if ( $emailsetting->email_engine == 'smtp' ) {
                $config = [
                    'protocol'    => 'smtp',
                    'smtp_host'   => $emailsetting->smtp_server,
                    'smtp_port'   => $emailsetting->smtp_port,
                    'smtp_user'   => $emailsetting->smtp_username,
                    'smtp_pass'   => $emailsetting->smtp_password,
                    'smtp_crypto' => $emailsetting->smtp_security,
                    'mailtype'    => 'html',
                    'charset'     => 'utf-8'
                ];
                $t->email->initialize($config);
                $t->email->set_newline("\r\n");
            }
            $t->email->from($from, $title);
            $t->email->to($to);
            $t->email->subject($subject);
            $t->email->message($body);
            if ($t->email->send())
                return true;
            else
                return $t->email->print_debugger();
        }
    }
}
function time_elapsed_string($datetime) {
    $pdate = date("Y-m-d H:i:s");
    $first_date  = new DateTime($datetime);
    $second_date = new DateTime($pdate);
    $difference  = $first_date->diff($second_date);
    if ( $difference->y >= 1 ) {
        $format = 'Y-m-d H:i:s';
        $date   = DateTime::createFromFormat($format, $datetime);
        return $date->format('M d Y');
    } elseif ( $difference->m == 1 && $difference->m != 0 ) {
        return $difference->m . " month ago";
    } elseif ( $difference->m <= 12 && $difference->m != 0 ) {
        return $difference->m . " months ago";
    } elseif ( $difference->d == 1 && $difference->d != 0 ) {
        return "Yesterday";
    } elseif ( $difference->d <= 31 && $difference->d != 0 ) {
        return $difference->d . " days ago";
    } else {
        if ( $difference->h == 1 && $difference->h != 0 ) {
            return $difference->h . " hr ago";
        } else {
            if ( $difference->h <= 24 && $difference->h != 0 ) {
                return $difference->h . " hrs ago";
            } elseif ( $difference->i <= 60 && $difference->i != 0 ) {
                return $difference->i . " mins ago";
            } elseif ( $difference->s <= 10 ) {
                return "Just Now";
            } elseif ( $difference->s <= 60 && $difference->s != 0 ) {
                return $difference->s . " sec ago";
            }
        }
    }
}
function captcha(){
    $t = & get_instance();
    $t->load->helper('captcha');
    $config = array(
        'img_path'      => 'uploads/captcha_images/',
        'img_url'       => base_url('uploads/captcha_images/'),
        'font_path'     => 'system/fonts/texb.ttf',
        'img_width'     => '200',
        'img_height'    => 42,
        'word_length'   => 6,
        'font_size'     => 18,
        'colors'        => array(
           'background'     => array(168, 168, 249),
           'border'         => array(168, 168, 249),
           'text'           => array(0, 0, 0),
           'grid'           => array(0, 0, 255)
        )
    );
    $captcha = create_captcha($config);
    return $captcha;
}
function resize($file,$w=714,$h=420) {
    $t = & get_instance();
	$t->load->library('image_lib');
    $config['image_library'] = 'gd2';
    $config['source_image']='uploads/'.$file;
    $config['create_thumb']=FALSE;
    $config['maintain_ratio']=TRUE;
    $config['width']=$w;
    $config['height']=$h;
	$config['new_image'] = 'uploads/small/'.$file;
	$t->image_lib->clear();
    $t->image_lib->initialize($config);
    $t->image_lib->resize();
} 
function upload_files($title, $files, $type = NULL)
{
    $t = & get_instance();
    $config = array(
        'upload_path' => 'uploads/',
        'max_size' => 1024*20,
        'overwrite' => 0,                       
    );
    if($type != NULL)
        $config['allowed_types'] = $type;
    else
        $config['allowed_types'] = 'jpg|jpeg|png|JPEG|PNG|webp|WEBP';
    $t->load->library('upload', $config);
    $images = array();
    if(is_array($files['name']))
    {
        foreach ($files['name'] as $key => $image) {
            if(!empty($files['name'][$key]))
            {
                $_FILES['images[]']['name']= $files['name'][$key];
                $_FILES['images[]']['type']= $files['type'][$key];
                $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['images[]']['error']= $files['error'][$key];
                $_FILES['images[]']['size']= $files['size'][$key];
                $temp = explode(".", $image);
                $fileName = $title .'_'. uniqid(). rand(99, 9999). round(microtime(true)) . '.' . end($temp);
                $config['file_name'] = $fileName;
                $t->upload->initialize($config);
                if ($t->upload->do_upload('images[]')) {
                    $upload_data = $t->upload->data();
                    $images[] = $upload_data['file_name'];
                } else {
                    return false;
                }
            }
            else
                $images[] = '';
        }
    }
    else
    {
        $_FILES['images[]']['name']= $files['name'];
        $_FILES['images[]']['type']= $files['type'];
        $_FILES['images[]']['tmp_name']= $files['tmp_name'];
        $_FILES['images[]']['error']= $files['error'];
        $_FILES['images[]']['size']= $files['size'];
        $temp = explode(".", $files['name']);
        $fileName = $title .'_'. uniqid(). rand(99, 9999). round(microtime(true)) . '.' . end($temp);
        $config['file_name'] = $fileName;
        $t->upload->initialize($config);
        if ($t->upload->do_upload('images[]')) {
            $upload_data = $t->upload->data();
            $images[] = $upload_data['file_name'];
        } else {
            return false;
        }
    }
    return $images;
}
function dateRange($first, $last, $step = '+1 day', $format = 'Y-m-d') {
    $dates = [];
    $current = strtotime( $first );
    $last = strtotime( $last );
    while( $current <= $last ) {
        $dates[] = date( $format, $current );
        $current = strtotime( $step, $current );
    }
    return $dates;
}
function currency() {
    return '$';
}
function browser($browser) {
    if($browser != NULL) {
        switch ($browser) {
            case 'Google Chrome':
                return base_url('app-assets/images/icons/google-chrome.png');
                break;
            case 'Mozilla Firefox':
                return base_url('app-assets/images/icons/mozila-firefox.png');
                break;
            case 'Apple Safari':
                return base_url('app-assets/images/icons/apple-safari.png');
                break;
            case 'Internet Explorer':
                return base_url('app-assets/images/icons/internet-explorer.png');
                break;
            case 'Opera':
                return base_url('app-assets/images/icons/opera.png');
                break;
            default:
                return base_url('app-assets/images/icons/internet.png');
        }
    } else {
        return base_url('app-assets/images/icons/internet.png');
    }
}
function location($ipaddress) {
    $apiURL = 'https://freegeoip.app/json/'.$ipaddress;
    $ch = curl_init($apiURL); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    $apiResponse = curl_exec($ch); 
    if($apiResponse === FALSE) { 
        $msg = curl_error($ch); 
        curl_close($ch); 
        return ''; 
    } 
    curl_close($ch); 
    $ipData = json_decode($apiResponse, true);
    return !empty($ipData)?$ipData['region_name'].'('.$ipData['country_name'].')':''; 
}
function person($imageUrl)
{
	if($imageUrl != NULL) {
    	if(file_exists(FCPATH.'uploads/'.$imageUrl)) {
    		return base_url('uploads/'.$imageUrl);
    	} else {
    		return base_url('uploads/300x300.png');
    	}
    } else {
        return base_url('uploads/300x300.png');
    }
}
function profilepic($imageUrl)
{
	if($imageUrl != NULL) {
	    if(file_exists(FCPATH.'uploads/small/'.$imageUrl)) {
			return base_url('uploads/small/'.$imageUrl);
		}
		elseif(file_exists(FCPATH.'uploads/'.$imageUrl)) {
			return base_url('uploads/'.$imageUrl);
		} else {
			return base_url('uploads/small/300x300.png');
		}
    } else {
        return base_url('uploads/small/300x300.png');
    }
}
function pic($imageUrl)
{
	if($imageUrl != NULL) {
		if(file_exists(FCPATH.'uploads/'.$imageUrl)) {
			return base_url('uploads/'.$imageUrl);
		} else {
			return base_url('uploads/no-image.jpeg');
		}
    } else {
        return base_url('uploads/no-image.jpeg');
    }
}
function today_to_lastweek() {
    $date = new DateTime(date('Y-m-d', strtotime('-7 days')));
    for($days = 7; $days--;) { 
        $day[] = $date->modify('+1 days')->format('d');
    }
    return $day;
}
function months($m = 'M') {
    for($i = 1; $i <= date('m'); $i++) { 
        $month[] = date($m, strtotime(date('Y-'.$i.'-01')));
    }
    return $month;
}
function pagination($base_url, $total_rows, $per_page = '12', $uri_segment = '3') {
    $t = & get_instance();
    $config = array();
    $config["base_url"] = $base_url;
    $config["total_rows"] = $total_rows;
    $config["per_page"] = $per_page;
    $config["uri_segment"] = $uri_segment;
    $config["full_tag_open"] = '<ul class="pagination rounded-active justify-content-center mb-0">';
    $config["full_tag_close"] = '</ul>';
    $config["first_tag_open"] = '<li class="page-item">';
    $config["first_tag_close"] = '</li>';
    $config["first_url"] = '';
    $config["first_link"] = '<i class="far fa-angle-double-left"></i>';
    $config["last_tag_open"] = '<li class="page-item">';
    $config["last_tag_close"] = '</li>';
    $config["last_link"] = '<i class="far fa-angle-double-right"></i>';
    $config["next_link"] = '<i class="far fa-angle-right"></i>';
    $config["prev_link"] = '<i class="far fa-angle-left"></i>';
    $config["prev_tag_open"] = '<li class="page-item">';
    $config["prev_tag_close"] = '</li>';
    $config["next_tag_open"] = '<li class="page-item">';
    $config["next_tag_close"] = '</li>';
    $config["cur_tag_open"] = '<li class="page-item active"><a class="page-link" href="javascript:void(0);">';
    $config["cur_tag_close"] = '</a></li>';
    $config["num_tag_open"] = '<li class="page-item">';
    $config["num_tag_close"] = '</li>';
    $config['attributes'] = array('class' => 'page-link');
    $config['reuse_query_string'] = true;
    $t->load->library('pagination');
    $t->pagination->initialize($config);
    return $t->pagination->create_links();
}
function remove_http($url) {
   $disallowed = array('http://', 'https://', 'www.');
   foreach($disallowed as $d) {
      if(strpos($url, $d) === 0) {
         return str_replace($d, '', $url);
      }
   }
   return $url;
}
function encode($id) {
    $id_str = (string) $id;
    $offset = rand(0, 9);
    $encoded = chr(79 + $offset);
    for ($i = 0, $len = strlen($id_str); $i < $len; ++$i) {
        $encoded .= chr(65 + $id_str[$i] + $offset);
    }
    return strtolower($encoded);
}
function decode($encoded) {
    $encoded = strtoupper($encoded);
    $offset = ord($encoded[0]) - 79;
    $encoded = substr($encoded, 1);
    for ($i = 0, $len = strlen($encoded); $i < $len; ++$i) {
        $encoded[$i] = ord($encoded[$i]) - $offset - 65;
    }
    return (int) $encoded;
}
function curl_get($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    return $result;
}
function lnglat() {
    return array('172.77', '-42.1');
}
function db_query() {
    $t = & get_instance();
    // print_r($t->db->last_query());
}
function cmp($a, $b) {
  return $a->properties < $b->properties;
}



function login_status() {
    return array('pending' => 'Pending', 'approve' => 'Approve', 'reject' => 'Reject');
}
function properties($getWhere = null, $whereIn = null, $limit = null) {
    $data = '';
    $t = & get_instance();
    $where = array('p.property_status' => 'Available', 'p.status' => 1, 'g.type' => 'thumbnail', 'g.status' => 1);
    if($getWhere != null)
    {
        foreach($getWhere as $key => $value)
        {
            $where[$key] = $value;
        }
    }
    $order_by = array('p.created_date' => 'DESC');
    $joinwhere = 'p.sno = g.property';
    $select = 'p.*,p.type as ptype,g.images,g.type';
    $properties = leftJoin('properties as p', 'p_gallery as g', $where, $joinwhere, $select, '', $order_by, $limit, '', $whereIn);
    if($properties != false)
    {
        $options = json_decode('{"slidesToShow": 4, "autoplay":true,"dots":true,"responsive":[{"breakpoint": 1600,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":2,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}');
        $data = '<div class="'.(($whereIn)?'row':'slick-slider slick-dots-mt-0 custom-arrow-spacing-30').'" data-slick-options='.json_encode($options).'>';
        foreach($properties as $property)
        {
            $user = user($property->role, $property->agent);
            if($user)
            {
                $others = ($property->other != '')?json_decode($property->other):false;
                $wishlist = ($logged = $t->session->userdata('logged_in'))?get('wishlist', array('property' => $property->sno, 'role' => $logged['role'], 'user' => $logged['id'], 'status' => 1)):false;
                $data .= '<div class="'.(($whereIn)?'favorite col-md-4 col-xxl-3 mb-6':'box pb-7 pt-2').'">
                    <div class="card shadow-hover-'.(($whereIn)?'1':'2').'" data-animate="zoomIn">
                        <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top" style="max-height: '.(($whereIn)?'195px':'216px').';min-height: '.(($whereIn)?'195px':'216px').';overflow: hidden;">
                          <img src="'.base_url('uploads/small/'.$property->images).'" alt="'.ucwords(strtolower($property->title)).'">
                          <div class="card-img-overlay p-2 d-flex flex-column">
                            <div>';
                            if(!empty($where['p.featured']) && $where['p.featured'] == 1)
                            {
                                $data .= '<span class="badge mr-2 badge-indigo">Featured</span>';
                            }
                            else if(!empty($where['p.premium']) && $where['p.premium'] == 1)
                            {
                                $data .= '<span class="badge mr-2 badge-orange">Premium</span>';
                            }
                            else if(($property->featured == 1) || ($property->premium == 1))
                            {
                              $data .= '<span class="badge mr-2 badge-'.(($property->premium == 1)?"orange":(($property->featured == 1)?"indigo":"")).'">'.(($property->premium == 1)?"Premium":(($property->featured == 1)?"Featured":"")).'</span>';
                            }
                        $data .= '</div>
                
                				<ul class="list-inline mb-0 mt-auto hover-image">';
                                if(isset($logged) && (($logged['role'] == 'landlord') || ($logged['role'] == 'agents') || ($logged['role'] == 'company')))
                                    $data .= '<li class="list-inline-item h-40">&nbsp;</li>';
                                elseif(isset($logged) && ($property->agent == $logged['id']) && ($property->role == $logged['role']))
                                    $data .= '<li class="list-inline-item h-40">&nbsp;</li>';
                                else
                				    $data .= '<li class="list-inline-item mr-2" data-toggle="tooltip" title="Wishlist" data-placement="right">
                                            <a href="javascript:void(0);" id="'.$property->accesskey.'" class="wishlist text-white hover-primary '.($wishlist?'text-secondary border-accent':'text-body hover-secondary border-hover-accent').'"><i class="fa'.($wishlist?'s':'r').' fa-heart"></i></a>
                    					</li>';
                    				 $data .=  '</ul>
                          </div>
                        </div>
                        
                		<div class="card-body pt-3" style="padding: 0.5rem !important;">
                            <table id="property-card">
                                <tr>
                                    <td>
                                        <p class="text-ellipsis m-0">
                                            <span class="text-heading"><strong>'.((($property->ptype == 'commercial') && ($property->negotiation == '1'))?'Price by Negotiable':currency().$property->price).'</strong></span>
                                            <span class="fs-12 font-weight-500 text-gray-light">'.((($property->negotiation == '0') && ($property->duration != ''))?'/ '.$property->duration:'').((($property->ptype === 'commercial') && ($property->negotiation == '0') && ($others != false))?(($others->gst == 'plusgst')?' plus GST':' incl GST').(((!empty($others->outgoings))&&($others->outgoings == 'plusout'))?' plus Outgoings':' incl Outgoings'):'').'</span>
                            		    </p>
                            		    <p class="font-weight-500 text-gray-light mb-0">
                            		        <a href="'.base_url('properties/single/'.$property->accesskey).'" target="_blank" class="text-dark hover-primary text-ellipsis" data-toggle="tooltip" title="'.property_name_replace($property->address).'">'.property_name_replace($property->address).'</a>
                            		    </p>
                            		  	<ul class="list-inline d-flex mb-0 flex-wrap mr-n5">';
                            		  	    if((($property->ptype === 'commercial') && (!empty($property->floor_area))) || (($property->ptype === 'residential') && (!empty($property->bedrooms))))
                            		  	    {
                                    		    $data .= '<li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="'.(($property->ptype === 'commercial')?' Floor Area':$property->bedrooms.' Bedrooms').'"><svg class="icon icon-'.(($property->ptype === 'commercial')?'square':'bedroom').' fs-18 text-primary mr-1"><use xlink:href="#icon-'.(($property->ptype === 'commercial')?'square':'bedroom').'"></use></svg>'.(($property->ptype === 'commercial')?$property->floor_area.' m<sup>2</sup>':$property->bedrooms).'</li>';
                                			} if((($property->ptype === 'commercial') && (!empty($property->sqft))) || (($property->ptype === 'residential') && (!empty($property->bathrooms))))
                                			{
                                			    $data .= '<li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="'.(($property->ptype === 'commercial')?'Land Area':$property->bathrooms.' Bathrooms').'"><svg class="icon icon-'.(($property->ptype === 'commercial')?'price':'shower').' fs-18 text-primary mr-1"><use xlink:href="#icon-'.(($property->ptype === 'commercial')?'price':'shower').'"></use></svg>'.(($property->ptype === 'commercial')?$property->sqft.' m<sup>2</sup>':$property->bathrooms).'</li>';
                                			} if(!empty($property->parkings) || !empty($property->carport) || !empty($property->offshoreparking))
                                			{
                                    		    $data .= '<li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="'.((int)$property->parkings + (int)$property->carport + (int)$property->offshoreparking).' Carpark"><i class="fal fa-car fs-18 text-primary mr-1"></i>'.((int)$property->parkings + (int)$property->carport + (int)$property->offshoreparking).'</li>';
                                			}
                                    	$data .= '</ul>
                                    </td>
                                    <td style="text-align: right;">
                            			<a href="#" class="w-72px h-72 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="" style="vertical-align: bottom;">
                            			    <img src="'.profilepic(($user != false)?$user[0]->img:'300x300.png').'" data-toggle="tooltip" data-placement="left" title="'.(($user != false)?$user[0]->name:'').'" alt="'.(($user != false)?$user[0]->name:'').'" style="vertical-align: text-top;border-radius:50%;width: 100%;height: 100%;" />
                            			</a>        
                                    </td>
                                </tr>
                            </table>
                		</div>';
            		if(($property->role == 'agents') && $user != false && ($user[0]->company != 0))
        	        {
        	            $company = user('company', $user[0]->company);
        	            if($company != false)
        	            {
                            $data .= '<div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3" style="padding: 6px !important; background-color: '.$company[0]->bgcolor.' !important;">
                            		    <a href="'.base_url('agency/'.strtolower(str_replace(' ','-',urlencode($company[0]->name)))).'"><img src="'.companypic($company[0]->img).'" data-toggle="tooltip" title="'.$company[0]->name.'" alt="'.$company[0]->name.'" style="width: auto;height:31px;" /></a>
                            		</div>';
        	            }
        	        }
        	        else{
                        $data .= '<div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3" style="padding: 6px !important; background-color: #ccc !important;">
                        		    <a href="#"><h5 style="margin-bottom: 0px;padding: 3.3px;color: #666;" data-toggle="tooltip" title="'.(($user != false)?$user[0]->name:'').'" alt="'.(($user != false)?$user[0]->name:'').'" >Private Listing</h5></a>
                        		</div>';
        	        }
                $data .= ' </div>
                </div>';
            }
        }
        $data .= '</div>';
    }
    return $data;
}
function slide_properties($getWhere = null, $whereIn = null, $limit = null) {
    $data = '';
    $t = & get_instance();
    $logged = $t->session->userdata('logged_in');
    $where = array('p.property_status' => 'Available', 'p.status' => 1, 'g.type' => 'thumbnail', 'g.status' => 1);
    if($getWhere != null)
    {
        foreach($getWhere as $key => $value)
        {
            $where[$key] = $value;
        }
    }
    $order_by = array('p.created_date' => 'DESC');
    $joinwhere = 'p.sno = g.property';
    $select = 'p.*,p.type as ptype,g.images,g.type';
    $properties = leftJoin('properties as p', 'p_gallery as g', $where, $joinwhere, $select, '', $order_by, $limit, '', $whereIn);
    if($properties != false)
    {
        $options = json_decode('{"slidesToShow": 1, "autoplay":true}');
        $data = '<div class="card property-widget mb-5"><div class="card-body px-6 pt-5 pb-6"><h4 class="card-title fs-16 lh-2 text-dark mb-3">'.((($getWhere != null) && array_key_exists('premium',$getWhere))?'Premium':((($getWhere != null) && array_key_exists('featured',$getWhere))?'Featured':'')).' Listings</h4><div class="slick-slider mx-0" data-slick-options='.json_encode($options).'>';
        foreach($properties as $property)
        {
            
            $user = user($property->role, $property->agent);
            if($user)
            {
                $others = ($property->other != '')?json_decode($property->other):false;
                $data .= '<div class="box px-0">
            		    <div class="card border-0" style="max-height: 179px;overflow: hidden;">
            			    <img src="'.base_url('uploads/small/'.$property->images).'" class="card-img" alt="'.ucwords(strtolower($property->title)).'">
            				    <div class="card-img-overlay d-flex flex-column bg-gradient-3 rounded-lg">
            				        <div class="d-flex mb-auto">';
            			if(!empty($where['featured']) && $where['featured'] == 1)
                        {
                            $data .= '<span class="badge mr-1 badge-indigo">Featured</span>';
                        }
                        else if(!empty($where['premium']) && $where['premium'] == 1)
                        {
                            $data .= '<span class="badge mr-1 badge-orange">Premium</span>';
                        }
            		    else if(($property->featured == 1) || ($property->premium == 1))
                        {
            			    $data .= '<span class="mr-1 badge badge-'.(($property->featured != 1)?"orange":"indigo").'">'.(($property->featured != 1)?"Premium":"Featured").'</span>';
                        }
                $data .= '</div><div class="px-2 pb-2">
            		                <a href="'.base_url('properties/single/'.$property->accesskey).'" target="_blank" class="text-white"><h5 class="card-title fs-16 lh-2 mb-0 text-ellipsis">'.ucwords(strtolower($property->title)).'</h5></a>
            			            <p class="card-text text-gray-light mb-0 font-weight-500 text-ellipsis">'.property_name_replace($property->address).'</p>
            			            <p class="text-white mb-0"><span class="fs-16 font-weight-bold">'.((($property->ptype == 'commercial') && ($property->negotiation == '1'))?'Price by Negotiable':currency().$property->price).' </span><span class="fs-12 font-weight-500 text-gray-light">'.((($property->negotiation == '0') && ($property->duration != ''))?'/ '.$property->duration:'').((($property->ptype === 'commercial') && ($property->negotiation == '0') && ($others != false))?(($others->gst == 'plusgst')?' plus GST':' incl GST').(((!empty($others->outgoings))&&($others->outgoings == 'plusout'))?' plus Outgoings':' incl Outgoings'):'').'</span></p>
            			        </div>
            				</div>
            			</div>
            		</div>';
            }
        }
        $data .= '</div></div></div>';
    }
    return $data;
}
function property_details($getWhere = null, $whereIn = null) {
    $data = '';
    $t = & get_instance();
    $where = array('p.status' => 1, 'g.type' => 'thumbnail', 'g.status' => 1);
    if($getWhere != null)
    {
        foreach($getWhere as $key => $value)
        {
            $where[$key] = $value;
        }
    }
    $order_by = array('p.created_date' => 'DESC');
    $joinwhere = 'p.sno = g.property';
    $select = 'p.*,p.type as ptype,g.images,g.type';
    $properties = leftJoin('properties as p', 'p_gallery as g', $where, $joinwhere, $select, '', $order_by, '', '', $whereIn);
    return $properties;
}
function user($role = NULL, $id = NULL) {
    if($role != NULL)
    {
        $status = 1;
        $table = 'customers';
    	if($role == 'user')
    		$table = 'customers';
    	if($role == 'landlord')
    		$table = 'landlords';
    	if($role == 'agents')
    		$table = 'agents';
    	if($role == 'company')
    	    $table = 'companies';
    	if($id != NULL)
    	{
        	if($role == 'agents')
        	{
        	   // $user = leftJoin('agents as a','companies as c',array('a.sno' => $id, 'a.company !=' => '0', 'a.status' => $status, 'c.status' => $status),'a.company = c.sno','a.*');
                $agent = get($table, array('sno' => $id, 'status' => $status));
        	    if(!empty($agent) && ($agent != false) && ($agent[0]->company != '0'))
        	    {
        	        if(!empty($agent[0]->company) && ($agent[0]->company != '0'))
        	        {
        	            if(get('companies', array('sno' => $agent[0]->company, 'status' => $status)))
        	                $user = $agent;
        	            else
        	                $user = false;
        	        }
        	    }
        	    else
        	        $user = $agent;
        	}
        	else
    	        $user = get($table, array('sno' => $id, 'status' => $status));
    	}
    	else
    	{
        	if($role == 'agents')
        	{
        	   // $user = leftJoin('agents as a','companies as c',array('a.status' => $status, 'a.company !=' => '0', 'c.status' => $status),'a.company = c.sno','a.*');
        	   $user = get($table, array('status' => $status));
        	}
        	else
    	        $user = get($table, array('status' => $status));
    	}
    	return $user;
    }
    return false;
}
function me() {
    $t = & get_instance();
    $logged = $t->session->userdata('logged_in');
    if($logged && ($role = $logged['role']))
    {
        $table = 'customers';
    	if($role == 'user')
    		$table = 'customers';
    	if($role == 'landlord')
    		$table = 'landlords';
    	if($role == 'agents')
    		$table = 'agents';
    	if($role == 'company')
    	    $table = 'companies';
    	$id = $logged['id'];
    	$me = get($table, array('sno' => $id, 'status' => 1));
    	return $me;
    }
    return false;
}
function companypic($imageUrl)
{
	if($imageUrl != NULL) {
	    if(file_exists(FCPATH.'uploads/small/'.$imageUrl)) {
			return base_url('uploads/small/'.$imageUrl);
		}
		elseif(file_exists(FCPATH.'uploads/'.$imageUrl)) {
			return base_url('uploads/'.$imageUrl);
		} else {
			return base_url('uploads/small/no-image.jpeg');
		}
    } else {
        return base_url('uploads/small/no-image.jpeg');
    }
}
function propertyid($accesskey)
{
    $property = get('properties', array('accesskey' => $accesskey));
    if($property != false)
        return $property[0]->sno;
    else
        return 0;
}
function languages()
{
    // return array('1' => 'English', '2' => 'NZ Sign Language', '3' => 'Māori', '4' => 'Samoan', '5' => 'Spanish');
    $data = array();
    if($languages = get('languages',array('status' => 1)))
    {
        foreach($languages as $lang)
        {
            $data[$lang->sno] = $lang->language;
        }
    }
    return $data;
}
function addons()
{
    return array('featured' => (object)array('name' => 'Featured','description' => 'Description about featured property listing advantages. This line of text is meant to be treated as fine print.', 'del_price' => '45', 'price' => '25', 'color' => 'indigo'), 'premium' => (object)array('name' => 'Premium','description' => 'Description about featured property listing advantages. This line of text is meant to be treated as fine print.', 'del_price' => '85', 'price' => '45', 'color' => 'orange'), 'boost' => (object)array('name' => 'Boost in Social Media','description' => 'Description about featured property listing advantages. This line of text is meant to be treated as fine print.', 'del_price' => '115', 'price' => '95', 'color' => 'success'));
}
function prop() {
    $t = & get_instance();
    $logged = $t->session->userdata('logged_in');
    if($logged && ($role = $logged['role']))
    {
	    if($logged['role'] == 'company')
	        $prop = 0;
	    if($logged['role'] == 'landlord')
	        $prop = 55;
	    if($logged['role'] == 'agents')
	        $prop = 35;
    }
    else
        $prop = 1000;
    return $prop;
}
function prop_cutoff() {
    $t = & get_instance();
    $logged = $t->session->userdata('logged_in');
    if($logged && ($role = $logged['role']))
    {
	    if($logged['role'] == 'company')
	        $prop = 0;
	    if($logged['role'] == 'landlord')
	        $prop = 75;
	    if($logged['role'] == 'agents')
	        $prop = 55;
    }
    else
        $prop = 0;
    return $prop;
}
function property_type() {
    $property_category = get('property_category', array('status' => 1));
    if($property_category != false)
    {
        return array(
            'residential' => pluck_multi_array($property_category,'value','type')['residential'],
            'commercial' => pluck_multi_array($property_category,'value','type')['commercial']
        );
    }
    else
    {
        return array(
            'residential' => array('Apartment','House','Villa','Unit','Holiday Rental','Lifestyle Property','Rooms','Studio','Townhouse','Others'),
            'commercial' => array('Farm','Industrial','Land/Section','Motel/Hotel','Office','Parking Space','Retail','Showroom','Warehouse','Others')
        );
    }
}
function property_search_tab() {
    $t = & get_instance();
    $where = array('status' => 1);
    $order_by = array('name' => 'ASC');
    $data['amenities'] = get('p_amenities', $where, '', $order_by);
    $order_by = array('region_name' => 'ASC');
    $data['regions'] = get('regions', $where, '', $order_by);
    $order_by = array('district' => 'ASC');
    if(isset($_GET['region']) && $_GET['region'] !== '')
        $where = array('region' => $_GET['region'], 'status' => 1);
    $data['districts'] = get('districts', $where, '', $order_by);
    $order_by = array('suburb' => 'ASC');
    if(isset($_GET['district']) && $_GET['district'] !== '')
        $where = array('district' => $_GET['district'], 'status' => 1);
    $data['suburbs'] = get('suburbs', $where, '', $order_by);
    $data['property_type'] = property_type();
    $data['addons'] = addons();
    $t->load->view('property-search-tab',$data);
}
function property_name_replace($name = NULL) {
    return rtrim(str_replace(array('New Zealand','new zealand',', New Zealand',',New Zealand',', new zealand',',new zealand'),'',$name),', ');
}
function paragraph($str = NULL){
    $str = ucfirst(strtolower($str));
    preg_match_all("/\.\s*\w/", $str, $matches); 
    foreach($matches[0] as $match){ 
        $str = str_replace($match, strtoupper($match), $str); 
    }
    return $str;
}
function first_ltr_upper($str = NULL){
    preg_match_all("/\.\s*\w/", $str, $matches); 
    foreach($matches[0] as $match){ 
        $str = str_replace($match, strtoupper($match), $str); 
    }
    return ucwords(strtolower($str));
}
function packageCheck($role, $user)
{
    return get('subscriptions', array('role' => $role, 'user' => $user, 'status' => '1'),'','sno','1');
}
function terms()
{
    return get('terms', array('status' => 1));
}
function privacy()
{
    return get('privacy', array('status' => 1));
}
function promotional()
{
    return get('promotional', array('status' => 1));
}
function promotional_price($created_date,$amount)
{
    if(!empty($promotional = promotional()))
    {
        $package_end_date = strtotime(date('Y-m-d', strtotime($created_date. ' + '.$promotional[0]->duration.' months')));
        $price = (((strtotime(date('Y-m-d', strtotime($created_date))) >= (strtotime($promotional[0]->start_date))) && ($package_end_date <= (strtotime($promotional[0]->end_date))) && ($package_end_date >= strtotime(date('Y-m-d'))))?0:$amount);
    }
    else
        $price = $amount;
    return $price;
}