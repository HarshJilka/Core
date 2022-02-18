<?php

$products = $this->getProducts();
?>
<html>
<head>
	<title>Products</title>
	<style>

		body,td{
			text-align: center;
		
		}
		table{
			border-width: 10px;
			border-color: skyblue;
			
		}
		#Add{
			width: 250px;
			border-width: 10px;
			border-color: skyblue;
			border-radius: 5px;
			margin-bottom: 10px;
		}

	</style>
</head>
<body>
	<button name="Add" id="Add"><a href="index.php?c=product&a=add">Add</a></button>
	<br>
	<table border="5px" width="100%">

		<tr>
			<th>Product Id</th>
			<th>Product Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Status</th>
			<th>Create Date</th>
			<th>Update Date</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php if (!$products): ?>
    		  <tr><td colspan="8">No Record Found!</td></tr>

    	<?php else: ?>
    	 	  <?php foreach($products as $product) { ?>
		<tr>
			<td><?php echo($product['product_id']) ?></td>
			<td><?php echo($product['name']) ?></td>
			<td><?php echo($product['price']) ?></td>
			<td><?php echo($product['quantity']) ?></td>
			<td><?php echo($product['pro_status']) ?></td>
			<td><?php echo($product['created_date']) ?></td>
			<td><?php echo($product['updated_date']) ?></td>
			<td><a href="index.php?c=product&a=edit&id=<?php echo $product['product_id']?>">Edit</a></td>
			<td><a href="index.php?c=product&a=delete&id=<?php echo $product['product_id']?>">Delete</a></td>
		</tr>
	<?php } endif; ?>
	</table>
		<br>
		
</body>