
		

<div class="admin_blg">
    <div class="admin_blg_in">
        <div class="admin_blg_in_lft">
            <a href="index.php?option=com_profile">
            <?php 
			if($_SESSION['userid']==1)
			{
				$query="SELECT * FROM tb_admin ORDER BY user_id DESC LIMIT 1";
				$result=mysql_query($query);
				$row=mysql_fetch_array($result);
				$pwd=$row['profile_image'];
				
				if($_SESSION['profile_image']!=''){?>
					<img src="../uploads/Staff/<?php echo $pwd; ?>" />
				<?php }else{?>
					<img src="images/myacountimg_03.png" />
				<?php }
			}
			?>
            </a>
        </div><!--admin_blg_in_lft-->
        <div class="admin_blg_in_rgt">
           <ul class="menu_list">
             <li class="dropdown_icon">
              <a href="#"><span>Admin <img src="images/admin_pic_06.png" alt=""></span></a>
               <ul>
                                    <li><a href="index.php?option=com_logout">Logout</a></li>
                                    <li><a href="index.php?option=com_profile">My Profile</a></li>
                                   <!-- <li><a href="#"><img src="images/aboutarow_03.png"> Submenu</a></li>-->             </ul><!--subnav_list-->
                        </li>
                   </ul>
                   
                   	<script type="text/javascript">
					$(document).ready(function(){
						$(".menu_list").click(function(){
							$(".menu_list ul").slideToggle();
						});
					
					});
					</script>

        </div><!--admin_blg_in_rgt-->	
    </div><!--admin_blg_in-->
</div><!--admin_blg-->