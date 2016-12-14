<?php

class siteClass
{ 

  function getAllContentPagesList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllContentPagesListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'page_id','','','','');
	return $callConfig->getCount($query);
	} 

	function getContentPageData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTS,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}

 	 function updatesitesettings($post)

  {

	global $callConfig;

    $logobanner = $callConfig->freeimageUploadcomncode('logo','site_image',"../uploads/site/","../uploads/site/thumbs/",$post['hdn_image'],185,51);

	$fieldnames=array('title'=>mysql_real_escape_string($post['title']),'site_image'=>$logobanner,'footer_txt'=>mysql_real_escape_string($post['footer_txt']),'website_number'=>$post['website_number'],'website_email'=>$post['website_email'],'facebook'=>$post['facebook'],'googleplus'=>$post['googleplus'],'twitter'=>$post['twitter'],'picasa'=>$post['picasa'],'rss'=>$post['rss']);
	
	//print_r($fieldnames); exit;

	$res=$callConfig->updateRecord(TPREFIX.TBL_SITESETTINGS,$fieldnames,'id',$post['hdn_page_id']);

	if($res!='')

	{

		sitesettingsClass::recentActivities('Site settings updated successfully on > '.DATE_TIME_FORMAT.'','g');

		$callConfig->headerRedirect("index.php?option=com_sitesettings&err=Site settings updated successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Site settings updation failed on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_sitesettings&ferr=Site settings updation failed");

	}

  }

  function getsitesettings($id)

  {

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_SITESETTINGS,'*','id=1','','','');

	return $callConfig->getRow($query);

  }
	




}

?>