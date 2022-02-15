
<?php
Ccc::loadClass('Controller_Core_Action');
class Controller_Admin extends Controller_Core_Action
{

	public function gridAction()
	{
		$adapter = new Model_Core_Adapter();
		$admin = $adapter->fetchAll("SELECT * FROM admin");
		// print_r($categories);
		// exit();
		$view = $this->getView();
		$view->setTemplate('view/admin/grid.php');
		$view->addData('admin',$admin);	
		$view->toHtml();
	}

	public function saveAction()
	{
		try {	

			if($_SERVER['REQUEST_METHOD']=='POST')
			{
			
				if(!isset($_POST['admin']))
				{
					throw new Exception("Request Invelid.",1);
				}

				$adapter=new Model_Core_Adapter();
				$firstName=$_POST['admin']['firstName'];
				$lastName=$_POST['admin']['lastName'];
				$email=$_POST['admin']['email'];
				$password=$_POST['admin']['password'];
				$status=$_POST['admin']['status'];
				$date=date('y-m-d h:m:s');

			
				if($_POST["submit"]=="save")
				{
					$admin=$adapter->insert("INSERT INTO `admin` ( `firstName`, `lastName`, `email`, `password`, `status`, `createdDate`) VALUES ( '$firstName', '$lastName', '$email', '$password', '$status', '$date')");
						if($admin)
						{
							$this->redirect('index.php?c=admin&a=grid');
						}

				}
				if($_POST["submit"]=="Update")
				{
					$id=$_GET['id'];
					$admin=$adapter->update("UPDATE `admin` SET `firstName` = '$firstName', `lastName` = '$lastName', `email` = '$email', `password` = '$password', `status` = '$status', `updatedDate` = '$date' WHERE `admin`.`adminId` = $id");
						if($admin)
						{
							$this->redirect('index.php?c=admin&a=grid');
						}

				}
			}
					
		    }
			catch(Exception $e)
			{
				echo "catch";
				$this->redirect('index.php?c=admin&a=grid');
			}

    }

	public function editAction()
	{
		$id=$_GET['id'];
		$adapter=new Model_Core_Adapter();
		$admin = $adapter->fetchRow("select * FROM `admin` WHERE `admin`.`adminId` = '$id'");
		$view = $this->getView();
		$view->setTemplate('view/admin/edit.php');
		$view->addData('admin',$admin);	
		$view->toHtml();
	}

	public function addAction()
	{
		require_once('view/admin/add.php');
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
				$result=$adapter->delete("DELETE FROM `admin` WHERE `admin`.`adminId` = '$id'");
				if(!$result)
				{
					throw new Exception("System Enable to Delete Record",1);
				}
				// $eddress=$adapter->delete("DELETE FROM `address` WHERE `address`.`admin_id` = '$id'");
				// if(!$adapter)
				// 	{
				// 		throw new Exception("System Enable to Delete Record",1);
				// 	}
		    }
			//echo "query done";
			$this->redirect('index.php?c=admin&a=grid');

		}
		catch(Exception $e)
		{
			echo "catch";
			$this->redirect('index.php?c=admin&a=grid');
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