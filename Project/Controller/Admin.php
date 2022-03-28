<?php Ccc::loadClass('Controller_Admin_Action');

class Controller_Admin extends Controller_Admin_Action
{

    public function gridAction()
    {
        $content = $this->getLayout()->getContent();
        $this->setTitle('admin');
        $adminGrid = Ccc::getBlock('Admin_Grid');
        $content->addChild($adminGrid,'Grid');
        $this->renderLayout();
    }

    public function addAction()
    {
        $this->setTitle('admin');
        $adminModel = Ccc::getModel('Admin');
        $content = $this->getLayout()->getContent();
        $adminAdd = Ccc::getBlock('Admin_Edit');
        /*->setData(['admin'=>$adminModel]);*/
        Ccc::register('admin',$adminModel);
        $content->addChild($adminAdd,'Add');
        $this->renderLayout();
    }

    public function editAction()
    {
        try
        {
            $this->setTitle('admin');
            $adminModel = Ccc::getModel('Admin');
            $request = $this->getRequest();
            $id = (int)$request->getRequest('id');

            if(!$id)
            {
                $this->getMessage()->addMessage('Request Invalid.',3);
                throw new Exception("Request Invalid.", 1);
            }
            
            $admin = $adminModel->load($id);
            
            if(!$admin)
            {   
                $this->getMessage()->addMessage('System is unable to find record.',3);
                throw new Exception("System is unable to find record.", 1);
            }

            $content = $this->getLayout()->getContent();
            $adminEdit = Ccc::getBlock('Admin_Edit');
            /*->setData(['admin'=>$admin])*/
            Ccc::register('admin',$admin);
            $content->addChild($adminEdit,'Edit');
            $this->renderLayout();
        }
        catch (Exception $e)
        {
            $this->redirect('grid','admin',[],true);
        }
    }


    public function saveAction()
    {
        try
        {
            $request = $this->getRequest();
            $adminModel = Ccc::getModel('Admin');

            if(!$request->isPost())
            {
                $this->getMessage()->addMessage('Request Invalid.',3);
                throw new Exception("Request Invalid.", 1);
            }

            $postData = $request->getPost('admin');

            if(!$postData)
            {
                $this->getMessage()->addMessage('Invalid data Posted.',3);
                throw new Exception("Invalid data Posted.", 1);
            }

            $admin = $adminModel;
            $admin->setData($postData);

            if(!($admin->adminId))
            {
                unset($admin->adminId);
                $admin->createdAt = date('y-m-d h:m:s');
                $admin->password = md5($admin->password);
                $result = $admin->save();
                if(!$result)
                {
                    $this->getMessage()->addMessage('Unable to Save Record.',3);
                    throw new Exception("Unable to Save Record.", 1);
                }
                $this->getMessage()->addMessage('Your Data save Successfully');
            }
            else
            {
                if(!(int)$admin->adminId)
                {
                    $this->getMessage()->addMessage('Invalid Request.',3);
                    throw new Exception("Invalid Request.", 1);
                }
                $admin->updatedAt = date('y-m-d h:m:s');
                $admin->password = md5($admin->password);
                $result = $admin->save();

                if(!$result)
                {
                    $this->getMessage()->addMessage('Unable to Update Record.',3);
                    throw new Exception("Unable to update Record.", 1);
                }
                $this->getMessage()->addMessage('Your Data Update Successfully');
            }
            $this->redirect('grid','admin',[],true);
        }
        catch (Exception $e)
        {
            $this->redirect('grid','admin',[],true);
        }
    }

    public function deleteAction()
    {
        try 
        {
            $adminModel = Ccc::getModel('Admin');
            $request = $this->getRequest();

            if(!$request->getRequest('id'))
            {
                $this->getMessage()->addMessage('Request Invalid.',3);
                throw new Exception("Request Invalid.", 1);
            }

            $id=$request->getRequest('id');
            $admin_id=$adminModel->load($id)->delete();
            $this->getMessage()->addMessage('data deleted succesfully.',1);
            $this->redirect('grid','admin',[],true);
           
        } 
        catch (Exception $e)
        {
            echo $e->getMessage();
            $this->redirect('grid','admin',[],true);
        }
    }
}