<?php

header("Content-type: application/ms-excel");
header("Content-Disposition: attachment;Filename=ExportOrders.xls");
session_start();
echo "<pre>";
//print_r($_SESSION);
echo "</pre>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Export Orders Report</title>
<style type="text/css">
.style1 
{
	color: #0000;
	font-weight: bold;
}
</style>
</head>
<body>

<?php

$allorderlist=$_SESSION['dispatchsummary'];
/*include('../dbconfig.php');
include('includes/dbconnection.php');
include("model/store.class.php");
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
$fldname="id";

if($_GET['ord']!="")
$orderby=$_GET['ord'];
else
$orderby="DESC";


if($_SESSION['status']!='' && $_SESSION['status']!='All') 
{
	//$_SESSION['status']=$_GET['status'];
	
	$allorderlist=$storeObj->getAllOrdersListstatus($_SESSION['status'],$fldname,$orderby,$start,$limit);	
	$total=$storeObj->getAllOrdersListstatuscount($_SESSION['status'],$fldname,$orderby,$start,$limit);

} 
else if($_SESSION['status']=='All') 
{
	//$_SESSION['status']=$_GET['status'];

	$allorderlist=$storeObj->getAllOrdersList($fldname,$orderby,$start,$limit);
	$total=$storeObj->getAllOrdersListCount();

} 
else if($_SESSION['week']!='') 
{	
	//$_SESSION['week']=$_GET['week'];
	
	$allorderlist=$storeObj->getAllOrdersListdb1($_SESSION['week'],$fldname,$orderby,$start,$limit);
	$total=$storeObj->getAllOrdersListdbCount($_SESSION['week'],$fldname,$orderby,$start,$limit);

}
else if($_SESSION['month']!='') 
{
	//$_SESSION['month']=$_GET['month'];
	
	$allorderlist=$storeObj->getAllOrdersListdb1($_SESSION['month'],$fldname,$orderby,$start,$limit);
	$total=$storeObj->getAllOrdersListdbCount($_SESSION['month'],$fldname,$orderby,$start,$limit);

}
else if($_SESSION['process']=='In Progress') 
{
//echo "inprocess";
	//$_SESSION['process']=$_GET['process'];
	
	$allorderlist=$storeObj->getAllOrdersListdb1($_SESSION['process'],$fldname,$orderby,$start,$limit);
	$total=$storeObj->getAllOrdersListdbCount($_SESSION['process'],$fldname,$orderby,$start,$limit);

}
else if($_SESSION['process']=='Decline') 
{
//echo "Decline";
	//$_SESSION['process']=$_GET['process'];
	
	$allorderlist=$storeObj->getAllOrdersListdb1($_SESSION['process'],$fldname,$orderby,$start,$limit);
	$total=$storeObj->getAllOrdersListdbCount($_SESSION['process'],$fldname,$orderby,$start,$limit);
}
else if($_SESSION['process']=='Newordered') 
{//echo "Newordered";
//echo "ssssssss";
	//$_SESSION['process']=$_GET['process'];
	$allorderlist=$storeObj->getAllOrdersListdb1($_SESSION['process'],$fldname,$orderby,$start,$limit);
	$total=$storeObj->getAllOrdersListdbCount($_SESSION['process'],$fldname,$orderby,$start,$limit);
} 
else
{
	$allorderlist=$storeObj->getAllOrdersList($fldname,$orderby,$start,$limit);
	$total=$storeObj->getAllOrdersListCount();
}


if(isset($_SESSION['search'])) 
{
	$_POST=$_SESSION['search']; 
	$allorderlist=$storeObj->getAllOrderssearchList($_POST,$fldname,$orderby,$start,$limit);
	//print_r($allorderlist);	
	$total=$storeObj->getAllOrderssearchListCount($_POST);
}*/

?>

<table width="100%" border="1" cellpadding="0" cellspacing="0" >
          <thead>
                <tr height="25">
                    <td width="403" align="left" valign="middle" ><h3 class="style1">OrderId&nbsp;&nbsp;&nbsp;&nbsp;Name</h3></td>
                    <td width="203" align="left" valign="middle" ><h3 class="style1">Product</h3></td>
                    <td width="203" align="left" valign="middle" ><h3 class="style1">Tracking Number</h3></td>                
                </tr>
          </thead>
			<tbody>
			
			<?php
			//echo sizeof($allorderlist); exit;
			if(count($allorderlist)>0){
				$ii=0;
				foreach($allorderlist as $allorderlist){
				
					//print_r($uservalues);exit;
					?>
			<tr height="22">
                <td align="left" valign="middle"><?php echo $allorderlist->orderid; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $allorderlist->cust_id; ?></td>
                <td align="left" valign="middle"><?php echo $allorderlist->pro_name." ".$allorderlist->quantygrams; ?></td>
                <td align="left" valign="middle" style="text-align:right"><?php echo "W"; ?></td>
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
<?php 

unset($_SESSION['search']);
unset($_SESSION['status']);
unset($_SESSION['week']);
unset($_SESSION['month']);
unset($_SESSION['process']);

?>

</body></html>