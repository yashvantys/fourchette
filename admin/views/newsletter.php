<?php 
//echo "syamsunder";
include('includes/session.php');

include("model/newsletter.class.php");

$contentpageObj=new contentpagesClass();

if($_POST['admininsert']=="Save")
{
	//echo "<pre>";
	//print_r($_POST);
	//echo "<pre>";exit;
   $contentpageObj->insertcontentPage($_POST); 
}

if($_POST['admininsert']=="Update")
{

   $contentpageObj->updatecontentPage($_POST);

}
/*
if(isset($_GET['id']) && $_GET['id']!="")
{

   //$hdn_value="Update";

   $indivdata=$contentpageObj->getContentPageData($_GET['id']); 
   //print_r($indivdata);
   $hdn_in_up='class="button button_save"';
}
else
{ 

  $hdn_value="Submit";

  $hdn_in_up='class="button button_add"';

}
*/
if($_GET['action']=="delete")
{

   $contentpageObj->contentpageDelete($_GET['id']);

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

$fiild=$_GET['fld'];

else

$fiild="page_id";

if($_GET['ord']!="")

$ordby=$_GET['ord'];

else

$ordby="ASC";

$allpages=$contentpageObj->getAllContentPagesList($fiild,$ordby,$start,$limit);
//print_r($allpages);

$total=$contentpageObj->getAllContentPagesListCount();
?>
<script type="text/javascript" src="js/checkuncheckall.js"></script>

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
                            <li><a href="index.php?option=com_subscription">Newsletter Management</a></li>
                            <li><a href="#"><img src="images/title_pics_22.png" alt=""></a></li>
                            <li><a href="index.php?option=com_subscription">Newsletter</a></li>
                        </ul>
                    </div><!--title_blg-->
                    <div class="clear_fix"></div>
                    <div class="customer-list">
                    
                    
                     <div class="heading_wrap">
                       <h4>Newsletters Listing</h4> 
                       <!--<div class="searchbar_wrap">
                         <div class="sercin_top">
                          <form name="searchproducts" method="post">
                            <input type="text" class="borderinpurt_right" name="search" placeholder="Search product name..." value="<?php echo $_POST['search']; ?>">
							<input type="image" src="images/search-icon_03.png" class="sericsubmit" />
							<input type="hidden" name="coupounsearch" value="Submit" />
                           
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
                       		$res=mysql_query("select * from tb_newsletter order by id");
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
								window.location.assign('index.php?option=com_subscription&limit='+<?php echo $limit;?>+'&start='+start+'&pagno='+c);
								}}
								else
								{
								start=(c-2)*<?php echo $limit;?>;
								if(!(start<0))
								{
								//alert('sss');
								
								window.location.assign('index.php?option=com_subscription&limit='+<?php echo $limit;?>+'&start='+start+'&pagnos='+c);	}
								}
							}			
                            </script>
                       </span>
					   <script>
					   function showdata(a) {
					   window.location.assign('index.php?option=com_subscription&limit='+a);
					   }
					   </script>
                       
                       <span class="padding_wrap">records | Found total <?php echo $totalrecords; ?> records</span>
                       <!--<span class="padding_wrap" style="float:right; margin-top:10px"><a href="index.php?option=com_subscription_insert"><img src="images/add-btn_03.png" /></a></span>-->
                        <div class="clear_fix"></div>
                     </div><!--paginationwrap-->
<form name="frmCreatestate"  method="post">
                     <div class="table_wrap">
                       <div class="tableheading">
                         <div class="newselettersno">Sno</div>
                         <div class="newselettersname">Name</div>
                         <div class="newselettersemail"><!-- <img src="images/arrow_03.png">--> Email</div>
                         <div class="newselettersphoneno">Assign to All   <input type="checkbox" name="check" id="check" value="" onclick="checkAlluncheckAll('frmCreatestate', 'list')"/>  </div>
                         <div class="newselettersgender">Delete</div>
                         <div class="clear_fix"></div>
                       </div><!--tableheading-->
                       
                       <ul class="table_listing">
                       
                        <?php
						if(sizeof($allpages)>0){
						$ii=0;
						foreach($allpages as $all_pages)
						{
						?>
                            <li>
                             <div class="newselettersno1"><?php echo $ii+1; ?></div>
                             <div class="newselettersname1"><span>Name</span> <?php echo $all_pages->name;?> </div>
                             <div class="newselettersemail1"><span>Email</span> <?php echo $all_pages->email;?></div>
                             <div class="newselettersphoneno1"><span>Assign to All  </span>
                             <input type="checkbox" name="list[]" id="list" value="<?php echo $all_pages->id; ?>" <?php if( $all_pages->assign=='1'){echo 'checked';} ?>></div>
                             <div class="newselettersgender1" onClick="var q = confirm('Are you sure you want to delete selected record?'); if (q) { window.location = 'index.php?option=com_subscription&action=delete&id=<?php echo $all_pages->id;?>'; return false;}"><span>Delete</span><img src="images/edit-delete_06.png" style="cursor: pointer;"></div>
                             <div class="clear_fix"></div>
                            </li>
						<?php $ii++;}}else{	?>                        
                        	<li>No Records..</li>
                        <?php 
                        }
                        ?>
                       
                       
                       </ul>
                    
                    </div><!--table_wrap-->
					 </form>
                    <div class="clear_fix"></div>
                    </div>
                    
                   
                    
                </div><!--content_blg--> 
           </div>

 
  