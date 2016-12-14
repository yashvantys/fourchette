<?php 

include('includes/session.php');

include("model/customers.class.php");

$storeObj=new customerClass();

if($_GET['action']=="delete"){

   $storeObj->OrderDelete($_GET['id']);

}

if($_GET['st']!="" || $_GET['st']=="Pending" || $_GET['st']=="Delivered"){

   $storeObj->OrderStatusChanging($_GET);
}

if($_GET['fu']!="" || $_GET['fu']=="Yes" || $_GET['fu']=="No"){

   $storeObj->forntuserFollowStatusChanging($_GET);

}

if($_GET['smuid']!=""){

	$storeObj->SendStatusMail($_GET['smuid'],$_GET['smtid']);

}

if($_POST['adminpopupupdate']=="Submit"){

   $storeObj->updateOrderComment("remarks",$_POST);

}

$start=0;$pageno=1;

if($_GET['start']!="")
{
	$start=$_GET['start'];
}

if($_GET['pagno']!="")
{
	$pageno=$_GET['pagno']+1;
}

if($_GET['pagnos']!="")
{
	$pageno=$_GET['pagnos']-1;
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

if($_POST['customersearch']=='Submit') {

$allorderlist=$storeObj->getAllSearchname($_POST['search'],$fiild,$ordby,$start,$limit);

$total=$storeObj->getAllSearchnamecount();


} else {

$allorderlist=$storeObj->getAllOrdersList($fldname,$orderby,$start,$limit);
//print_r($allorderlist);
$total=$storeObj->getAllOrdersListCount();
 }
/*if($_POST['serchkeyword']){

	$allorderlist=$storeObj->searchkeyComments($_POST['serchkeyword'],$fldname,$orderby,$start,$limit);
	$total = count($allorderlist);
}
*/
?>

<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
<!-- <script type="text/javascript" src="js/jquery.js"></script> -->
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
<script>
$(document).ready(function(){
 $("#tag").autocomplete("views/autocomplete.php", {
		selectFirst: true
	});
});
</script>


<?php if($option!="com_customers_insert"){?>
<div class="site_rgt">
           		<?php include('includes/adminheader.php');?>
                <div class="content_blg">
                	<div class="page_name_blg">
                    	<div class="page_name_lft">
                    		<h2>Dashbord</h2>
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
                            <li><a href="index.php?option=com_customers">Customer Management</a></li>
                            <li><a href="#"><img src="images/title_pics_22.png" alt=""></a></li>
                            <li><a href="#">Customer</a></li>
                        </ul>
                    </div><!--title_blg-->
                    <div class="clear_fix"></div>
                    <div class="customer-list">
                     <div class="heading_wrap">
                       <h4>Customers Listing</h4> 
                       <!--<div class="searchbar_wrap">
                         <div class="sercin_top">
                           <form name="searchcustomers" method="post">
                            <input type="text" class="borderinpurt_right" name="search" id="tag" placeholder="Search Customers...." value="<?php echo $_POST['search']; ?>">
							<input type="image" src="images/search-icon_03.png" class="sericsubmit" />
							<input type="hidden" name="customersearch" value="Submit" />
                           
                            </form>
                            <div class="clear_fix"></div>
                          </div><!--sercin_top
                           <div class="explore_wrap"><input type="submit" value="Export"></div>
                          <div class="clear_fix"></div>
                       </div>--><!--searchbar_wrap-->                   
                      <div class="clear_fix"></div>
                     </div>
                     <div class="clear_fix"></div>
                     <?php
                       		$res=mysql_query("select * from tb_customers order by id");
							$totalrecords=mysql_num_rows($res);
					   ?>
                     <div class="paginationwrap">page 
                       <span style="position:relative; top:12px;"><a href="#"><img src="images/pagination-arrows_07.png" name="backward" onclick="return changepage(this.name)"></a></span>
                       <span style="position:relative; top:4px;"><input type="text" id="pageno" readonly="readonly" value="<?php echo $pageno;?>"></span>
                       <span style="position:relative; top:12px;"><a href="#"><img src="images/pagination-arrows_09.png" name="forward" onclick="return changepage(this.name)"></a></span> of <?php $i=1; if($total>$limit) { ?><?php echo ceil($total/$limit); ?> <?php $i++; } else { ?> 1 <?php } ?> | View
                       <span class="padding_wrap1">
                           <select name="data" id="datas" onchange="return showdata(this.value)">
                           <option value="5">5</option>
                           <option value="10">10</option>
                           <option value="15">15</option>
                           <option value="20">20</option>
                           <option value="30">30</option>
                           <option value="40">40</option>
                           <option value="50">50</option>
                           </select>
                           
                           <script type="text/javascript">
                            for(var i=0;i<document.getElementById('datas').length;i++)
                            {
                                if(document.getElementById('datas').options[i].value=="<?php echo $limit; ?>")
                                {
                                document.getElementById('datas').options[i].selected=true
                                }
                            }
							function changepage(name)
							{	
								var c=document.getElementById('pageno').value;
								//alert(name);
								if(name=='forward')
								{							
								start=c*<?php echo $limit;?>;												
								if(start<=<?php echo $totalrecords; ?>)
								{
								window.location.assign('index.php?option=com_customers&limit='+<?php echo $limit;?>+'&start='+start+'&pagno='+c);
								}}
								else
								{
								start=(c-2)*<?php echo $limit;?>;
								if(!(start<0))
								{
								//alert('sss');
								
								window.location.assign('index.php?option=com_customers&limit='+<?php echo $limit;?>+'&start='+start+'&pagnos='+c);	}
								}
							}			
                            </script>
                       </span>
					   <script>
					   function showdata(a) {
					   window.location.assign('index.php?option=com_customers&limit='+a);
					   }
					   </script>
                       
                       <span class="padding_wrap">records | Found total <?php echo $totalrecords; ?> records</span>
                       
                     </div><!--paginationwrap-->

                     <div class="table_wrap">
                       <div class="tableheading">
                         <div class="customersno">Sno</div>
                         <div class="customername">Name</div>
                         <div class="customeremail"><!-- <img src="images/arrow_03.png">--> Email</div>
                         <div class="customerphoneno">Phone Number  </div>
                         <div class="customergender">Gender</div>
                         <div class="customerstatus">Action</div>
                         <div class="clear_fix"></div>
                       </div><!--tableheading-->
                       
                       <ul class="table_listing">
                       
                        <?php
						if(sizeof($allorderlist)>0){
						$ii=0;
						foreach($allorderlist as $all_pages)
						{
						?>
                            <li>
                             <div class="customersno1"><?php echo $ii+1;  ?></div>
                             <div class="customername1"><span>Name</span> <?php echo $all_pages->customername;?> </div>
                             <div class="customeremail1"><span>Email</span> <?php echo $all_pages->email_address;?></div>
                             <div class="customerphoneno1"><span>Phone Number</span> <?php echo $all_pages->phone;?></div>
                             <div class="customergender1"><span>Gender</span> <?php echo $all_pages->gender;?></div>
                             <div class="customerstatus1" onClick="var q = confirm('Are you sure you want to delete selected record?'); if (q) { window.location = 'index.php?option=com_customers&action=delete&id=<?php echo $all_pages->id;?>'; return false;}"><span>Action</span><img src="images/edit-delete_06.png" style="cursor: pointer;"> </div>
                             <div class="clear_fix"></div>
                            </li>
						<?php $ii++;}}else{	?>                        
                        	<li>No Records..</li>
                        <?php 
                        }
                        ?>
                       <!-- <li>
                         <div class="customersno1"><input type="checkbox"></div>
                         <div class="customername1"><span>Name</span> Customer Name </div>
                         <div class="customeremail1"><span>Email</span> customer@domainname.com</div>
                         <div class="customerphoneno1"><span>Phone Number</span>+91 70455 82379</div>
                         <div class="customergender1"><span>Gender</span> Male</div>
                         <div class="customerstatus1"><span>Status</span> <img src="images/btns_10.png"></div>
                         <div class="clear_fix"></div>
                        </li>


                        <li>
                         <div class="customersno1"><input type="checkbox"></div>
                         <div class="customername1"><span>Name</span> Customer Name </div>
                         <div class="customeremail1"><span>Email</span> customer@domainname.com</div>
                         <div class="customerphoneno1"><span>Phone Number</span>+91 92462 18507</div>
                         <div class="customergender1"><span>Gender</span> Male</div>
                         <div class="customerstatus1"><span>Status</span> <img src="images/btns_13.png"></div>
                         <div class="clear_fix"></div>
                        </li>-->
                       
                       </ul>
                    
                    </div><!--table_wrap-->
                    <div class="clear_fix"></div>
                    </div>
                    
                    
                </div><!--content_blg--> 
           </div>
<?php }else{?>
<script type="text/javascript"  src="ckeditor/ckeditor.js"></script>
<div class="site_rgt">
           		<div class="admin_blg">
                	<div class="admin_blg_in">
                    	<div class="admin_blg_in_lft">
                        	<a href="#"><img src="images/admin_pic_03.png" alt=""></a>
                        </div><!--admin_blg_in_lft-->
                        <div class="admin_blg_in_rgt">
                        	<span>Admin</span>
                            <span><img src="images/admin_pic_06.png" alt=""></span>
                        </div><!--admin_blg_in_rgt-->	
                    </div><!--admin_blg_in-->
                </div><!--admin_blg-->
                <div class="content_blg">
                	<div class="page_name_blg">
                    	<div class="page_name_lft">
                    		<h2>Dashbord</h2>
                        </div><!--page_name_lft-->
                        <div class="page_name_rgt">
                        	<a href="#"><img src="images/settng_pic_14.png" alt=""></a>
                        </div><!--page_name_rgt-->
                    </div><!--page_name_blg-->
                    <div class="title_blg">
                    	<ul>
                        	<li><a href="index.php?option=com_dashboard"><img src="images/title_pics_19.png" alt=""></a></li>
                            <li><a href="index.php?option=com_dashboard">Home</a></li>
                            <li><a href="#"><img src="images/title_pics_22.png" alt=""></a></li>
                            <li><a href="index.php?option=com_customers"> Customer Management  </a></li>
                            <li><a href="#"><img src="images/title_pics_22.png" alt=""></a></li>
                            <li><a href="#"> Add/Edit Customers </a></li>
                        </ul>
                    </div><!--title_blg-->
                    
                    <div class="add_product_blg">
                    
                    	<div class="add_product_blg_top">
                        	 <p>Add/Edit Products</p>
                        </div><!--add_product_blg_top-->
                        
                       <div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Title:</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<input type="text">
                        </div><!--add_product_blg_btm_rgt-->
                       </div><!--add_product_blg_btm-->
                       
                         
                       <div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>SKU Id:</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<input type="text">
                        </div><!--add_product_blg_btm_rgt-->
                       </div><!--add_product_blg_btm-->
                       
                         
                       <div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Stock:</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<input type="text">
                        </div><!--add_product_blg_btm_rgt-->
                       </div><!--add_product_blg_btm-->
                       
                       <div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Sale:</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<select>
                            	<option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                        </div><!--add_product_blg_btm_rgt-->
                       </div><!--add_product_blg_btm-->
                       
                       <div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Image :</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<input type="file">
                        </div><!--add_product_blg_btm_rgt-->
                       </div><!--add_product_blg_btm-->
                       
                        <div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Image :</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<textarea  name="descr" id="descr" class="ckeditor"  ></textarea>
                        </div><!--add_product_blg_btm_rgt-->
                       </div><!--add_product_blg_btm-->
                       
                       <div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Statuts :</p>
                        </div><!--add_product_blg_btm_lft-->
                         <div class="add_product_blg_btm_rgt">
                        	<select>
                            	<option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                        </div><!--add_product_blg_btm_rgt-->
                       </div><!--add_product_blg_btm-->
                       <div class="add_product_blg_btm">
                           <input type="submit" value="Save">
                           <input type="submit" value="Update">
                       </div><!--add_product_blg_btm-->
                    </div><!--add_product_blg-->
                    
                </div><!--content_blg--> 
           </div>
	
<?php }?>