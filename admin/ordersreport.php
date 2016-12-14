<?php 

$filename = "Ordersreport.doc";
 
header("Content-Disposition: attachment; filename=" . $filename);

header("Content-type: application/vnd.ms-word");


//header("Content-type: application/vnd.ms-word");
//header("Content-Disposition: attachment;Filename=excelreport.doc");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Report</title>
<style type="text/css">
.style1 {

	color: #0000;

	font-weight: bold;

}

</style>

</head>

<body>

<?php



include('../dbconfig.php');



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

//$start=0;
 
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

if($_GET['status']!='' && $_GET['status']!='All') {

$allorderlist=$storeObj->getAllOrdersListstatus($_GET['status'],$fldname,$orderby,$start,$limit);
//print_r($allorderlist);
$total=$storeObj->getAllOrdersListstatuscount($_GET['status'],$fldname,$orderby,$start,$limit);

} else if($_GET['status']=='All') {
//echo "hai"; exit;

$allorderlist=$storeObj->getAllOrdersList($fldname,$orderby,$start,$limit);
//print_r($allorderlist);
$total=$storeObj->getAllOrdersListCount();

} else {

$allorderlist=$storeObj->getAllOrdersList($fldname,$orderby,$start,$limit);

//print_r($allorderlist); exit;
$total=$storeObj->getAllOrdersListCount();
//echo count($total);;
}


if($_POST['orderssearch']=='Search') {

//print_r($_POST); exit;

$allorderlist=$storeObj->getAllOrderssearchList($_POST,$fldname,$orderby,$start,$limit);
//print_r($allorderlist);
$total=$storeObj->getAllOrderssearchListCount($_POST);
}

//echo count($allorderlist); exit;
//print_r($allorderlist); exit;


//echo "hello"; exit;
//print_r($uservalues); exit;




?>

<table width="100%" border="1" cellpadding="0" cellspacing="0" >
          <thead>
            <tr height="25">
<!--              <td width="51" height="22" align="center" valign="middle"><h3 class="style1">Sno</h3></td>
-->		      <td width="203" align="left" valign="middle" ><h3 class="style1">Order Id</h3></td>
                <td width="203" align="left" valign="middle" ><h3 class="style1">Order Details</h3></td>
                 <td width="203" align="left" valign="middle" ><h3 class="style1">Billing Address</h3></td>
                    <td width="203" align="left" valign="middle" ><h3 class="style1">Delivery Address</h3></td>
                     <td width="203" align="left" valign="middle" ><h3 class="style1">Payment Details</h3></td>
                     
            </tr>
          </thead>
			<tbody>
			
			<?php
			//echo sizeof($allorderlist); exit;
			if(count($allorderlist)>0){
				$ii=0;
				foreach($allorderlist as $all_orderlists){
				
				$getaddress=$storeObj->getorderadress($all_orderlists->transactionid);
				
				$getcardaddress=$storeObj->getcardaddress($all_orderlists->transactionid);
				
					//print_r($uservalues);exit;
					?>
			<tr height="22">
		<!--<td align="center" valign="middle"><?=($ii+1);?></td>-->
			<td align="left" valign="middle"><?php echo $all_orderlists->orderid;?>&nbsp;</td>
            <td align="left" valign="middle"><?php echo 'Date : '.$all_orderlists->dateon;?><br  /><?php echo "SHIPPING FREE DELIVERY"; ?><br /><?php echo 'Tel : '.$getaddress->bphone;?><br /><?php echo 'Email : '.$getaddress->bemail;?><br />---------<br /><?php echo $all_orderlists->qtypills; ?> x <?php echo $all_orderlists->pro_name; ?><?php echo $all_orderlists->quantygrams; ?></td>
            <td align="left" valign="middle"><?php echo $getaddress->badd1; ?><br /><?php echo $getaddress->badd2; ?>&nbsp;</td>
            <td align="left" valign="middle"><?php echo $getaddress->sadd1; ?><br /><?php echo $getaddress->sadd2; ?>&nbsp;</td>
            <td align="left" valign="middle"><?php echo 'Total: $'.$all_orderlists->price;?><br /><?php echo 'Type: '.$getcardaddress->card_type;?><br /><?php echo 'Name: '.$getcardaddress->cardname;?><br /><?php echo 'Number: '.$getcardaddress->cardnumber;?><br /><?php echo 'Expire: '.$getcardaddress->exp_month;?>/<?php echo $getcardaddress->exp_year; ?><br /><?php echo 'CVV: '.$getcardaddress->cvvnumber;?><br />&nbsp;</td>
          </tr>
			<?php
				$ii++; } } else{
			?>
							<tr><td colspan="14" align="center" height="100">No Order Reports..</td></tr>
			<?php 
			}
			?>
			</tbody>
						<tr><td colspan="14" align="left">&nbsp;
						</td></tr>		
    </table>







</body></html>