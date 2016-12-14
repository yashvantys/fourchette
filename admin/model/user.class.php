<?php

class userClass

{ 

  function getCountAllTablesDataCount($tablename,$fieldname,$where)

  {

	global $callConfig;

	if($where!="")

	$whr=$where;

	$query=$callConfig->selectQuery($tablename,$fieldname,$whr,'','','');

	return $callConfig->getCount($query);

  }

 function getAllAdminUsersList($usertype,$sortfield,$order,$start,$limit)

  {

	global $callConfig;

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;

	if($usertype=="senior")

	$whr=" roletype='senior'"; 	

	if($usertype=="level2")

	$whr=" roletype='".$usertype."'";

	$query=$callConfig->selectQuery(TPREFIX.TBL_ADMIN,'*',$whr,$order,$start,$limit);

	return $callConfig->getAllRows($query);

  } 

  function getAllAdminUsersListCount($usertype)

  {

	global $callConfig;

	if($usertype=="senior")

	$whr=" roletype='senior'"; 	

	if($usertype=="level2")

	$whr=" roletype='".$usertype."'";	

	$query=$callConfig->selectQuery(TPREFIX.TBL_ADMIN,'user_id',$whr,'','','');

	 return $callConfig->getCount($query);

  } 

  function getAllUsersList($usertype,$sortfield,$order,$start,$limit)

  {

	global $callConfig;

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;



	$query=$callConfig->selectQuery(TPREFIX.TBL_USERS,'*','',$order,$start,$limit);

	return $callConfig->getAllRows($query);

  } 

  function getAllUsersListCount($usertype)

  {

	global $callConfig;

	

	$query=$callConfig->selectQuery(TPREFIX.TBL_USERS,'user_id',$whr,'','','');

	 return $callConfig->getCount($query);

  } 

  

  function getAdminUserData($id)

  {

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_USERS,'*','user_id='.$id,'','','');

