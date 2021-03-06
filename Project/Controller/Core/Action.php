<?php Ccc::loadClass('Model_Core_View');

class Controller_Core_Action 
{

	protected $layout = null;
	protected $view = null;
	protected $message = null;
	protected $cart = null;
	
	protected function setTitle($title)
    {
    	
        $this->getLayout()->getHead()->setTitle($title);
    }

	public function redirect($a=null,$c=null,array $data = [],$reset = false)
    {
        $url = Ccc::getModel('core_view')->getUrl($a,$c,$data,$reset);
        header("location: $url");
    }

	public function getLayout()
	{
		if(!$this->layout)
		{
			$this->setLayout(Ccc::getBlock('Core_Layout'));
		}
		return $this->layout;
	}

	public function setLayout($layout)
	{
		$this->layout = $layout;
		return $this;
	}

	public function getMessage()
	{
		if(!$this->message)
		{
			$this->setMessage(Ccc::getModel('Admin_Message'));
		}
		return $this->message;
	}

	public function setMessage($message)
	{
		$this->message = $message;
		return $this;
	}


	public function getAdapter()
	{
		global $adapter;
		return $adapter;
	}

	public function getCart()
    {
        if(!$this->cart){
            $this->cart = Ccc::getModel('Admin_Cart');
        }
        return $this->cart;
    }

    public function setCart($cart)
    {
        $this->cart = $cart;
        return $this;
    }

	public function getRequest()
	{
		return Ccc::getFront()->getRequest(); 
	}

	public function getResponse()
    {
        return Ccc::getFront()->getResponse();
    }
		
	public function renderLayout()
    {
        $this->getResponse()
            ->setHeader('Content-type', 'text/html')
            ->render($this->getLayout()->toHtml());
    }
    public function renderContent()
    {
        $this->getResponse()
            ->setHeader('Content-type', 'text/html')
            ->render($this->getLayout()->getContent()->toHtml());
    }

    public function renderJson($content)
    {
        $this->getResponse()
            ->setHeader('Content-type', 'application/json')
            ->render(json_encode($content));
    }
}