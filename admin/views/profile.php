<?php 

include('includes/session.php');

include("model/profile.class.php");

$storeObj=new storeClass();

if($_POST['admininsert']=="Save"){

   $storeObj->updateDetails($_POST);
}

?>

<div class="site_rgt">
           		<?php include('includes/adminheader.php');?>
				<?php
                        $query="SELECT * FROM tb_admin ORDER BY user_id DESC LIMIT 1";
                        $result=mysql_query($query);
                        $row=mysql_fetch_assoc($result);
						$pwd=base64_decode(base64_decode($row['password']));
				?>
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
                            <li><a href="index.php?option=com_profile"> My Profile  </a></li>
                            
                        </ul>
                    </div><!--title_blg-->
                    
                    
                    <form method="post" id="frmCreateListing" name="frmCreateListing" class="middle_form" onSubmit="return validate();"  enctype="multipart/form-data">
                    <div class="add_product_blg">
                    
                    	<div class="add_product_blg_top">
                        	 <p>Edit Profile</p>
                        </div><!--add_product_blg_top-->
                        
					<?php if($_SESSION['us_name']=='admin'){?>
                        
                        <div class="add_product_blg_btm">
                            <div class="add_product_blg_btm_lft">
                                <p>User Name:</p>
                            </div><!--add_product_blg_btm_lft-->
                            <div class="add_product_blg_btm_rgt">
                                <input type="text" name="uname" value="admin" readonly>
                            </div><!--add_product_blg_btm_rgt-->
                        </div><!--add_product_blg_btm-->
                        
                        <div class="add_product_blg_btm">
                            <div class="add_product_blg_btm_lft">
                                <p>password:</p>
                            </div><!--add_product_blg_btm_lft-->
                            <div class="add_product_blg_btm_rgt">
                                <input type="password" name="paswrd" value="<?php echo $pwd;?>">
                            </div><!--add_product_blg_btm_rgt-->
                        </div><!--add_product_blg_btm-->    
                        
                        <div class="add_product_blg_btm">
                            <div class="add_product_blg_btm_lft">
                                <p>Email:</p>
                            </div><!--add_product_blg_btm_lft-->
                            <div class="add_product_blg_btm_rgt">
                                <input type="text" name="emailid" value="<?php echo $_SESSION['email'];?>">
                            </div><!--add_product_blg_btm_rgt-->
                        </div><!--add_product_blg_btm-->
                        
                        <div class="add_product_blg_btm">
                            <div class="add_product_blg_btm_lft">
                                <p>Profile Image :</p>
                            </div><!--add_product_blg_btm_lft-->
                            <div class="add_product_blg_btm_rgt">
                                <input type="file" name="productimage" id="imgInp">
                                <?php if($row['profile_image']!=""){?>
                                <img src="../uploads/Staff/<?php echo $row['profile_image']; ?>" width="50" height="50" id="two"/>
                                <input type="hidden" name="hdn_image" size="24" value="<?php echo $row['profile_image']; ?>" />
                                <?php }else{ ?>
       							<img src="images/myacountimg_03.png" width="50" height="50" id="two"/>		                         
                                <?php }?>
                            </div><!--add_product_blg_btm_rgt-->
                        </div><!--add_product_blg_btm-->
                            
					<?php }else{?>
                        
                            <div class="add_product_blg_btm">
                            <div class="add_product_blg_btm_lft">
                                <p>Staff Id:</p>
                            </div><!--add_product_blg_btm_lft-->
                            
                            
                            <div class="add_product_blg_btm_rgt">
                              <input type="text" name="productskuid" readonly="readonly" value="<?php if($indivdata->id!=''){ echo $indivdata->staffid;}else{echo $sku;}?>">                        </div><!--add_product_blg_btm_rgt-->
                           </div><!--add_product_blg_btm-->
                           
                           <div class="add_product_blg_btm">
                            <div class="add_product_blg_btm_lft">
                                <p>Staff Name:</p>
                            </div><!--add_product_blg_btm_lft-->
                            <div class="add_product_blg_btm_rgt">
                                <input type="text" name="productname" value="<?php echo $indivdata->staffname;?>">
                            </div><!--add_product_blg_btm_rgt-->
                           </div><!--add_product_blg_btm-->
                           
                           <div class="add_product_blg_btm">
                            <div class="add_product_blg_btm_lft">
                                <p>Profile Image :</p>
                            </div><!--add_product_blg_btm_lft-->
                            <div class="add_product_blg_btm_rgt">
                                <input type="file" name="productimage">
                                <?php if($indivdata->profileimage!=""){?>
                                    <img src="../uploads/Staff/<?php echo $row['profile_image']; ?>" width="50" height="50"/>
                                    <input type="hidden" name="hdn_image" size="24" value="<?php echo $row['profile_image']; ?>" />
                                <?php } ?>
                            </div><!--add_product_blg_btm_rgt-->
                           </div><!--add_product_blg_btm-->
					<?php }?>
                       
                       <div class="add_product_blg_btm">
                           <input name="hdn_page_id" type="hidden" value="<?php echo $row['user_id'];?>">
                           <?php if($indivdata->id!=''){?>
                           <input type="submit" name="admininsert" value="Update">
                           <?php }else{?>
                           <input type="submit" name="admininsert" value="Save">
						   <?php }?>
                       </div><!--add_product_blg_btm-->
                    </div><!--add_product_blg-->
                </form>    
                </div><!--content_blg--> 
           </div>
           
<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function (e) {
				$('#two').attr('src', e.target.result);
			}
			
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#imgInp").change(function(){
		readURL(this);
	});
</script>