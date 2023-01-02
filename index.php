<?php session_start();
include("connect.php");
if(isset($_SESSION['stureg_id'])){
$ddd=mysqli_query($con,"select * from student where id='".$_SESSION['stureg_id']."'");
	$stu=mysqli_fetch_assoc($ddd);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance System using Geofencing</title>
    
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.theme.css" rel="stylesheet">
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/slick-theme.css" rel="stylesheet">
    <link href="assets/css/swiper.min.css" rel="stylesheet">
    <link href="assets/css/owl.transitions.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.css" rel="stylesheet">
    <link href="assets/css/odometer-theme-default.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

<style>
div#programme_box{
	-webkit-transition: width 2s, height 2s, -webkit-transform 2s; /* Safari */
    transition: width 2s, height 2s, transform 2s;
}
div#programme_box:hover{
    -webkit-transform: rotate(20deg); /* Safari */
    transform: rotate(20deg);
}
</style>

</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">

        <!-- start preloader -->
        <div class="preloader">
            <div class="angular-shape">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="spinner">
              <div class="double-bounce1"></div>
              <div class="double-bounce2"></div>
            </div>
        </div>
        <!-- end preloader -->

        <!-- Start header -->
        <header id="header" class="site-header header-style-2">

            <nav class="navigation navbar navbar-default">
                <div class="container">
                    
					<div class="logo-wrapper pull-left">
                                <div class="logo">
                                    <a href="index.php"><img style="width:280px; margin-bottom:-25px;" src="assets/images/logo.png" alt></a>
                                </div>
                            </div>

                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse navigation-holder">
                        <button class="close-navbar"><i class="ti-close"></i></button>
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
							<?php
							if(isset($_SESSION['stureg_id'])){
								echo '<li><a href="dashboard.php">Dashboard</a></li><li><a href="logout.php">Logout</a></li>';
							}else{
								echo ' <li><a href="#login">Login</a></li>';
							}
							?>
                        </ul>
                    </div><!-- end of nav-collapse -->

					<?php 
					if(isset($_SESSION['stureg_id'])){
                    echo '<div class="cart-search-contact">
					<div class="header-search-form-wrapper" style="margin-top:5px;">
                            '.ucwords($stu['surname']).'
                        </div>
					
                        <div class="mini-cart">
                            <button class="cart-toggle-btn">  <i class="ti-user"></i> 
							<span style="background:#00cc00; width:10px; height:10px;" class="cart-count"></span></button>
                            <div class="mini-cart-content">
                                <div class="mini-cart-items">
                                    <div class="mini-cart-item clearfix">
                                        <div class="mini-cart-item-des">
                                            <a href="logout.php"><i class="ti-power-off"></i> Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
					}
					?>
					
					
					
                </div><!-- end of container -->
            </nav>
        </header>
        <!-- end of header -->


        <!-- start of hero -->
        <section class="hero-slider hero-style-2">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" style="background-size:; background-repeat:no-repeat;" data-background="images/slide1.png">
                            <div class="gradient-overlay"></div>
                            <div class="container">
                                <div data-swiper-parallax="300" class="slide-title">
                                    <h2>Bells University<br> of Technology.</h2>
									<p style="font-size:33px; margin-top:-21px; color:white; font-weight:600;">Attendance System using Geofencing</p>
                                </div>
                                <div class="clearfix"></div>
                                <?php
								if(!isset($_SESSION['stureg_id'])){
									echo '<div data-swiper-parallax="500" class="slide-btns">
                                    <a href="#login" class="theme-btn">Mark Attendance</a> 
                                </div> ';
								}
								?>
                            </div>
                        </div> <!-- end slide-inner --> 
                    </div> <!-- end swiper-slide -->

                </div>
                <!-- end swiper-wrapper -->

                <!-- swipper controls -->
            </div>
        </section>
        <!-- end of hero slider -->


        <!-- start features-section -->
		<?php
		if(!isset($_SESSION['stureg_id'])){ ?>
        <section class="features-section" id="login" style="margin-top:-220px;">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-6 col-lg-offset-3">
                        <div class="section-title-s3">
                            <span>Verification</span>
                            <h2>Student Login</h2>
                        </div>
                    </div>
                </div>
				
                <div class="row">
                   <div class="col col-md-3 hidden-xs hidden-sm"></div>
				
                    
                    <div class="col col-md-6">
					
					
						<div class="error"></div>
						<div class="login_container" style="padding:30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
						<form method="post" id="form_submit">
							<p style="margin-bottom:7px;">Complete the form below </p>
						<input type="hidden" name="student_login" class="sel_prog_id" value="true">
						
						<div class="form-group">
						<label class="control-label mb-5" for="email_de">Matric No.</label>
						<input type="text" style="height:46px; border-radius:0;" class="form-control" name="matric_no" placeholder="Your Matriculation Number" required >
						</div>
						
						
						<div class="msg"></div>
	
	 <button class="view-cart-btn btn pull-right" type="submit">Login <i class="ti-angle-double-right"></i></button>
							 <div class="clearfix"></div>
						</form>
                        </div>
						
						
						
						
                    </div>
					
					<div class="col col-md-3 hidden-xs hidden-sm"></div>
					
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end features-section -->
		<?php }else{
			echo '<div style="margin-top:-220px; background-color:lavendar; height:26px;"></div>';
		} ?>


        <!-- start site-footer -->
        <footer class="site-footer">
            <div class="angular-shape">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div class="lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="separator"></div>
                        <div class="col col-xs-12">
                            <p class="copyright">Copyright &copy; <?php echo date("Y");?> Bells University, Ota. All rights reserved.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end site-footer -->




    </div>
    <!-- end of page-wrapper -->



    <!-- All JavaScript files
    ================================================== -->
    <script src="assets/js/jquery.min.js"></script>
	<script>
	jQuery().ready(function(){
		
				$("form#form_submit").on('submit',(function(e){
					e.preventDefault();
			$("div.msg").html("<p style='color:#009973; font-weight:600; padding:5px; text-align:center;'><i class='ti-pulse'></i> Authenticating Matriculation Number ...</p>");
	
				$.ajax({
						type: "POST",
                        url: "operation.php",
                        data: new FormData(this),
						contentType:false,
						processData:false,
                        cache: false,
                        success: function(data){ 
						$("div.msg").html(data);
						}
    });			
	
	
		}));
		
		
	});
	</script>
	
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins for this template -->
    <script src="assets/js/jquery-plugin-collection.js"></script>

    <!-- Custom script for this template -->
    <script src="assets/js/script.js"></script>
</body>
</html>
