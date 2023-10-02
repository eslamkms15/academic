<?php

require_once('connection.php');
$deprivation_ID=$_GET['id'];
$sql="DELETE from deprivation where deprivation_ID=$deprivation_ID";
$result=mysqli_query($con,$sql);

echo '<script>alert("تم حذف الحرمان")</script>';
echo '<script> window.location.href = "admindeprivation.php";</script>';



?>