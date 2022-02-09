
<?php

class Controller_Customer{

	public function gridAction()
	{
		require_once('view/customer/grid.php');
	}

	public function saveAction()
	{
		try {	

			if($_SERVER['REQUEST_METHOD']=='POST')
			{
			
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
				$date=date('y-m-d h:m:s');

			
				if($_POST["submit"]=="save")
				{
					$customer=$adapter->insert("INSERT INTO `customer` ( `firstName`, `lastName`, `email`, `mobile`, `status`, `createdDate`) VALUES ( '$firstName', '$lastName', '$email', '$mobile', '$status', '$date')");
						if($customer)
						{
							$this->redirect('index.php?c=customer&a=grid');
						}

				}
				if($_POST["submit"]=="Update")
				{
					$id=$_GET['id'];
					$customer=$adapter->update("UPDATE `customer` SET `firstName` = '$firstName', `lastName` = '$lastName', `email` = '$email', `mobile` = '$mobile', `status` = '$status', `updatedDate` = '$date' WHERE `customer`.`customer_id` = $id");
						if($customer)
						{
							$this->redirect('index.php?c=customer&a=grid');
						}

				}
			}
					
		    }
			catch(Exception $e)
			{
				echo "catch";
				$this->redirect('index.php?c=customer&a=grid');
			}

    }

	public function editAction()
	{
		require_once('view/customer/edit.php');
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
				// $eddress=$adapter->delete("DELETE FROM `address` WHERE `address`.`customer_id` = '$id'");
				// if(!$adapter)
				// 	{
				// 		throw new Exception("System Enable to Delete Record",1);
				// 	}
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