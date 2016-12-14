<?php

class bannersClass
{ 

  function getAllbannersList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_BANNERS,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllbannersListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_BANNERS,'id','','','','');
	return $callConfig->getCount($query);
	} 

	function getbannersData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_BANNERS,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}

 	function insertbanners($post)
	{
		global $callConfig;
		
		
		
		$bannerimage = $callConfig->freeimageUploadcomncode('banners','image',"../uploads/banners/","../uploads/banners/thumbs/",$post['hdn_image'],'87','45');
		
		$fieldnames=array(
		'title'=>mysql_real_escape_string($post['title']),
		'image'=>$bannerimage,'status'=>$post['status']	
		);
		 
		 //echo "<pre>";
		 //print_r($fieldnames);
		 //exit;
		
		$res=$callConfig->insertRecord(TPREFIX.TBL_BANNERS,$fieldnames);
		if($res!="")
		{
			sitesettingsClass::recentActivities('Banners Added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_banners&err=Banners Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Banners Adding failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_banners&ferr=Banners Adding failed");
		}
	}
	
	function updatebanners($post)
	{
		global $callConfig;
		
		$bannerimage = $callConfig->freeimageUploadcomncode('banners','image',"../uploads/banners/","../uploads/banners/thumbs/",$post['hdn_image'],'87','45');
		
		$fieldnames=array(
		'title'=>mysql_real_escape_string($post['title']),'image'=>$bannerimage,'status'=>$post['status']	
		);
		
		//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_BANNERS,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Banners updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_banners&err=Banners updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Banners updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_banners&ferr=Banners updattion failed");
		}
	}

	function bannersDelete($id)

	{
	//echo "syam";exit;
	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_BANNERS,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Banner deleted successfully on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_banners&err=Banner deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Banner deletion failed on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_banners&ferr=Banner deletion failed");

	}

	}

}

?>