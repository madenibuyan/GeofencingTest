<?php session_start();
include("connect.php");
if(!isset($_SESSION['stureg_id'])){
	header("location:index.php");
}else{
	$ddd=mysqli_query($con,"select * from student where id='".$_SESSION['stureg_id']."'");
	$me=mysqli_fetch_assoc($ddd);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	 <title>Attendance System using Geofencing</title>
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	<link href="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
		<link href="vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>
		
		<link href="vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	
	
	
</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper theme-6-active pimary-color-green">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="dashboard.php">
							<img class="brand-img" style="width:30px;" src="img/logo.png" alt="brand"/>
							
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"> <?php echo ucwords($me['surname']); ?> <img src="img/avatar.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="logout.php"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span><?php echo $me['matric_no']?></span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				
				<li>
					<a href="dashboard.php" class="active"><div class="pull-left"><i class="fa fa-home mr-20"></i><span class="right-nav-text">Home</span></div>
					<div class="clearfix"></div></a>
				</li>
				
				<li>
					<a href="record.php"><div class="pull-left"><i class="fa fa-history mr-20"></i><span class="right-nav-text">Attendance Record</span></div>
					<div class="clearfix"></div></a>
				</li>
				
				<li>
			<a href="logout.php"><div class="pull-left"><i class="fa fa-power-off mr-20"></i><span class="right-nav-text">Logout</span></div>
					<div class="clearfix"></div></a>
				</li>
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
		
		
		
		
		<!-- Right Sidebar Backdrop -->
		<div class="right-sidebar-backdrop"></div>
		<!-- /Right Sidebar Backdrop -->

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
					
					<div class="row">
					
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-success card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
						<div align="center"><img src="img/logo.png" style="width:250px; padding:20px 5px;" class="img-responsive"></div>
									
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view ">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div style="margin-top:-12px;margin-bottom:-12px;" class="col-md-12 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-dark block counter" style="font-weight:600;">
													<i class="fa fa-check-square-o"></i> Mark Attendance</span>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
					
				<!-- Row -->
					
				
				<div class="row">
				
					<div class="col-lg-4 col-xs-12">
					<div align="center" class="hidden-xs hidden-sm"><img src="img/banner1.jpg" class="img-responsive"></div>
					</div>
					
					<div class="col-lg-8 col-xs-12">
					
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body" style="padding:30px;">
									
									<form method="post" id="form_submit">
									<input type="text" name="a_lat" id="lat" style="cursor:default;border:0; color:transparent;" readonly>
									<input type="text" name="a_lon" id="lon" style="cursor:default;border:0; color:transparent;" readonly>
									<input type="hidden" name="mark_attendance" value="true">
				<!-- pin 	course_code 	description 	lon 	lat 	start 	end 	str_start 	str_end 	date  -->
												
												<div class="form-group">
                             <label class="control-label mb-5" style="font-weight:bold;" for="email_de">Course Code</label>
												<select class="form-control" name="course_code" id="num_semester" required >
												<option value="">Select</option>
												<?php
												$sat=mysqli_query($con,"select * from course order by course_code asc");
												while($sol=mysqli_fetch_assoc($sat)){
													echo '<option value="'.$sol['course_code'].'">'.strtoupper($sol['course_code']).'</option>';
												}
												?>
												</select>
                                                </div>
											
												
												<br>
												<div class="msg"></div>
													<div class="form-group">
									<button style="display:none;" class="btn btn-primary btn-rounded mb-5 pull-right btn-schedule" type="submit">Mark Attendance</button>
													<div class="clearfix"></div>
												</div>
									</form>
									
									
								</div>
							</div>
						</div>
					
					</div>
				
					
				</div>
				<!-- /Row -->
			
			</div>
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p style="text-align:center;"> &copy; Copyright <?php echo date("Y");?> Bells University, Ota. All rights reserved</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
	
	<script>
	jQuery().ready(function(){
		
		if(navigator.geolocation) {
			
		$("div.msg").html("<p class='text-default' style='font-size:18px;padding:5px; text-align:center;'><i class='fa fa-spin fa-spinner'></i> Processing ...</p>");
			
        browserSupportFlag = true;
        navigator.geolocation.getCurrentPosition(function(position) {
         var lat = position.coords.latitude;
         var lon = position.coords.longitude;
		 
		 $("input#lon").val(lon);
		 $("input#lat").val(lat);
		 
		 $("input#lon").focus();
		 
		 $("div.msg").html("");
		 
		
        }, function() {
			$("div.msg").html("");
          alert("Geolocation Failed, Kindly Enable Your Device Location.");
        });
		
		 
    }
		
		$("input#lon").focus(function(){
			if($("input#lon")!=''){
				$("button.btn-schedule").show("fast");
			}else{
				$("button.btn-schedule").hide("fast");
			}
		});
		
		$("form#form_submit").on('submit',(function(e){
			e.preventDefault();
			
	$("div.msg").html("<p class='text-primary' style='padding:5px; text-align:center;'><i class='fa fa-spin fa-spinner'></i> Processing Request...</p>");
	
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
	

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	
	<!-- Switchery JavaScript -->
		<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
		<script src="vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
		
		
		<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>
	
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<!--<script src="dist/js/export-table-data.js"></script>-->
	
	
	<script type="text/javascript" src="vendors/bower_components/moment/min/moment-with-locales.min.js"></script>
		<script src="vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
		<script type="text/javascript" src="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
		<!--<script src="dist/js/form-picker-data.js"></script>
		
		
		<script src="dist/js/form-advance-data.js"></script>-->
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Bootstrap Tagsinput JavaScript -->
		<script src="vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
	<script src="dist/js/init.js"></script>
	<script src="dist/js/dashboard-data.js"></script>

</body>

</html>
