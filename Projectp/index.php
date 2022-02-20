<?php require_once('Model/Core/Adapter.php');
	  $adapter =  new Model_Core_Adapter();		

class Ccc
{
	public static $front=null;

	public static function getFront()
	{
		if (!self::$front)
		 {
			Ccc::loadClass('Controller_Core_Front');
			$front = new Controller_Core_Front(); // obj then set
			self::setFront($front);
		}
		return self::$front;
	}

	public static function setFront($front)
	{
		self::$front= $front; // set obj
	}

	public static function init() // front init() call
	{
		self::getFront()->init(); 
	}

	public static function getModel($className) // load admin,product....
	{
		$className = 'Model_'. $className; //Model_admin
		self::loadClass($className); //loadclass() call
		return new $className(); // Model_admin object
	}

	public static function getBlock($className) // Admin->grid,edit,add admin_grid
	{
		$className = 'Block_'. $className; //block_admin
		self::loadClass($className);
		return new $className(); // block_admin new obj create
	}

	public static function loadClass($className)
	{
		$path = str_replace("_","/",$className).'.php';  // _ replace / => model/core/request.php 
		Ccc::loadFile($path);
	}

	public static function loadFile($path) 
	{
		require_once($path); // model/core/request.php 
	}

}

Ccc::init();


 ?>