<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حالة الطلب</title>
</head>
<body>
<style>

*{
    margin: 0;
    padding: 0;

}

body{
    background: url("images/homebg.jpg");
    background-position: center;
   
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
    background: linear-gradient(to top, rgba(255, 251, 251, 1)70%,rgba(250, 246, 246, 1)90%);
    display: flex;
    align-content: center;
    width: 700px;
    height: 400px;
    margin-top: 100px;
    margin-left: 350px;
  
    
}


.box .content{
    margin-left: 5px;
    font-size: larger;
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
    width: 200px;
    height: 40px;
   
    background: #ff7200;
    border:none;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
    margin-top: 10px;
    margin-left: 10px;
}
.utton a{
    text-decoration: none;
    color: white;
    font-weight: bold;
}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 100px;
}

ul li{
    list-style: none;
    margin-left: 200px;
    margin-top: -130px;
    font-size: 35px;

}
.name{
    font-weight: bold; 
}

</style>
<?php 
    require_once('connection.php');
        session_start();

    $value = $_SESSION['email'];
    $_SESSION['email'] = $value;
    
    $sql = "select r.deprivation_ID , d.Course_Name ,d.percentage,r.request_DATE,d.Academic_advisor,r.details,r.request,r.reason_of_refuse,r.Selection , r.EMAIL from request r INNER JOIN deprivation d ON  r.deprivation_ID = d.deprivation_ID AND r.EMAIL='$value'";
        $deprivation= mysqli_query($con,$sql);
    
    
    
    ?>
<?php
		while ($result = mysqli_fetch_array($deprivation, MYSQLI_ASSOC) ) {
            

    ?>    
    
    <form >
    <div class="box">
       
        <div class="content">
            <h1><?php echo $result['deprivation_ID'];?></h1>
            <h2><a> اسم المقرر :<?php echo $result['Course_Name'];?></a> </h2>
            <h2><a>نسبة الغياب : <?php echo $result['percentage'];?></a> </h2>
            <h2><a>تاريخ الطلب: <?php echo $result['request_DATE'];?></a> </h2>
            <h2><a>المرشد الاكاديمي :<?php echo $result['Academic_advisor'];?></a> </h2>
            <h2><a>التفاصيل : <?php echo $result['details'];?></a></h2>
			<h2><a>رد المرشد الاجتماعي  :<?php echo $result['request'];?></a> </h2>

            <?php if ($result['reason_of_refuse']!='UNDER PROCESSING')
            
            {
                ?>
            <h2><a>سبب الرفض :<?php echo $result['reason_of_refuse']?></a> </h2>
            <?php
        }
        ?>  <h2><a>رد أعضاء لجنة الحالات الطلابية  :<?php echo $result['Selection'];?></a> </h2>

        </div>
    </div></form>
    <?php
        
        }
    ?>
   

    
</body>
</html>