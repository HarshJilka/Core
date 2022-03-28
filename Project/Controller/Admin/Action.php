<?php Ccc::loadClass('Controller_Core_Action');

class Controller_Admin_Action extends Controller_Core_Action
{

    public function __construct()
    {
        if(!$this->authentication())
        {
            /*$this->redirect('login','admin_login');*/
        }
    }
    
    public function authentication()
    {
        $loginModel = Ccc::getModel("Admin_Login");
        $request = $this->getRequest();

        if($request->getRequest('c') == 'Admin_Login')
        {
            $this->redirect();
        }

        if(!$loginModel->getLogin())
        {
            return false;
        }
        return true;
    }
}