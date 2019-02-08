<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// authentication
$route['login/submit'] = 'authentication/login_submit/';
$route['login'] = 'authentication/login_form';
$route['logout'] = 'authentication/logout';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
