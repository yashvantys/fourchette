<?php

class customerClass

{ 
	function get_All_FullNames($tablename,$returnvar,$where)

	{ 

	    global $callConfig;

		$query=$callConfig->selectQuery($tablename,$returnvar,$where,'','','');

		$res=$callConfig->getRow($query); 

		return $res->$returnvar; 

	}

	

  function getAllStoreCategoryList($mcid,$sortfield,$order,$start,$limit)

  {

	global $callConfig;

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;

	$whr=" status='Active'";

	if($mcid!="")

	$whr=$whr." and mcid='".$mcid."'";

	$query=$callConfig->selectQuery(TPREFIX.TBL_STORECATEGORY,'*',$whr,$order,$start,$limit);

	return $callConfig->getAllRows($query);

  } 
  
  
 
  
  

  function getAllStoreCategoryListCount($where)

  {

	global $callConfig;

	if($where!="")

	$whr=" status='".$where."'";

	$query=$callConfig->selectQuery(TPREFIX.TBL_STORECATEGORY,'scid',$whr,'','','');

	return $callConfig->getCount($query);

  } 

  function getStoreCategoryData($id)

  {

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_STORECATEGORY,'*','scid='.$id,'','','');

	return $callConfig->getRow($query);

 }

 function getCategoryData($id)

  {

	global $callConfig;

  $query=$callConfig->selectQuery(TPREFIX.TBL_MAINCATEGORY,'*','tid='.$id,'','','');

	return $callConfig->getRow($query);

 }

 function getproductsdata($id)

  {

	global $callConfig;

	 $query=$callConfig->selectQuery(TPREFIX. TBL_STOREPRODUCTS,'*','spid='.$id,'','','');

	return $callConfig->getRow($query);

 }



 

 function getAllTypes()

  {

	global $callConfig;

	$where="status='Active'";

	$query=$callConfig->selectQuery(TPREFIX.TBL_MAINCATEGORY,'*',$where,'','','');

	return $callConfig->getAllRows($query);

  }

 

function storeCategoryDelete($id)

	{

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_STORECATEGORY,'image','scid='.$id,'','','');

	$imageres = $callConfig->getRow($query);

	$callConfig->imageCommonUnlink("../uploads/store/category/","../uploads/store/category/thumbs/",$imageres->image);

	$res=$callConfig->deleteRecord(TPREFIX.TBL_STORECATEGORY,'scid',$id);

	if($res==1)

	{

		$query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'spid,image','scid='.$id,'','','');

		$productsres = $callConfig->getAllRows($query);

		$c=array();

		foreach($productsres as $res_prod){

		$c[]=$res_prod->spid;

		$callConfig->imageCommonUnlink("../uploads/store/products/","../uploads/store/products/thumbs/",$res_prod->image);

		}

		$callConfig->deleteRecord(TPREFIX.TBL_STOREPRODUCTS,'spid',$c);

		sitesettingsClass::recentActivities('Store > Category deleted successfully on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_storecat&err=Store > Category deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Store > Category deletion failed on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_storecat&ferr=Store > Category deletion failed");

	}

	}

// end store category //



 // Product store //

 function getAllProductSizes($sortfield,$order,$start,$limit)

  {

	global $callConfig;

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;

	$query=$callConfig->selectQuery(TPREFIX.TBL_STORESIZES,'*','',$order,$start,$limit);

	return $callConfig->getAllRows($query);

  }

 function getAllProductsList($sortfield,$order,$start,$limit)

  {

	global $callConfig;

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;

	 $query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'*','',$order,$start,$limit); 

	return $callConfig->getAllRows($query);

  } 

  function getAllProductsListCount()

  {

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'spid','','','','');

	 return $callConfig->getCount($query);

  } 

  

  function getProductData($id)

  {

	global $callConfig;

	 $query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'*','spid='.$id,'','','');

	return $callConfig->getRow($query);

 }

 

 	function getAllshadeimageList($id)

  {

	global $callConfig;

	  $query=$callConfig->selectQuery(TPREFIX.TBL_SHADE,'*','sppid='.$id,'id ASC','','');

	return $callConfig->getAllRows($query);

 }

 

		function getAllmainimageList($id)

		{

			global $callConfig;

			$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTMAINIMAGE,'*','pmid='.$id,'','','');

			return $callConfig->getAllRows($query);

		}

		function getAllmainimageListCount($id)

		{

			global $callConfig;

			$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTMAINIMAGE,'*','pmid='.$id,'','','');

			return $callConfig->getCount($query);

		}

		

		function getAllgalleryimageList($id)

		{

			global $callConfig;

			$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTGALLERYIMAGE,'*','pgid='.$id,'','','');

			return $callConfig->getAllRows($query);

		}

		function getAllgalleryimageListCount($id)

		{

			global $callConfig;

			$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTGALLERYIMAGE,'*','pgid='.$id,'','','');

			return $callConfig->getCount($query);

		}
