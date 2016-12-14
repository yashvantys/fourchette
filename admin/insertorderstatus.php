<?php
error_reporting(0);

$con=mysql_connect('localhost','rajeshch_cspills',"SVIDg(hN_.f.");
$connection=mysql_select_db("rajeshch_cheepsleepingpills",$con);

if($_GET['ch']=='status')
{
	
	$res=mysql_query('update tb_orders set status="'.$_GET['q'].'" where transactionid='.$_GET['id']);
	
	if($res!="")
	{
		echo "Status successfully changed";
	}
	else
	{
		echo "Status updation fail";
	}
}
else
{
	$res=mysql_query('update tb_orders set assign_to="'.$_GET['q'].'" where id='.$_GET['id']);
	
	if($res!="")
	{
		echo "Assigned successfully";
	}
	else
	{
		echo "Failed to Assign";
	}
}
?>