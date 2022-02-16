<?php Ccc::loadClass('Controller_Core_Action');
		Ccc::loadClass('Model_Admin');
		Ccc::loadClass('Model_Core_Request');


 ?>
<?php $c = new Ccc();

class Controller_Admin extends Controller_Core_Action{

	



	public function gridAction()
	{
		
		$adminTable = new Model_Admin();
		$admins=$adminTable->fetchAll();
		
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
		try
		{
			global $c;
			$request=$c->getFront()->getRequest();
			$id=$request->getRequest('id');

			if(!$id)
			{

				throw new Exception("Invelid Request", 1);
				
			}
			$adminTable = new Model_Admin();
			$admin=$adminTable->fetchRow($id);

		}
		catch(Exception $e)
		{
			throw new Exception("Invelid Request", 1);
		}
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
			$request=$c->getFront()->getRequest();
			if(!$request->getRequest('id'))
			{
				throw new Exception("Invelid Request", 1);
				
			}
			$id=$request->getRequest('id');
			$adminTable = new Model_Admin();
			$admin_id=$adminTable->delete($id);
			$this->redirect('index.php?c=admin&a=grid');

		}
		catch(Exception $e)
		{
			echo "catch";
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

			$adapter=new Adapter();
			$row=$post->getPost('admin');
			//print_r($row);
			$firstName=$row['firstName'];
			$lastName=$row['lastName'];
			$email=$row['email'];
			$password=$row['password'];
			$status=$row['status'];
			$date=date('y-m-d h:m:s');
			

			if(array_key_exists('admin_id',$row))
			{
				$admin_id=$row['admin_id'];
				if(!(int)$row['admin_id'])
				{
					throw new Exception("Invelid Request.",1);
				}
				$data = ['firstName'=>$firstName,'lastName'=>$lastName,'email'=>$email,'password'=>$password,'status'=>$status,'updated_date'=>$date ];
				$adminTable = new Model_Admin();
				$admin_id=$adminTable->update($data,$admin_id);
				
			}
			else
			{
				
				$data = ['firstName'=>$firstName,'lastName'=>$lastName,'email'=>$email,'password'=>$password,'status'=>$status,'created_date'=>$date];


				$adminTable = new Model_Admin();
				$admin_id=$adminTable->insert($data);

				return $admin_id;
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