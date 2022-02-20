<?php 

$result = $this->getAdmin();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN</title>
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
			border-radius: 5px;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<button id="Added"><a href="index.php?c=admin&a=add">ADD</a></button>
	<table border="5px" width="100%">
		<tr>
			<th>Admin Id</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Password</th>
			<th>Status</th>
			<th>Created Date</th>
			<th>Updated Date</th>
			<th colspan="2">Action</th>
		</tr>
		<?php if (!$result): ?>
    		  <tr><td colspan="8">No Record Found!</td></tr>
    	<?php else: ?>
    	 	  <?php foreach ($result as $admin) { ?>
    	 	  <?php $result = ($admin['status'] == 1)? 'active':'inactive'; ?>
	    <tr>
			<td><?php echo $admin['adminId']; ?></td>
			<td><?php echo $admin['firstName']; ?></td>
			<td><?php echo $admin['lastName']; ?></td>
			<td><?php echo $admin['email']; ?></td>
			<td><?php echo $admin['password']; ?></td>
			<td><?php echo $result;?></td>
			<td><?php echo $admin['createdDate']; ?></td>
			<td><?php echo $admin['updatedDate']; ?></td>
			<td><a href = "index.php?c=admin&a=edit&id=<?php echo $admin['adminId']; ?>">Edit</a></td>
			<td><a href = "index.php?c=admin&a=delete&id=<?php echo $admin['adminId']; ?>">delete</a></td>
		</tr>
	<?php } endif; ?>
	</table>
</body>
</html>