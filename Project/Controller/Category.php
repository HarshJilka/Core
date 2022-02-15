<?php Ccc::loadClass('Controller_Core_Action'); ?>
<?php

class Controller_Category extends Controller_Core_Action{

	public function gridAction()	
	{
		//echo "111";
		$adapter = new Model_Core_Adapter();
		$categories = $adapter->fetchAll("SELECT * FROM category ORDER BY path ASC");
		// print_r($categories);
		// exit();
		$view = $this->getView();
		$view->setTemplate('view/category/grid.php');
		$view->addData('categories',$categories);	
		$view->toHtml();
	    //print_r($view);
		//exit;
	}

	public function saveAction()
	{
		try
		{
			if(!isset($_POST['category']))
			{
				throw new Exception("Request Invelid", 1);
				
			}
			$adapter=new Model_Core_Adapter();
			$row=$_POST['category'];
			$name=$_POST['category']['name'];
			$status=$_POST['category']['status'];
			$date=date('y-m-d h:m:s');
			$p_category_id=$_POST['category']['p_category_id'];

			//print_r($row);
			
			if(array_key_exists('category_id',$row))
			{
				$category_id=$_POST['category']['category_id'];
				//print_r($row);
				//exit();
				if(!(int)$row['category_id'])
				{
					throw new Exception("Invelid Request", 1);
					
				}

				$updateQuery="UPDATE `category` SET `name` = '$name', `status` = '$status', `updated_date` = '$date' WHERE `category`.`category_id` = $category_id ";
				//exit();
				$update=$adapter->update($updateQuery);
				if(!$update)
				{
					throw new Exception("System unable to update", 1);
					
				}
			}
			else
			{
				$add = new Model_Core_Adapter();
				if(empty($p_category_id))
				{
					
					$insertQuery="INSERT INTO `category` ( `name`, `status`, `created_date`) VALUES ( '$name','$status', '$date')";	
					$insert=$adapter->insert($insertQuery);
					if(!$insert)
					{
						throw new Exception("System unable to insert", 1);
					}
					$path=$adapter->update("UPDATE `category` SET `path` = '$insert' WHERE `category_id` = '$insert'");
				}
				else
				{

					$insertQuery="INSERT INTO `category` ( `name`, `status`, `created_date`,`p_category_id`) VALUES ( '$name' , '$status', '$date' , '$p_category_id')";
					$insert=$adapter->insert($insertQuery);
					if(!$insert)
					{
						throw new Exception("System unable to insert", 1);
					}
					$path = $adapter->fetchRow("SELECT * FROM `category` WHERE `category_id` = '$p_category_id' ");
					//print_r($path);
					//print_r($insert);
					

					$parentPath = $path['path']."/".$insert;
					//print_r($parentPath);
					//exit();

					$newPath = $adapter->update(" UPDATE `category` SET `path` = '$parentPath' WHERE `category_id` = '$insert' ");

				}
				if(!$insert){
					throw new Exception("Sysetm is unable to save your data", 1);	
				}
				$this->redirect("index.php?c=category&a=grid");
				
			}
			$this->redirect('index.php?c=category&a=grid');

		}
		catch(Exception $e)
		{
			$this->redirect('index.php?c=category&a=grid');
		}
		echo "";
	}

	public function editAction()
	{
		require_once('view/category/edit.php');
	}

	public function addAction()
	{
		$adapter = new Model_Core_Adapter();
		$categories = $adapter->fetchAll("SELECT * FROM category ORDER BY path ASC");

		$view = $this->getView();
		$view->setTemplate('view/category/add.php');
		$view->addData('categories',$categories);	
		$view->toHtml();
	}

	public function deleteAction()
	{	
		try
		{
			if(!isset($_GET['id']))
			{
				throw new Exception("Invelid Request", 1);
			}

			$id=$_GET['id'];
			$adapter =new Model_Core_Adapter();
			$deleteQuery="DELETE FROM `category` WHERE `category`.`category_id` = '$id'";
			$delete=$adapter->delete($deleteQuery);
			if(!$delete)
			{
				throw new Exception("Invelid Request", 1);
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
		echo "error";
	}
	public function redirect($url)
	{
		header("location:$url");
		exit();
	}

	 public function pathAction()
      {
      	$adapter = new Model_Core_Adapter();
        $categoryName=$adapter->fetchPair("SELECT `category_id`,`name` FROM `category`");
        $categoryPath=$adapter->fetchPair("SELECT `category_id`,`path` FROM `category`");

        // print_r($categoryName); 
        // print_r($categoryPath);  
        $categories=[];

        foreach($categoryPath as $key => $value)
             {
                $explodeArray=explode('/', $value);
                $tempArray = [];

                foreach ($explodeArray as $keys => $value)
                {
                    if(array_key_exists($value,$categoryName))
                    {
                        array_push($tempArray,$categoryName[$value]);
                    }
                }

                $implodeArray = implode('/', $tempArray);
                $categories[$key]= $implodeArray;
             }
        return $categories;
        }

}

?>