<?php 

class Model_Core_Request
{
    public function getPost($key = null,$value = null)
    {
        if(!$this->ispost())
        {
            return null;
        }
        if($key == null)
        {
            return $_POST;
        }
        if(!array_key_exists($key, $_POST)) // return value
        {
            return $value;
        }
        return $_POST[$key]; // _post
    }
    
    public function getRequest($key = null,$value = null)
    {
        if($key == null)
        {
            return $_REQUEST;
        }
        if(!array_key_exists($key, $_REQUEST))
        {
            return $value;
        }
        return $_REQUEST[$key];
    }

    public function isPost()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            return true;
        }
        return false;
    }

    public function getActionName()
    {
        return $this->getRequest('a', 'index');
        /*$actionName = (isset($_GET['a'])) ? $_GET['a'] : 'error';
        return $actionName;*/
    }

    public function getControllerName()
    {
        $controllerName = (isset($_GET['c'])) ? ucfirst($_GET['c']) : 'Customer';
        return $controllerName;
    }
}

?>