/*=========================================Product Inserting===============================================*/

		function insertProducts($post)

		{
			global $callConfig;
			$prodimage = $callConfig->freeimageUploadcomncode('prod','image',"../uploads/store/products/","../uploads/store/products/thumbs/",'','','');
		$prodimage1=$callConfig->freeimageUploadcomncode('prod1','image1',"../uploads/store/products/","../uploads/store/products/thumbs/",'',214,150);
		$prodimage2=$callConfig->freeimageUploadcomncode('prod2','image2',"../uploads/store/products/","../uploads/store/products/thumbs/",'',214,150);
		$prodimage3=$callConfig->freeimageUploadcomncode('prod3','image3',"../uploads/store/products/","../uploads/store/products/thumbs/",'',214,150);
			$titleslug=$callConfig->remove_special_symbols($post['prodtitle']);
			
			if($post['featured']=='')
			{
				$x='No';
			}
			else
			{
				$x='Yes';
			}
			
			$fieldnames=array('mcid'=>$post['mcid'],'scid'=>$post['scid'],'prodtitle'=>mysql_real_escape_string($post['prodtitle']),'prodtitle_slug'=>$titleslug,'smalltext'=>mysql_real_escape_string($post['smalltext']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$prodimage,'image1'=>$prodimage1,'image2'=>$prodimage2,'image3'=>$prodimage3,'oldprice'=>$post['oldprice'],'prodtype'=>$post['prodtype'],'prodtype'=>$post['prodtype'],'status'=>$post['status'],'gcat_id'=>$post['gcat_id'],'aval_stock'=>$post['avail_stock'],'featured'=>$x);
			$res=$callConfig->insertRecord(TPREFIX.TBL_STOREPRODUCTS,$fieldnames);
			for($x=0;$x<count($post['goescheck']);$x++)
			{
				$fieldnames4=array('product_id'=>$res,'shop_prod_id'=>$post['goescheck'][$x]);
				$callConfig->insertRecord(TPREFIX.TBL_RLTDPRDS,$fieldnames4);
			}
			if($res!="")
			{
				$gallery_images_count=sizeof($_FILES['gallery_image']['name']);
				for($i=0;$i<$gallery_images_count;$i++)
				{
					if($_FILES['gallery_image']['name'][$i]!="")
					{
						$new_image=$callConfig->freeimageUploadcomncodearray('gallery_images','gallery_image',$i,"../uploads/store/shades/","../uploads/store/shades/thumbs/",'',617,374);

						$fieldnames=array('pgid'=>$res,'image1'=>$new_image,'colortext'=>$post['color'][$i],'maintext'=>$post['main'][$i],'colorprice'=>$post['colorprice'][$i]);

						$res1=$callConfig->insertRecord(TPREFIX.TBL_PRODUCTGALLERYIMAGE,$fieldnames);
					}
				}
				$width_count=sizeof($post['width']);
				for($j=0;$j<$width_count;$j++)
				{
					if($post['width'][$j]!="")

					{
						$fieldnames2=array('sppid'=>$res,'width'=>$post['width'][$j],'height'=>$post['height'][$j],'price'=>$post['price'][$j]);
						$res2=$callConfig->insertRecord(TPREFIX.TBL_SHADE,$fieldnames2);
					}
				}
				sitesettingsClass::recentActivities('Store > Product created successfully on > '.DATE_TIME_FORMAT.'','g');


				$callConfig->headerRedirect("index.php?option=com_storeproducts&err=Store > Product created successfully");

			}

			else

			{
	sitesettingsClass::recentActivities('Store > Product creation failed on > '.DATE_TIME_FORMAT.'','e');
    $callConfig->headerRedirect("index.php?option=com_storeproducts&ferr=Store > Product creation failed");
			}
		}
/*=========================================Product Inserting End=============================================*/

/*=========================================Product updating start============================================*/
		function updateProducts($post)
		{
			global $callConfig;
			$prodimage = $callConfig->freeimageUploadcomncode('prod','image',"../uploads/store/products/","../uploads/store/products/thumbs/",$post['hdn_image'],'617','374');
			$prodimage1=$callConfig->freeimageUploadcomncode('prod1','image1',"../uploads/store/products/","../uploads/store/products/thumbs/",$post['hdn_image1'],617,374);
		  	$prodimage2=$callConfig->freeimageUploadcomncode('prod2','image2',"../uploads/store/products/","../uploads/store/products/thumbs/",$post['hdn_image2'],617,374);
		  	$prodimage3=$callConfig->freeimageUploadcomncode('prod3','image3',"../uploads/store/products/","../uploads/store/products/thumbs/",$post['hdn_image3'],617,374);
			$titleslug=$callConfig->remove_special_symbols($post['prodtitle']);
			
			if($post['featured']=='')
			{
				$x='No';
			}
			else
			{
				$x='Yes';
			}
			//print_r($post);
			//exit;
			$fieldnames=array('mcid'=>$post['mcid'],'scid'=>$post['scid'],'prodtitle'=>mysql_real_escape_string($post['prodtitle']),'prodtitle_slug'=>$titleslug,'smalltext'=>mysql_real_escape_string($post['smalltext']),'bigtext'=>mysql_real_escape_string($post['bigtext']),'image'=>$prodimage,'image1'=>$prodimage1,'image2'=>$prodimage2,'image3'=>$prodimage3,'oldprice'=>$post['oldprice'],'prodtype'=>$post['prodtype'],'prodtype1'=>$post['prodtype1'],'status'=>$post['status'],'gcat_id'=>$post['gcat_id'],'aval_stock'=>$post['avail_stock'],'featured'=>$x);
			
			$res=$callConfig->updateRecord(TPREFIX.TBL_STOREPRODUCTS,$fieldnames,'spid',$post['hdn_id']);
			$delete_record=$callConfig->deleteRecord(TPREFIX.TBL_RLTDPRDS,'product_id',$post['hdn_id']);
			
			for($x=0;$x<count($post['goescheck']);$x++)
			{
				$fieldnames4=array('product_id'=>$post['hdn_id'],'shop_prod_id'=>$post['goescheck'][$x]);
				$callConfig->insertRecord(TPREFIX.TBL_RLTDPRDS,$fieldnames4);
			}
			if($res!="")
			{
				$gallery_images_count=count($_FILES['gallery_image']['name']);
				for($c=0;$c<$gallery_images_count;$c++)
				{
					if($_FILES['gallery_image']['name']!="")
					{
						if(isset($post['gal_hdn_image_name'][$c]) && $post['gal_hdn_image_name'][$c]!="")
						{
							$new_image=$callConfig->freeimageUploadcomncodearray('gallery_images','gallery_image',$c,"../uploads/store/shades/","../uploads/store/shades/thumbs/",$post['gal_hdn_image_name'][$c],617,374);
							//$fieldnames=array('pgid'=>$post['hdn_id'],'image1'=>$new_image);

$fieldnames=array('pgid'=>$post['hdn_id'],'image1'=>$new_image,'colortext'=>$post['color'][$c],'maintext'=>$post['main'][$c],'colorprice'=>$post['colorprice'][$c]);//print_r($fieldnames); 
	$res1=$callConfig->updateRecord(TPREFIX.TBL_PRODUCTGALLERYIMAGE,$fieldnames,'id',$post['gal_hdn_image_id'][$c]);
						}
						else
						{
							$new_image=$callConfig->freeimageUploadcomncodearray('gallery_images','gallery_image',$c,"../uploads/store/shades/","../uploads/store/shades/thumbs/",'',617,374);
							$fieldnames=array('pgid'=>$post['hdn_id'],'image1'=>$new_image,'colortext'=>$post['color'][$c],'maintext'=>$post['main'][$c],'colorprice'=>$post['colorprice'][$c]);
							$res1=$callConfig->insertRecord(TPREFIX.TBL_PRODUCTGALLERYIMAGE,$fieldnames);
						}
					}
				}
					$width_count=sizeof($post['width']);
				for($jk=0;$jk<$width_count;$jk++)
				{
					if(!isset($post['hidden_width'][$jk]) && $post['hidden_width'][$jk]=="")
					{
						if($post['width'][$jk]!="")
						{
$fieldnames2=array('sppid'=>$post['hdn_id'],'width'=>$post['width'][$jk],'height'=>$post['height'][$jk],'price'=>$post['price'][$jk]);
						$res2=$callConfig->insertRecord(TPREFIX.TBL_SHADE,$fieldnames2);	
					}
					}
					else 
					{
						$fieldnames2=array('sppid'=>$post['hdn_id'],'width'=>$post['width'][$jk],'height'=>$post['height'][$jk],'price'=>$post['price'][$jk]);
				$res2=$callConfig->updateRecord(TPREFIX.TBL_SHADE,$fieldnames2,'id',$post['shade_id'][$jk]);
					}
				}
				sitesettingsClass::recentActivities('Store > Product updated successfully on > '.DATE_TIME_FORMAT.'','g');
				$callConfig->headerRedirect("index.php?option=com_storeproducts&err=Store > Product updated successfully");	
			}
			else
			{
		sitesettingsClass::recentActivities('Store > Product updation failed on > '.DATE_TIME_FORMAT.'','e');
		$callConfig->headerRedirect("index.php?option=com_storeproducts&ferr=Store > Product updation failed");
			}
		}
/*=========================================Product updating End	=============================================*/
	function productsDelete($id)

	{

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'image,image2,image3','spid='.$id,'','','');

	$imageres = $callConfig->getRow($query);

	$callConfig->imageCommonUnlink("../uploads/store/products/","../uploads/store/products/thumbs/",$imageres->image);

	$callConfig->imageCommonUnlink("../uploads/store/products/","../uploads/store/products/thumbs/",$imageres->image2);

	$callConfig->imageCommonUnlink("../uploads/store/products/","../uploads/store/products/thumbs/",$imageres->image3);

	$res=$callConfig->deleteRecord(TPREFIX.TBL_STOREPRODUCTS,'spid',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Store > Product deleted successfully on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_storeproducts&err=Store > Product deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Store > Product deletion failed on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_storeproducts&ferr=Store > Product deletion failed");

	}

	}


	function getAllOrdersList($sortfield,$order,$start,$limit)	
	{
		global $callConfig;		
		if($sortfield!="" && $order!="") 
		//$whr='GROUP BY txn_no';
		//$order=$whr.' '.$sortfield.' '.$order;		
		$query="SELECT * FROM tb_customers ORDER BY id DESC LIMIT ".$start.",".$limit."";
		return $callConfig->getAllRows($query);
	} 

  function getAllOrdersListCount()

  {

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_CUSTOMERS,'id','','','','');

	 return $callConfig->getCount($query);

  } 



 function getAllSearchname($search,$sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 $query="SELECT * FROM tb_customers where customername LIKE '%".$search."%' ORDER BY id DESC LIMIT ".$start.",".$limit."";
	  //$query=$callConfig->selectQuery(TPREFIX.TBL_CUSTOMER,'*','customername LIKE "%'.$search.'%"',$order,$start,$limit); 

	return $callConfig->getAllRows($query);
  } 
  
  function getAllSearchnamecount($search,$sortfield,$order,$start,$limit)
  {
	global $callConfig;

	if($sortfield=="" && $order=="") 	
	 $order=$sortfield.' '.$order;  
	 $order="";
	 
	  $query=$callConfig->selectQuery(TPREFIX.TBL_CUSTOMERS,'*','customername LIKE "%'.$search.'%"',$order,$start,$limit); 

	return $callConfig->getCount($query);
  } 
  

  function OrderStatusChanging($get){

	global $callConfig;

	if($get['st']=="Pending")

	$statusbe='Delivered';

	$fieldnames=array('status'=>$statusbe);

	$res=$callConfig->updateRecord(TPREFIX.TBL_CART_TRANSACTION,$fieldnames,'tx_id',$get['id']);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Order Status changed successfully on > '.DATE_TIME_FORMAT.'','g');

		$callConfig->headerRedirect("index.php?option=com_orderlist&err=Order Status changed successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Order Status changing failed on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_orderlist&ferr=Order Status changing failed");

	}

	}

	

	function OrderDelete($id)

	{

	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_CUSTOMERS,'id',$id);

	if($res==1)

	{

	    $callConfig->deleteRecord(TPREFIX.TBL_CUSTOMERS,'id',$id);

		sitesettingsClass::recentActivities('Customer deleted successfully on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_customers&err=Customer deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Customer deletion failed on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_customers&ferr=Customer deletion failed");

	}

	}

	

	 // store coupons //

  function getAllStoreCouponList($sortfield,$order,$start,$limit)

  {

	global $callConfig;

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;

	$query=$callConfig->selectQuery(TPREFIX.TBL_STORECOUPONS,'*','',$order,$start,$limit);

	return $callConfig->getAllRows($query);

  } 

  function getAllStoreCouponListCount()

  {

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_STORECOUPONS,'id','','','','');

	return $callConfig->getCount($query);

  } 

  function getStoreCouponData($id)

  {

	global $callConfig;

	$query=$callConfig->selectQuery(TPREFIX.TBL_STORECOUPONS,'*','id='.$id,'','','');

	return $callConfig->getRow($query);

 }

 	

	function insertStoreCoupon($post)

	{

	global $callConfig;

	$querysel=$callConfig->selectQuery(TPREFIX.TBL_STORECOUPONS,'couponcode'," couponcode='".$post['couponcode']."' ",'','','');

	$cnt=$callConfig->getCount($querysel);

	if($cnt<=0)

	{

		//print_r($post['expiredon']);

		

		$dateArray=explode('-',$post['expiredon']);

		$dt = $dateArray[2].'-'.$dateArray[0].'-'.$dateArray[1];

		

		$fieldnames=array('couponcode'=>$post['couponcode'],'distype'=>$post['distype'],'discount'=>$post['discount'],'expiredon'=>$dt);

		$res=$callConfig->insertRecord(TPREFIX.TBL_STORECOUPONS,$fieldnames);

		if($res!="")

		{

			sitesettingsClass::recentActivities('Store > Coupon created successfully on > '.DATE_TIME_FORMAT.'','g');

			$callConfig->headerRedirect("index.php?option=com_storecoupons&err=Store > Coupon created successfully");

			exit;

		}

		else

		{

			sitesettingsClass::recentActivities('Store > Coupon creation failed on > '.DATE_TIME_FORMAT.'','e');

			$callConfig->headerRedirect("index.php?option=com_storecoupons&ferr=Store > Coupon creation failed");

			exit;

		}

	} 

	else 

	{

	        sitesettingsClass::recentActivities('Store > Coupon already exist in database > '.DATE_TIME_FORMAT.'','e');

			$callConfig->headerRedirect("index.php?option=com_storecoupons&ferr=Store > Coupon already exist in database");

	}

	}

	

	function updateStoreCoupon($post)

	{

	global $callConfig;

	$querysel=$callConfig->selectQuery(TPREFIX.TBL_STORECOUPONS,'couponcode'," couponcode='".$post['couponcode']."' and id!='".$post['hdn_id']."' ",'','','');

	$cnt=$callConfig->getCount($querysel);

	if($cnt<=0)

	{

	    $dateArray=explode('-',$post['expiredon']);

		$dt = $dateArray[2].'-'.$dateArray[0].'-'.$dateArray[1];

		

		$fieldnames=array('couponcode'=>$post['couponcode'],'distype'=>$post['distype'],'discount'=>$post['discount'],'expiredon'=>$dt);

	    $res=$callConfig->updateRecord(TPREFIX.TBL_STORECOUPONS,$fieldnames,'id',$post['hdn_id']);

		if($res==1)

		{

			sitesettingsClass::recentActivities('Store > Coupon updated successfully on > '.DATE_TIME_FORMAT.'','g');

			$callConfig->headerRedirect("index.php?option=com_storecoupons&err=Store > Coupon updated successfully");

		}

		else

		{

			sitesettingsClass::recentActivities('Store > Coupon updation failed on > '.DATE_TIME_FORMAT.'','e');

			$callConfig->headerRedirect("index.php?option=com_storecoupons&ferr=Store > Coupon updation failed");

		}

	} 

	else 

	{

	    sitesettingsClass::recentActivities('Store > Coupon already exist in database > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_storecoupons&ferr=Store > Coupon already exist in database");

	}

	}

	

	

	

	function storeCouponDelete($id)

	{

	global $callConfig;

	$res=$callConfig->deleteRecord(TPREFIX.TBL_STORECOUPONS,'id',$id);

	if($res==1)

	{

		sitesettingsClass::recentActivities('Store > Coupon deleted successfully on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_storecoupons&err=Store > Coupon deleted successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('Store > Coupon deletion failed on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_storecoupons&ferr=Store > Coupon deletion failed");

	}

	}

	

	

	function SendStatusMail($uid,$txid)

  {

	global $callConfig;

		$sitedata=sitesettingsClass::getsitesettings();

		$query="select a.email,ai.b_firstname,ai.b_lastname from ".TPREFIX.TBL_ADMIN." a,".TPREFIX.TBL_ADMINSINFO." ai where ai.userid=a.user_id and a.user_id='".$uid."'";

		$resval=$callConfig->getRow($query);

		$query="select tx_no,posted_date,status from ".TPREFIX.TBL_CART_TRANSACTION." where tx_id='".$txid."'";

		$restr=$callConfig->getRow($query);

		

		

	$to=$resval->email;

	$username=$resval->b_firstname.' '.$resval->b_lastname;

	$tx_no=$restr->tx_no;

	$status=$restr->status;

	$posted_date=$restr->posted_date;

	$posted_date=date("m/d/Y", strtotime($restr->posted_date));

	$subject="NuroSource > Your Order Status Details";

	$message="<table cellspacing='0' cellpadding='5'  align='center' width='100%' border='0' style='border:1px solid #CCCCCC; border-collapse:collapse; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;'>

	<tr>

	<td align='left' valign='top'><a href='".SITEURL."'><img src='".SITEURL."/images/inner-logo_04.gif' border='0' width='120' height='80' ></a></td>

	</tr>

	<tr>

	<td align='left' valign='top'>Dear<strong> ".$username.",</strong></td>

	</tr>

	<tr>

	<td valign='top' align='left'><strong>Your Order Status Details:</strong></td>

	</tr>

	<tr>

	<td valign='top' align='left'><strong>Order date:</strong> ".$posted_date." (MM/DD/YYYY) </td>

	</tr>

	<tr>

	<td valign='top' align='left'><strong>Transaction ID:</strong> ".$tx_no." </td>

	</tr>

	<tr>

	<td valign='top' align='left'><strong>Status :</strong> ".$status." </td>

	</tr>

	<tr>

	<td valign='top' align='left'>Thank You,<br />

	Support Team, NuroSource</td>

	</tr>

	<tr>

		<td valign='top' colspan='2' align='left'>".$sitedata->email_sign."</td>

		</tr>

	</table>";

	//echo $message; exit;

    $headers  = 'MIME-Version: 1.0' . "\r\n";

	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	$headers .= 'From: '.$sitedata->mail_fromname.' <'.$sitedata->mail_frommail.'>' . "\r\n";

	mail($to, $subject, $message, $headers);

  } 

	

	 function getOrder_Comments($txid)

  {

	global $callConfig;

	 $query=$callConfig->selectQuery(TPREFIX.TBL_CART_TRANSACTION,'*','tx_id='.$txid,'','','');

	return $callConfig->getRow($query);

  }

	

	

   function updateOrderComment($field,$post)

	{

	global $callConfig;

	if($field=="remarks")

	$fieldnames=array('order_comments'=>mysql_real_escape_string($post['ge_remarks']));

    $res=$callConfig->updateRecord(TPREFIX.TBL_CART_TRANSACTION,$fieldnames,'tx_id',$post['hdn_popupenquiry_id']);

	if($res==1)

	{

		//sitesettingsClass::recentActivities('Store > Color updated successfully on > '.DATE_TIME_FORMAT.'','g');

		$callConfig->headerRedirect("index.php?option=".$post['redirectpath']."&id=".$post['hdn_tranx_no']."&err=Comment updated successfully");

	}

	else

	{

		//sitesettingsClass::recentActivities('Store > Color updation failed on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=".$post['redirectpath']."&id=".$post['hdn_tranx_no']."&ferr=Comment updation failed");

	}

	}	

	

	

// end store coupons //

	

  

   function searchkeyComments($key,$sortfield,$order,$start,$limit)

  {

	global $callConfig;

	if($sortfield!="" && $order!="") $order='a.'.$sortfield.' '.$order;

	if($key=='view')

	$whr=" order_comments!='' ";

	if($key=='post')

	$whr=" order_comments='' ";

	if($key=='del')

	$whr=" status='Delivered' ";

	if($key=='inpro')

	$whr=" status='In Process' ";

	if($key=='neworder')

	$whr=" status='New Ordered' ";

	if($key=='notdel')

	$whr=" status='Not Delivered' ";

	if($key=='fol')

	$whr=" followup='Yes' ";

	if($key=='unfol')

	$whr=" followup='No' ";

	 $query=$callConfig->selectQuery(TPREFIX.TBL_CART_TRANSACTION,'*',$whr,'','','');

	return $callConfig->getAllRows($query);

  }

  

  

  function forntuserFollowStatusChanging($get){

	global $callConfig;

	if($get['fu']=="Yes")

	$statusbe='No';

	else

	$statusbe='Yes';

	$fieldnames=array('followup'=>$statusbe);

	$res=$callConfig->updateRecord(TPREFIX.TBL_CART_TRANSACTION,$fieldnames,'tx_id',$get['id']);

	if($res==1)

	{

		sitesettingsClass::recentActivities('User > Status changed successfully on > '.DATE_TIME_FORMAT.'','g');

		$callConfig->headerRedirect("index.php?option=com_orderlist&err=User > Status changed successfully");

	}

	else

	{

		sitesettingsClass::recentActivities('User > Status changing failed on > '.DATE_TIME_FORMAT.'','e');

		$callConfig->headerRedirect("index.php?option=com_orderlist&ferr=User > Status changing failed");

	}

	}

  

  

  // end store //

  

  

  function getAllProductsDetails($id,$sortfield,$order,$start,$limit)

  {

	global $callConfig;

	$whr=" sppid='".$id."'";

	if($sortfield!="" && $order!="") $order=$sortfield.' '.$order;

	$query=$callConfig->selectQuery(TPREFIX.TBL_SHADE,'*',$whr,$order,$start,$limit);

	return $callConfig->getAllRows($query);

  } 

	function getallproductslistbycategory($cat_id,$present_prod_id)

	{

		global $callConfig;

		$whr="mcid=".$cat_id." && spid!=".$present_prod_id." && status='Active'";

		$orderby="spid DESC";

		$query=$callConfig->selectQuery(TPREFIX.TBL_STOREPRODUCTS,'spid,prodtitle',$whr,$orderby,'','');

		return $callConfig->getAllRows($query);

	}

	

	function checkrelatedproduct($main_prd_id,$realted_product_id)

	{

		global $callConfig;

		$whr='product_id='.$main_prd_id.'&& shop_prod_id='.$realted_product_id;

		$query=$callConfig->SelectQuery(TPREFIX.TBL_RLTDPRDS,'*',$whr,'','','');

		return $callConfig->getCount($query);

	}

	

	function deleteGallryImage($image_id,$prod_id)

	{

			global $callConfig;

			$whr="id=".$image_id;

			$query=$callConfig->selectQuery(TPREFIX.TBL_PRODUCTGALLERYIMAGE,'*',$whr,'','','');

			$result=$callConfig->getRow($query);

			$callConfig->imageCommonUnlink("../uploads/store/products/","../uploads/store/products/thumbs/",$result->image1);

			$del_query=$callConfig->deleteRecord(TPREFIX.TBL_PRODUCTGALLERYIMAGE,'id',$image_id);

				$callConfig->headerRedirect("index.php?option=com_storeproducts_insert&id=".$prod_id);

	}

  	function deleteShadeImage($image_id,$prod_id)

	{

		global $callConfig;

		$whr="id=".$image_id;

		$query=$callConfig->selectQuery(TPREFIX.TBL_SHADE,'*',$whr,'','','');

		$result=$callConfig->getRow($query);

		$callConfig->imageCommonUnlink("../uploads/store/shades/","../uploads/store/shades/thumbs/",$result->shade_image1);

		$del_query=$callConfig->deleteRecord(TPREFIX.TBL_SHADE,'id',$image_id);

				$callConfig->headerRedirect("index.php?option=com_storeproducts_insert&id=".$prod_id);

	}
	
	function getAvailProd($prod_id)
	{
		global $callConfig;
		$query="SELECT SUM(quantity) as value_sum FROM  ".TPREFIX.TBL_CART_ORDER." WHERE prod_id=".$prod_id;
		$purchased_products=$callConfig->getRow($query);
		return $purchased_products->value_sum;
	}

}	

	?>