<?php

$customers = $this->getCustomers();
$addresses = $this->getAddresses();

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

		<?php if (!$customers): ?>
    		  <tr><td colspan="8">No Record Found!</td></tr>
    	<?php else: ?>
    	 	  <?php foreach ($customers as $customer) { ?>
    	 	  
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
			
			<?php foreach ($addresses as $address): ?>
					<?php if($address['customer_id']==$customer['customer_id']):?>

			<td><?php echo $address['addressId']; ?></td>
			<td><?php echo $address['address']; ?></td>
			<td><?php echo $address['postalCode']; ?></td>
			<td><?php echo $address['city']; ?></td>
			<td><?php echo $address['state']; ?></td>
			<td><?php echo $address['country']; ?></td>
			<td><?php if ($address['billingAddress'] == 1)
			{
				echo "yes";
			} 
			else{
				echo "no";
			}?> </td>

			<td><?php if ($address['shippingAddress'] == 1)
			 {
				echo "yes";
			} 
			else{
				echo "no";
			}?> </td>

			<?php else: ?><!-- <td colspan="8"> </td> -->
		<?php endif;  ?>
	<?php endforeach; ?>

			<td><a href="<?php echo $this->getUrl('customer','edit',['id'=>$customer['customer_id']],true) ?>">Edit</a></td>
				<td><a href="<?php echo $this->getUrl('customer','delete',['id'=>$customer['customer_id']],true) ?>">Delete</a></td>
		</tr>
	<?php } endif; ?>
	</table>
</body>
</html>