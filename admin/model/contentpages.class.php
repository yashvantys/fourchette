<?php

class contentpagesClass
{ 

  function getAllContentPagesList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_CONTENTPAGES,'*','','page_id ASC',$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllContentPagesListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_CONTENTPAGES,'page_id','','','','');
	return $callConfig->getCount($query);
	} 

	function getContentPageData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_CONTENTPAGES,'*','page_id='.$id,'','','');
		return $callConfig->getRow($query);
	}

 	function insertcontentPage($post)
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
		'title'=>mysql_real_escape_string($post['title']),
		'title_slug'=>$titleslug,
		'bigtext'=>mysql_real_escape_string($post['descr']),
		'page_title'=>mysql_real_escape_string($post['page_title']),
		'meta_keyword'=>mysql_real_escape_string($post['meta_keyword']),
		'meta_desc'=>mysql_real_escape_string($post['meta_desc']),
		'status'=>mysql_real_escape_string($post['status']),
		'image'=>$contentimage	
		);
		
		
		$res=$callConfig->insertRecord(TPREFIX.TBL_CONTENTPAGES,$fieldnames);
		if($res!="")
		{
			sitesettingsClass::recentActivities('Page Added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_contentpages&err=Page Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Page Adding failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_contentpages&ferr=Page Adding failed");
		}
	}
	
	function updatecontentPage($post)
	{
		global $callConfig;
		
		if($post['productname']!="")
		$titleslug=$callConfig->remove_special_symbols($post['title']);
		else
		$titleslug=$callConfig->remove_special_symbols($post['title']);
		
			$contentimage = $callConfig->freeimageUploadcomncode('content','image',"../uploads/contents/","../uploads/contents/thumbs/",$post['hdn_image'],'87','45');
		
		$fieldnames=array(
		'title'=>mysql_real_escape_string($post['title']),
		'title_slug'=>$titleslug,
		'bigtext'=>mysql_real_escape_string($post['descr']),
		'page_title'=>mysql_real_escape_string($post['page_title']),
		'meta_keyword'=>mysql_real_escape_string($post['meta_keyword']),
		'meta_desc'=>mysql_real_escape_string($post['meta_desc']),
		'status'=>mysql_real_escape_string($post['status']),
		'image'=>$contentimage	
		);
		
		//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_CONTENTPAGES,$fieldnames,'page_id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Page updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_contentpages&err=Page updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Page updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_contentpages&ferr=Page updattion failed");
		}
	}

	function contentpageDelete($id)

	{
	//echo "syam";exit;
	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_CONTENTPAGES,'page_id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Page deleted successfully on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_contentpages&err=Page deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Page deletion failed on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_contentpages&ferr=Page deletion failed");

	}

	}

}

?>