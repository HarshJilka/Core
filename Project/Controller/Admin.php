<?php Ccc::loadClass('Controller_Core_Action');
		Ccc::loadClass('Model_Admin');
		Ccc::loadClass('Model_Core_Request');


 ?>
<?php $c = new Ccc();

class Controller_Admin extends Controller_Core_Action
{
	public function gridAction()
	{	
		$adapter = new Model_Core_Adapter();
		$admins = $adapter->fetchAll("SELECT * FROM admin");
		// print_r($categories);
		// exit();
		$view = $this->getView();
		$view->setTemplate('view/admin/grid.php');
		$view->addData('admins',$admins);	
		$view->toHtml();
	}

	public function addAction()
	{
		$view = $this->getView();
		$view->setTemplate('view/admin/add.php');
		$view->toHtml();
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

	public function deleteAction()
	{
		try
		{
			global $c;
			$request = $c->getFront()->getRequest();

			if(!$request->getRequest('id'))
			{
				throw new Exception("Error Processing Request", 1);
			}
			$adminId = $request->getRequest('id');

			if(!(int)$adminId)
			{
				throw new Exception("Error Processing Request", 1);
			}

			$adapter =new Model_Core_Adapter();
			$result=$adapter->delete("DELETE FROM `admin` WHERE `admin`.`adminId` = '$adminId'");

			if(!$result)
			{
				throw new Exception("System Enable to Delete Record",1);
			}
			$this->redirect('index.php?c=admin&a=grid');

		}

		catch(Exception $e)
		{
			echo $e->getMessage();
			exit();
			$this->redirect('index.php?c=admin&a=grid');
		}
	}

	protected function saveadmin()
	{		
			//echo "<pre>";
			global $c;
			$post=$c->getFront()->getRequest();
			if(!$post->getPost('admin'))
			{
				throw new Exception("Request Invelid.",1);
			}

			$adapter=new Model_Core_Adapter();
			$row=$post->getPost('admin');
			//print_r($row);
			$firstName=$row['firstName'];
			$lastName=$row['lastName'];
			$email=$row['email'];
			$password=$row['password'];
			$status=$row['status'];
			$date=date('y-m-d h:m:s');
			

			if(array_key_exists('adminId',$row))
			{
				$adminId = $row['adminId'];
				if(!(int)$row['adminId'])
				{
					throw new Exception("Invalid Request.",1);
				}

				//pending
				
				$data = ['firstName'=>$firstName,'lastName'=>$lastName,'email'=>$email,'password'=>$password,'status'=>$status,'updateDate'=>$date ];

				$adminTable = new Model_Admin();
				$adminId = $adminTable->update($data,$adminId);
				
			}
			else
			{
				
				$data = ['firstName'=>$firstName,'lastName'=>$lastName,'email'=>$email,'password'=>$password,'status'=>$status,'createdDate'=>$date];
				$adminTable = new Model_Admin();
				$adminId=$adminTable->insert($data);

				return $adminId;
			}
		

	}
	public function saveAction()
	{
		try
		{
			$this->saveadmin();
			$this->redirect('index.php?c=admin&a=grid');
		} 
		
		catch (Exception $e) 
		{

			$this->redirect('index.php?c=admin&a=grid');
		}
	}


	public function errorAction()
	{
		echo "error";
	}
	public function redirect($url)
	{
		header("location:$url");
		exit();
	}


}


?>