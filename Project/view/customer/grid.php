<?php 

$object = new Model_Core_Adapter();
$result = $object->fetchAll("select * from customer");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CUSTOMER</title>
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
	<button id="Added"><a href="index.php?c=customer&a=add">ADD</a></button>
	<table border="5px" width="100%">
		<tr>
			<th>Customer Id</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Status</th>
			<th>Created Date</th>
			<th>Updated Date</th>
			<th colspan="2">Action</th>
		</tr>
		<?php if (!$result): ?>
    		  <tr><td colspan="8">No Record Found!</td></tr>
    	<?php else: ?>
    	 	  <?php foreach ($result as $customer) { ?>
    	 	  <?php $result = ($customer['status'] == 1)? 'active':'inactive'; ?>
	    <tr>
			<td><?php echo $customer['customer_id']; ?></td>
			<td><?php echo $customer['firstName']; ?></td>
			<td><?php echo $customer['lastName']; ?></td>
			<td><?php echo $customer['email']; ?></td>
			<td><?php echo $customer['mobile']; ?></td>
			<td><?php echo $result;?></td>
			<td><?php echo $customer['createdDate']; ?></td>
			<td><?php echo $customer['updatedDate']; ?></td>
			<td><a href = "index.php?c=customer&a=edit&id=<?php echo $customer['customer_id']; ?>">Edit</a></td>
			<td><a href = "index.php?c=customer&a=delete&id=<?php echo $customer['customer_id']; ?>">delete</a></td>
		</tr>
	<?php } endif; ?>
	</table>
</body>
</html>