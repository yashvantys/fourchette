<?php

if($_GET['option']!="")

$option=$_GET['option'];

else

$option="com_login";

		switch($option)

		{

			case "com_login":

			$disptemp="views/login.php";

			break;

			case "com_dashboard":

			$disptemp="views/dashboard.php"; 

			$left_dashboard_focus='class="lst_bg"'; 

			break;

			case "com_adminlist":

			$disptemp="views/adminlist.php";

			$left_adminlist_focus='class="lst_bg"';  

			break;

			case "com_adminlist_insert":

			$disptemp="views/adminlist.php";

			$left_adminlist_focus='class="lst_bg"';  

			break;
			
			
			
			case "com_contentpages":

			$disptemp="views/contentpages.php";

			$left_contentpages_focus='class="lst_bg"';  

			break;

			case "com_contentpages_insert":

			$disptemp="views/contentpages.php";

			$left_contentpages_focus='class="lst_bg"';  

			break;
			
			
			case "com_faqs":

			$disptemp="views/faq.php";

			$left_faq_focus='class="lst_bg"';  

			break;

			case "com_faqs_insert":

			$disptemp="views/faq.php";

			$left_faq_focus='class="lst_bg"';  

			break;
			
			
			case "com_reviews":

			$disptemp="views/reviews.php";

			$left_reviews_focus='class="lst_bg"';  

			break;

			case "com_reviews_insert":

			$disptemp="views/reviews.php";

			$left_reviews_focus='class="lst_bg"';  

			break;
			
			
			
			case "com_blog":

			$disptemp="views/blog.php";

			$left_blog_focus='class="lst_bg"';  

			break;

			case "com_blog_insert":

			$disptemp="views/blog.php";

			$left_blog_focus='class="lst_bg"';  

			break;
			
			
			
			case "com_sitesettings":

			$disptemp="views/sitesettings.php";

			$left_sitesettings_focus='class="lst_bg"'; 

			break;

			
			case "com_banners":

			$disptemp="views/banners.php";

			$left_banners_focus='class="lst_bg"';  

			break;

			case "com_banners_insert":

			$disptemp="views/banners.php";

			$left_banners_focus='class="lst_bg"';  

			break;	

			case "com_services":

			$disptemp="views/services.php";

			$left_services_focus='class="lst_bg"';  

			break;

			case "com_services_insert":

			$disptemp="views/services.php";

			$left_services_focus='class="lst_bg"';  

			break;	
			
			case "com_events":

			$disptemp="views/events.php";

			$left_services_focus='class="lst_bg"';  

			break;

			case "com_events_insert":

			$disptemp="views/events.php";

			$left_services_focus='class="lst_bg"';  

			break;	
			
			case "com_profile":

			$disptemp="views/profile.php";

			$left_dashboard_focus='class="lst_bg"';

			break;
			
			
			
			case "com_subscription":

			$disptemp="views/newsletter.php";

			$left_subscription_focus='class="lst_bg"';  

			break;

			case "com_subscription_insert":

			$disptemp="views/newsletter.php";

			$left_subscription_focus='class="lst_bg"';  

			break;	
			
			
			
			
			case "com_customers":

			$disptemp="views/customers.php";

			$left_customers_focus='class="lst_bg"';  

			break;

			case "com_customers_insert":

			$disptemp="views/customers.php";

			$left_customers_focus='class="lst_bg"';  

			break;
			
			case "com_testmonials":

			$disptemp="views/testmonials.php";

			$left_faq_focus='class="lst_bg"';  

			break;

			case "com_testmonials_insert":

			$disptemp="views/testmonials.php";

			$left_faq_focus='class="lst_bg"';  

			break;

			case "com_users":

			$disptemp="views/users.php";

			$left_users_focus='class="lst_bg"';  

			break;

			case "com_users_insert":

			$disptemp="views/users.php";

			$left_users_focus='class="lst_bg"';  

			break;

			
			case "com_logout":

			$disptemp="views/logout.php";

			break;

		}

		

?>

