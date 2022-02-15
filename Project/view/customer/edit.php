<?php


$result = $this->getData('customer');
?>


<html>
<head><title>Edit</title>
<style>
 table,th,td{
 	border: 5px solid gray;

 }
 body{
 	text-align: center;
 }
form{
	margin-left:550px;
}
 
 </style>
</head>
<body>
<form action="index.php?c=customer&a=save&id=<?php echo $result['customer_id']; ?>" method="POST" >
	<table>
		<tr><td colspan="2"><h1>Customer Information</h1></td></tr>
		<tr>
			<td>First Name</td>
			<td><input type="text" name="customer[firstName]" value=<?php echo $result['firstName']?>></td>
		</tr>
		
		<tr>
			<td>Last Name</td>
			<td><input type="text" name="customer[lastName]" value=<?php echo $result['lastName']?>></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><input type="text" name="customer[email]" value=<?php echo $result['email']?>></td>
		</tr>

		<tr>
			<td>Mobile</td>
			<td><input type="text" name="customer[mobile]" value=<?php echo $result['mobile']?>></td>
		</tr>

		<tr>
			<td>Status</td>
			<td><select name="customer[status]">>
				<?php if ($result['status'] == 1):  ?>

				<option value="1" selected >Active</option>
				<option value="2">Inactive</option>

				<?php else: ?>

				<option value="1">Active</option>
				<option value="2" selected>Inactive</option>
	
			    <?php endif;  ?>
			</select></td>
		</tr>

		<tr><td colspan="2"><h1>Address Information</h1></td></tr>
		<br>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address[address]" value="<?php echo $result['address'] ?>"></td>
		</tr>
		
		<tr>
			<td>Postal code</td>
			<td><input type="number" name="address[postalCode]" value="<?php echo $result['postalCode'] ?>"></td>
		</tr>
		
		<tr>
			<td>city</td>
			<td><input type="text" name="address[city]" value="<?php echo $result['city'] ?>"></td>
		</tr>

		<tr>
			<td>state</td>
			<td><input type="text" name="address[state]" value="<?php echo $result['state'] ?>"></td>
		</tr>

		<tr>
			<td>country</td>
			<td><input type="text" name="address[country]" value="<?php echo $result['country'] ?>"></td>
		</tr>
		<tr>
			<td>Adress Type</td>
			<td><?php if ($result['billingAddress'] == 1):  ?>
			<input type="checkbox" name="address[billingAddress]" value="1" checked>

			<?php else: ?>
			<input type="checkbox" name="address[billingAddress]" value="1">

		
			<?php endif; ?>
			<label>Billing Address</label>

			<?php if ($result['shippingAddress'] == 1) :  ?>
			<input type="checkbox" name="address[shippingAddress]" value="1" checked>

			<?php else: ?>
			<input type="checkbox" name="address[shippingAddress]" value="1">
			
			<?php endif; ?>
			<label>shipping Address</label>
		</td>
		</tr>

	    <tr>
	    	<td></td>
	    	<td>
	    		<input type='submit' name='submit' id='submit' value='Update'>
	    		<button><a href = "index.php?c=customer&a=grid">Cancel</a></button>
	    	</td>

	    </tr>
	
	</table>
	
	
</form>
</body>
</html>