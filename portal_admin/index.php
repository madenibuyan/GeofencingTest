<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Admin :: Attendance System using Geofencing</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="../dist/css/style.css" rel="stylesheet" type="text/css">
    
  </head>
  <body>
  
  <div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper pa-0">
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page"  style="background-image:url('../dist/img/errorbg.jpg');">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row" style="background-color:white; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3); border:1px solid lavender; padding:30px; margin-top:-40px; border-radius:0px 40px 0px 40px;">
									<div class="col-sm-12 col-xs-12">
										<div style="">
										<div align="center"><a href="index.php">
						<img class="brand-img" src="../img/logo.png" style="width:300px;" alt="lasu_logo" style=""/></a>
						
						</div><hr style="background-color:#d7d7d7; height:1px; border:0;">
					<h3 class="text-center mb-10" style="font-size:22px; color:black; font-weight:600;">Admin Login</h3>
											<h6 class="text-center nonecase-font txt-grey" style="font-size:13px;">Enter your details below</h6>
										</div>	
										<div class="form-wrap">
											<form method="post" id="form_submit">
											<input type="hidden" class="form-control" name="admin_login" value="Dosumu Ololade">
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Email</label>
													<input type="email" class="form-control" name="email" required="" id="exampleInputEmail_2" placeholder="Enter Email">
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
													
													<a style="float:right;" class="capitalize-font txt-primary block mb-10 font-12" href="forgot-password.php">Forgot Password ?</a>
													<div style="clear:both;"></div>
													
													<input type="password" class="form-control" name="password" required="" id="exampleInputpwd_2" placeholder="Enter Password">
												</div>
												
												<div class="form-group text-center"> 
										<div class="msg"></div>
													<button type="submit" class="btn btn-info btn-primary btn-rounded pull-right">sign in</button>
													<div class="clearfix"></div>
												</div>
											</form>
										</div>
										<br><br><br>
										
						<div align="center"><footer><p>Copyright &copy; <?php echo date("Y");?> Bells University, Ota. All right reserved</p></footer></div>
										
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
<script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>
  
  		<script>
jQuery().ready(function(){
	$("form#form_submit").on('submit',(function(e){
			e.preventDefault();
			$("div.msg").html('<div align="center"">\
					<p class="pull-left text-primary"> <i class="fa fa-spin fa-spinner pr-15"></i> Authentication User</p>\
											<div class="clearfix"></div>\
										</div>');
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
  
  
<script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
			
			<script src="../vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="../dist/js/dataTables-data.js"></script>
			
			<script src="../vendors/bower_components/dropify/dist/js/dropify.min.js"></script>
		
		<!-- Form Flie Upload Data JavaScript -->
		<script src="../dist/js/form-file-upload-data.js"></script>
		<!-- Summernote Wysuhtml5 Init JavaScript -->
	<!-- Counter Animation JavaScript -->
	<script src="../vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="../vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	
	
	<script src="../vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
		<script src="../vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		<script src="../vendors/bower_components/multiselect/js/jquery.multi-select.js"></script>
		
		<!-- Moment JavaScript -->
		<script type="text/javascript" src="../vendors/bower_components/moment/min/moment-with-locales.min.js"></script>
		<script src="../vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
		<script type="text/javascript" src="../vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
		<script src="../dist/js/form-picker-data.js"></script>
		
		
		<script src="../dist/js/form-advance-data.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="../dist/js/jquery.slimscroll.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="../dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="../vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	
	<!-- Init JavaScript -->
	<!-- Bootstrap Tagsinput JavaScript -->
	<!-- Bootstrap Tagsinput JavaScript -->
		<script src="../vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
	<script src="../dist/js/init.js"></script>
	<script src="../dist/js/dashboard-data.js"></script>
    
  </body>
</html>