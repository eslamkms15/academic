<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المرشد الاكاديمي</title>
</head>
<body>

<style>
*{
    margin: 0;
    padding: 0;

}
.hai{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%),url("../images/carbg2.jpg");
    background-position: center;
    background-size: cover;
    height: 109vh;
    animation: infiniteScrollBg 50s linear infinite;
}
.main{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%);
    background-position: center;
    background-size: cover;
    height: 109vh;
    animation: infiniteScrollBg 50s linear infinite;
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

.content-table{
   border-collapse: collapse;
    
    font-size: 1em;
    /* min-width: 400px; */
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow:0 0  20px rgba(0,0,0,0.15);
    margin-left : 100px ;
    margin-top: 25px;
    width: 1300px;
    height: 300px;
}
.content-table thead tr{
    background-color: orange;
    color: white;
    text-align: left;
}

.content-table th,
.content-table td{
    padding: 12px 15px;


}

.content-table tbody tr{
    border-bottom: 1px solid #dddddd;
}
.content-table tbody tr:nth-of-type(even){
    background-color: #f3f3f3;

}
.content-table tbody tr:last-of-type{
    border-bottom: 2px solid orange;
}

.content-table thead .active-row{
    font-weight:  bold;
    color: orange;
}


.header{
    margin-top: -700px;
    margin-left: 650px;
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

.but a{
    text-decoration: none;
    color: black;
    
}
</style>
<?php

require_once('connection.php');
$query="SELECT *from request ORDER BY request_ID DESC";    
$queryy=mysqli_query($con,$query);
$num=mysqli_num_rows($queryy);


?>

<div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">المرشد الاكاديمي</h2>
            </div>
            <div class="menu">
                <ul>
                                   
                    <li><a href="adminrequest.php">طلبات الغاء الحرمان</a></li>
                  <li> <button class="nn"><a href="index.php">تسجيل الخروج</a></button></li>
                </ul>
            </div>
         </div>

         </div>
        <div>
            <h1 class="header">الطلبات</h1>
            <div>
                <div>
                    <table class="content-table">
                <thead>
                    <tr>
                        <th>رقم الطلب</th>
                        <th>رقم الحرمان</th>
                        <th>اسم الطالب</th>
                        <th>البريد الالكتروني</th>
                        <th>تاريخ الطلب</th>
                        <th>التفاصيل</th>
                        <th>حالة الطب</th>
						<th>قبول</th>
                        <th>رفض</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                
                
                while($res=mysqli_fetch_array($queryy)){
                $email = $res['EMAIL'];
                $query1="SELECT *from users where EMAIL ='$email' ";    
                $ress=mysqli_query($con,$query1);
                $res1=mysqli_fetch_array($ress)
                ?>
                <tr  class="active-row">
                    
                    <td><?php echo $res['request_ID'];?></php></td>
                    <td><?php echo $res['deprivation_ID'];?></php></td>
                    <td><?php echo $res1['FNAME']; echo " "; echo $res1['LNAME']; ?></php></td>

                    <td><?php echo $res['EMAIL'];?></php></td>
                    <td><?php echo $res['request_DATE'];?></php></td>
                    <td><?php echo $res['details'];?></php></td>
                    <td><?php echo $res['request'];?></php></td>
                    <td><button type="submit"  class="but"  name="approve"><a href="approve.php?id=<?php echo $res['request_ID']?>">موافقة</a></button></td>
					<td><button type="submit"  class="but"  name="reject"><a href="reject.php?id=<?php echo $res['request_ID']?>">رفض</a></button></td>
				</tr>
               <?php } ?>
                </tbody>
                </table>
                
                </div>
            </div>
        </div>
</body>
</html>