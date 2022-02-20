<?php

class Model_Core_View
{
	public $template =  null;
	public $data = [];

	public function getTemplate()
	 	{
	 		return $this->template;
	 	} 	

	public function setTemplate($template)
	{
		$this->template = $template;
		return $this;
	}

	public function toHtml()
	{
		/*echo $this->getTemplate();
		exit();*/
		require($this->getTemplate()); // view/admin/grid.php this is require 
	}

	public function getData($key = null)  // from db
	{
		if(!$key)
		{
			return $this->data; // All data pass if key not passed 
		}
		if (array_key_exists($key,$this->data))
		{
			return $this->data[$key]; // If key is add then return values 
		}
		return null;
	}

	public function setDate(array $data) // only array type for data accepted
	{
		$this->data= $data; // from db to set $data 
		return $this; 
	}

	public function addData($key , $value) // perticular key value add
	{
		$this->data[$key] = $value; 
		return $this;
	}

	public function removeData($key)  
	{
		if(array_key_exists($key,$this->data)) 
		{
			unset($this->data[$key]); // remove data by key 
		}
		return $this; // does not exit then this
	}
}

  ?>