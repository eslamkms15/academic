<?php 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con = mysqli_connect('localhost','root','','academic');
    if(!$con)
    {
        echo 'يرجى التحقق من اتصال قاعدة البيانات الخاصة بك';
    }







?>