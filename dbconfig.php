<?php 
ini_set("display_errors",0);
/*define(HOSTNAME,"localhost");
define(USERNAME,"rajeshch_cspills");
define(PASSWORD,"SVIDg(hN_.f.");
define(DBNAME,"rajeshch_cheepsleepingpills");*/

define(HOSTNAME,"localhost");
define(USERNAME,"bharghav");
define(PASSWORD,"Media3@123");
define(DBNAME,"fourchette");
/*
define(HOSTNAME, "localhost");
define(USERNAME, "root");
define(PASSWORD, "");
define(DBNAME, "fourchette");
*/
###################################################################
######### TABLE CONSTANTS 
###################################################################

/********* Table Prefix *********/
define('TPREFIX', 'tb_');
/********* Table Names *********/
define('TBL_ADMIN','admin');
define('TBL_ADMINSINFO','admin_info');
define('TBL_SITESETTINGS','sitesettings');
define('TBL_RECENTACTIVITIES','recentactivities');

define('TBL_CONTENTPAGES','contentpages');
define('TBL_TESTMONIALS','testimonials');
define('TBL_BANNERS','banners');
define('TBL_COUPOUN','coupons');
define('TBL_CLIENT','client');
define('TBL_CARDUSERS','cardusers');
define('TBL_CHECKOUT', 'checkout');

define('TBL_STORECATEGORY','store_category');
define('TBL_STORESUBCATEGORY','store_subcategory');

define('TBL_STOREPRODUCTS','store_products');
define('TBL_CELLPHONE','cellphone');
define('TBL_SERVICE','services');
define('TBL_EVENTS','events');

define('TBL_BLOG','blog');
define('TBL_PRODUCTPILLS','productpills');
define('TBL_NEWSLETTER', 'newsletter');

define('TBL_SUBSCRIBERS','newsletter_subscribers');
define('TBL_CART','cart');
define('TBL_CART_ORDER','cart_order');
define('TBL_CART_TRANSACTION','cart_transcation');
define('TBL_RECENTACTIVITIES','recentactivities');
//define('TBL_COUNTRYLIST','countries');
//define('TBL_STATELIST','states');
//define('TBL_NEWSEVENTSTEMPLATES','newseventstemplates');
define('TBL_USERS','users');
define('TBL_USERS_INFO','users_info');
 
define('TBL_FIELDVALUES','field_values');
 define('TBL_ORDERS', 'orders');

define('TBL_PRODUCTS','products');
define('TBL_COUNTRY','country');

define('TBL_STAFF','staff');
define('TBL_REVIEWS','reviews');

define('TBL_CONTACT','contact');
define('TBL_QUOTE','quote');
define('TBL_QUOTE_TYPE','quote_type');
define('TBL_FAQ','faq');
define('TBL_CATEGORY','category');

define('TBL_CUSTOMERS','customers');
//$timezone = "Asia/Calcutta";
//if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
define('ADMINROOT','admin');
define('STR_TO_TIME',strtotime(date("Y-m-d H:i:s")));
define('ONLY_DATE',date("m-d-Y"));
define('DATE_TIME',date("m-d-Y H:i:s"));
define('DATE_TIME_FORMAT',date("l dS F Y, H:i:s A", STR_TO_TIME));
define('DATETIMEFORMAT',date("l-dS-F-Y-H-i-s-A", STR_TO_TIME));
define('DBIN','INSERT INTO ');
define('DBUP','UPDATE ');
define('DBWHR',' WHERE ');
define('DBDEL','DELETE ');
define('DBFROM',' FROM ');
define('DBSELECT',' SELECT ');
define('DBSET',' SET ');
define('HEAD_LTN','location:');
define('DB_LMT',' LIMIT ');
define('DB_ORDER',' ORDER BY ');
define('DB_LIKE',' LIKE ');

###################################################################
######### Physical Path Constants 
###################################################################
define(SITEROOT, 				$_SERVER['DOCUMENT_ROOT']."/fourchette");
//define(SITEROOT, 				$_SERVER['DOCUMENT_ROOT']."");
//define(SITEROOT, 				$_SERVER['DOCUMENT_ROOT']);
/*define(LISTINGIMAGESROOT, 		SITEROOT."/images/listings");
define(UPLOADSROOT, 			SITEROOT."/uploads/");
define(USER_IMAGE_ROOT,	        SITEROOT."/images/");
*/
###################################################################
######### Url Constants 
###################################################################
//define(SITEURL, 				"http://".$_SERVER['HTTP_HOST']);
//define(SITEURL, 				"http://".$_SERVER['HTTP_HOST']."");
define(SITEURL, 				"http://".$_SERVER['HTTP_HOST']."/fourchette");

//define(SITEPATH_URL,'http://'.$_SERVER['HTTP_HOST']);
?>