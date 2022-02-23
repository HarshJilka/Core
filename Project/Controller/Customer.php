<?php
Ccc::loadClass('Controller_Core_Action');
Ccc::loadClass('Model_Core_Request');


class Controller_Customer extends Controller_Core_Action
{	
	public function gridAction()
    {	
    	/*echo "<pre>";
        $customerModel = Ccc::getModel('Customer');
        $customer = $customerModel->getRow(); 
        print_r($customer); 
        $customerData = $customer->customer_id = '51';     
        $customer->email = 'Yash04@mail.com';
        $customer->firstName = 'Harsh';
        $customer->lastName = 'Jilka';
        $customer->mobile = '564989856';
        $customer->createdDate = '20-02-2022';
        $customer->save($customer,$customerData);
        print_r($customer);*/
        //$customer = $customerModel->load(4);
        //$customer->firstName = 'qwe2MAIL';
        Ccc::getBlock("Customer_Grid")->toHtml();
    }


	protected function saveCustomer()
	{
		$customerModel = Ccc::getModel('Customer'); //model_customer
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

		$customer = $customerModel->getRow();
		$customer->firstName = $postData['firstName'];
		$customer->lastName = $postData['lastName'];
		$customer->email = $postData['email'];
		$customer->status = $postData['status'];
		$customer->mobile = $postData['mobile'];

		if (array_key_exists('customer_id',$postData))
		{
			if(!(int)$postData['customer_id']) 
			{
				throw new Exception("Invalid Request.", 1);
			}

			$customer->customer_id = $postData['customer_id'];
			$customer->updatedDate = date('y-m-d h:m:s');
			$update = $customer->save($customer->customer_id,$customer);
			return $postData['customer_id'];


			/*$customer_id = $postData['customer_id'];
			$postData['updatedDate']  = date('y-m-d h:m:s');
			$update = $customerModel->update($postData,$customer_id); //table->update()
			return $postData['customer_id'];*/
		}
		else
		{

			$customer->createdDate = date('y-m-d h:m:s'); 
			$insert = $customer->save(); // table->insert()

			if($insert==null)
			{
				throw new Exception("Unable to Insert Data.", 1);
			}
			return $insert; 
		}

	}

	protected function saveAddress($customer_id)
	{
		/*echo $customer_id;
		exit();*/
		$addressModel = Ccc::getModel('Customer_Address');
		$request = $this->getRequest();


		if(!$request->getPost('address'))
		{
			throw new Exception("Invalid Request", 1);
		}	

		$postData = $request->getPost('address');
		/*print_r($postData);
		exit();*/

		if(!$postData)
		{
			throw new Exception("Invalid data.", 1);	
		}

		$address = $addressModel->getRow();
		$address->customer_id = $customer_id;
		$address->address = $postData['address'];
		$address->postalCode = $postData['postalCode'];
		$address->city = $postData['city'];
		$address->state = $postData['state'];
		$address->country = $postData['country'];


		if(!array_key_exists('billingAddress',$postData))
		{
			$address->billingAddress = 0;
		}
		else
		{
			$address->billingAddress = $postData['billingAddress'];
		}

		if(!array_key_exists('shippingAddress',$postData))
		{
			$address->shippingAddress = 0;	
		}
		else
		{
			$address->shippingAddress = $postData['shippingAddress'];
		}

		/*print_r($postData);
		exit();
*/
		if ($postData['addressId'] != 0)
		{
			/*print_r('111');
			exit();*/
			$address->customer_id = $postData['customer_id'];
			$address->addressId = $postData['addressId'];
			$update = $address->save();
			if(!$update)
			{
				throw new Exception("Unable to update record.", 1);
			}
		}

		else
		{
			unset($address->addressId);
			/*echo "<pre>";
			print_r($address);
			exit();*/
			
			$insert = $address->save();

			if(!$insert)
			{
				throw new Exception("System is unable to Insert.", 1);
			}
			return $insert;
		}
	}
	
	public function saveAction()
	{
		try
		{
			$customer_id=$this->saveCustomer(); // 
			/*print_r($customer_id);
			exit();*/
			$request = $this->getRequest(); //obj req

			
			if(!$request->getPost('address')) // array in grid
			{
				$this->redirect($this->getView()->getUrl('customer','grid',[],true));
			}

			$this->saveAddress($customer_id); // save address 

			$this->redirect($this->getView()->getUrl('customer','grid',[],true)); 
		}
		catch (Exception $e) 
		{
			$this->redirect($this->getView()->getUrl('customer','grid',[],true));
		}
    }

	public function editAction()
	{

		$customerModel = Ccc::getModel('Customer'); // obj model
		$request = $this->getRequest(); // obj req

		$id = (int)$request->getRequest('id'); //req

		if(!$id)
		{
			throw new Exception("Invalid Request", 1);
		}

		$customer = $customerModel->fetchRow("SELECT * FROM customer WHERE customer_id = {$id}"); //table
		/*print_r($customer);
		exit();*/

		if(!$customer)
		{
			$address = null;
			throw new Exception("Not Found", 1);
			
		}

		$addressModel = Ccc::getModel('Customer_Address'); 
		$address = $addressModel->fetchRow("SELECT * FROM address WHERE customer_id = {$id}"); //address

		if(!$address)
		{
			
			$address = ['address' => null,'addressId' => 0,
						 'postalCode' => null,'city' => null, 'state' => null, 'country' => null, 'billingAddress' => 0, 'shippingAddress'=>0, 'customer_id' => $customer['customer_id']];

			
		}
		Ccc::getBlock('Customer_Edit')->addData('customer',$customer)->addData('address',$address)->toHtml();
		//index->model_core_view->adddate()->customer,address->
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

			if(!$request->getRequest('id')) // view grid
			{
				throw new Exception("Invalid Request.", 1);
			}

			$customer_id = $request->getRequest('id');
			if(!$customer_id)
			{
				throw new Exception("Not Fount Id.", 1);
				
			}
			
			$result = $customerModel->delete($customer_id); //table<->delete()<->adapter
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
	}
}


?>