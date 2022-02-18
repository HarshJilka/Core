<?php 

class Model_Core_View 
{
	public $template = null;
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
		require($this->getTemplate());
	}

	public function getData($key = null) // get object properties
	{
		if(!$key) 
		{
			return $this->data;	
		}
		if(array_key_exists($key, $this->data)) 
		{
			return $this->data[$key];	
		}
		return null;
	}
	
	public function setData(array $data)
	{
		$this->data = $data;
		return $this;
	}

	public function addData($key, $value) // add info in data 
	{
		$this->data[$key] = $value;
		return $this;
	}

	public function removeData($key)
	{
		if (array_key_exists($key, $this->data)) 
		{
			unset($this->data[$key]);	// value append
		}
		return $this;
	}
}


?>
