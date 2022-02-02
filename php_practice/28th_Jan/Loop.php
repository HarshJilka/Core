<?php


	// LOOP TYPES :- 1) WHILE, 2)DO WHILE, 3)FOR, 4)FOREACH 
	
	$number = 0;

	while ($number <= 10) 
	{
		echo "The numbers are : $number <br>";
		$number++;
	}
	echo("<br>");

	//Do while
	do{
		echo "The numbers are : ".$number. "<br>";
		$number++;
	}while($number<=5);

	echo("<br>");

	//For
	for ($number=0; $number < 7; $number++)
	 { 
		echo "The numbers are : ".$number. "<br>";
	 }

	 echo("<br>");

	 //foreach
	 $colors = array("red", "green", "blue", "yellow");
		 foreach ($colors as $value)
		  {
		  	echo "Colors are:" .$value. "<br>";
	 	  }
  ?>