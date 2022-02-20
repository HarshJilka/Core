<?php
Ccc::loadClass('Controller_Core_Action');


class Controller_Customer extends Controller_Core_Action
{
	public function gridAction()
	{
		Ccc::getBlock('Customer_Grid')->toHtml();
	}

	protected function saveCustomer()
	{
		$customerModel = Ccc::getModel('Customer');
		$request = $this->getRequest();

		if(!$request->getPost('customer'))
		{
			throw new Exception("Invalid Request", 1);
		
		}	

		$postData = $request->getPost('customer');
		
		if(!$postData)
		{
			throw new Exception("Invalid data.", 1);	
		}

		/*print_r($postData);
		exit();*/

		if (array_key_exists('customer_id',$postData))
		{
			if(!(int)$postData['customer_id'])
			{
				throw new Exception("Invalid Request.", 1);
			}

			$customer_id = $postData['customer_id'];
			$postData['updatedDate']  = date('y-m-d h:m:s');
		
			$update = $customerModel->update($postData,$customer_id);
			return $postData['customer_id'];
		}
		else
		{
			$postData['createdDate'] = date('y-m-d h:m:s');
			$insert = $customerModel->insert($postData);

			if($insert==null)
			{
				throw new Exception("Unable to Insert Data.", 1);
			}
			return $insert;
		}

	}

	protected function saveAddress($customer_id)
	{
		/*echo "123";
		exit();*/
		$addressModel = Ccc::getModel('Customer_Address');
		$request = $this->getRequest();


		if(!$request->getPost('address'))
		{
			throw new Exception("Invalid Request", 1);
		}	

		$postData = $request->getPost('address');

		if(!$postData)
		{
			throw new Exception("Invalid data.", 1);	
		}

		if (array_key_exists('customer_id',$postData))
		{

			
			$update = $addressModel->update($postData,$postData['customer_id']);

			if(!$update)
			{
				throw new Exception("Unable to update record.", 1);
			}
		}

		else
		{

			$postData['customer_id'] = $customer_id;

			$insert = $addressModel->insert($postData);

			if(!$insert)
			{
				throw new Exception("System is unable to Insert.", 1);
			}
		}
	}
	
	public function saveAction()
	{
		try
		{
			$customer_id=$this->saveCustomer();
			$request = $this->getRequest();

			
			if(!$request->getPost('address'))
			{
				$this->redirect($this->getView()->getUrl('customer','grid',[],true));
			}

			$this->saveAddress($customer_id);

			$this->redirect($this->getView()->getUrl('customer','grid',[],true));
		}
		catch (Exception $e) 
		{
			$this->redirect($this->getView()->getUrl('customer','grid',[],true));
		}
    }

	public function editAction()
	{

		$customerModel = Ccc::getModel('Customer');
		$request = $this->getRequest();

		$id = (int)$request->getRequest('id');

		if(!$id)
		{
			throw new Exception("Invalid Request", 1);
		}

		$customer = $customerModel->fetchRow("SELECT * FROM customer WHERE customer_id = {$id}");
		/*print_r($customer);
		exit();*/
		if(!$customer)
		{
			throw new Exception("Not Found", 1);
			
		}

		$addressModel = Ccc::getModel('Customer_Address');
		$address = $addressModel->fetchRow("SELECT * FROM address WHERE customer_id = {$id}");
		if(!$address)
		{
			throw new Exception("Not Found", 1);
			
		}
		Ccc::getBlock('Customer_Edit')->addData('customer',$customer)->addData('address',$address)->toHtml();
	}

	public function addAction()
	{
		Ccc::getBlock('Customer_Add')->toHtml();
	}

	public function deleteAction()
	{
		try 
		{
			$customerModel = Ccc::getModel('Customer');
			$request = $this->getRequest();
			if(!$request->getRequest('id'))
			{
				throw new Exception("Invalid Request.", 1);
			}

			$customer_id = $request->getRequest('id');
			if(!$customer_id)
			{
				throw new Exception("Not Fount Id.", 1);
				
			}
			
			$result = $customerModel->delete($customer_id);
			if(!$result)
			{
				throw new Exception("Unable delete record.", 1);
				
			}

			$this->redirect($this->getView()->getUrl('customer','grid',[],true));
		} 

			catch (Exception $e) 
			{
				$this->redirect($this->getView()->getUrl('customer','grid',[],true));
			}		



		/*try
		{
		    if($_SERVER['REQUEST_METHOD']=='GET')
		    {
		    	if(!isset($_GET['id']))
				{
					throw new Exception("Invelid Request", 1);	
				}	
				$id=$_GET['id'];
				$adapter =new Model_Core_Adapter();
				$result=$adapter->delete("DELETE FROM `customer` WHERE `customer`.`customer_id` = '$id'");
				
				if(!$result)
				{
					throw new Exception("System Enable to Delete Record",1);
				}

				$address=$adapter->delete("DELETE FROM `address` WHERE `address`.`customer_id` = '$id'");
				if(!$adapter)
					{
						throw new Exception("System Enable to Delete Record",1);
					}
		    }
			//echo "query done";
			$this->redirect('index.php?c=customer&a=grid');

		}
		catch(Exception $e)
		{
			echo "catch";
			$this->redirect('index.php?c=customer&a=grid');
		}	*/
		
	}
}


?>