<?php

class eventsClass
{ 

  function getAllContentPagesList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_EVENTS,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllContentPagesListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_EVENTS,'page_id','','','','');
	return $callConfig->getCount($query);
	} 

	function getContentPageData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_EVENTS,'*','id='.$id,'','','');
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
		
		$blogimage = $callConfig->freeimageUploadcomncode('event','image',"../uploads/events/","../uploads/events/thumbs/",$post['hdn_image'],'87','45');
		$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'posteddate'=>$datte,'description'=>$post['description'],'image'=>$blogimage,'status'=>$post['status']);
		
		
		$res=$callConfig->insertRecord(TPREFIX.TBL_EVENTS,$fieldnames);
		if($res!="")
		{
			sitesettingsClass::recentActivities('Event Added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_events&err=Staff Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Event Adding failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_events&ferr=Staff Adding failed");
		}
	}
	
	function updatecontentPage($post)
	{
		global $callConfig;
		
	$blogimage = $callConfig->freeimageUploadcomncode('event','image',"../uploads/events/","../uploads/events/thumbs/",$post['hdn_image'],'87','45');
		$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'edate'=>mysql_real_escape_string($post['posteddate']),'bigtext'=>$post['description'],'image'=>$blogimage,'status'=>$post['status']);
		
		
			//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_EVENTS,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Event updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_events&err=Event updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Event updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_events&ferr=Event updattion failed");
		}
	}

	function contentpageDelete($id)
	{
	//echo "syam";exit;
		global $callConfig;
		$res=$callConfig->deleteRecord(TPREFIX.TBL_EVENTS,'id',$id);

		if($res==1)
		{
			sitesettingsClass::recentActivities('Event deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_events&err=Event deleted successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Service deletion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_events&ferr=Service deletion failed");
		}

	}

}

?>