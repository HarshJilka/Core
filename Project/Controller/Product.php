<?php
Ccc::loadClass('Controller_Core_Action');
/*Ccc::loadClass('Model_Core_Request');*/

class Controller_Product extends Controller_Core_Action
{
	public function gridAction()
	{
	  Ccc::getBlock('Product_Grid')->toHtml();

	}

	public function saveAction()
	{	
		try
		{
			$request = $this->getRequest();

			if(!$request->isPost())
			{
				throw new Exception("Request Invalid.",1);
			}

			$postData = $request->getPost('product');

			if(!$postData)
            {
                throw new Exception("Invalid data.", 1);
        	}   
          
        	$productTable = Ccc::getModel('Product');
			
			if(array_key_exists('product_id',$postData))
			{
				$productId = $postData['product_id'];

				if(!(int)$postData)
				{
					throw new Exception("Invalid Request.",1);
				}

				$postData['updated_date'] = date('y-m-d h:m:s');
                $productId = $productTable->update($postData,$productId);
			}
			
			else
			{
				$postData['created_date'] = date('y-m-d h:m:s');
	            $productInsertedId = $productTable->insert($postData);
			}
			$this->redirect('index.php?c=product&a=grid');
		} 
		
		catch (Exception $e) 
		{
			$this->redirect('index.php?c=product&a=grid');
		}


		/*try 
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
		}*/
	}
	

	public function editAction() //done
	{
		try
	 	{	
	        $productId = (int) $this->getRequest()->getRequest('id');

	        if(!$productId)
			{
				throw new Exception("Id is not valid.");
			}

	        if(!(int)$productId)
	        {
	            throw new Exception("Invalid Request.", 1);
	        }

			$productModel = Ccc::getModel('Product');
	        $productTable = new Model_Product();
	        $product = $productTable->fetchRow($productId);

			Ccc::getBlock('Product_Edit')->addData('product',$product)->toHtml();	


			/*$view->setTemplate('view/product/edit.php');
			$view->addData('product',$product);	//
			$view->toHtml();*/
		}

		catch(Exception $e)
		{
			echo $e->getMessage();
			exit();
		}

		/*$id=$_GET['id'];
		$adapter =  new Model_Core_Adapter();
		$products = $adapter->fetchRow("select * FROM `products` WHERE `products`.`product_id` = '$id'");*/

		
	}

	public function addAction() //done
	{
		Ccc::getBlock('Product_Add')->toHtml();

		/*$view = $this->getView();
		$view->setTemplate('view/product/add.php');
		$view->toHtml();*/
	}

	public function deleteAction() //done
	{
		try
		{
			$request = $this->getRequest();

			if(!$request->getRequest('id'))
			{
				throw new Exception("Error Processing Request", 1);
			}

			$productId = $request->getRequest('id');

			if(!(int)$productId)
			{
				throw new Exception("Error Processing Request", 1);
			}

			$productTable = Ccc::getModel('product');
            $productTable->delete($productId);
            $this->redirect('index.php?c=product&a=grid');
		}

		catch(Exception $e)
		{
			echo $e->getMessage();
			exit();
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
		}*/

	}
}

?>