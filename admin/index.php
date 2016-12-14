<?php 
ob_start();
session_start();
include('../dbconfig.php');
include('includes/dbconnection.php');
include("model/user.class.php");
$userObj=new userClass();
include("includes/controller.php");
include('model/sitesettings.class.php');
$site_settings_disp=sitesettingsClass::getsitesettings();
//include("includes/header.php");
?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>FourChette @ admin panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style.css" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="responsive.css" type="text/css">
        <link rel="shortcut icon" href="../img/fav.ico"/>

        <link href="../assets/css/bootstrap.css" rel="stylesheet">
	    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	    <link href="../assets/css/style.css" rel="stylesheet">
    	<link href="../assets/css/style-responsive.css" rel="stylesheet">

 </head>
<?php 	
if($disptemp!='views/login.php')
{
	include("includes/leftmenu.php");
}
?>
   
<?php include($disptemp);?>

<?php 

if($disptemp!='views/login.php')
{
	include("includes/footer.php");
}

?>