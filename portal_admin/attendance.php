<?php session_start();
include("../connect.php");
if(!isset($_SESSION['attendanceadmin_id'])){
	header("location:index.php");
}else{
	$ddd=mysqli_query($con,"select * from admin where id='".$_SESSION['attendanceadmin_id']."'");
	$adm=mysqli_fetch_assoc($ddd);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Admin Attendance :: Attendance System using Geofencing</title>

	<link href="../vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	<link href="../vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
		<link href="../vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>
		
		<link href="../vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
	<link href="../dist/css/style.css" rel="stylesheet" type="text/css">
	
	
	
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
							<img class="brand-img" style="width:30px;" src="../img/logo.png" alt="brand"/>
							
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"> <?php echo ucwords($adm['lastname']); ?> <img src="../img/avatar.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
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
					<span>Portal Admin</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				
				<li>
					<a href="dashboard.php"><div class="pull-left"><i class="fa fa-dashboard mr-20"></i><span class="right-nav-text">Dashboard</span></div>
					<div class="clearfix"></div></a>
				</li>
				<li>
					<a href="course_bank.php"><div class="pull-left"><i class="fa fa-database mr-20"></i><span class="right-nav-text">Course Bank</span></div>
					<div class="clearfix"></div></a>
				</li>
				<li>
					<a href="attendance.php" class="active"><div class="pull-left"><i class="icon icon-clock mr-20"></i><span class="right-nav-text"> Schedule Attendance</span></div>
					<div class="clearfix"></div></a>
				</li>
				
				<li><hr class="light-grey-hr mb-10"/></li>
				
				<li>
					<a href="logout.php"><div class="pull-left"><i class="fa fa-power-off mr-20"></i><span class="right-nav-text">Logout</span></div><div class="clearfix"></div></a>
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
						<div align="center"><img src="../img/logo.png" style="width:250px; padding:20px 5px;" class="img-responsive"></div>
									
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
													<i class="fa fa-clock"></i> Schedule Attendance</span>
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
					
					<div class="panel panel-inverse card-view">
							<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title" style="color:black; font-weight:bold; font-size:15px; margin-top:-10px; margin-bottom:-10px;">Schedule</h6>
									</div>
									</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
					<div style="magin-bottom:5px; margin-top:5px;"></div>
												<form method="post" id="form_submit">
									<input type="hidden" name="schedule_attendance" value="true">
				<!-- pin 	course_code 	description 	lon 	lat 	start 	end 	str_start 	str_end 	date  -->
												
												<div class="form-group">
                             <label class="control-label mb-5" for="email_de">Course Code</label>
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
												
												
												
									<div class="row"> 
									<div class="col-md-6 form-group"> 
								<label class="control-label mb-5" for="email_de">Start</label>
						<input class="form-control" type="time" name="start" required >
												</div>
									<div class="col-md-6 form-group"> 
								<label class="control-label mb-5" for="email_de">End</label>
						<input class="form-control" type="time" name="end" required >
												</div>
												</div>
											<h3 style="color:black;padding-top:14px;padding-bottom:14px;font-size:18px;font-weight:bold;">Coordinates</h3>	
											
											
					<div class="input-group mb-15">
					<input type="text" readonly name="left" class="form-control" id="left_co" placeholder="Left Width Coordinate" required>
					<span class="input-group-btn">
					<button type="button" class="btn btn-primary read_co" id="left_co">Read</button>
					</span> </div>
											
					<div class="input-group mb-15">
					<input type="text" readonly name="right" class="form-control" id="right_co" placeholder="Right Width Coordinate" required>
					<span class="input-group-btn">
					<button type="button" class="btn btn-primary read_co" id="right_co">Read</button>
					</span> </div>
											
					<div class="input-group mb-15">
					<input type="text" readonly name="top" class="form-control" id="top_co" placeholder="Top Lenght Coordinate" required>
					<span class="input-group-btn">
					<button type="button" class="btn btn-primary read_co" id="top_co">Read</button>
					</span> </div>
											
					<div class="input-group mb-15">
					<input type="text" readonly name="bottom" class="form-control" id="bottom_co" placeholder="Bottom Lenght Coordinate" required>
					<span class="input-group-btn">
					<button type="button" class="btn btn-primary read_co" id="bottom_co">Read</button>
					</span> </div>
											
												
												<br>
												<div class="msg"></div>
													<div class="form-group">
									<button class="btn btn-success btn-sm mb-5 pull-right" type="submit">Schedule</button>
													<div class="clearfix"></div>
												</div>
									</form>
									 
									 </div>
									 </div>
									 </div>
					
					</div>
					
					
					<div class="col-lg-8 col-xs-12">
					
					
					<div class="panel  panel-inverse card-view">
					<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title" style="color:black; font-weight:bold; font-size:15px; margin-top:-10px; margin-bottom:-10px;">REGISTERED STUDENTS</h6>
									</div>
									</div>
								
									<div class="panel-body">
												<div class="table-responsive">
											<table id="example" class="table table-bordered table-hover display  pb-30" >
												<thead>
													<tr>
														<th>#</th>
														<th>Course Code</th>
														<th>Description</th>
														<th>Start</th>
														<th>End</th>
														<th>Status</th>
														<th>Set On</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
											<?php 
											$no=0;
											
										//pin,course_code,description,left_co,right_co,top_co,bottom_co,start,end,str_start,str_end,date
										$mom=mysqli_query($con,"select * from `course` order by course_code asc");
										while($cel=mysqli_fetch_assoc($mom)){
										$no=$no+1;		
											
											$today=strtotime($date);
											
											if($cel['str_start']==0 || $cel['str_end']==0){
											$status='<span class="badge badge-info">Undefined</span>';
											}else if($today>$cel['str_start'] && $today<$cel['str_end']){
											$status='<span class="badge badge-success">ON</span>';
											}else if($today>$cel['str_end']){
											$status='<span class="badge badge-primary">Closed</span>';
											}else if($today<$cel['str_start']){ 
											$status='<span class="badge badge-warning">Yet to Start</span>';
											}else{
											$status='<span class="badge badge-info">Initializing...</span>';
											}
											
											echo '<tr id="'.$cel['id'].'">
											<td>'.$no.'.</td>
											<td>'.strtoupper($cel['course_code']).'</td>
											<td>'.$cel['description'].'</td>
											<td>'.$cel['start'].'</td>
											<td>'.$cel['end'].'</td>
											<td align="center">'.$status.'</td>
											<td>'.$cel['date'].'</td>
											<td><a href="javascript:void(0)" class="btn btn-success btn-sm btn-outline see_attendance" id="'.$cel['course_code'].'">Attendance</a></td>
											</tr>';
											}
									
													?>
													
												</tbody>
											</table>
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
						<p style="text-align:center;"> &copy; Copyright <?php echo date("Y");?>  Bells University, Ota. All right reserved</p>
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
    <script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>
	
	<script>
	jQuery().ready(function(){
		
		
		$("button.read_co").click(function(){
			var input_id = $(this).attr("id");
	if(navigator.geolocation) {
        browserSupportFlag = true;
        navigator.geolocation.getCurrentPosition(function(position) {
         var lat = position.coords.latitude;
         var lon = position.coords.longitude;
		 
		 $("input#"+input_id).val(lat+','+lon);
		
        }, function() {
          alert("Geolocation Failed, Refresh Page and Try Again.");
        });
		
		 
    }
		});
		
		
$('#example').DataTable( {
		dom: 'Blfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		],
		
		"fnDrawCallback": function(oSettings){
			
			$("a.see_attendance").click(function(){
			
		
		var see_attendance=$(this).attr("id");
		$.ajax({
						type: "POST",
                        url: "operation.php",
                        data: ({see_attendance:see_attendance}),
                        cache: false,
                        success: function(data){ 
						$("div.msg").html(data);
						 } 
 });
	
	
		});
			
		
		}
	} );
		
		
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
    <script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	
	<!-- Switchery JavaScript -->
		<script src="../vendors/bower_components/switchery/dist/switchery.min.js"></script>
		<script src="../vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
		
		
		<!-- Data table JavaScript -->
	<script src="../vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="../vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="../vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="../vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="../vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="../vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>
	
	<script src="../vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="../vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<!--<script src="dist/js/export-table-data.js"></script>-->
	
	
	<script type="text/javascript" src="../vendors/bower_components/moment/min/moment-with-locales.min.js"></script>
		<script src="../vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
		<script type="text/javascript" src="../vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
		<!--<script src="../dist/js/form-picker-data.js"></script>
		
		
		<script src="../dist/js/form-advance-data.js"></script>-->
	
	<!-- Slimscroll JavaScript -->
	<script src="../dist/js/jquery.slimscroll.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="../dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="../vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Bootstrap Tagsinput JavaScript -->
		<script src="../vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
	<script src="../dist/js/init.js"></script>
	<script src="../dist/js/dashboard-data.js"></script>

</body>

</html>
