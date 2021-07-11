<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
$route['default_controller'] = 'front';
$route['404_override'] = 'front/error_404';
$route['translate_uri_dashes'] = FALSE;
$route['dashboard'] = 'front/dashboard';
$route['savingaccount'] = 'savingaccount/index';

$route['users/login'] = 'front/login';
$route['signup'] =  'front/signup';
$route['forget'] =  'front/forget';
$route['logout'] =  'front/logout';
$route['sitemap.xml'] =  'front/sitemap';
$route['contact-us'] =  'front/contact_us';
$route['(:any)'] = 'front/pages/$1';