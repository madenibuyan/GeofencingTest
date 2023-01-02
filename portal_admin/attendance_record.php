<?php session_start();
include("../connect.php");
if(!isset($_SESSION['attendanceadmin_id'])){
	header("location:index.php");
}else if(!isset($_SESSION['see_attendance'])){
	header("location:attendance.php");
}else{
	$ddd=mysqli_query($con,"select * from admin where id='".$_SESSION['attendanceadmin_id']."'");
	$adm=mysqli_fetch_assoc($ddd);
	
	$bat=mysqli_query($con,"select * from course where course_code='".$_SESSION['see_attendance']."'");
	$cos=mysqli_fetch_assoc($bat);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Admin - Attendance Record :: Attendance System using Geofencing</title>

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
													<i class="fa fa-history"></i> Attendance Record</span>
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
					
					
					<div class="col-lg-12 col-xs-12">
					
					
					<div class="panel  panel-inverse card-view">
					<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title" style="color:black; font-weight:bold; font-size:15px; margin-top:-10px; margin-bottom:-10px;"><?php echo strtoupper($_SESSION['see_attendance'])?> ATTENDANCE RECORD &nbsp;&nbsp; :&nbsp;:&nbsp;:&nbsp;: &nbsp;&nbsp; <i class="fa fa-calendar"></i> <?php echo explode(",",$cos['date'])[0];?></h6>
									</div>
									</div>
								
									<div class="panel-body">
												<div class="table-responsive">
											<table id="example" class="table table-bordered table-hover display  pb-30" >
												<thead>
													<tr>
														<th>#</th>
														<th>Surname</th>
														<th>Othernames</th>
														<th>Matric No.</th>
														<th>Department</th>
														<th>Level</th>
														<th>Marked On</th>
													</tr>
												</thead>
												<tbody>
											<?php 
											$no=0;
											
					//	surname 	othernames 	matric_no 	department 	level
	$mom=mysqli_query($con,"select * from `record` where course_code='".$cos['course_code']."' AND pin='".$cos['pin']."' order by id asc");
	while($cel=mysqli_fetch_assoc($mom)){
	$no=$no+1;		
	
	$smo=mysqli_query($con,"select * from student where matric_no='".$cel['matric_no']."'");
	$stu=mysqli_fetch_assoc($smo);
											
											echo '<tr id="'.$cel['id'].'">
											<td>'.$no.'.</td>
											<td>'.ucfirst($stu['surname']).'</td>
											<td>'.ucwords($stu['othernames']).'</td>
											<td>'.strtoupper($stu['matric_no']).'</td>
											<td>'.strtoupper($stu['department']).'</td>
											<td>'.strtoupper($stu['level']).'</td>
											<td>'.$cel['date'].'</td>
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
		
		
$('#example').DataTable( {
		dom: 'Blfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		],
		
		"fnDrawCallback": function(oSettings){
			
			$("a.delete_student").click(function(){
			
		if(confirm("Are you sure you want to delete student"))
		  {
		
		var delete_student=$(this).attr("id");
		$.ajax({
						type: "POST",
                        url: "operation.php",
                        data: ({delete_student:delete_student}),
                        cache: false,
                        success: function(data){ 
						$("tr#"+delete_student).animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
						 } 
 });
	
		}
return false;
		});
			
		
		}
	} );
		
		
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
