<?php

echo"<pre>";

class tata{
    public $name = null;
    public $price = 0;

}

$harrier = new tata();
$harrier->name = "harrier";
$harrier->price = 2000000;

print_r($harrier);
echo "<br>";

$altroz = $harrier; //in object addresh or location is assigned
print_r($altroz);

$altroz->name = "altroz";
echo "<br>";

print_r($altroz);
echo "<br>";

print_r($harrier);
?>