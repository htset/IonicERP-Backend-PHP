<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['login'] = "sessions/index";
$route['sessions/new'] = "sessions/create";
$route['logout'] = "sessions/destroy";

$route['home'] = "home/index";

$route['products'] = "products/index";
$route['products/page/(:num)'] = "products/index/$1";
$route['products/page'] = "products/index";
$route['products/(:num)'] = "products/view/$1";
$route['products/all'] = "products/get_all_json";
$route['products/combinedQuery/(:any)/(:any)/(:any)/(:any)'] = "products/combinedQuery/$1/$2/$3/$4";

$route['categories'] = "categories/index";
$route['categories/(:num)'] = "categories/view/$1";

$route['subcategories'] = "subcategories/index";
$route['subcategories/(:num)'] = "subcategories/view/$1";

$route['suppliers'] = "suppliers/index";
$route['suppliers/(:num)'] = "suppliers/view/$1";

$route['countries'] = "countries/index";

$route['companies/combinedQuery/(:any)/(:any)/(:any)/(:any)'] = "companies/combinedQuery/$1/$2/$3/$4";
$route['companies/(:num)'] = "companies/view/$1";
$route['companies/suppliers'] = "companies/suppliers";

$route['contacts/combinedQuery/(:any)/(:any)/(:any)/(:any)'] = "contacts/combinedQuery/$1/$2/$3/$4";
$route['contacts/(:num)'] = "contacts/view/$1";

$route['orders/combinedQuery/(:any)/(:any)/(:any)/(:any)'] = "orders/combinedQuery/$1/$2/$3/$4";
$route['orders/(:num)'] = "orders/view/$1";

$route['payments/combinedQuery/(:any)/(:any)/(:any)/(:any)'] = "payments/combinedQuery/$1/$2/$3/$4";
$route['payments/(:num)'] = "payments/view/$1";


$route['appointments'] = "appointments/index";
$route['appointments/page/(:num)'] = "appointments/index/$1";
$route['appointments/page'] = "appointments/index";
$route['appointments/new'] = "appointments/create";
$route['appointments/(:num)/edit'] = "appointments/edit/$1";
$route['appointments/(:num)'] = "appointments/view/$1";
$route['appointments/(:num)/format/(:any)'] = "appointments/view/$1/$2";
$route['appointments/save'] = "appointments/save";
$route['appointments/(:num)/delete'] = "appointments/delete/$1";
$route['appointments/update'] = "appointments/update";

$route['appointments/get_range_json'] = "appointments/get_range_json";
$route['appointments/get_json'] = "appointments/get_json";
$route['appointments/get_all_json'] = "appointments/get_all_json";
$route['appointments/insert_json'] = "appointments/insert_json";
$route['appointments/update_json'] = "appointments/update_json";
$route['appointments/delete_json'] = "appointments/delete_json";

$route['printing'] = "printing/index";

$route['calendar'] = "calendar/index";
$route['calendar/(:num)/(:num)/(:num)'] = "calendar/index/$1/$2/$3";
$route['calendar/(:num)/(:num)'] = "calendar/index/$1/$2";

$route['users'] = "users/index";
$route['users/new'] = "users/create";
$route['users/(:num)/edit'] = "users/edit/$1";
$route['users/save'] = "users/save";
$route['users/(:num)/delete'] = "users/delete/$1";
$route['users/update'] = "users/update";
$route['users/passwd'] = "users/passwd";
$route['users/passwd_update'] = "users/passwd_update";

$route['iatreia'] = "iatreia/index";
$route['iatreia/new'] = "iatreia/create";
$route['iatreia/(:num)/edit'] = "iatreia/edit/$1";
$route['iatreia/save'] = "iatreia/save";
$route['iatreia/(:num)/delete'] = "iatreia/delete/$1";
$route['iatreia/update'] = "iatreia/update";

$route['notes'] = "notes/index";
$route['notes/page/(:num)'] = "notes/index/$1";
$route['notes/page'] = "notes/index";
$route['notes/new'] = "notes/create";
$route['notes/(:num)/edit'] = "notes/edit/$1";
$route['notes/save'] = "notes/save";
$route['notes/(:num)/delete'] = "notes/delete/$1";
$route['notes/update'] = "notes/update";
$route['notes/get_range_json'] = "notes/get_range_json";

$route['argies'] = "argies/index";
$route['argies/new'] = "argies/create";
$route['argies/(:num)/edit'] = "argies/edit/$1";
$route['argies/save'] = "argies/save";
$route['argies/(:num)/delete'] = "argies/delete/$1";
$route['argies/update'] = "argies/update";

$route['dashboard'] = "sessions/dashboard";

$route['default_controller'] = "appointments/index";
//$route['default_controller'] = "welcome/index";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */