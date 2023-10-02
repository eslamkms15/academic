<?php
if(isset($_POST['adddeprivation']) ){
    require_once('connection.php');
       
                $Course_Name=mysqli_real_escape_string($con,$_POST['Course_Name']);
                $deprivation_NAME=mysqli_real_escape_string($con,$_POST['deprivation_NAME']);
                $EMAIL=mysqli_real_escape_string($con,$_POST['EMAIL']);
                $Academic_advisor=mysqli_real_escape_string($con,$_POST['Academic_advisor']);
                $details=mysqli_real_escape_string($con,$_POST['details']);
				$deprivation_DATE=date("Y/m/d");
                $available="Y";
                $query="INSERT INTO `deprivation` (`Course_Name`,`deprivation_NAME`, `EMAIL`, `Academic_advisor`, `details`, `deprivation_DATE`, `AVAILABLE`) VALUES('$Course_Name','$deprivation_NAME','$EMAIL','$Academic_advisor','$details','$deprivation_DATE','$available')";
                $res=mysqli_query($con,$query);
                if($res){
                    echo '<script>alert("تم اضافة حرمان!!")</script>';
                    echo '<script> window.location.href = "admindeprivation.php";</script>';                }

         
        
    
    else{
        $em="unknown error occured";
        header("Location: addcar.php?error=$em");
    }

}
else{
    echo "false";
}




?>
