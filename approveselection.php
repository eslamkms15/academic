<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موافقة</title>
</head>
<body>
<style>
*{
    margin: 0;
    padding: 0;

}
body{
    background-image: url("../images/regs.jpg");
    
    
    background-size: cover;
    background-position: center;
    /* margin-top: 0px; */
    
}
.main{
    width: 400px;
    margin: 100px auto 0px auto;
    margin-top: 30px;
}
.btnn{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border:none;
    margin-top: 30px;
    margin-left: 40px;
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
.register{
    background-color: rgba(0,0,0,0.6);
    width: 100%;
    font-size: 18px;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 2px 2px 15px rgba(0,0,0,0.3);
    color: #fff;
    margin: auto;

}

form#register{
    margin: 40px;
    margin-top: 10px;

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


#back{
    width: 100px;
    height: 40px;
    background: #ff7200;
    border:none;
    margin-top: 10px;
    margin-left: 20px;
    font-size: 18px;
   

}


#back a{
    text-decoration: none;
    color: black;
    font-weight: bold;
}

#fam{
    color: #ff7200;
    font-family: 'Times New Roman';
    font-size: 50px;
    padding-left: 20px;
    margin-top:-10px;
    text-align: center;
    letter-spacing: 2px;
    display: inline;
    margin-left: 250px;
}

.reg{
    width: 100%;
}



</style>






<button id="back"><a href="Selectionrequest.php">الرئيسية</a></button> 
    
 <div class="main">
        
        <div class="register">
        <h2>ادخل نسبة الغياب</h2>
        <form  method="POST" >    
            <label>نسبة الغياب : </label>
            <br>
            <input type ="text" name="percentage"
            id="percentage" placeholder="ادخل نسبة الغياب "   equired>
            <br><br>
 </input>

            <input type="submit" class="btnn"  value="حفظ" name="approve">
            
        
        
        </input>
            
        </form>
        </div> 
    </div.main>
	<?php
require_once('connection.php');
	$request_ID=$_GET['id'];
	$sql="SELECT *from request where request_ID=$request_ID";
$result=mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($result);
$deprivation_ID=$res['deprivation_ID'];

    if(isset($_POST['approve']))
    {
        $percentage=$_POST['percentage'];
        
        
        if(empty($percentage))
        {
            echo '<script>alert("يرجى ملء الفراغات")</script>';
        }

        else{
			if($res['Selection']=='تمت الموافقة' )
{
    echo '<script>alert("تمت الموافقة بالفعل")</script>';
    echo '<script> window.location.href = "Selectionrequest.php";</script>';
}
else{
            $query="UPDATE request set  Selection='تمت الموافقة' where request_ID=$request_ID";
            $res=mysqli_query($con,$query);
			$sql2="UPDATE deprivation set AVAILABLE='N' where deprivation_ID=$deprivation_ID";
			$query2=mysqli_query($con,$sql2);
            $sql3="UPDATE deprivation set percentage=$percentage where deprivation_ID=$deprivation_ID";
			$query2=mysqli_query($con,$sql3);
    echo '<script>alert("تمت الموافقة")</script>'; 

            header("location: Selectionrequest.php");
            session_start();
                



        }
           
    }
	}
    
	







?>
</body>
</html>