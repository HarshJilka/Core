<?php   Ccc::loadClass('Controller_Core_Action');
		Ccc::loadClass('Model_Core_Request');

class Controller_Admin extends Controller_Core_Action
{

	public function gridAction()
	{	
	    Ccc::getBlock('Admin_Grid')->toHtml();
	   


	}

	public function addAction()
	{
		Ccc::getBlock('Admin_Add')->toHtml();
		
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
	        $admin = $adminTable->fetchRow("SELECT * FROM admin where adminId = $adminId");

	        Ccc::getBlock('Admin_Edit')->addData('admin',$admin)->toHtml();
			
			}

		catch(Exception $e)
		{
			echo $e->getMessage();
			exit();
			$this->redirect($this->getView()->getUrl('admin','grid'));
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
            $this->redirect($this->getView()->getUrl('admin','grid'));
		}

		catch(Exception $e)
		{
			echo $e->getMessage();
			exit();
			 $this->redirect($this->getView()->getUrl('admin','grid'));
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
			$this->redirect($this->getView()->getUrl('admin','grid'));
		} 
		
		catch (Exception $e) 
		{
		  $this->redirect($this->getView()->getUrl('admin','grid'));
		}
	}

}


?>