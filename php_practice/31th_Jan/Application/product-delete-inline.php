<?php

$stu_id = $_GET['id'];

 $conn = mysqli_connect("localhost","root","","crud") or die("Connection failed");

     $sql = "delete from student where sid = {$stu_id}";

     $result = mysqli_query($conn,$sql) or die("Unsuccessful!");

     header("Location: http://localhost/PHP/Core/php_practice/31th_Jan/Application/product-grid.php"); 

     mysql_close($conn);
  ?>