	return $callConfig->getRow($query);

  }

 function checkAdmin()

 {
//echo "syam";
//exit;
    global $callConfig;

$where="us_name='".$_POST['chrUserName']."' and password='".$callConfig->passwordEncrypt($_POST['chrPassword'])."' and status='Active' and 	(roletype='senior' or roletype='level1')";

 $query=$callConfig->selectQuery(TPREFIX.TBL_ADMIN,'*',$where,'','',''); 

	$row=$callConfig->getRow($query);

	if($row->user_id!="")

	{

	$_SESSION['userid']=$row->user_id;

	$_SESSION['us_name']=$row->us_name;

	$_SESSION['email']=$row->email;
	
	$_SESSION['profile_image']=$row->profile_image;

	$_SESSION['lastlogin']=$row->lastlogin;

	$_SESSION['roletype']=$row->roletype;

	$_SESSION['adminmemberjoinedon']=$row->createdon;

	sitesettingsClass::recentActivities($_SESSION['us_name'].' > login sucessfully on > '.DATE_TIME_FORMAT.'','g');

	header("location:index.php?option=com_dashboard");

	

	}

	else

	{

	header("location:index.php?ferr=Login failed, please check the login details");

	exit;

	}

 } 
 
 
 
 function forgotpwd($post) {
 
 global $callConfig;
 //print_r($_POST); exit;
 $where="email='".$_POST['email']."' and status='Active'";

 $query=$callConfig->selectQuery(TPREFIX.TBL_ADMIN,'*',$where,'','',''); 

	$row=$callConfig->getRow($query);
	
	//echo ($row->id); exit;
	
	if($row>0) {
	
	$to=$_POST['email'];
	$subject="Cheep Sleeping Pills || Forgot Password";
	$message="<table cellspacing='0' cellpadding='2'  align='center' width='600' border='border:1px solid #CCCCCC'  style=' font-weight:14px; border-collapse:collapse;' >

				  <tr style='background-color:#002496;'>

					 <td colspan='2' align='center' valign='top'><img src='".SITEURL."/images/site_log_15.png' width='200' height='65'/></td>

				

				  </tr>
				  <tr>
				  <td colspan='2'>Login Details Below :</td>
				  
				  </tr>
				  
				   <tr>
				  <td>Username :</td> <td>Password</td>
				  
				  </tr>
				  
				   <tr>
				  <td>Password : </td> <td>Password</td>
				  
				  </tr>
				     <tr>
				  <td colspan='2'>Thank you<br>
				  Cheep Sleeping Pills
				  
				  </td>
				  
				  </tr>
				  </table>";
				 // echo $message; exit;
				  
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: Cheep Sleeping Pills <sales@cheapsleepingpills.com>' . "\r\n";
	if(mail($to, $subject, $message, $headers)){
	
	header("Location:index.php?option=com_login&msg=Mail sent succesfully ");
	
	} else {
	
	header("Location:index.php?option=com_login&msg=Mail sent Failed ");
	}
	
	
	} else {
	header("Location:index.php?option=com_login&msg=Failed");
	//echo "hello"; exit;
	}
 
 
 
 }

 

    function userAuthentication()

	{

		if($_SESSION['userid']!="")

		{

			header("location:index.php?option=com_dashboard");

		}

	}

	

	

	function insertAdminUser($post)

	{

	global $callConfig;

	$fieldnames=array('us_name'=>$post['name'],'`password`'=>$callConfig->passwordEncrypt($post['password']),'email'=>$post['email'],'roletype'=>'senior','status'=>$post['status']);

	$res=$callConfig->insertRecord(TPREFIX.TBL_ADMIN,$fieldnames);

	if($res!="")

	{

		sitesettingsClass::recentActivities('Admin User created successfully on > '.DATE_TIME_FORMAT.'','g');

		$callConfig->headerRedirect("index.php?option=com_adminlist&err=Admin User created successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Admin User creation failed on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_adminlist&ferr=Admin User creation failed");

	}

	}

	

	function updateAdminUser($post)

	{

	global $callConfig;

	if($post['status']!="")

	{

	$fieldnames=array('us_name'=>$post['name'],'`password`'=>$callConfig->passwordEncrypt($post['password']),'email'=>$post['email'],'status'=>$post['status']);

	}else

	{

	 $fieldnames=array('us_name'=>$post['name'],'`password`'=>$callConfig->passwordEncrypt($post['password']),'email'=>$post['email']);

	}

	$res=$callConfig->updateRecord(TPREFIX.TBL_ADMIN,$fieldnames,'user_id',$post['hdn_user_id']);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Admin User updated successfully on > '.DATE_TIME_FORMAT.'','g');

		$callConfig->headerRedirect("index.php?option=com_adminlist&err=Admin User updated successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Admin User updation failed on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_adminlist&ferr=Admin User updation failed");

	}

	}

	function adminuserDelete($id)

	{

	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_ADMIN,'user_id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Admin User deleted successfully on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_adminlist&err=Admin User deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Admin User deletion failed on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_adminlist&ferr=Admin User deletion failed");

	}

	}

	

	function forntuserDelete($id)

	{

	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_USERS,'user_id',$id);

	if($res==1)

	{

	    $callConfig->deleteRecord(TPREFIX.TBL_ADMINSINFO,'userid',$id);

		sitesettingsClass::recentActivities('User > deleted successfully on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_memberlist&err=User > deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('User > deletion failed on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_memberlist&ferr=User > deletion failed");

	}

	}

	

	function forntuserStatusChanging($get){

	global $callConfig;

	if($get['st']==1)

	$statusbe=0;

	else

	$statusbe=1;

	$fieldnames=array('status'=>$statusbe);

	$res=$callConfig->updateRecord(TPREFIX.TBL_USERS,$fieldnames,'user_id',$get['id']);

	if($res==1)

	{

		sitesettingsClass::recentActivities('User > Status changed successfully on > '.DATE_TIME_FORMAT.'','g');

		$callConfig->headerRedirect("index.php?option=com_memberlist&err=User > Status changed successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('User > Status changing failed on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_memberlist&ferr=User > Status changing failed");

	}

	}

	

}

?>