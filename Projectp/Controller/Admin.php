<?php 
	
Ccc::loadClass('Controller_Core_Action');
Ccc::loadClass('Model_Core_Request');
Ccc::loadClass('Model_Admin');


class Controller_Admin extends Controller_Core_Action
{
   public function gridAction()
   {
   	/* $adminModel = new Model_Admin();
       $adminModel->name = 'Harsh';  
       $adminModel->email = 'Harsh@gmai.cpm';  
       echo '<pre>';
       print_r($adminModel);
       die();*/
   	 Ccc::getBlock('Admin_Grid')->toHtml();
   }

   public function addAction()
   {
      Ccc::getBlock('Admin_Add')->toHtml();
      /*$view = $this->getView();
      $view->setTemplate('view/admin/add.php');
      $view->toHtml();*/
   }

   public function editAction()
   {
      try
      {  
         $adminId = (int) $this->getRequest()->getRequest('id');

         if(!$adminId)
         {
            throw new Exception("Id is not valid.");
         }

        if(!(int)$adminId)
        {
            throw new Exception("Invalid Request.", 1);
        }

        $adminModel = Ccc::getModel('Admin');
        $adminTable = new Model_Admin();
        $admin = $adminTable->fetchRow($adminId);

        Ccc::getBlock('Admin_Edit')->addData('admin',$admin)->toHtml();
      }

      catch(Exception $e)
      {
         echo $e->getMessage();
         exit();
      }
   }

   public function deleteAction()
   {
      try
      {
         $request = $this->getRequest();

         if(!$request->getRequest('id'))
         {
            throw new Exception("Error Processing Request", 1);
         }

         $adminId = $request->getRequest('id');

         if(!(int)$adminId)
         {
            throw new Exception("Error Processing Request", 1);
         }

         $adminTable = Ccc::getModel('Admin');
            $adminTable->delete($adminId);
            $this->redirect('index.php?c=admin&a=grid');
      }

      catch(Exception $e)
      {
         echo $e->getMessage();
         exit();
      }
   }

   public function saveAction()
   {
      try
      {
         $request = $this->getRequest();

         if(!$request->isPost())
         {
            throw new Exception("Request Invalid.",1);
         }

         $postData = $request->getPost('admin');

         if(!$postData)
            {
                throw new Exception("Invalid data posted.", 1);
         }    
          
         $adminTable = Ccc::getModel('Admin');
         
         if(array_key_exists('adminId',$postData))
         {
            $adminId = $postData['adminId'];

            if(!(int)$postData)
            {
               throw new Exception("Invalid Request.",1);
            }

            $postData['updatedDate'] = date('y-m-d h:m:s');
                $adminId = $adminTable->update($postData,$adminId);
         }
         
         else
         {
            $postData['createdDate'] = date('y-m-d h:m:s');
               $adminInsertedId = $adminTable->insert($postData);
         }
         $this->redirect('index.php?c=admin&a=grid');
      } 
      
      catch (Exception $e) 
      {
         $this->redirect('index.php?c=admin&a=grid');
      }
   }
}

 ?>

