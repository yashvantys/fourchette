<?php

class contentpagesClass
{ 

  function getAllContentPagesList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	  $query=$callConfig->selectQuery(TPREFIX.TBL_NEWSLETTER,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllContentPagesListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_NEWSLETTER,'page_id','','','','');
	return $callConfig->getCount($query);
	} 

	function getContentPageData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_NEWSLETTER,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}

 	
	
	

	function contentpageDelete($id)
	{
	//echo "syam";exit;
		global $callConfig;
		$res=$callConfig->deleteRecord(TPREFIX.TBL_NEWSLETTER,'id',$id);

		if($res==1)
		{
			sitesettingsClass::recentActivities('Page deleted successfully on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_subscription&err=deleted successfully");
		}
		else
		{
			sitesettingsClass::recentActivities('Page deletion failed on >> '.DATE_TIME_FORMAT.'','e');
			$callConfig->headerRedirect("index.php?option=com_subscription&ferr=deletion failed");
		}

	}

}

?>