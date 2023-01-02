<?php session_start();
include("connect.php");

if(isset($_POST['student_login'])){
	$bay=mysqli_query($con,"select * from student where matric_no='".strtolower(trim($_POST['matric_no']))."'");
	if(mysqli_num_rows($bay)>0){
		$row=mysqli_fetch_assoc($bay);
		$_SESSION['stureg_id']=$row['id'];
		echo '<script>
		location.href="dashboard.php"
		</script>';
	}else{
		echo '<div class="alert alert-dismissible alert-danger">
				<strong>Oh Sorry!</strong> Invalid Student Data.
              </div>';
	}
}



////////////////////---- START TO FETCH STUDENT DETAILS
if(isset($_SESSION['stureg_id'])){
	$ddd=mysqli_query($con,"select * from student where id='".$_SESSION['stureg_id']."'");
	$me=mysqli_fetch_assoc($ddd);
}
///////////////////--- END FETCH STUDENT DETAILS


if(isset($_POST['mark_attendance'])){ //matric_no 	course_code 	pin 	date
	
	$today=strtotime($date);
	
	$bat=mysqli_query($con,"select * from course where course_code='".$_POST['course_code']."'");
	$cos=mysqli_fetch_assoc($bat);
	
	$bit=mysqli_query($con,"select * from record where course_code='".$_POST['course_code']."' AND matric_no='".$me['matric_no']."' AND pin='".$cos['pin']."'");
	
	if($_POST['a_lat']=='' || $_POST['a_lon']==''){
			echo '<div class="alert alert-dismissible alert-danger">
				<strong>Oh Sorry!</strong> Kindly enable location to be accessed on your device.
              </div>';
	}else if(mysqli_num_rows($bit)>0){
			echo '<div class="alert alert-dismissible alert-danger">
				<strong>Oh Sorry!</strong> You have already marked '.strtoupper($_POST['course_code']).' attendance.
              </div>';
	}else if($cos['str_start']==0 || $cos['str_end']==0){
											echo '<div class="alert alert-dismissible alert-danger">
				<strong>Oh Sorry!</strong> No '.strtoupper($_POST['course_code']).' attendance scheduled.
              </div>';
											}else if($today>$cos['str_start'] && $today<$cos['str_end']){
											
											//////////////////// start mark attendance
											
											$l_exe=explode(",",$cos['left_co']);
											$r_exe=explode(",",$cos['right_co']);
											$t_exe=explode(",",$cos['top_co']);
											$b_exe=explode(",",$cos['bottom_co']);
									
									$lat1 = array($l_exe[0],$r_exe[0]);
									rsort($lat1);
									
									$lat2 = array($t_exe[0],$b_exe[0]);
									rsort($lat2);
									
									$lon1 = array($l_exe[1],$r_exe[1]);
									rsort($lon1);
									
									$lon2 = array($t_exe[1],$b_exe[1]);
									rsort($lon2);
									
									
										if( (($_POST['a_lat']<=$lat1[0] && $_POST['a_lat']>=$lat1[1]) || ($_POST['a_lat']<=$lat2[0] && $_POST['a_lat']>=$lat2[1])) && (($_POST['a_lon']<=$lon1[0] && $_POST['a_lon']>=$lon1[1]) || ($_POST['a_lon']<=$lon2[0] && $_POST['a_lon']>=$lon2[1])) ){
											
						$qry=mysqli_query($con,"insert into record(matric_no,course_code,pin,date ) values('".$me['matric_no']."','".$_POST['course_code']."','".$cos['pin']."','$date')");		

						if($qry){	
							echo '<script>
							alert("'.strtoupper($_POST['course_code']).' Marked Successfully!")
							location.href="dashboard.php"
							</script>';
						}else{
							echo '<div class="alert alert-dismissible alert-danger">
									<strong>Oh Sorry!</strong> Unable to complete operation, please try again later.
								  </div>';
						}
						
											
										}else{
											echo '<div class="alert alert-dismissible alert-danger">
				<strong>Oh Sorry!</strong> You are not in the range of '.strtoupper($_POST['course_code']).' lecturer hall.
              </div>';
										}
											
											
											//////////////////// end mark attendance
											
											}else if($today>$cos['str_end']){
											echo '<div class="alert alert-dismissible alert-danger">
				<strong>Oh Sorry!</strong> '.strtoupper($_POST['course_code']).' attendance has closed.
              </div>';
											}else if($today<$cos['str_start']){ 
											echo '<div class="alert alert-dismissible alert-danger">
				<strong>Oh Sorry!</strong> '.strtoupper($_POST['course_code']).' attendance period yet to start.
              </div>';
											}else{
									echo '<div class="alert alert-dismissible alert-danger">
				<strong>Oh Sorry!</strong> '.strtoupper($_POST['course_code']).' attendance initializing.
              </div>';
											}
	
}











?>