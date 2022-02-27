<?php 

class Model_Core_View 
{
	public $template = null;
	public $data = [];
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 2;
	const STATUS_DEFAULT = 1;
	const STATUS_ENABLED_LBL = 'Enabled';
	const STATUS_DISABLED_LBL = 'Disabled';

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

	public function getUrl($a=null,$c=null,array $data = [],$reset = false)
	{

		$info = [];

		if($c==null && $a==null && $data==null && $reset==false)
		{
			$info = Ccc::getFront()->getRequest()->getRequest();
		}

		$info['c']= $c==null ?Ccc::getFront()->getRequest()->getRequest('c') : $info['c']=$c ; 
		$info['a']= $a==null ?Ccc::getFront()->getRequest()->getRequest('a') : $info['a']=$a ; 
		
		if($reset){
			if($data) {
				$info = array_merge($info,$data);
			}
		}
		else{
			$info = array_merge(Ccc::getFront()->getRequest()->getRequest(),$info);
			if($data) {
				$info = array_merge($info,$data);
			}	
		}
		$url = "index.php?".http_build_query($info);
		return $url;
	}

    public function getBaseUrl($subUrl = null)
    {
        $url = "C:xampp/htdocs/php/Core/Project";
        if($subUrl)
        {
            $url = $url."/".$subUrl;
        }
        return $url;
    }





	/*public function getUrl($c=null,$a=null,array $data = [],$reset = false)
	{

		$info = [];
		if($c==null && $a==null && $data==null && $reset==false){
			$info = Ccc::getFront()->getRequest()->getRequest();
		}
		$info['c']= $c==null ?Ccc::getFront()->getRequest()->getRequest('c') : $info['c']=$c ; 
		$info['a']= $a==null ?Ccc::getFront()->getRequest()->getRequest('a') : $info['a']=$a ; 
		if($reset)
		{
			if($data) 
			{
				$info = array_merge($info,$data);
			}
		}
		else
		{
			$info = array_merge(Ccc::getFront()->getRequest()->getRequest(),$info);
			if($data) 
			{
				$info = array_merge($info,$data);
			}	
		}
		$url = "index.php?".http_build_query($info);
		return $url;
	}*/


}
?>
