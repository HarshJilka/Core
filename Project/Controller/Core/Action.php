<?php 

Ccc::loadClass('Model_Core_View');
Ccc::loadClass('Model_Core_Request');

class Controller_Core_Action
{
    protected $view = null;

    public function getAdapter()
    {
        global $adapter;
        return $adapter;
    }

    public function redirect($url)
    {
        header("Location: $url");
        exit();
    }

    public function getView() //return view object 
    {

        if (!$this->view)
        {
            $this->setView(new Model_Core_View());
        }
        
        return $this->view;
    }

    public function setView($view)
    {
        $this->view = $view;
        return $this;
    }

    public function getRequest()
    {
        return Ccc::getFront()->getRequest();
    }
    
    public function getUrl($c=null,$a=null,array $data = [],$reset = false)
    {
        $passData = []; // blankarray
        if($c==null && $a==null && $data==null && $reset==false)
        {
            $passData = $this->getRequest()->getRequest();  //index.php->getfront()
        }

        if($c==null)
        {
            $passData['c']=$this->getRequest()->getRequest('c'); 
        }
        else
        {
            $passData['c']=$c;
        }

        if($a==null)
        {
            $passData['a']=$this->getRequest()->getRequest('a'); 
        }
        else
        {
            $passData['a']=$a;
        }
        

        if($reset) // merge array  
        {
            if($data) // array if set
            {
                $passData = array_merge($passData,$data); 
            }
        }
        else // new array 
        {
            $passData = array_merge($this->getRequest()->getRequest(),$passData);
            if($data) // merge array
            {
                $passData = array_merge($passData,$data);
            }   
        }
        $url = "index.php?".http_build_query($passData); // build url 
        print($url);
        exit();
    }
}