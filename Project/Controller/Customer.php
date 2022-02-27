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
        $customer->email = 'john04@mail.com';
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
		$customerModel = Ccc::getModel('Customer');
		$request = $this->getRequest();
		$customerId = $request->getRequest('id');
		if($request->isPost()){
			if(!$request->getPost()){
				throw new Exception("Invalid Request", 1);	
			}
			$postData = $request->getPost('customer');
			$customerData = $customerModel->setData($postData);

			if(!empty($customerId)){
				$customerData->customer_id = $customerId;
				$customerData->updatedDate = date("Y-m-d h:i:s");					;
				$customer = $customerModel->save();
				
				if(!$customer){
					echo $e->getMessage();
				}
			}
			else{
				$customerData->createdDate = date("Y-m-d h:i:s");					;
				$customerId = $customerModel->save();

				if(!$customerId){
					echo $e->getMessage();
				}
				
			}
		}
		return $customerId;

	}

	protected function saveAddress($customerId)
	{
		$addressModel = Ccc::getModel('Customer_Address');
		$request = $this->getRequest();

		if($request->isPost()){
			$customerId = $customerId;
			$postData = $request->getpost('address');
			/*echo "<pre>";
			print_r($postData);
			exit;*/
			$postData['billingAddress'] = !empty($postData['billingAddress']) ? '1' : '2';
			$postData['shippingAddress'] = !empty($postData['shippingAddress']) ? '1' : '2';
			$addressData = $addressModel->setData($postData);
			$address = $addressModel->fetchRow("SELECT * FROM `customer_address` WHERE `customer_id` = '$customerId'");
			if($address)
			{
				$addressData->customer_id = $customerId;
				$result = $addressModel->save();
				if(!$result)
				{
					throw new Exception("System is unable to save data.", 1);	
				}
			}
			else
			{
				$addressData->customer_id = $customerId;
				$result = $addressModel->save('addressId');
				if(!$result)
				{
					throw new Exception("System is unable to save data.", 1);	
				}

			}
			return $result;
		}
	}
	
	public function saveAction()
	{
		try {
				$request = $this->getRequest();
				$customerId = $this->saveCustomer();
				if(!$customerId){
					throw new Exception("System is unabel to insert your data", 1);
				}
				if(!empty($request->getPost('address')['address']))
				{
					$result = $this->saveAddress($customerId);
					if(!$result)
					{
						throw new Exception("System is unabel to insert your data", 1);
					}
				}
				$this->redirect($this->getView()->getUrl('grid','customer',[],true));
			} 
			catch (Exception $e) 
			{
				echo $e->getMessage();
			}
    }

	public function editAction()
	{
		$customerModel = Ccc::getModel("Customer");
		$addressModel = Ccc::getModel("Customer_Address");
		$request = $this->getRequest();
		$customerId = $request->getRequest('id');
		if(!$customerId){
			throw new Exception("Id is not valid", 1);
		}
		if(!(int)$customerId){
			throw new Exception("Invalid request", 1);
		}
		$customer = $customerModel->load($customerId);
		$address = $addressModel->load($customerId);
		if(!$customer){
			throw new Exception("System is unable to fine recored", 1);
		}
		Ccc::getBlock("Customer_Edit")->addData('customer',$customer)->addData('address',$address)->toHtml();
	}

	public function addAction()
	{
		$customerModel = Ccc::getModel("Customer");
		$customer = $customerModel;
		$address = $customerModel;
		//echo "<pre>";
		Ccc::getBlock("Customer_Edit")->addData('customer',$customer)->addData('address',$address)->toHtml();
		/*exit();*/

	}

	public function deleteAction()
	{
		$deleteModel = Ccc::getModel('Customer');
		$request = $this->getRequest();
		if(!$request->isPost()){
			try {
				if(!$request->getRequest('id')){
					throw new Exception("System is unable to delete your data",1);
				}
				$customerId=$request->getRequest('id');
				$result = $deleteModel->load($customerId)->delete();
				if(!$result){
					throw new Exception("System is unable to delete data.", 1);	
				}
				$this->redirect($this->getView()->getUrl('grid','customer',[],true));

			} catch (Exception $e) {
				echo $e->getMessage();
			}	
		}
	}
}


?>