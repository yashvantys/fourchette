<?php

class testmonialsClass
{ 

  function getAllTestmonialList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_TESTMONIALS,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllTestmonialListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_TESTMONIALS,'id','','','','');
	return $callConfig->getCount($query);
	} 

	function getfaqData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_TESTMONIALS,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}

 	function insertTestmonial($post)
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
		
		//$contentimage = $callConfig->freeimageUploadcomncode('content','image',"../uploads/contents/","../uploads/contents/thumbs/",$post['hdn_image'],'87','45');
		
		$fieldnames=array(
                'quote'=>mysql_real_escape_string($post['quote']),
		'testmonial'=>mysql_real_escape_string($post['testmonial']),
		'status'=>mysql_real_escape_string($post['status']));
		
		
		$res=$callConfig->insertRecord(TPREFIX.TBL_TESTMONIALS,$fieldnames);
		if($res!="")
		{
			sitesettingsClass::recentActivities('Page Added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_testmonials&err=Page Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Page Adding failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_testmonials&ferr=Page Adding failed");
		}
	}
	
	function updateTestmonial($post)
	{
		global $callConfig;
		
                //$contentimage = $callConfig->freeimageUploadcomncode('content','image',"../uploads/contents/","../uploads/contents/thumbs/",$post['hdn_image'],'87','45');
		
		$fieldnames=array(
		'quote'=>mysql_real_escape_string($post['quote']),
		'testmonial'=>mysql_real_escape_string($post['testmonial']),
		'status'=>mysql_real_escape_string($post['status']));
		
		//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_TESTMONIALS,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Page updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_testmonials&err=Page updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Page updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_testmonials&ferr=Page updattion failed");
		}
	}

	function TestmonialDelete($id)

	{
	//echo "syam";exit;
	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_FAQ,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Page deleted successfully on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_testmonials&err=Page deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Page deletion failed on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_testmonials&ferr=Page deletion failed");

	}

	}

}

?>