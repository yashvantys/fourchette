<?php

class blogClass
{ 

  function getAllContentPagesList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_BLOG,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllContentPagesListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_BLOG,'page_id','','','','');
	return $callConfig->getCount($query);
	} 

	function getContentPageData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_BLOG,'*','id='.$id,'','','');
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
		
		$blogimage = $callConfig->freeimageUploadcomncode('blog','image',"../uploads/blog/","../uploads/blog/thumbs/",$post['hdn_image'],'87','45');
		$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'posteddate'=>$datte,'description'=>$post['description'],'image'=>$blogimage,'status'=>$post['status']);
		
		
		$res=$callConfig->insertRecord(TPREFIX.TBL_BLOG,$fieldnames);
		if($res!="")
		{
			sitesettingsClass::recentActivities('Staff Added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_blog&err=Staff Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Staff Adding failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_blog&ferr=Staff Adding failed");
		}
	}
	
	function updatecontentPage($post)
	{
		global $callConfig;
		
	$blogimage = $callConfig->freeimageUploadcomncode('blog','image',"../uploads/blog/","../uploads/blog/thumbs/",$post['hdn_image'],'87','45');
		$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'posteddate'=>mysql_real_escape_string($post['posteddate']),'description'=>$post['description'],'image'=>$blogimage,'status'=>$post['status']);
		
		
			//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_BLOG,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Blog updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_blog&err=User updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Blog updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_blog&ferr=User updattion failed");
		}
	}

	function contentpageDelete($id)
	{
	//echo "syam";exit;
		global $callConfig;
		$res=$callConfig->deleteRecord(TPREFIX.TBL_BLOG,'id',$id);

		if($res==1)
		{
			sitesettingsClass::recentActivities('Page deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_blog&err=User deleted successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Page deletion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_blog&ferr=User deletion failed");
		}

	}

}

?>