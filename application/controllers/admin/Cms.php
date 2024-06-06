<?php defined('BASEPATH') OR exit('No direct script access allowed');
use APPPATH\third_party\phantomjs\src\JonnyW\PhantomJs\Client;
class Cms extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->library('Site');
		$this->site->maintenance();
		$this->load->library('Auth_user');
		$this->auth_user->checkLogin();
		$this->load->model('adminpanel');
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
    	$data['userdata']=$this->auth_user->checkLogin();
        $table = str_replace('-','_',$this->uri->segment(3));
	    if($data['userdata'][0]->role != 'superadmin')
	    {
    	    $per = $this->auth_user->permissions($data['userdata'][0]->permissions,$table);
    	    if($per)
    	    {
                $data['site']=$this->site->settings();
        		$data['tables']=$this->adminpanel->tables();
                $data['ct']=$this->adminpanel->createtable();
        		if(!empty($table))
        		{
        			$getdata = $this->adminpanel->gettable($table);
        			if($getdata[0]->cttitle != 'empty')
        				$data['title'] = ucfirst($getdata[0]->cttitle);
        			else
        				$data['title']="Page Not Found";
        		}
        		else
        			$data['title']="Page Not Found";
        		$this->load->view(ADMIN . 'include/header',$data);
    	    }
    	    else
    	    {
    	        redirect(admin_url('home'));
    	    }
	    }
	    else
	    {
	        $data['site']=$this->site->settings();
        	$data['tables']=$this->adminpanel->tables();
            $data['ct']=$this->adminpanel->createtable();
        	if(!empty($table))
        	{
        		$getdata = $this->adminpanel->gettable($table);
        		    if($getdata[0]->cttitle != 'empty')
        		$data['title'] = ucfirst($getdata[0]->cttitle);
        		else
        			$data['title']="Page Not Found";
        	}
        	else
        		$data['title']="Page Not Found";
        	$this->load->view(ADMIN . 'include/header',$data);
	    }
	}
	public function load_body()
	{
        $data['title']="Page Not Found";
        $this->load->view(ADMIN . 'error404',$data);
	}
	public function page($param)
	{
		$table = strtolower(str_replace('-','_',$param));
        $this->load_header();
        $data['ct'] = $this->adminpanel->perm($table);
        $cid = $data['ct'][0]['cid'];
        $data['manage'] = $this->adminpanel->mnge($cid);
        $requ_fields = json_decode($data['ct'][0]['required_fields']);
        $data['permissions'] = json_decode($data['ct'][0]['permissions']);
        $data['userdata']=$this->auth_user->checkLogin();
		$tablename = lcfirst($table);
        if($data['ct'] == true)
        { 
            $gps = gps_get_instance(); 
            $gps->table($tablename);
            if($data['permissions']->title == 'inactive')
                $gps->unset_title();
            $editPer = $this->permissions($data['userdata'][0]->permissions,$table);
            if(!in_array('add',$editPer))
            {
                if($data['permissions']->add == 'inactive' && $data['userdata'][0]->role == 'superadmin')
                {
                    $gps->unset_add();
                }
                elseif($data['userdata'][0]->role != 'superadmin')
                {
                    $gps->unset_add();
                }
            }
            if(!in_array('edit',$editPer))
            {
                if($data['permissions']->edit == 'inactive' && $data['userdata'][0]->role == 'superadmin')
                {
                    $gps->unset_edit();
                }
                elseif($data['userdata'][0]->role != 'superadmin')
                {
                    $gps->unset_edit();
                }
            }
            if(!in_array('delete',$editPer))
            {
                if($data['permissions']->remove == 'inactive' && $data['userdata'][0]->role == 'superadmin')
                {
                    $gps->unset_remove();
                }
                elseif($data['userdata'][0]->role != 'superadmin')
                {
                    $gps->unset_remove();
                }
            }
            if(!in_array('view',$editPer))
            {
                if($data['permissions']->view == 'inactive' && $data['userdata'][0]->role == 'superadmin')
                {
                    $gps->unset_view();
                }
                elseif($data['userdata'][0]->role != 'superadmin')
                {
                    $gps->unset_view();
                }
            }
            if($data['permissions']->csv == 'inactive')
                $gps->unset_csv();
            if($data['permissions']->print == 'inactive')
                $gps->unset_print();
            if($data['permissions']->search == 'inactive')
                $gps->unset_search();
            if($data['permissions']->numbers == 'inactive')
                $gps->unset_numbers();
            if($data['permissions']->pagination == 'inactive')
                $gps->unset_pagination();
            if($data['permissions']->limitlist == 'inactive')
                $gps->unset_limitlist();
            if($data['permissions']->sortable == 'inactive')
                $gps->unset_sortable();
            if(!empty($data['ct'][0]['rename_column']))
            { 
                $j = json_decode($data['ct'][0]['rename_column']);
                foreach($j  as $key => $p)
                {
                    $gps->label(array($key => $p,));
                }
            }
            if(!empty($data['manage'][0]['changetype']))
            { 
                foreach($data['manage'] as $ctype)
                {
                    $ct = json_decode($ctype['changetype']);
                    if($ct->type == 'image' && $ct->crop != 'ratio_crop')
                        $gps->change_type($ct->col_name,$ct->type,$ct->any,array('width' => $ct->width, 'height' => $ct->height, $ct->crop => true));
					else if($ct->type == 'image' && $ct->crop == 'ratio_crop') {
						$gps->change_type($ct->col_name,$ct->type, $ct->any, array('ratio' => $ct->width/$ct->height, 'manual_crop' => true)); }
					else if($ct->type == 'thumbs')
						$gps->change_type($ct->col_name,'image','',array('thumbs'=>array(1 => array('width'=> $ct->small, 'folder' => 'small')),'grid_thumb' => 1));
					else if($ct->type == 'remote_image')
                        $gps->change_type($ct->col_name,$ct->type,$ct->any,array('link' => $ct->links));
                    else if($ct->type == 'file')
                        $gps->change_type($ct->col_name,$ct->type,$ct->any,array($ct->frename => true));
                    else if($ct->type == 'password')
                        $gps->change_type($ct->col_name,$ct->type,$ct->pencrypt);
                    else if($ct->type == 'select')
                        $gps->change_type($ct->col_name,$ct->stype,$ct->s_selected,array('values' => $ct->s_options));
                    else if($ct->type == 'datetime')
                        $gps->change_type($ct->col_name,$ct->dtype,$ct->d_any);
                    else if($ct->type == 'textarea')
                        $gps->change_type($ct->col_name,$ct->type);
                    else if($ct->type == 'int')
                        $gps->change_type($ct->col_name,$ct->type);
                    else if($ct->type == 'text')
                        $gps->change_type($ct->col_name,$ct->type);
                    else if($ct->type == 'timestamp')
                        $gps->change_type($ct->col_name,$ct->type);
					else if($ct->type == 'relation')
					{
						if(!empty($ct->typevalue)){
							$type = array($ct->typename => $ct->typevalue);
							$gps->relation($ct->col_name,$ct->tablename,$ct->valuename,$ct->displayname,$type);}
						else
							$gps->relation($ct->col_name,$ct->tablename,$ct->valuename,$ct->displayname);
					}
					else if($ct->type == 'relation_depend')
					{
						if(!empty($ct->typevalue)){
							$type = array($ct->typename => $ct->typevalue);
							$gps->relation($ct->col_name,$ct->tablename,$ct->valuename,$ct->displayname,$type,'','','','',$ct->dependvaluename,$ct->dependcolname);
						}
						else
							$gps->relation($ct->col_name,$ct->tablename,$ct->valuename,$ct->displayname,'','','','',$ct->dependvaluename,$ct->dependcolname);
					}
					else if($ct->type == 'join')
					{
						$gps->join($ct->col_name,$ct->tablename,$ct->valuename);
					}
					else if($ct->type == 'highlight')
					{
						$gps->highlight($ct->col_name,$ct->condition,$ct->valuename,$ct->color);
					}
					else if($ct->type == 'highlight_row')
					{
						$gps->highlight_row($ct->col_name,$ct->condition,$ct->valuename,$ct->color);
					}
					else if($ct->type == 'map')
					{
						$pin = $ct->latitude.','.$ct->longitude;
						$gps->change_type($ct->col_name,$ct->point,$pin,array('text'=>'Your are here'));
					}
                }
            }
            if(!empty($data['ct'][0]['required_fields']))
            {
                $requ_fields = json_decode($data['ct'][0]['required_fields']);
                foreach($requ_fields as $key => $requ_field)
                {
                    if($requ_field == 'required')
                        $gps->validation_required($key);
                    else if($requ_field == 'readonly')
                        $gps->readonly($key);
                    else if($requ_field == 'disabled')
                        $gps->disabled($key);

                }
            }
            if(!empty($data['ct'][0]['hidden']))
            {
                $hidden_fields = json_decode($data['ct'][0]['hidden']);
                foreach($hidden_fields as $key => $hidden_field)
                {
                    if($hidden_field == 'hidden')
                    {
                        if($tablename != 'orders')
                        {
                            if($tablename != 'customers' && $tablename != 'drivers')
                            {
                                $gps->columns($key,true);
                                $gps->fields($key,true);
                            }
                        }
                    }
                }
            }
            if(!empty($data['ct'][0]['pattern']))
            {
                $pttrn_fields = json_decode($data['ct'][0]['pattern']);
                foreach($pttrn_fields as $key => $pttrn_field)
                {
                    if($pttrn_field != '')
                    {
                        $gps->validation_pattern($key,$pttrn_field);
                    }
                }
            } 
            if(!empty($data['ct'][0]['order_by']))
            {
                $order_by = json_decode($data['ct'][0]['order_by']);
                foreach($order_by as $key => $orderby)
                {
                    if($orderby != '')
                    {
                        $gps->order_by($key,$orderby);
                    }
                }
            } 
			$login_id = $this->session->userdata('logged_in')['id'];
			$login_name = $this->session->userdata('logged_in')['name'];
			$login_role = $this->session->userdata('logged_in')['role'];
			if($login_role == 'company')
			    $gps->where('company', $login_id);
			$gps->hide_button('save_edit');
			if($tablename == 'companies' || $tablename == 'agents' || $tablename == 'customers' || $tablename == 'landlords')
			{
			    // $gps->where('status',1);
			    // $gps->change_type('login_status_gps','select','',array('values' => login_status()));
			    $gps->change_type('languages','multiselect','',array('values' => languages()));
                // $gps->before_insert('login_status_gps');
                // $gps->before_update('login_status_gps');
                $gps->columns(array('img','logo','about','servicearea','password','forgot_key'),true);
                $gps->fields(array('forgot_key','created_date','modified_date'),true);
                //$gps->fields(array('name','email','login_status_gps'),false);
                if($tablename != 'customers')
			    {
                    $gps->set_attr('twitter',array('class'=>'gps-input url'));
                    $gps->set_attr('facebook',array('class'=>'gps-input url'));
                    $gps->set_attr('instagram',array('class'=>'gps-input url'));
                    $gps->set_attr('linkedin',array('class'=>'gps-input url'));
			    }
			    $gps->highlight_row('login_status','=','pending','#f8c24675');
			}
			if($tablename == 'subscriptions')
			{
			    $gps->columns(array('user','amount','package','created_date','status'),false);
			    $gps->fields(array('user','amount','package','created_date','status'),false);
			    $gps->change_type('amount', 'price', '', array('prefix'=>'$'));
			}
			if($tablename == 'companies')
			{
			 //   $gps->change_type('img','image','',array('thumbs'=>array(array('width' => 400, 'height' => 100, 'crop' => true),array('width' => 400, 'folder' => 'small'))));
			    $gps->subselect('agents','SELECT group_concat(sno) FROM agents WHERE company = {sno} AND status = 1');
			    $gps->before_insert('pointer');
                $gps->before_update('pointer');
			    $gps->column_class('agents','d-none');
			    $gps->column_head('agents','display:none');
			    $gps->columns(array('bgcolor','latitude','longitude','pointer','twitter','facebook','instagram','linkedin','forgot_key'),true);
                $gps->fields(array('logo','servicearea','agents','latitude','longitude'),true);
                $gps->set_attr('bgcolor',array('type'=>'color'));
                $gps->set_attr('website',array('class'=>'gps-input url'));
                // $gps->field_tooltip('name','Don`t use special characters');
                $gps->field_tooltip('address','Type manually');
                $gps->field_tooltip('img','Upload your company logo.');
			    $gps->button(admin_url('cms/agents?company={sno}'),'View Agents','fa fa-user-shield fa-fw','',array('target'=>'_self','data-toggle'=>'tooltip'));
			    $gps->button(admin_url('cms/properties?role=agents&agent={agents}'),'View Properties','fa fa-building fa-fw','',array('target'=>'_self','data-toggle'=>'tooltip'));
			 //   $gps->duplicate_button();
			}
			if($tablename == 'agents')
			{
			    $gps->before_insert('experience');
                $gps->before_update('experience');
			    if(isset($_GET) && !empty($_GET))
			    {
			        foreach($_GET as $key => $value)
			        {
			            $gps->where($key,$value);
			        }
			    }
			    $gps->button(admin_url('cms/properties?role=agents&agent={sno}'),'View Properties','fa fa-building fa-fw','',array('target'=>'_self','data-toggle'=>'tooltip'));
			    $gps->columns(array('phone_2','address','servicearea','package','twitter','facebook','instagram','linkedin','forgot_key'),true);
                $gps->fields(array('phone_2','address','servicearea','package','forgot_key'),true);
                $gps->column_callback('experience','agent_experience_view');
                $gps->field_callback('experience','agent_experience');
                $gps->field_tooltip('experience','Years-Months(1-11)');
			}
			if($tablename == 'landlords')
			{
			    $gps->before_insert('url');
                $gps->before_update('url');
			    if(isset($_GET) && !empty($_GET))
			    {
			        foreach($_GET as $key => $value)
			        {
			            $gps->where($key,$value);
			        }
			    }
			    $gps->columns(array('package','twitter','facebook','instagram','linkedin','forgot_key'),true);
                $gps->fields(array('package','forgot_key'),true);
			    $gps->button(admin_url('cms/properties?role=landlord&agent={sno}'),'View Properties','fa fa-building fa-fw','',array('target'=>'_self','data-toggle'=>'tooltip'));
			}
			if($tablename == 'properties')
			{
			    if(isset($_GET) && !empty($_GET))
			    {
			        foreach($_GET as $key => $value)
			        {
			            if($key == 'agent')
			                $gps->where($key,explode(',',$value));
			            else
			                $gps->where($key,$value);
			        }
			    }
			    $amnty = array();
			    $amenities = $this->get->table('p_amenities', array('status' => 1));
			    if($amenities != false)
			    {
			        foreach($amenities as $amenity)
			        {
			            $amnty[$amenity->sno] = $amenity->name;
			        }
			    }
			    //$gps->column_width('aminities','65%');
			    //$gps->column_cut(2,'aminities');
			    $gps->change_type('bond', 'price', '', array('prefix'=>'$'));
			    $gps->change_type('price', 'price', '', array('prefix'=>'$'));
			    $gps->relation('agent','agents_landlords','sno',array('name','companyname'),array('status' => '1'),'','',' ','','type','role');
			    $gps->relation('assignto','agents_landlords','sno',array('name','companyname'),array('status' => '1'),'','',' ','','type','role');
			    $gps->columns(array('agent','role','type','p_type','address','region','district','suburb','featured','premium','boost','bedrooms','bathrooms','parkings','carport','offshoreparking','floor_area','sqft','built_year','tenants','available_from','title','description','other','features','duration','balconies','toilets','aminities','apply_link','assignto','txnid','txnamount','txndate','txnstatus','property_status','created_date','status'),false);
			    $gps->fields(array('role','agent','type','p_type','bedrooms','bathrooms','parkings','carport','offshoreparking','floor_area','sqft','built_year','tenants','available_from','address','region','district','suburb','title','description','featured','premium','boost','other','features','duration','balconies','toilets','aminities','apply_link','assignto','pointer','txnid','txnamount','txndate','txnstatus','property_status','created_date','status'),false);
			    $gps->change_type('txnamount', 'price', '', array('prefix'=>'$'));
			    $gps->modal(array('aminities'=>'fa fa-th'));
			    $gps->change_type('aminities','checkboxes','',array('values' => $amnty));
			    $gps->field_callback('aminities','property_aminities');
			    $gps->column_callback('other','property_others');
			    $gps->field_callback('other','property_gst');
			 //   $gps->field_tooltip('features','{ "pet":"yes", "smokers":"yes", "furnished":"yes", "compliant":"yes" }');
			    $gps->column_callback('features','property_others');
			    $gps->field_callback('features','property_features');
			    $gps->set_attr('type',array('id' => 'property_type'));
			    $gps->set_attr('bedrooms,carport,offshoreparking,built_year,tenants',array('class' => 'gps-input residential'));
			    $gps->set_attr('floor_area,toilets',array('class' => 'gps-input commercial'));
			    $gps->before_update('property_gst_outgoings');
			    $gps->before_insert('property_gst_outgoings');
			    $gps->set_attr('apply_link',array('class'=>'gps-input url'));
			    $gps->button(admin_url('cms/property-visits?property={sno}'),'View Visits','fa fa-clock fa-fw','',array('target'=>'_self','data-toggle'=>'tooltip'));
			}
			if($tablename == 'property_visits')
			{
			    if(isset($_GET) && !empty($_GET))
			    {
			        foreach($_GET as $key => $value)
			        {
			            $gps->where($key,$value);
			        }
			    }
			    $gps->relation('schedule_id','property_schedules','sno',array('from_time','to_time'),array('status' => '1'),'','',' ','','date','day_date');
			    $gps->before_insert('created_date');
			    $gps->before_update('modify_date');
			    $gps->fields(array('created_date','modified_date'),true);
			}
			if($tablename == 'user_logins')
			{
			    $gps->where('user_id != ','1');
			}
			if($tablename == 'suppliers')
			{
			    $gps->columns(array('suburbs','address','forgot_key'),true);
                $gps->fields(array('created_date','modified_date','forgot_key'),true);
			    $gps->before_insert('created_date');
			    $gps->before_update('modify_date');
			}
			if($tablename == 'customers')
			{
			    $gps->columns(array('address'),true);
                $gps->fields(array('address'),true);
			}
			if($tablename == 'property_schedules')
			{
                $gps->fields(array('day'),true);
                $gps->before_insert('days');
			    $gps->before_update('days');
			}
			if(($tablename == 'terms') || ($tablename == 'privacy') || ($tablename == 'packages') || ($tablename == 'promotional'))
			{
                $gps->fields(array('created_date','modified_date'),true);
			    $gps->before_insert('created_date');
			    $gps->before_update('modify_date');
			}
			if($tablename != 'settings')
			    $gps->highlight_row('status','=','0','#f2616187');
            $data['output'] = $gps->render();
			var_dump($data);echo "@@@@";
            $this->load->view(ADMIN . 'edit',$data);
        }
        else
        {
			$data['title']="Page Not Found";
            $this->load->view(ADMIN . 'error404',$data);
		}
        
        $this->load_footer();
	}
	private function user($id = NULL)
	{
	    if(isset($_GET['userid']) && $_GET['userid'] != '')
	    {
    		$where = array('id' => $_GET['userid'],'isActive' => '1');
    		$user = $this->get->table('users',$where);
    		if($user != false)
    		    echo $user[0]->fullname;
    		else
    		    echo 0;
	    }
	    else
	        echo 0;
	}
    public function permissions($userper,$tablename){
        $permissions = json_decode($userper);
    	$table = $tablename;
        $perm = '';
        $p = array();
        $view = '';
        $add = '';
        $edit = '';
        $delete = '';
        foreach($permissions as $permsn ) {  
            $perm = isset($permsn->$table)?$permsn->$table:'';
            if(!empty($perm))
            {
            	$p[$table][] = $perm;
            }
        }
        if(!empty($p))
        {
            $view = in_array('view', $p[$table])?'view':'';
            $add = in_array('add', $p[$table])?'add':'';
            $edit = in_array('edit', $p[$table])?'edit':'';
            $delete = in_array('delete', $p[$table])?'delete':'';
        }
        $mergeArray = array($view,$add,$edit,$delete);
        return $mergeArray;
    }
	public function load_footer()
	{
		$this->load->view(ADMIN . 'include/footer');
	}
}
