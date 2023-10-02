
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>جامعة نجران الكلية تطبيقية</title>
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    <link  rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
</head>
<body>



<?php
require_once('connection.php');
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        
        
        if(empty($email)|| empty($pass))
        {
            echo '<script>alert("يرجى ملء الفراغات")</script>';
        }

        else{
            $query="select *from users where EMAIL='$email'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['PASSWORD'];
                if(md5($pass)  == $db_password)
                {
                    header("location: deprivation.php");
                    session_start();
                    $_SESSION['email'] = $email;
                    
                }
                else{
                    echo '<script>alert("أدخل كلمة المرور الصحيحة")</script>';
                }



                



            }
            else{
                echo '<script>alert("أدخل البريد الإلكتروني الصحيح")</script>';
            }
        }
    }







?>
    <div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">جامعة نجران الكلية تطبيقية</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">الرئيسية</a></li>                    
                  <li> <button class="adminbtn"><a href="adminlogin.php">تسجيل الدخول كمسؤول</a></button></li>
                </ul>
            </div>
            
          
        </div>
        <div class="content">
            
            <div class="form">
                <h2>تسجيل الدخول هنا</h2>
                <form method="POST"> 
                <input type="email" name="email" placeholder="ادخل البريد الالكتروني هنا">
                <input type="password" name="pass" placeholder="ادخل كلمة السر هنا">
                <input class="btnn" type="submit" value="تسجيل الدخول" name="login"></input>
                </form>
                <p class="link">هل تملك حساب ؟<br>
                <a href="register.php">سحل الان</a> هنا</a></p>
                
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
