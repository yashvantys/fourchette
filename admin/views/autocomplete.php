<?php
	$q=$_GET['q'];
	$mysqli=mysqli_connect('localhost','root','','sleepingpills') or die("Database Error");
	$sql="SELECT * FROM tb_customers WHERE customername LIKE '%".$_GET['q']."%' ORDER BY customername";
	$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			echo $row['customername']."\n";
		}
	}
?>