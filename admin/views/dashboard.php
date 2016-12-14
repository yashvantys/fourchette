<?php 
include('includes/session.php');

//include("model/store.class.php");

//$storeObj=new storeClass();

//$allorderlist=$storeObj->getAllOrdersListountshowdb($fldname,$orderby,'0','100000000');
	
	//$sssss="SELECT  COUNT(*) FROM   tb_orders COUNT(GROUP BY transactionid);";
	$dd="SELECT DISTINCT transactionid FROM tb_orders";
	$orderscount= $callConfig->getCount($dd);
	
	$todaydate=date('Y-m-d');
	$minusweek=date('Y-m-d', strtotime("-1 week"));
	$month=date('Y-m-d', strtotime("-1 month"));
	$tdaydate="select DISTINCT transactionid,dateon FROM tb_orders where dateon BETWEEN '".$minusweek."' AND '".$todaydate."'";
	$weeklycount= $callConfig->getCount($tdaydate);	
	
	$monthdate="select DISTINCT transactionid,dateon FROM tb_orders where dateon BETWEEN '".$month."' AND '".$todaydate."'";
	$monthcount= $callConfig->getCount($monthdate);	
	
	$statusprgress="select DISTINCT transactionid FROM tb_orders where status='In Progress'";
	$statusprgresscount= $callConfig->getCount($statusprgress);	
	
	$cancelprgress="select DISTINCT transactionid FROM tb_orders where status='Decline'";
	$canelcount= $callConfig->getCount($cancelprgress);	
	
	$newprgress="select DISTINCT transactionid FROM tb_orders where status='Newordered'";
	$newordercount= $callConfig->getCount($newprgress);	
	
	
	
?>
    <div class="site_rgt">
           		<?php //include('includes/adminheader.php');?>
                <div class="content_blg" style="margin-top:50px;">
                	<div class="page_name_blg">
                    	<div class="page_name_lft">
                    		<h2>Dashboard</h2>
                        </div><!--page_name_lft-->
                        <div class="page_name_rgt">
                        	<a href="index.php?option=com_contentpages"><img src="images/settng_pic_14.png" alt=""></a>
                        </div><!--page_name_rgt-->
                    </div><!--page_name_blg-->
                    <div class="title_blg">
                    	<ul>
                        	<li><a href="index.php?option=com_dashboard"><img src="images/title_pics_19.png" alt=""></a></li>
                            <li><a href="index.php?option=com_dashboard">Home</a></li>
                            <li><a href="#"><img src="images/title_pics_22.png" alt=""></a></li>
                            <li><a href="index.php?option=com_dashboard">Dashboard</a></li>
                        </ul>
                    </div><!--title_blg-->
                    <div class="more_info_blg">
                    	<div class="more_info_blg_in">
                        	<img src="images/mr_pics_31.png" alt="">
                            <div class="more_pos">
                            	<a href="index.php?option=com_sitesettings"><h3>Configuration <br> Settings </h3></a>
                                <p><a href="index.php?option=com_sitesettings">more info</a> <img src="images/more_pic_06.png" alt=""></p>
                            </div><!--more_pos-->	
                        </div><!--more_info_blg_in-->
                        
                    	<div class="more_info_blg_in">
                        	<img src="images/mr_pics_33.png" alt="">
                            <div class="more_pos">
                            	<a href="index.php?option=com_contentpages"><h3>Content <br> Pages </h3></a>
                                <p><a href="index.php?option=com_contentpages">more info</a> <img src="images/more_pic_06.png" alt=""></p>
                            </div><!--more_pos-->	
                        </div><!--more_info_blg_in-->
                        
                        <div class="more_info_blg_in">
                        	<img src="images/mr_pics_35.png" alt="">
                            <div class="more_pos">
                            	<a href="index.php?option=com_customers"><h3>Customers <br> Management </h3></a>
                                <p><a href="index.php?option=com_customers">more info</a> <img src="images/more_pic_06.png" alt=""></p>
                            </div><!--more_pos-->	
                        </div><!--more_info_blg_in-->
                        
                       
                        
                    </div><!--more_info_blg-->
                    <div class="count_blg">
                    	<div class="count_blg_lft">
                        	
                            <div class="count_blg_lft_mid">
                            	
                                
                                <div class="count_blg_lft_mid_in new_bg">
                                	<p>New Customers</p>
                                    <h1>120 <small>members</small></h1>
                                    <span><a href="#">View All</a></span>
                                </div><!--count_blg_lft_mid_in-->
                                
                            </div><!--count_blg_lft_mid-->
                            
                            <div class="count_blg_lft_btm">
                            	<div class="count_blg_lft_btm_in">
                                	<div class="count_blg_lft_btm_in_lft">
                                    	<img src="images/pi_pic_03.png" alt="">
                                    </div><!--count_blg_lft_btm_in_lft-->
                                    <div class="count_blg_lft_btm_in_rgt">
                                    	<div class="count_blg_lft_btm_in_rgt_top">
                                        	<img src="images/pi2_pics_03.png" alt="">
                                            <span>New Customers</span>
                                        </div><!--count_blg_lft_btm_in_rgt_top-->
                                        <div class="count_blg_lft_btm_in_rgt_top">
                                        	<img src="images/pi2_pics_10.png" alt="">
                                            <span>Returning Customers</span>
                                        </div><!--count_blg_lft_btm_in_rgt_top-->
                                    </div><!--count_blg_lft_btm_in_rgt-->
                                </div><!--count_blg_lft_btm_in-->
                                
                                <div class="active_users">
                                	<div class="active_users_lft">
                                    	<div class="num_blg">
                                        <?php 
											$qu='SELECT count( * ) as total_records FROM tb_staff where status="Active"';
											$re=mysql_query($qu);
											$row=mysql_fetch_array($re);
											$total=$row['total_records'];
										?>
                                        	<h1><?php echo $total;?></h1>
                                        </div><!--num_blg-->
                                        <p>Active users on site 
right now...</p>
                                    </div><!--active_users_lft-->
                                    <div class="active_users_rgt">
                                    	<a href="#"><img src="images/man_pic_03.png" alt=""></a>
                                    </div><!--active_users_rgt-->
                                </div><!--active_users-->
                            </div><!--count_blg_lft_btm-->
                        </div><!--count_blg_lft-->
                      
                    </div><!--count_blg-->
                </div><!--content_blg--> 
           </div><!--site_rgt-->
    </div><!--site_wrap-->
