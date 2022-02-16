<?php require_once('Model/Core/Adapter.php');  ?>
<?php require_once('menu.php'); ?>
<?php 

class Ccc
{
	public $front = null;
	public static function loadFile($path)
	{
		require_once($path);
	}
	public static function loadClass($className)
	{
		$path = str_replace("_", "/", $className).'.php';
		Ccc::loadFile($path);
	}
	public function getFront()
	{
		Ccc::loadClass('Controller_Core_Front');
		if(!$this->front)
		{
			$front = new Controller_Core_Front();
			$this->setFront($front);
		}
		return $this->front;
	}

	public function setFront($front)
	{
		$this->front = $front;
		return $this;
	}
	public static function init()
	{
		Ccc::loadClass('Controller_Core_Front');
		$front = new Controller_Core_Front();
		$front->init();
	}
}
$c= new Ccc();
$adapter = new Adapter();
Ccc::init();


?>