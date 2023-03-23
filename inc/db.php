<?php 

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "crud_php_mysql";

  // create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {

    die("Connection Failed : " . mysqli_connect_error()); // die بتوقف الكود تماماً هاي في حال كان في إيرور وبتظهرلي الرسالة اللي انا كتبتها بسبب فنكشن الماي أس كيو أل آي كوننيكت إيرور
    
  }


?>