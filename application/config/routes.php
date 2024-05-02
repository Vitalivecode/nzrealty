<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'error404';
$route['myaccount/add-property'] = 'myaccount/addproperty';
$route['myaccount/add-property/add'] = 'myaccount/addproperty/add';
$route['myaccount/edit-property/(:any)'] = 'myaccount/addproperty/$1';
$route['myaccount/delete-property/(:any)'] = 'myaccount/deleteproperty/$1';
$route['myaccount/add-agent'] = 'myaccount/addagent';
$route['myaccount/add-agent/add'] = 'myaccount/addagent/add';
$route['myaccount/edit-agent/(:any)'] = 'myaccount/addagent/$1';
$route['myaccount/property-report/(:any)'] = 'myaccount/propertyreport/$1';
$route['properties'] = 'properties/page';
$route['properties/page/(:number)'] = 'properties/page/$1';
$route['agencies'] = 'agencies/page';
$route['agencies/page/(:number)'] = 'agencies/page/$1';
$route['agency/(:any)'] = 'agencies/single/$1';
$route['agents'] = 'agents/page';
$route['agents/page/(:number)'] = 'agents/page/$1';
$route['agent/(:any)'] = 'agents/single/$1';
$route['suppliers'] = 'suppliers/page';
$route['suppliers/page/(:number)'] = 'suppliers/page/$1';
$route['supplier/(:any)'] = 'suppliers/single/$1';

$route['admin'] = 'admin/login';
$route['admin/logout'] = 'admin/logout';
$route['admin/cms/user'] = 'admin/cms/user';
$route['admin/cms/(:any)'] = 'admin/cms/page/$1';
$route['translate_uri_dashes'] = FALSE;
