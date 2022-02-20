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
			$this->redirect($this->getView()->getUrl('product','grid'));
		} 
		
		catch (Exception $e) 
		{
			$this->redirect($this->getView()->getUrl('product','grid'));
		}
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
	        $product = $productTable->fetchRow("SELECT * FROM products where product_id = $productId");

			Ccc::getBlock('Product_Edit')->addData('product',$product)->toHtml();	
		}

		catch(Exception $e)
		{
			echo $e->getMessage();
			exit();
			$this->redirect($this->getView()->getUrl('product','grid'));
		}
		
	}

	public function addAction() //done
	{
		Ccc::getBlock('Product_Add')->toHtml();

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
            $this->redirect($this->getView()->getUrl('product','grid'));
		}

		catch(Exception $e)
		{
			$this->redirect($this->getView()->getUrl('product','grid'));
			echo $e->getMessage();
			exit();
		}


		catch (Exception $e) 
		{
			$this->redirect($this->getView()->getUrl('product','grid'));
		}

	}
}

?>