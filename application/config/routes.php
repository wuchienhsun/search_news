<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['post/wudata'] = 'posts/wudata';
$route['comments/updates/(:any)'] = 'comments/updates/$1';
$route['posts/update/:(any)'] = 'posts/update/$1';
$route['posts/edit/(:any)'] = 'posts/edit/$1';
$route['users/(:any)'] = 'user/$1';
$route['posts/search'] = 'posts/search';
$route['posts/create'] = 'posts/create';
$route['posts/(:any)'] = 'posts/view/$1';
$route['searchs'] = 'searchs/index';
$route['posts'] = 'posts/index';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
