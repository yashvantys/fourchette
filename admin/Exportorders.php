<?php
header("Content-type: application/ms-excel");
header("Content-Disposition: attachment;Filename=ExportOrders.xls");
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Export Orders Report</title>

<style type="text/css">
.style1 {
	color: #0000;
	font-weight: bold;
}
</style>
</head>
<body>
<?php

$allorderlist=$_SESSION['exportreports'];


include('../dbconfig.php');
include('includes/dbconnection.php');
/*include("model/store.class.php");
include("model/user.class.php");

$userObj=new userClass();
$storeObj=new storeClass();

$start=0;
if($_GET['start']!="")
{
	$start=$_GET['start'];
}

if($site_settings_disp->noofrecords!="0") 
{
	if($_GET['limit']!='') 
	{
		$limit=$_GET['limit'];
	} 
	else 
	{
		$limit=5;
	} 
}
else
{
	$limit=0;
}

if($_GET['fld']!="")
$fldname=$_GET['fld'];
else
$fldname="cart_id";

if($_GET['ord']!="")
$orderby=$_GET['ord'];
else
$orderby="DESC";

if($_GET['status']!='' && $_GET['status']!='All') 
{
$allorderlist=$storeObj->getAllOrdersListstatus($_GET['status'],$fldname,$orderby,$start,$limit);
$total=$storeObj->getAllOrdersListstatuscount($_GET['status'],$fldname,$orderby,$start,$limit);
} 
else if($_GET['status']=='All') 
{
$allorderlist=$storeObj->getAllOrdersList($fldname,$orderby,$start,$limit);
$total=$storeObj->getAllOrdersListCount();
} 
else 
{
$allorderlist=$storeObj->getAllOrdersList($fldname,$orderby,$start,$limit);
$total=$storeObj->getAllOrdersListCount();
}

if($_POST['orderssearch']=='Search') 
{
	$allorderlist=$storeObj->getAllOrderssearchList($_POST,$fldname,$orderby,$start,$limit);
	$total=$storeObj->getAllOrderssearchListCount($_POST);
}*/
?>

<table width="100%" border="1" cellpadding="0" cellspacing="0" >
          <thead>
            <tr height="25">
                <td width="406" align="left" valign="middle" ><h3 class="style1">Export</h3></td>
            </tr>
          </thead>
			
            <tbody>
			
			<?php
			//echo sizeof($allorderlist); exit;
			if(count($allorderlist)>0){
				$ii=0;
				foreach($allorderlist as $all_orderlists){
				
				//echo $all_orderlists->checkout_id;
				$que='select * from tb_checkout where id='.$all_orderlists->checkout_id;
				$res=mysql_query($que);
				$row=mysql_fetch_array($res);
				/*echo "<pre>";
				print_r($row);
				echo "</pre>";*/
					?>
			<tr height="22">          
                <td align="left" valign="middle">
                    <?php echo $row['bfirst'];?><?php echo " ".$row['blast'];?><br />
                    <?php echo $row['bcompany'];?><br />
                    <?php echo $row['badd1'];?><br />
                    <?php if($row['badd2']!=''){ echo $row['badd2']."<br />";}?>
                    <?php echo $row['bcity'];?><br />
                    <?php echo $row['bstate'];?><br />
                    <?php echo $row['bcountry'];?><br /><br />
                    	
                    <?php echo $row['sfirst'];?><?php echo " ".$row['slast'];?><br />
                    <?php echo $row['scompany'];?><br />
                    <?php echo $row['sadd1'];?><br />
                    <?php if($row['sadd2']!=''){echo $row['sadd2']."<br />";}?>
                    <?php echo $row['scity'];?><br />
                    <?php echo $row['sstate'];?><br />
                    <?php echo $row['scountry'];?><br />
                </td>           
          	</tr>
			<?php
				$ii++; } } else{
			?>
							<tr><td colspan="1" align="center" height="100">No Order Reports..</td></tr>
			<?php 
			}
			?>
			</tbody>			
    </table>
</body></html>