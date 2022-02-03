<?php 

include "Adapter.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if ($_POST['submit'] =='Add')
	 {
		$adapter = new Adapter();

		$name = $_POST['name'];   
		$status = $_POST['status'];   
		$date = date('y-m-d h:m:s');      

		$query= "INSERT INTO `category` (`name`, `status`, `created_date`) VALUES ( '$name', '$status', '$date')";
		$result = $adapter->insert($query);
		
		header("Location: category_grid.php");
	}
	else
	{
		$adapter = new Adapter();

		$id=$_GET['id']; 

		$name = $_POST['name'];   
		$status = $_POST['status'];   
		$date = date('y-m-d h:m:s');
		$query = "UPDATE category set name='$name', status='$status', updated_date='$date' where id = '$id'";
		$result = $adapter->update($query);
		header("Location: category_grid.php");
	}
}

 ?>