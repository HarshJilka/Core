<?php 
 echo "<pre>";

 //1.class_alias
 class car{}
 class_alias('car','driver');
 $x = new car();
 $y = new driver();

 var_dump($x instanceof car); 
 echo "<br>";

 var_dump($y instanceof car);
 echo "<br>";
 echo "<br>";

//3.get_called_class
class football
{
	public $players;
	function players()
	{
		print_r(get_called_class());
		// return name of class
		 echo "<br>";
	} 
}
class players extends football 
{

}
$x = new players();
$x::players();
echo "<br>";

// ->class_exists
//return true if classs exists
var_dump(class_exists('car'));
echo "<br>";
var_dump(class_exists('Truck'));


// -> get_called_class

class cricket{
	public $player_name = "Harsh";
	public $player_run = "164";


	function batting(){
		return;
	}

	function bowling(){
		return;
	}

	function watching(){
		return;}
}

$class_methods = get_class_methods('cricket'); //return all method name of given class

foreach ($class_methods as $method_name) 
{
    echo "$method_name\n";
}
echo "<br>";

//-> get_class_methods
$c = new cricket();
$class_var = get_class_vars(get_class($c)); //return name of variable and value

foreach ($class_var as $var_name) 
{
	var_dump("$var_name:");
}
echo "<br>";


//-> get_class
$var = new football();
var_dump(get_class($var)); //return class name which object take references
echo "<br>";

//-> get_declared_classes
print_r(get_declared_classes());//return name of all declare classes in given script as array formate
echo "<br>";

//8.get_declared_interfaces
print_r(get_declared_interfaces());//return name of interfaces in array formate
echo "<br>";

// get_declared_traits
trait cars{}
print_r(get_declared_traits());//return name of traits in current script
echo "<br>";

// get_mangled_object_vars
$ronaldo = new football();
var_dump(get_mangled_object_vars($ronaldo)); //return all peopertice of class
echo "<br>";

//-> get_object_vars
var_dump(get_object_vars($ronaldo)); //return all non-static propertice of array
echo "<br>";

// get_parent_class
class franchies extends football{
	function __construct()
	{

		echo get_parent_class('franchies');
	}
}
$comapny= new franchies();
echo "<br>";

// -> is_a
var_dump(is_a($ronaldo, 'football')); //return true if object is refer given class
var_dump(is_a($ronaldo, 'food'));
echo "<br>";

//-> interface_exists
interface build{}
var_dump(interface_exists('build'));//return true if 'car' interface is exists when ever return false
var_dump(interface_exists('driver'));
echo "<br>";

// -> is_subclass_of
var_dump(is_subclass_of($comapny, 'football'));//return true if it's subclass is cricket else return false
var_dump(is_subclass_of($ronaldo, 'football'));
var_dump(is_subclass_of('franchies','football'));
echo "<br>";

//-> property_exists
var_dump(property_exists('football', 'players'));//return true if property is exists else return false
var_dump(property_exists('football','player_name'));
echo "<br>";

//->method_exists
var_dump(method_exists($ronaldo, 'players')); //return true if method is exists in class
echo "<br>";

// trait_exists==>55
trait franch{}
var_dump(trait_exists('franch'));//return true if trait is exists else return false
var_dump(trait_exists('football'));
echo "<br>";

// 19.enum_exists
var_dump(enum_exists(user::class)); // not supported in v.7
 ?>




