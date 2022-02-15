
<?php
Ccc::loadClass('Controller_Core_Action');

class Controller_Customer extends Controller_Core_Action
{
	public function gridAction()
	{
		try {
	
			$object=new Model_Core_Adapter();

			$result=$object->fetchAll("SELECT c.`customer_id`, c.`firstName`, c.`lastName`, c.`email`, c.`mobile`, c.`status`, a.`addressId`, a.`address`, a.`postalCode`, a.`city`, a.`state`, a.`country`, a.`billingAddress`, a.`shippingAddress`from customer c LEFT JOIN address a ON c.customer_id = a.customer_id ORDER BY c.customer_id ASC");

			$view = $this->getView();
			$view->setTemplate('view/customer/grid.php');
			$view->addData('customer',$result);	
			$view->toHtml();
			} 
		catch (Exception $e)
		 {
				echo $e->getMessage();
				exit();
				$this->redirect('index.php?c=customer&a=grid');
		 }

		// print_r($categories);
		// exit();
		
	}

	protected function saveCustomer()
	{
		try {	
			if(!isset($_POST['customer']))
				{
					throw new Exception("Request Invelid.",1);
				}

			
				$adapter=new Model_Core_Adapter();

				$firstName=$_POST['customer']['firstName'];

				$lastName=$_POST['customer']['lastName'];
				$email=$_POST['customer']['email'];
				$mobile=$_POST['customer']['mobile'];
				$status=$_POST['customer']['status'];

				$address = $_POST['address']['address'];
				$postalCode = $_POST['address']['postalCode'];
				$city = $_POST['address']['city'];
				$state = $_POST['address']['state'];
				$country = $_POST['address']['country'];
			
				$date=date('y-m-d h:m:s');

				if (isset($_GET['id']))
				 {
					if(!(int)$_GET['id'])
					{
						throw new Exception("invalid request", 1);
						
					}
					$customerId = $_GET['id'];
					$customer=$adapter->update("UPDATE `customer` SET `firstName` = '$firstName', `lastName` = '$lastName', `email` = '$email', `mobile` = '$mobile', `status` = '$status', `updatedDate` = '$date' WHERE `customer`.`customer_id` = $customerId");
					
					if (!$customer)
					 {
						throw new Exception("Enable to update record", 1);	
					 }
				} 

				else
				{
					 $customer=$adapter->insert("INSERT INTO `customer` ( `firstName`, `lastName`, `email`, `mobile`, `status`,`createdDate`) VALUES ( '$firstName', '$lastName', '$email', '$mobile', '$status', '$date')");
					 if (!$customer)
						 {
							throw new Exception("Enable to update record", 1);
							
						}
					 return $customer;	
				}
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
				exit();
				$this->redirect('index.php?c=customer&a=grid');
			}

	}

	protected function saveAddress($customerID)
	{
		try {	
			if(!isset($_POST['address']))
				{
					throw new Exception("Request Invelid.",1);
				}
				$rowAddress = $_POST['address'];	
				$adapter=new Model_Core_Adapter();
				$address = $_POST['address']['address'];
				$postalCode = $_POST['address']['postalCode'];
				$city = $_POST['address']['city'];
				$state = $_POST['address']['state'];
				$country = $_POST['address']['country'];
				$date=date('y-m-d h:m:s');

				$billingAddress = 0;

				if (array_key_exists('billingAddress', $rowAddress) && $rowAddress['billingAddress'] == 1) 
				{
					$billingAddress = 1;
				}

				$shippingAddress = 0;

				if (array_key_exists('shippingAddress', $rowAddress) && $rowAddress['shippingAddress'] == 1) 
				{
					$shippingAddress = 1;
				}	

				if (isset($_GET['id']))
				 {
					if(!(int)$_GET['id'])
					{
						throw new Exception("invalid request", 1);
						
					}

					$customerID = $_GET['id'];
					$updateAddress=$adapter->update("UPDATE `address` SET `address`='$address',`postalCode`='$postalCode',`city`='$city',`state`='$state',`country`='$country',`billingAddress`='$billingAddress',`shippingAddress`='$shippingAddress',`updatedDate`='$date' WHERE `customer_Id` = '$customerID'");

					if (!$updateAddress)
					 {
						throw new Exception("Enable to update record", 1);	
					 }
				} 

				else
				{
					 $addressInsert = $adapter->insert("INSERT INTO `address`(`customer_id`, `address`, `postalCode`, `city`, `state`, `country`, `billingAddress`, `shippingAddress`, `createdDate`) VALUES ('{$customerID}','{$address}','{$postalCode}','{$city}','{$state}','{$country}','{$billingAddress}','{$shippingAddress}','{$date}')");

					 if (!$addressInsert)
						 {
							throw new Exception("Enable to update record", 1);
							
						}	
				}
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
				exit();

				$this->redirect('index.php?c=customer&a=grid');
			}		
	}
	
	public function saveAction()
	{
		try {
				$customerId = $this->saveCustomer();
				$this->saveAddress($customerId);	
				$this->redirect('index.php?c=customer&a=grid');
		}

		 catch (Exception $e) 
		{
			$this->redirect('index.php?c=customer&a=grid');
		}

		
    }

	public function editAction()
	{
		try
		{
			if(!isset($_GET['id']))
				{
					 throw new Exception("Request Invelid.",1);	
				}	
				if(!(int)$_GET['id'])
				{
					throw new Exception("invalid request", 1);						
				}
				
			
			$id=$_GET['id'];
			$adapter=new Model_Core_Adapter();
			$result=$adapter->fetchRow("SELECT c.`customer_id`, c.`firstName`, c.`lastName`, c.`email`, c.`mobile`, c.`status`, a.`addressId`, a.`address`, a.`postalCode`, a.`city`, a.`state`, a.`country`, a.`billingAddress`,a.`shippingAddress` FROM `customer` c LEFT JOIN `address` a ON c.customer_id = a.customer_id WHERE c.customer_id = '$id' ORDER BY c.customer_id ASC");
			$view = $this->getView();
			$view->setTemplate('view/customer/edit.php');
			$view->addData('customer',$result);	
			$view->toHtml();
	     } 
		catch (Exception $e)
		 {
				echo $e->getMessage();
				exit();
				$this->redirect('index.php?c=customer&a=grid');
		 }

	}

	public function addAction()
	{
		require_once('view/customer/add.php');
	}

	public function deleteAction()
	{
		try
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
		}


		
		
	}
	public function redirect($url)
	{
		header("Location: $url");
		exit();
	}

	public function errorAction()
	{
		
	}
}


?>