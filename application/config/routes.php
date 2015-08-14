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
/* 
|------------ Back-end ----------------
*/
// Ajax process
$route['ajax/process'] = 'ajax/process';
$route['ajax/process/(:any)'] = 'ajax/process/$1';
// End ajax process

$route['admin/faq/(:num)'] = 'admin/faq/index/$1';
$route['admin/faq/(:any)'] = 'admin/faq/$1';
$route['admin/faq'] = 'admin/faq';

$route['admin/answer_question/(:num)'] = 'admin/answer_question/index/$1';
$route['admin/answer_question/(:any)'] = 'admin/answer_question/$1';
$route['admin/answer_question'] = 'admin/answer_question';

$route['admin/service/(:num)'] = 'admin/service/index/$1';
$route['admin/service/(:any)'] = 'admin/service/$1';
$route['admin/service'] = 'admin/service';

$route['admin/field/(:num)'] = 'admin/field/index/$1';
$route['admin/field/(:any)'] = 'admin/field/$1';
$route['admin/field'] = 'admin/field';

$route['admin/staff/(:num)'] = 'admin/staff/index/$1';
$route['admin/staff/(:any)'] = 'admin/staff/$1';
$route['admin/staff'] = 'admin/staff';

$route['admin/agency/(:num)'] = 'admin/agency/index/$1';
$route['admin/agency/(:any)'] = 'admin/agency/$1';
$route['admin/agency'] = 'admin/agency';


$route['admin/(:any)'] = 'admin/dashboard/$1';		
$route['admin'] = 'admin/dashboard';				

/* 
|------------ Front-end ----------------
*/



$route['thutuchanhchinh/timkiem/pages/(:num)'] = 'thutuchanhchinh/timkiem/$1';
$route['thutuchanhchinh/timkiem/pages'] = 'thutuchanhchinh/timkiem/0';
$route['thutuchanhchinh/timkiem'] = 'thutuchanhchinh/timkiem';

$route['thutuchanhchinh/dichvu/(:any)'] = 'thutuchanhchinh/dichvu/$1';

$route['thutuchanhchinh/linhvuc/(:num)/pages/(:num)'] = 'thutuchanhchinh/linhvuc/$1/pages/$2';
$route['thutuchanhchinh/linhvuc/(:num)'] = 'thutuchanhchinh/linhvuc/$1';
$route['thutuchanhchinh/linhvuc/(:num)/pages'] = 'thutuchanhchinh/linhvuc/$1/pages/0';

$route['thutuchanhchinh/pages'] = 'thutuchanhchinh/index/0';
$route['thutuchanhchinh/pages/(:num)'] = 'thutuchanhchinh/index/$1';

$route['thutuchanhchinh/(:any)'] = 'thutuchanhchinh/$1';
$route['thutuchanhchinh'] = 'thutuchanhchinh';

$route['faq/pages/(:num)'] = 'faq/index/$1';
$route['faq/pages'] = 'faq';
$route['faq'] = 'faq';

$route['answer_question/pages/(:num)'] = 'answer_question/index/$1';
$route['answer_question/pages'] = 'answer_question';
$route['answer_question/(:any)'] = 'answer_question/$1';
$route['answer_question'] = 'answer_question';

$route['default_controller'] = 'thutuchanhchinh';         
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */