<?php

class contentpagesClass
{ 

  function getAllContentPagesList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_STAFF,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllContentPagesListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_STAFF,'page_id','','','','');
	return $callConfig->getCount($query);
	} 

	function getContentPageData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_STAFF,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}

 	function insertcontentPage($post)
	{
		global $callConfig;
		
		if($post['productname']!="")
		$titleslug=$callConfig->remove_special_symbols($post['productname']);
		else
		$titleslug=$callConfig->remove_special_symbols($post['productname']);
		//Image creating//
		
		//echo "<pre>";
		//print_r($_POST);
		//echo "<pre>";
		
		$bannerimage = $callConfig->freeimageUploadcomncode('staff','productimage',"../uploads/Staff/","../uploads/Staff/thumbs/",$post['hdn_image'],'87','45');
		$fieldnames=array(
		'staffname'=>mysql_real_escape_string($post['productname']),
		'staffid'=>mysql_real_escape_string($post['productskuid']),'email'=>$post['email'],'paswrd'=>$callConfig->passwordEncrypt($post['paswrd']),'profileimage'=>$bannerimage,'status'=>$post['status']);
		
		
		$res=$callConfig->insertRecord(TPREFIX.TBL_STAFF,$fieldnames);
		if($res!="")
		{
			sitesettingsClass::recentActivities('Staff Added successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_users&err=Staff Added successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Staff Adding failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_users&ferr=Staff Adding failed");
		}
	}
	
	function updatecontentPage($post)
	{
		global $callConfig;
		
		$bannerimage = $callConfig->freeimageUploadcomncode('staff','productimage',"../uploads/Staff/","../uploads/Staff/thumbs/",$post['hdn_image'],'87','45');
		$fieldnames=array('staffname'=>mysql_real_escape_string($post['productname']),'email'=>$post['email'],'paswrd'=>$callConfig->passwordEncrypt($post['paswrd']),'staffid'=>mysql_real_escape_string($post['productskuid']),'profileimage'=>$bannerimage,'status'=>$post['status']);
		
			//print_r($fieldnames); exit;
		$res=$callConfig->updateRecord(TPREFIX.TBL_STAFF,$fieldnames,'id',$post['hdn_page_id']);
		//echo $res; exit;
		if($res!="")
		{
			sitesettingsClass::recentActivities('Product updated successfully on >> '.DATE_TIME_FORMAT.'','g');
			$callConfig->headerRedirect("index.php?option=com_users&err=User updated successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Product updattion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_users&ferr=User updattion failed");
		}
	}

	function contentpageDelete($id)
	{
	//echo "syam";exit;
		global $callConfig;
		$res=$callConfig->deleteRecord(TPREFIX.TBL_STAFF,'id',$id);

		if($res==1)
		{
			sitesettingsClass::recentActivities('Page deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_users&err=User deleted successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Page deletion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_users&ferr=User deletion failed");
		}

	}

}

?>