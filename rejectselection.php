<?php

require_once('connection.php');
$request_ID=$_GET['id'];
$sql="SELECT *from request where request_ID=$request_ID";
$result=mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($result);
$deprivation_ID=$res['deprivation_ID'];
$sql2="SELECT *from deprivation where deprivation_ID=$deprivation_ID";
$depres=mysqli_query($con,$sql2);
$depresl = mysqli_fetch_assoc($depres);
$email=$res['EMAIL'];
$deprivation_NAME=$depresl['deprivation_NAME'];
if($depresl['AVAILABLE']=='Y')
{
if($res['Selection']=='رفض' )
{
    echo '<script>alert("تم الرفض بالفعل")</script>';
    echo '<script> window.location.href = "Selectionrequest.php";</script>';
}
else{
    $query="UPDATE request set  Selection='تم الرفض' where request_ID=$request_ID";
    $queryy=mysqli_query($con,$query);
    $sql2="UPDATE deprivation set AVAILABLE='N' where deprivation_ID=$res[deprivation_ID]";
    $query2=mysqli_query($con,$sql2);
    
    echo '<script>alert("تم الرفض")</script>';
   
    echo '<script> window.location.href = "Selectionrequest.php";</script>';
}  
}
else{
    echo '<script>alert("الحرمان غير متاح")</script>';
    echo '<script> window.location.href = "Selectionrequest.php";</script>';
}


?>