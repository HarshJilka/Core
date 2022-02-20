<?php

Ccc::loadClass('Model_Core_Request');

class Controller_Core_Front
{

	protected $request = null;

	public function getRequest()
	{
		if (!$this->request) 
		{
			$request = new Model_Core_Request();
			$this->setRequest($request);
		}
		return $this->request;
	}

	public function setRequest($request)
	{
		$this->request = $request;
		return $this;
	}

	public function init()
	{
		$request = $this->getRequest(); // model_core_req object
		$actionName = $request->getActionName(); // a=grid in actionname
		$actionName = $actionName.'Action'; // concate after grid
		$controllerName = $request->getControllerName(); // request c = admin 
		$controllerPath = 'Controller/'.$controllerName.'.php'; // controller/admin.php path 
		$controllerClassName = 'Controller_'.$controllerName; // admin inside class controller_admin
		$controllerClassName = $this->prepareClassName($controllerClassName); // call method
		Ccc::loadClass($controllerClassName); // load class
		$controller = new $controllerClassName(); // Controller_Admin create object 
		$controller->$actionName(); // method call from controller ex- gridAction 
	}

	public function prepareClassName($name)
	{
		$name = ucwords($name,'_'); // if set _ then 1st word becaome capital ex:- controller_Admin
		return $name;
	}

}

  ?>