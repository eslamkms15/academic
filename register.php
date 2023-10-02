<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>تسجيل</title>
   <link rel="stylesheet" href="css/regs.css" type="text/css">
</head>
<body>
    
<?php

require_once('connection.php');
if(isset($_POST['regs']))
{
    $fname=mysqli_real_escape_string($con,$_POST['fname']);
    $lname=mysqli_real_escape_string($con,$_POST['lname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $ph=mysqli_real_escape_string($con,$_POST['ph']);
   
    $pass=mysqli_real_escape_string($con,$_POST['pass']);
    $cpass=mysqli_real_escape_string($con,$_POST['cpass']);
    $gender=mysqli_real_escape_string($con,$_POST['gender']);
    $Pass=md5($pass);
    if(empty($fname)|| empty($lname)|| empty($email)||  empty($ph)|| empty($pass) || empty($gender))
    {
        echo '<script>alert("برجاء ملئ الفراغات")</script>';
    }
    else{
        if($pass==$cpass){
        $sql2="SELECT *from users where EMAIL='$email'";
        $res=mysqli_query($con,$sql2);
        if(mysqli_num_rows($res)>0){
            echo '<script>alert("البريد الاكتروني مستخدم من قبل!!")</script>';
            echo '<script> window.location.href = "index.php";</script>';

        }
        else{
        $sql="insert into users (FNAME,LNAME,EMAIL,PHONE_NUMBER,PASSWORD,GENDER) values('$fname','$lname','$email',$ph,'$Pass','$gender')";
        $result = mysqli_query($con,$sql);
          

        if($result){
            echo '<script>alert("تم التسجيل بنجاح اضغط على موافق لتسجيل الدخول")</script>';
            echo '<script> window.location.href = "index.php";</script>';       
           }
        else{
            echo '<script>alert("يرجى التحقق من الاتصال")</script>';
        }
    
        }

        }
        else{
            echo '<script>alert("لم تتطابك كلمتان المرور")</script>';
            echo '<script> window.location.href = "register.php";</script>';
        }
    }
}


?>



  <style>
  
     body{
    background: url("images/homebg.jpg");
    background-position: center;
    background-size: cover;
}
      input#psw{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}
input#cpsw{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}
  #message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  
  width: 400px;
  margin-left:1000px;
  margin-top: -500px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}</style> 

    <button id="back"><a href="index.php">الرئيسية</a></button>
    <h1 id="fam">انضم الي طلاب الجامعة</h1>
 <div class="main">
        
        <div class="register">
        <h2>سجل هنا</h2>
        
        <form id="register" action="register.php" method="POST">    
            <label>الاسم الاول : </label>
            <br>
            <input type ="text" name="fname"
            id="name" placeholder="ادخل اسمك الاول" required>
            <br><br>

            <label>الاسم الاخير : </label>
            <br>
            <input type ="text" name="lname"
            id="name" placeholder="ادخل اسمك الاخير" required>
            <br><br>

            <label>البريد الالكتروني : </label>
            <br>
            <input type="email" name="email"
            id="name" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ex: example@ex.com"placeholder="ادخل بريد الكتروني صالح" required>
            <br><br>
            
          

            <label>رقم الهاتف : </label>
            <br>
            <input type="tel" name="ph" maxlength="10" onkeypress="return onlyNumberKey(event)"
            id="name" placeholder="ادخل رقم هاتفك" required>
            <br><br>

            

            <label>الرقم السري : </label>
            <br>
            <input type="password" name="pass" maxlength="12"
            id="psw" placeholder="ادخل الرقم السري"   required>
            <br><br>
            <label>تاكيد الرقم السري : </label>
            <br>
            <input type="password" name="cpass" 
            id="cpsw" placeholder="اعد ادخال الرقم السري" required>
            <br><br>
            <tr>
                <td><label">النوع : </label></td><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>
                    <label for="one">ذكر</label>
                    <input type="radio" id="input_enabled" name="gender" value="ذكر" style="width:200px">
                </td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                <td>
                    <label for="two">انثي</label>
                    <input type="radio" id="input_disabled" name="gender" value="ذكر" style="width:160px" />
                </td>
            </tr>
            <br><br>

            <input type="submit" class="btnn"  value="تسجيل" name="regs" style="background-color: #ff7200;color: white">
            
        
        
        </input>
            
        </form>
        </div> 
    </div>
    <div id="message">
  <h3>يجب أن تحتوي كلمة المرور على ما يلي:</h3>
  <p id="letter" class="invalid"> <b>أحرف صغيرة</b> </p>
  <p id="capital" class="invalid"> <b>احرف كبيرة</b> </p>
  <p id="number" class="invalid"> <b>رقم</b></p>
  <p id="length" class="invalid">علي الاقل <b>8 أحرف</b></p>
</div>

</body>
</html>