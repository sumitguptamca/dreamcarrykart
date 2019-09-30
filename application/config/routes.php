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
$route['login'] = 'home/login';
$route['product-details'] = 'home/fetch_product_details';
$route['cart'] = 'home/fetch_cart';
$route['booking'] = 'home/booking';
$route['paymentconfirm'] = 'home/paymentconfirm';
$route['order'] = 'home/my_order';














////// Admin //////
$route['admin/dashboard'] = 'admins/admin_dashboard';
$route['admin'] = 'admins/admin_dashboard/login';
$route['admin/banner'] = 'admins/banner/index';
$route['admin/banner/add'] = 'admins/banner/add';
$route['admin/banner/editbanner'] = 'admins/banner/editbanner';
$route['admin/banner/saveadd'] = 'admins/banner/saveadd';
$route['admin/banner/updatebanner'] = 'admins/banner/updatebanner';
$route['admin/banner/saveadvertise'] = 'admins/banner/saveadvertise';
$route['admin/banner/updateadvertise'] = 'admins/banner/updateadvertise';
$route['admin/ads_banner'] = 'admins/ads_banner/index';
$route['admin/ads_banner/add'] = 'admins/ads_banner/add';
$route['admin/ads_banner/editadsbanner'] = 'admins/ads_banner/editadsbanner';
$route['admin/category'] = 'admins/category/index';
$route['admin/category/add'] = 'admins/category/addcategory';
$route['admin/category/editcategory'] = 'admins/category/editcategory';
$route['admin/category/updatecategory'] = 'admins/category/updatecategory';
$route['admin/category/additem'] = 'admins/category/additem';
$route['admin/category/showitem'] = 'admins/category/showitem';
$route['admin/category/saveitem'] = 'admins/category/saveitem';
$route['admin/category/edititem'] = 'admins/category/edit_item';
$route['admin/category/deleteitem'] = 'admins/category/delete_item';
$route['admin/order'] = 'admins/order/index';
$route['admin/order/c_order'] = 'admins/order/c_order';
$route['admin/order/p_order'] = 'admins/order/p_order';
$route['admin/order/cancel_order'] = 'admins/order/cancel_order';
$route['admin/user'] = 'admins/user/index';
$route['admin/adminseller'] = 'admins/adminseller/index';
$route['admin/adminseller/editadminseller'] = 'admins/adminseller/editadminseller';
$route['admin/adminseller/updateadminseller'] = 'admins/adminseller/updateadminseller';

//Setting//////////////////
$route['admin/setting'] = 'admins/adminsetting/index';
$route['admin/setting/term'] = 'admins/adminsetting/term';
$route['admin/setting/privacy'] = 'admins/adminsetting/privacy';
$route['admin/setting/refund'] = 'admins/adminsetting/refund';
$route['admin/setting/career'] = 'admins/adminsetting/career';


















//////// Seller //////
$route['seller'] = 'sellers/seller_login';
$route['seller/signup'] = 'sellers/seller_login/signup';
$route['seller/dashboard'] = 'sellers/seller_dashboard';
$route['seller/changeitemstatus'] = 'sellers/seller_dashboard/changeitemstatus';
$route['seller/edititem'] = 'sellers/seller_dashboard/edititem';
$route['seller/deletestitem'] = 'sellers/seller_dashboard/deletestitem';
$route['seller/product'] = 'sellers/seller_dashboard/showProductCategory';
$route['seller/addproduct'] = 'sellers/seller_dashboard/addProductItem';
$route['seller/showproduct'] = 'sellers/seller_dashboard/showProductItem';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
