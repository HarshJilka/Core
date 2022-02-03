<?php 

include "Adapter.php";

$object = new Adapter();
$result = $object->fetchAll("select * from category");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Category</title>
	<style>
		body,td{
			text-align: center;
		}
		table{
			border-color: skyblue;
		}
		#Added{
			width: 250px;
			border-width: 10px;
			border-color: skyblue;
			border-radius: 10px;
		}
	</style>
</head>
<body>
	<table border="5px" width="100%">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Status</th>
			<th>Created_date</th>
			<th>Updated_date</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php for ($i=0; $i < count($result); $i++) 
		{ 
			
	    ?>
	    <tr>
			<td><?php echo $i+1 ?></td>
			<td><?php echo $result[$i]['name'] ?></td>
			<td><?php echo $result[$i]['status'] ?></td>
			<td><?php echo $result[$i]['created_date'] ?></td>
			<td><?php echo $result[$i]['updated_date'] ?></td>
			<td><a href = "category_edit.php?id=<?php echo $result[$i]['id'] ?>">Edit</a></td>
			<td><a href = "category_delete.php?id=<?php echo $result[$i]['id'] ?>">delete</a></td>
		</tr>
	<?php }  ?>
	</table><br>
	<button id="Added"><a href="category_add.php">ADD</a></button>
</body>
</html>