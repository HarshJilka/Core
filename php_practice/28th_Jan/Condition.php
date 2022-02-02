
<!-- CONDITIONS :- IF, IF...ELSE, IF...ELSE IF...ELSE, NASTED IF  -->
 


<?php 
 
  // <!-- If  -->

 $num = 10;
 $num1 = false;
 $num2 = !true;
 $num3 = 0;
 $str = "Harsh";

 if ($num < 20)
  {
	echo "This is true statement :" .$num. "<br>";
  }
  echo("<br>");

 // if...else if...else
 if ($num > 20)
  {
 	echo "Statement :" .$num. " is laser <br>";
 }
 elseif ($num = 10) {
  	echo "This num is : " .$num. "<br>";
  } 
 else {
 	echo "statement is failure:";
 }
 echo("<br>");

// if...else
 if ($num1)
  {
 	echo "Successful";
 } 
 else {
 	echo "failed";
 }
 echo("<br>");

 if ($num2)
  {
 	echo "Successful";
 } 
 else {
 	echo "failed";
 }
 echo("<br>");


 if ($num3)
  {
 	echo "Successful";
 } 
 else {
 	echo "failed";
 }
 echo("<br>");


 if ($str)
  {
 	echo "Successful";
 } 
 else {
 	echo "failed";
 }
 echo("<br>");


// NASTED IF 
 $value = 18;
 $nationality = "Indian";

 if ($nationality == "Indian") 
 {
 	if ($value < 18)
 	 {
 		echo "Not elligible for voting ";
 	} 
 	else 
 	{
 		echo "elligible for voting";
 	}
 }

 ?>