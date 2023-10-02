<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رفع الحرمان</title>
    <!-- <link  rel="stylesheet" href=""> -->
    <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>



</head>
<body  background=images/homebg.jpg>
<style>
*{
    margin: 0;
    padding: 0;

}

div.main{
    width: 400px;
    margin: 100px auto 0px auto;
}
.btnn{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border:none;
    margin-top: 30px;
    margin-left: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}

.btnn:hover{
    background: #fff;
    color:#ff7200;
}

.btnn a{
    text-decoration: none;
    color: black;
    font-weight: bold;
}

h2{
    text-align: center;
    padding: 20px;
    font-family: sans-serif;

}
div.register{
    background-color: rgba(0,0,0,0.6);
    width: 100%;
    font-size: 18px;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 2px 2px 15px rgba(0,0,0,0.3);
    color: #fff;

}

form#register{
    margin: 40px;

}

label{
    font-family: sans-serif;
    font-size: 18px;
    font-style: italic;
}

input#name{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}

input#dfield{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}

input#datefield{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}

*{
    margin: 0;
    padding: 0;

}
.hai{
    width: 100%;
    height: 0px;
    
    
}
.main{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%);
    background-position: center;
    background-size: cover;
    
  
}
.navbar{
    width: 1200px;
    height: 75px;
    margin: auto;
}

.icon{
    width:200px;
    float: left;
    height : 70px;
}

.logo{
    color: #ff7200;
    font-size: 35px;
    font-family: Arial;
    padding-left: 20px;
    float:left;
    padding-top: 10px;

}
.menu{
    width: 400px;
    float: left;
    height: 70px;

}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
    color: black;
}

ul li{
    list-style: none;
    margin-left: 80px;
    margin-top: 20px;
    font-size: 14px;
    color: black;

}

ul li a{
    text-decoration: none;
    color:white;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;

}

ul li a:hover{
    color:orange;

}

.nn{
    width:100px;
    background: #ff7200;

    border:none;
    height: 40px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:white;
    transition: 0.4s ease;
    

}

.nn a{
    text-decoration: none;
    color: black;
    font-weight: bold;
    
}

.circle{
    border-radius:48%;
    width:65px;
}

.phello{
    width: 200px;
    margin-left: -50px;
    padding: 0px;
}




</style>


<?php 

    require_once('connection.php');
    session_start();
 
    $deprivation_ID=$_GET['id'];
    
    $sql="select *from deprivation where deprivation_ID='$deprivation_ID'";
    $cname = mysqli_query($con,$sql);
    $email = mysqli_fetch_assoc($cname);
    
    $value = $_SESSION['email'];
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    $uemail=$rows['EMAIL'];
    if(isset($_POST['request'])){
       

		$request_DATE = date("Y/m/d");

        $details=mysqli_real_escape_string($con,$_POST['details']);

         
        if(empty($details)){
            echo '<script>alert("يرجي ملئ الفراغات")</script>';

        }
        else{
            
            $sql="INSERT INTO `request` (`deprivation_ID`, `EMAIL`, `request_DATE`, `details`, `request`, `reason_of_refuse`) VALUES($deprivation_ID,'$uemail','$request_DATE','$details','UNDER PROCESSING','UNDER PROCESSING')";
            $result = mysqli_query($con,$sql);
            $sql2="UPDATE `deprivation` SET `AVAILABLE` = 'N' WHERE `deprivation`.`deprivation_ID` = $deprivation_ID";
            $result2 = mysqli_query($con,$sql2);

            if($result){
                
                $_SESSION['email'] =$uemail;
                header("Location: deprivation.php");
            }
            else{
                echo '<script>alert("برجاء مراجعة الاتصال")</script>';
            }
        }
        
    
    }
    
    
    ?>



    
       <div class="hai">
            <div class="navbar">
                <div class="icon">
                    <h2 class="logo">طلب الحرمان</h2>
                </div>
                <div class="menu" >
                    <ul>
                        <li ><a href="cardetails.php">الرئيسية</a></li>
                        
                        <li><button class="nn"><a href="index.php">تسيجيل الخروج</a></button></li>
                        <li><img src="images/profile.png" class="circle" alt="Alps"></li>
                    <li><p class="phello">اهلا بك! &nbsp;<a id="pname"><?php echo $rows['FNAME']." ".$rows['LNAME']?></a></p></li>

                    
                    </ul>
                </div>
            </div>
       </div>
                
                
         <div class="main"> 
        
        <div class="register">
            <h2>الحرمان</h2>
        <form id="register" method="POST"  >
            <h2>اسم الحرمان : <?php echo "".$email['deprivation_NAME']?></h2>
            
            
            <br><br>

            

            <label>تفاصيل الطلب : </label>
            <br>
            <input type="text" name="details" maxlength="800"
            id="details" placeholder="ادخل تفاصيل الطلب">
            <br><br>
            
           
            
            <input type="submit"  class="btnn" value="طلب" name="request" >
            
        </form>
        </div>
    </div>
   
    
    
    
</body>
</html>