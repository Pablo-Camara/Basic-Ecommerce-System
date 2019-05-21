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
$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['home'] = 'HomeController';

$route['shop'] = 'ShopController';
$route['shop/categoria/(:any)'] = 'ShopController/category/$1';
$route['shop/categorias/(:any)'] = 'ShopController/categories/$1';

$route['shop/prodotto/(:any)'] = 'ShopController/product/$1';

$route['shop/cart/add'] = 'CartController/add';
$route['shop/cart/remove'] = 'CartController/remove';
$route['shop/cart/items_li'] = 'CartController/items_li';
$route['shop/cart/checkout'] = 'CartController/checkout';

$route['dove-siamo'] = 'DoveSiamoController';

$route['contattami'] = 'ContattamiController';
$route['contattami/inviare'] = 'ContattamiController/send_message';
$route['contattami/inviato/(:any)'] = 'ContattamiController/inviato/$1';


$route['articolos'] = 'ArticleController';
$route['articolo/(:any)'] = 'ArticleController/article/$1';


$route['dashboard'] = 'admin/DashboardController';
$route['dashboard/login'] = 'admin/DashboardController/login';
$route['dashboard/login/forgot'] = 'admin/DashboardController/login_forgot';
$route['dashboard/login/recover/(:any)'] = 'admin/DashboardController/login_recover/$1';
$route['dashboard/login/setpassword'] = 'admin/DashboardController/login_setpassword';
$route['dashboard/logout'] = 'admin/DashboardController/logout';

$route['dashboard/statistics'] = 'admin/DashboardController/statistics';
$route['dashboard/shop'] = 'admin/DashboardController/shop';
$route['dashboard/shop/category/add'] = 'admin/CategoryController/add';
$route['dashboard/shop/category/delete'] = 'admin/CategoryController/delete';
$route['dashboard/shop/category/edit'] = 'admin/CategoryController/edit';
$route['dashboard/shop/category/change_image'] = 'admin/CategoryController/change_image';
$route['dashboard/shop/product/add'] = 'admin/ProductController/add';
$route['dashboard/shop/product/delete'] = 'admin/ProductController/delete';
$route['dashboard/shop/product/edit'] = 'admin/ProductController/edit';
$route['dashboard/shop/product/change_image'] = 'admin/ProductController/change_image';
$route['dashboard/shop/product/change_category'] = 'admin/ProductController/change_category';
$route['dashboard/shop/product/change_order'] = 'admin/ProductController/change_order';

$route['user_activity'] = 'UserActivityController/registerView';
$route['newsletter/subscribe'] = 'NewsletterController/subscribe';


