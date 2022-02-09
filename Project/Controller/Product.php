<?php

class Controller_Product
{

	public function gridAction()
	{
		require_once('view/product/grid.php');
	}

	public function saveAction()
	{
			
		try 
		{
			if($_SERVER['REQUEST_METHOD']=='POST')
			{
			if(!isset($_POST['product']))
				{
					throw new Exception("Request Invelid.",1);
				}
				$adapter = new Model_Core_Adapter();
			    $name=$_POST['product']["name"];
				$price=$_POST['product']["price"];
				$quantity=$_POST['product']["quantity"];
				$status=$_POST['product']["pro_status"];
				$date=date('y-m-d h:m:s');


			if($_POST["submit"]=="save")
			{
				
				$result=$adapter->insert("INSERT INTO `products` (`name`, `price`, `quantity`, `pro_status`, `created_date`) VALUES ('$name', '$price', '$quantity', '$status', '$date')");
				if($result)
				{
					$this->redirect('index.php?c=product&a=grid');	
				}

			}
			if($_POST["Update"]=="update")
			 {
				
				$id=$_POST["id"];
			
				$result=$adapter->update("UPDATE `products` SET `name` = '$name', `price` = '$price', `quantity` = '$quantity', `pro_status` = '$status',`updated_date`='$date' WHERE `products`.`product_id` = $id");
				if($result)
				{
					$this->redirect('index.php?c=product&a=grid');	
				}

			  }
	   		}
		} 
		catch (Exception $e)
		{
			echo "catch";
			$this->redirect('index.php?c=product&a=grid');
		}
	}
	

	public function editAction()
	{
		require_once('view/product/edit.php');
	}

	public function addAction()
	{
		require_once('view/product/add.php');
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
				$adapter = new Model_Core_Adapter();
				$result=$adapter->delete("DELETE FROM `products` WHERE `products`.`product_id` = '$id'");

				if($result)
				{
					throw new Exception("System Enable to Delete Record",1);

				}
				$this->redirect('index.php?c=product&a=grid');	
			} 
		}

		catch (Exception $e) 
		{
			$this->redirect('index.php?c=product&a=grid');
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