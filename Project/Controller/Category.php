
<?php

class Controller_Category{

	public function gridAction()
	{
		require_once('view/category/grid.php'); 
	}

	public function saveAction()
	{
		try
		{
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{	
				if(!isset($_POST['category']))
				{
					throw new Exception("Request Invelid.",1);
				}

				$adapter = new Model_Core_Adapter();
				$name = $_POST['category']['name'];   
				$parentId = $_POST['category']['parentId'];   
				$status = $_POST['category']['pro_status'];   
				$date = date('y-m-d h:m:s');

				if ($_POST['submit'] =='Add')
				 {
				 	      
					$query= "INSERT INTO `category` (`name`, `status`, `created_date`,`parent_id`) VALUES ( '$name', '$status', '$date','$parentId')";
					$result = $adapter->insert($query);
					$this->redirect('index.php?c=category&a=grid');			
				 }
				else
				 {
					$id=$_GET['id']; 
					$query = "UPDATE category set name='$name', status='$status', updated_date='$date' where id = '$id'";
					$result = $adapter->update($query);
					$this->redirect('index.php?c=category&a=grid');	
				 }
			}

		}
		catch(Exception $e)
			{
				echo "catch";
				$this->redirect('index.php?c=category&a=grid');	
			}
	}

	public function editAction()
	{
		require_once('view/category/edit.php');
	}

	public function addAction()
	{
		require_once('view/category/add.php');
	}

	public function deleteAction()
	{
		try
		 {
			if ($_SERVER['REQUEST_METHOD'] == 'GET')
			{ 
				if(!isset($_GET['id']))
				{
					throw new Exception("Invelid Request", 1);	
				}	

				$id = $_GET['id'];
				$adapter = new Model_Core_Adapter();
				$result = $adapter->delete("DELETE FROM `category` WHERE `category`.`id` = $id");
				
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

			$this->redirect('index.php?c=category&a=grid');	
		 }
			catch(Exception $e) 
			{
				$this->redirect('index.php?c=category&a=grid');	
			}
			
		
	}

	public function errorAction()
	{
		
	}

	public function redirect($url)
	{
		header("Location: $url");
		exit();
	}
}
?>