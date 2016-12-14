

 <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php?option=com_dashboard" class="logo"><b>Fourchette Admin Panel</b></a>
            <!--logo end-->
            
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="index.php?option=com_logout">Logout</a></li>
                </ul>
            </div>
        </header>
      <!--header end-->

<!--font-family: 'Raleway', sans-serif;-->

<script src="jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $(".menu_trigger").click(function(){
        $(".menu_blg ul").slideToggle();
    });
});
</script>


    <div class="site_wrap">
        
            <div class="site_lft">
                <div class="logo_blg">
                    <div class="logo_blg_lft">
                        <a href="index.php?option=com_dashboard"><img src="images/logo_pic_05.png" alt=""></a>
                    </div><!--logo_blg_lft-->
                    <div class="logo_blg_rgt">
                        <a href="index.php?option=com_dashboard"><img src="images/logo_pic_08.png" alt=""></a>  
                    </div><!--logo_blg_rgt-->
                </div><!--login_blg-->
                 <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                   <p class="centered"><a href="profile.html"><img src="../img/logo-first.png" class="img-circle" width="60"></a></p>
                  <h5 class="centered">Admin</h5> 
                    
                  <li class="mt">
                      <a class="active" href="index.php?option=com_dashboard">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Users</span>
                      </a>
                      <ul class="sub">
                          <li><a href="index.php?option=com_customers">View</a></li>
                          
                      </ul>
                  </li>

                   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Content</span>
                      </a>
                      <ul class="sub">
                          <li><a href="index.php?option=com_contentpages">View</a></li>
                          
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Gallery</span>
                      </a>
                      <ul class="sub">
                          <li><a href="index.php?option=com_banners">View</a></li>
                          
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Blog</span>
                      </a>
                      <ul class="sub">
                          <li><a href="index.php?option=com_blog">View</a></li>
                          
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Testimonials</span>
                      </a>
                      <ul class="sub">
                          <li><a href="index.php?option=com_testmonials">View</a></li>
                          
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Services</span>
                      </a>
                      <ul class="sub">
                          <li><a href="index.php?option=com_services">View</a></li>
                          
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Events</span>
                      </a>
                      <ul class="sub">
                          <li><a href="index.php?option=com_events">View</a></li>
                          
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
            </div><!--site_lft-->


 <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="../assets/js/sparkline-chart.js"></script>    
    <script src="../assets/js/zabuto_calendar.js"></script>    
    
    
    
    <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>