<?php

class storeClass
{ 

	function updateDetails($post)
	{
		global $callConfig;
		
		$bannerimage = $callConfig->freeimageUploadcomncode('staff','productimage',"../uploads/Staff/","../uploads/Staff/thumbs/",$post['hdn_image'],'87','45');
		$fieldnames=array(
		'us_name'=>mysql_real_escape_string($post['uname']),
		'password'=>$callConfig->passwordEncrypt($post['paswrd']),
		'email'=>mysql_real_escape_string($post['emailid']),
		'profile_image'=>$bannerimage	
		);
		
		//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_ADMIN,$fieldnames,'user_id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Profile updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_profile&err=Profile updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Profile updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_profile&ferr=Profile updattion failed");
		}
	}	

}	

?>