<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جامعة نجران الكلية تطبيقية</title>
    
</head>

<body class="body">

<style>
*{
    margin: 0;
    padding: 0;

}

body{
    background: url("images/homebg.jpg");
    background-position: center;
    background-size: cover;
}
/* .main{
   
    width: 100%;
     background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%);
    background-position: center;
    background-size: cover;
    height: 109vh; 
    animation: infiniteScrollBg 50s linear infinite;
} */
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
}

ul li{
    list-style: none;
    margin-left: 62px;
    margin-top: 27px;
    font-size: 14px;

}

ul li a{
    text-decoration: none;
    color: black;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;

}

ul li a:hover{
    color:orange;

}
.box{
    
    position:center;
    top: 50%;
    left: 50%;
    padding: 20px;
    box-sizing: border-box;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 5px 15px rgba(0,0,0,.5);
    background: linear-gradient(to top, rgba(255, 251, 251, 0.8)50%,rgba(250, 246, 246, 0.8)50%);
    display: flex;
    align-content: center;
    width: 600px;
    height: 200px;
    margin-top: 100px;
    margin-left: 350px;
}

.box .imgBx{
    width: 150px;
    flex:0 0 150px;
}

.box .imgBx img{
    max-width: 150%;
}

.box .content{
    padding-left: 100px;
}

.box .button{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border:none;
    margin-top: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}

.utton{
    width: 240px;
    height: 40px;
   
    background: #ff7200;
    border:none;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}




.de{
    float: left;
    clear: left;
    display: block;
    


}


.de li a:hover{
    color:black;

}
.de .lis:hover{
    color: white;
}


.nn{
    width:100px;
    /* background: #ff7200; */
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

.overview{
    text-align: center;

    margin-top: 40px;
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

#stat{
    margin-left: -8px;
}




</style>


<?php 
    require_once('connection.php');
        session_start();

    $value = $_SESSION['email'];
    $_SESSION['email'] = $value;
    
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    $sql2="select *from deprivation where AVAILABLE='Y' AND EMAIL='$value'";
    $deprivation= mysqli_query($con,$sql2);
    
    
    
    ?>





  <div class="cd">
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">جامعة نجران الكلية تطبيقية</h2>
            </div>
            <div class="menu">
               
                <ul>
                    <li><a href="#">الرئيسية</a></li>
                    
                    <li><button class="nn"><a href="index.php">تسجيل الخروج</a></button></li>
                    <li><img src="images/profile.png" class="circle" alt="Alps"></li>
                    <li><p class="phello">اهلا بك! &nbsp;<a id="pname"><?php echo $rows['FNAME']." ".$rows['LNAME']?></a></p></li>
                    <li><a id="stat" href="requestinstatus.php">حالة طلبات الغاء الحرمان</a></li>
                </ul>
            </div>
            
            
        </div>
      <div><h1 class="overview">الحرمان الموجودة علي الطالب</h1>

    <ul class="de">
    <?php
		while ($result = mysqli_fetch_array($deprivation, MYSQLI_ASSOC)) {
        
            $res=$result['deprivation_ID'];
            
    ?>    
    
    <li>
    <form action ="request.php?id=<?php echo $res;?>" method="POST">
    <div class="box">
       
        <div class="content">
            <h1><?php echo $result['deprivation_ID']?></h1>
            <h2>اسم المقرر : <a><?php echo $result['Course_Name']?></a> </h2>
            <h2>نسبة الغياب : <a><?php echo $result['percentage']?></a> </h2>
            <h2>سبب الحرمان : <a><?php echo $result['deprivation_NAME']?></a> </h2>
            <h2>المرشد الاكاديمي : <a><?php echo $result['Academic_advisor']?></a> </h2>
            <h2>التفاصيل : <a><?php echo $result['details']?></a></h2>
			<h2>تاريخ الحرمان : <a><?php echo $result['deprivation_DATE']?></a> </h2>

            <button type="submit"  name="booknow" class="utton" style="margin-top: 5px;"><a >رفع الحرمان</a></button>
        </div>
    </div></form></li>
    <?php
        }
    
    ?>
   

   
                
           
    </ul>
    </div>
  </div>
  </div>
    
    

 
    
     
</body>
</html>