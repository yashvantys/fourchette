<?php 

/* 
Caffe Contact Form
Author: Burak Aydin
*/


$to="you@yourdomain.com"; //Just change the this email
$first_name=$_POST['first-name'];
$second_name=$_POST['second-name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$header='From:'.$email;

$message.="\n\n".'--This email was sent from your site name.';


mail($to,$subject,$message,$header);