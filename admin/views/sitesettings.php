<?php 

include('includes/session.php');

include("model/site.class.php");

$siteObj=new siteClass();
//echo "hai";

if($_POST['admininsert']=="Save")
{
	//echo "<pre>";
	//print_r($_POST);
	//echo "<pre>";exit;
   $siteObj->insertcontentPage($_POST); 
}

if($_POST['admininsert']=="Update")
{

   $siteObj->updatesitesettings($_POST);

}


$indivdata=$siteObj->getsitesettings(); 
//print_r($indivdata); exit;


if(isset($_GET['id']) && $_GET['id']!="")
{
//echo "syamsunder";exit;
   $hdn_value="Update";

   $indivdata=$siteObj->getsitesettings(); 
   //print_r($indivdata);
   $hdn_in_up='class="button button_save"';
}
else
{ 

  $hdn_value="Submit";

  $hdn_in_up='class="button button_add"';

}

if($_GET['action']=="delete")

{

   $siteObj->contentpageDelete($_GET['id']);

}

$start=0;

if($_GET['start']!="")$start=$_GET['start'];

if($site_settings_disp->noofrecords!="0")

$limit=$site_settings_disp->noofrecords;

else

$limit=1;

if($_GET['fld']!="")

$fiild=$_GET['fld'];

else

$fiild="page_id";

if($_GET['ord']!="")

$ordby=$_GET['ord'];

else

$ordby="ASC";

$allpages=$siteObj->getAllContentPagesList($fiild,$ordby,$start,$limit);
//print_r($allpages);

$total=$siteObj->getAllContentPagesListCount();

?>

<?php if($option!="com_sitesettings_insert"){?>
 <script type="text/javascript"  src="../ckeditor/ckeditor.js"></script>
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
                            <li><a href="index.php?option=com_sitesettings"> SiteSettings  </a></li>
                            <li><a href="#"><img src="images/title_pics_22.png" alt=""></a></li>
                            <li><a href="#"> Edit SiteSettings </a></li>
                        </ul>
                    </div><!--title_blg-->
                    <form action="index.php?option=com_sitesettings" method="post" id="frmCreateListing" name="frmCreateListing" class="middle_form" onSubmit="return validate();"  enctype="multipart/form-data">
                    <div class="add_product_blg">
                    
                    	<div class="add_product_blg_top">
                    	  <p>Edit Site Settings </p>
                      </div><!--add_product_blg_top-->
                        
                       <div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Admin Page Title:</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<input type="text" name="title" value="<?php echo $indivdata->title;?>">
                        </div><!--add_product_blg_btm_rgt-->
                       </div><!--add_product_blg_btm-->
                       
                       <div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Site Logo :</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<input type="file" name="site_image">
							<?php  //echo $indivdata->site_image;
							if($indivdata->site_image!=""){?>
                                <img src="../uploads/site/<?php echo $indivdata->site_image; ?>" width="50" height="50" style="background: url(images/logo_bg_02.png) top center repeat-x;"/>
                                <input type="hidden" name="hdn_image" size="24" value="<?php echo $indivdata->site_image; ?>" />
                            <?php } ?>
                        </div><!--add_product_blg_btm_rgt-->
                       </div><!--add_product_blg_btm-->
                       <div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Phone Number:</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<input type="text" name="website_number" value="<?php echo $indivdata->website_number;?>">
                        </div><!--add_product_blg_btm_rgt-->
                       </div>
                        <!--add_product_blg_btm-->
						
						  <div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Contact EMail:</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<input type="text" name="website_email" value="<?php echo $indivdata->website_email;?>">
                        </div><!--add_product_blg_btm_rgt-->
                       </div>
                        <!--add_product_blg_btm-->
						
						
						  <div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Facebook:</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<input type="text" name="facebook" value="<?php echo $indivdata->facebook;?>">
                        </div><!--add_product_blg_btm_rgt-->
                       </div>
                        <!--add_product_blg_btm-->
						
						
						
						  <div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Google Plus:</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<input type="text" name="googleplus" value="<?php echo $indivdata->googleplus;?>">
                        </div><!--add_product_blg_btm_rgt-->
                       </div>
                        <!--add_product_blg_btm-->
						
						<div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Twitter:</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<input type="text" name="twitter" value="<?php echo $indivdata->twitter;?>">
                        </div><!--add_product_blg_btm_rgt-->
                       </div>
                        <!--add_product_blg_btm-->
						
							<div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Picasa:</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<input type="text" name="picasa" value="<?php echo $indivdata->picasa;?>">
                        </div><!--add_product_blg_btm_rgt-->
                       </div>
                        <!--add_product_blg_btm-->
						
						
						
							<div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>RSS:</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<input type="text" name="rss" value="<?php echo $indivdata->rss;?>">
                        </div><!--add_product_blg_btm_rgt-->
                       </div>
                        <!--add_product_blg_btm-->
						
						
						<div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Footer Note:</p>
                        </div><!--add_product_blg_btm_lft-->
                        <div class="add_product_blg_btm_rgt">
                        	<input type="text" name="footer_txt" value="<?php echo $indivdata->footer_txt;?>">
                        </div><!--add_product_blg_btm_rgt-->
                       </div>
                        <!--add_product_blg_btm-->
                       
                       <!--<div class="add_product_blg_btm">
                       	<div class="add_product_blg_btm_lft">
                        	<p>Statuts :</p>
                        </div><!--add_product_blg_btm_lft
                         <div class="add_product_blg_btm_rgt">
                        	<select name="status" id="status">
                            	<option>Active</option>
                                <option>Inactive</option>
                            </select>
							
							<script type="text/javascript">
                            for(var i=0;i<document.getElementById('status').length;i++)
                            {
                                if(document.getElementById('status').options[i].value=="<?php echo $indivdata->status; ?>")
                                {
                                document.getElementById('status').options[i].selected=true
                                }
                            }			
                            </script>

                        </div><!--add_product_blg_btm_rgt
                       </div>--><!--add_product_blg_btm-->
                       <div class="add_product_blg_btm">
                           <input name="hdn_page_id" type="hidden" value="<?php echo $indivdata->id?>">
                           
                           <input type="submit" name="admininsert" value="Update">
                          
                       </div><!--add_product_blg_btm-->
                    </div><!--add_product_blg-->
                </form>    
                </div><!--content_blg--> 
           </div>
<?php }?>