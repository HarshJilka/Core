<?php

$result=$this->getData('customer');



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
			border-radius: 5px;
			margin-bottom: 10px;
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
			<th>Address Id</th>
			<th>Address</th>
			<th>Postal Code</th>
			<th>city</th>
			<th>State</th>
			<th>Country</th>
			<th>Biiling Address</th>
			<th>Shipping Address</th>

			<th colspan="2">Action</th>
		</tr>
		<?php if (!$result): ?>
    		  <tr><td colspan="8">No Record Found!</td></tr>
    	<?php else: ?>
    	 	  <?php foreach ($result as $customer) { ?>
    	 	  
    	 	<tr>
			<td><?php echo $customer['customer_id']; ?></td>
			<td><?php echo $customer['firstName']; ?></td>
			<td><?php echo $customer['lastName']; ?></td>
			<td><?php echo $customer['email']; ?></td>
			<td><?php echo $customer['mobile']; ?></td>
			<td><?php if ($customer['status'] == 1)
			 {
				echo "active";
			} 
			else{
				echo "inactive";
			}?> </td>
			
			<td><?php echo $customer['addressId']; ?></td>
			<td><?php echo $customer['address']; ?></td>
			<td><?php echo $customer['postalCode']; ?></td>
			<td><?php echo $customer['city']; ?></td>
			<td><?php echo $customer['state']; ?></td>
			<td><?php echo $customer['country']; ?></td>
			<td><?php if ($customer['billingAddress'] == 1)
			 {
				echo "yes";
			} 
			else{
				echo "no";
			}?> </td>

			<td><?php if ($customer['shippingAddress'] == 1)
			 {
				echo "yes";
			} 
			else{
				echo "no";
			}?> </td>



			<td><a href = "index.php?c=customer&a=edit&id=<?php echo $customer['customer_id']; ?>">Edit</a></td>
			<td><a href = "index.php?c=customer&a=delete&id=<?php echo $customer['customer_id']; ?>">delete</a></td>
		</tr>
	<?php } endif; ?>
	</table>
</body>
</html>