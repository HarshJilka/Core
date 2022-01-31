<?php
 echo "<pre>";

//-> array_combine
$player = array("virat","rahul","pant");
$prize = array(100000,1000000,14000000);
$player_prize = array_combine($player, $prize);//combine array as array1 is key and array2 is value
echo "<br>";
var_dump($player_prize);
 echo "<br>";

// -> array_chunk
$a1 = array('x','y','z','h','j');
var_dump(array_chunk($a1, 3)); //chunk array for array lenth 3
echo "<br>";
var_dump(array_chunk($a1,3,true));//chunk array for array lenth 3 wtih continuas indexing
 echo "<br>";

// -> .array_diff
$n1 = array("scout","jonny","neyoo");
$n2 = array("scout","neyoo","harsh");
$name = array_diff($n1, $n2); //return this value of array1 wich is not in other array
print_r($name);
echo "<br>";

// -> .array_fill
$players = array_fill(4,6,"Harsh");//fill the given value in the array
echo "<br>";
print_r($players);
echo "<br>";

// -> .array_flip
$player = array("virat","dhoni","KL");
$fliped_player = array_flip($player);//fliped the array 
echo "<br>";
print_r($player);
echo "<br>";
print_r($fliped_player);
echo "<br>";

// array_intersect
$name1 = array("virat","rohit","KL");
$name2 = array("virat","bumrah","bhuneswar");
echo "<br>";
print_r(array_intersect($name1, $name2));//which value are matched this is given as output

// array keys
$name3 = array(1=>"Harsh",2=>"Jilka");
echo "<br>"; 
print_r(array_keys($name3)); //return keys of the array
$players = array('virat','KL','rohit','Mj','Ap');
echo "<br>";
print_r(array_keys($players,'KL')); //retuen position of 2nd peramiter
echo "<br>";

// array_merge
print_r(array_merge($name1,$name2)); //merge tow or more array
echo "<br>";

// array_multisort
array_multisort($name1,$name2); //sort multipal array 
echo "<br>";
print_r($name1);
echo "<br>";
print_r($name2);
 echo "<br>";

// array_pop
$nh = array("virat","rohit","KL");
print_r(array_pop($nh));//return the last element
echo "<br>";
print_r($nh);//it's means last element is removed
echo "<br>";

// array_pad
print_r(array_pad($name1, 7, "Ap")); //pading the value in the existing array upto given lenght
echo "<br>";

// array_push
echo "<br>";
array_push($nh, 'dhoni');//add given value in the last of array
echo "<br>";
print_r($nh);
echo "<br>";


// array_rand
$rand = array_rand($nh,2);//return the random key value of array
echo "<br>";
print_r($rand);
 echo "<br>";

// array_replace
$values = array('a', 'b', 'c', 'd', 'e');
$replace = array(0,3);
echo "<br>";
print_r(array_replace($values, $replace));
echo "<br>";

// sizeof
echo "<br>";
echo sizeof($values);//retuen size of array
echo "<br>";

// rray_reverse
print_r(array_reverse($values));
echo "<br>";

//16.array_search
print_r(array_search("b", $values));//return position of element if it's exists
echo "<br>";

// array_shift
$shift = array_shift($values);//remove the fist index value and shift this array one step
echo "<br>";
print_r($shift);//return shift value
echo "<br>";
print_r($values);
//return existing array


// array_splice
$v1 = array('e','h','x','y','z');
echo "<br>";
array_splice($v1, 3);//return 3 element from starting
print_r($v1);

echo "<br>";
print_r(array_splice($v1,1,2));//return two element from first index element
echo "<br>";

// array_sum
$a1=array(1,2,3,4,5,6);
echo array_sum($a1);


  ?>