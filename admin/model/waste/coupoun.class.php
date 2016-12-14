<?php

class coupounClass
{ 

  function getAllcoupounList($sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	 $query=$callConfig->selectQuery(TPREFIX.TBL_COUPOUN,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 

	function getAllcoupounListCount()
	{
	global $callConfig;
	$query=$callConfig->selectQuery(TPREFIX.TBL_COUPOUN,'id','','','','');
	return $callConfig->getCount($query);
	} 
	
	
	
	function getAllSearchname($search,$sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	  $query=$callConfig->selectQuery(TPREFIX.TBL_COUPOUN,'*','couponcode LIKE "%'.$search.'%"',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 
  
  function getAllSearchnamecount($search,$sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	  $query=$callConfig->selectQuery(TPREFIX.TBL_COUPOUN,'*','couponcode LIKE "%'.$search.'%"',$order,$start,$limit); 

	return $callConfig->getCount($query);
  } 
	
	

	function getcoupounData($id)
	{	
		global $callConfig;
		$query=$callConfig->selectQuery(TPREFIX.TBL_COUPOUN,'*','id='.$id,'','','');
		return $callConfig->getRow($query);
	}


function insertcoupons($post)

	{//print_r($_POST); exit;
	global $callConfig;
	

 	$querysel=$callConfig->selectQuery(TPREFIX.TBL_COUPONS,'couponcode'," couponcode='".$post['couponcode']."' ",'','','');

	$cnt=$callConfig->getCount($querysel);

	if($cnt<=0)

	{

		//print_r($post['expiredtime']); exit;

		

		$dateArray=explode('-',$post['expiredtime']);

		$dt = $dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0];

		//print_r($dt); exit;

		$fieldnames=array('couponcode'=>$post['couponcode'],'distype'=>$post['distype'],'discount'=>$post['discount'],'expiredtime'=>$dt);

		//print_r($fieldnames); exit;

		$res=$callConfig->insertRecord(TPREFIX.TBL_COUPOUN,$fieldnames);

		if($res!="")

		{

			sitesettingsClass::recentActivities('Store >> Coupon created successfully on '.DATE_TIME_FORMAT.'','g');

			$callConfig->headerRedirect("index.php?option=com_coupouns&head=b&err=Store Coupon created successfully");

			exit;

		}

		else

		{

			sitesettingsClass::recentActivities('Store >> Coupon creation failed on >> '.DATE_TIME_FORMAT.'','e');

			$callConfig->headerRedirect("index.php?option=com_coupouns&head=b&ferr=Store Coupon creation failed");

			exit;

		}

	} 

	else 

	{

	        sitesettingsClass::recentActivities('Store >> Coupon already exist in database '.DATE_TIME_FORMAT.'','e');

			$callConfig->headerRedirect("index.php?option=com_coupouns&head=b&ferr=Store Coupon already exist in database");

	}

	}

	
	function updatecoupons($post)

	{

	global $callConfig;

	$querysel=$callConfig->selectQuery(TPREFIX.TBL_COUPONS,'couponcode'," couponcode='".$post['couponcode']."' and id!='".$post['hdn_id']."' ",'','','');

	$cnt=$callConfig->getCount($querysel);

	if($cnt<=0)

	{

	    $dateArray=explode('-',$post['expiredtime']);

		$dt = $dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0];

		

			$fieldnames=array('couponcode'=>$post['couponcode'],'distype'=>$post['distype'],'discount'=>$post['discount'],'expiredtime'=>$dt);

			//print_r($fieldnames);exit;

	    $res=$callConfig->updateRecord(TPREFIX.TBL_COUPOUN,$fieldnames,'id',$post['hdn_page_id']);

		if($res==1)

		{

			sitesettingsClass::recentActivities('Store >> Coupon updated successfully on  '.DATE_TIME_FORMAT.'','g');

			$callConfig->headerRedirect("index.php?option=com_coupouns&head=b&err=Store Coupon updated successfully");

		}

		else

		{

			sitesettingsClass::recentActivities('Store >> Coupon updation failed on '.DATE_TIME_FORMAT.'','e');

			$callConfig->headerRedirect("index.php?option=com_coupouns&head=b&ferr=Store Coupon updation failed");

		}

	} 

	else 

	{

	    sitesettingsClass::recentActivities('Store >> Coupon already exist in database >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_coupouns&head=b&ferr=Store Coupon already exist in database");

	}

	}

	function coupounDelete($id)

	{
	//echo "syam";exit;
	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_COUPOUN,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Coupoun deleted successfully on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_coupouns&err=Coupoun deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Coupouns deletion failed on >> '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_coupouns&ferr=Coupouns deletion failed");

	}

	}

}

?>