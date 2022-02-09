<?php 
 
 echo "<pre>";
 $conn =mysqli_connect('localhost','root','','crud');

 if($conn)
 { 
   echo  "succuess";
   $name="herry"; 
   $email= "herry@gmail.com";
   $mobile= "84654847675";
 //  $sql= "insert into user value('".$name."','".$email."','".$mobile."')";
 
  $sql= "insert into crud (`name`,`email`,`mobile`) value('herry','herry@gmail.com','84654')";

   $result= mysqli_query($conn,$sql);
   if ($result)
    {
   	 echo "succuess";
   }
   else
   {
   	echo mysqli_error($conn);
   	echo $result;
   }
   
  }
  
  else
  {
  	echo mysqli_error($conn);
  }


 ?>