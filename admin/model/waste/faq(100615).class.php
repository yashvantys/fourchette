<?php

class faqClass
{ 

  function getAllfaqList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_FAQ,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllfaqListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_FAQ,'id','','','','');
	return $callConfig->getCount($query);
	} 

	function getfaqData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_FAQ,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}

 	function insertfaq($post)
	{
		global $callConfig;
		
		if($post['productname']!="")
		$titleslug=$callConfig->remove_special_symbols($post['title']);
		else
		$titleslug=$callConfig->remove_special_symbols($post['title']);
		//Image creating//
		
		//echo "<pre>";
		//print_r($_POST);
		//echo "<pre>";exit;
		
		$contentimage = $callConfig->freeimageUploadcomncode('content','image',"../uploads/contents/","../uploads/contents/thumbs/",$post['hdn_image'],'87','45');
		
		$fieldnames=array(
	'question'=>mysql_real_escape_string($post['question']),
		'answer'=>mysql_real_escape_string($post['answer']),
		'status'=>mysql_real_escape_string($post['status']));
		
		
		$res=$callConfig->insertRecord(TPREFIX.TBL_FAQ,$fieldnames);
		if($res!="")
		{
			sitesettingsClass::recentActivities('Page Added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_faqs&err=Page Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Page Adding failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_faqs&ferr=Page Adding failed");
		}
	}
	
	function updatefaq($post)
	{
		global $callConfig;
		
			$contentimage = $callConfig->freeimageUploadcomncode('content','image',"../uploads/contents/","../uploads/contents/thumbs/",$post['hdn_image'],'87','45');
		
		$fieldnames=array(
		'question'=>mysql_real_escape_string($post['question']),
		'answer'=>mysql_real_escape_string($post['answer']),
		'status'=>mysql_real_escape_string($post['status']));
		
		//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_FAQ,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Page updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_faqs&err=Page updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Page updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_faqs&ferr=Page updattion failed");
		}
	}

	function contentpageDelete($id)

	{
	//echo "syam";exit;
	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_FAQ,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Page deleted successfully on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_faqs&err=Page deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Page deletion failed on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_faqs&ferr=Page deletion failed");

	}

	}

}

?>