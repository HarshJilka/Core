<?php 

	include "Adapter.php";
	
	$id = $_GET['id'];
	$adapter =  new Adapter();
	$result = $adapter->fetchRow("select * from category where id='$id'");


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Category</title>
</head>
<body>
	<form action="Category_save.php?id=<?php echo $_GET['id']?>" method="post" >

		CategoryName : <input type="text" name="name" id="name" value="<?php echo $result['name']?>"><br>

		Status : <select name="status" >

			<?php if($result['status']== 'active' ) {?>

					<option value="active" selected>Active</option>
					<option value="inactive" >Inactive</option>
					

			<?php } else { ?>
					<option value="active">Active</option>
					<option value="inactive" selected >Inactive</option>
					<?php } ?>

				</select>
				<br>
		<input type="submit" name="submit" value="Edit"><br>

	</form>

</body>
</html>