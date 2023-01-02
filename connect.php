<?php date_default_timezone_set("Africa/Lagos");
$date=date("d M Y, h:ia");
$con = mysqli_connect("localhost","root","","attendance");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>