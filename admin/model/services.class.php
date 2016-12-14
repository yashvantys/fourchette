<?php

class serviceClass
{ 

  function getAllContentPagesList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_SERVICE,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllContentPagesListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_SERVICE,'page_id','','','','');
	return $callConfig->getCount($query);
	} 

	function getContentPageData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_SERVICE,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}

 	function insertcontentPage($post)
	{
		global $callConfig;
		
		if($post['productname']!="")
		$titleslug=$callConfig->remove_special_symbols($post['productname']);
		else
		$titleslug=$callConfig->remove_special_symbols($post['productname']);
		$datte = date('Y-m-d');
		//exit;
		
		$blogimage = $callConfig->freeimageUploadcomncode('service','image',"../uploads/services/","../uploads/services/thumbs/",$post['hdn_image'],'87','45');
		$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'posteddate'=>$datte,'description'=>$post['description'],'image'=>$blogimage,'status'=>$post['status']);
		
		
		$res=$callConfig->insertRecord(TPREFIX.TBL_SERVICE,$fieldnames);
		if($res!="")
		{
			sitesettingsClass::recentActivities('Service Added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_services&err=Staff Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Service Adding failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_services&ferr=Staff Adding failed");
		}
	}
	
	function updatecontentPage($post)
	{
		global $callConfig;
		
	$blogimage = $callConfig->freeimageUploadcomncode('service','image',"../uploads/services/","../uploads/services/thumbs/",$post['hdn_image'],'87','45');
		$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'posteddate'=>mysql_real_escape_string($post['posteddate']),'description'=>$post['description'],'image'=>$blogimage,'status'=>$post['status']);
		
		
			//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_SERVICE,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Service updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_services&err=Service updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Service updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_services&ferr=Service updattion failed");
		}
	}

	function contentpageDelete($id)
	{
	//echo "syam";exit;
		global $callConfig;
		$res=$callConfig->deleteRecord(TPREFIX.TBL_SERVICE,'id',$id);

		if($res==1)
		{
			sitesettingsClass::recentActivities('Service deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_services&err=Service deleted successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Service deletion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_services&ferr=Service deletion failed");
		}

	}

}

?>