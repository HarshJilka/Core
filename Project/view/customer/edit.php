<?php
$customer = $this->getCustomer();
$address = $this->getAddress();;
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

<form action="<?php echo $this->getUrl('customer','save',['id'=>$customer['customer_id']],true) ?>" method="POST">

	<table>
		<tr><td colspan="2"><h1>Customer Information</h1></td></tr>

		<input type="text" name="customer[customer_id]" value="<?php echo $customer['customer_id'] ?>" hidden>

		<tr>
			<td>First Name</td>
			<td><input type="text" name="customer[firstName]" value="<?php echo $customer['firstName']?>"></td>
		</tr>
		
		<tr>
			<td>Last Name</td>
			<td><input type="text" name="customer[lastName]" value="<?php echo $customer['lastName']?>"></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><input type="text" name="customer[email]" value="<?php echo $customer['email']?>"></td>
		</tr>

		<tr>
			<td>Mobile</td>
			<td><input type="text" name="customer[mobile]" value="<?php echo $customer['mobile']?>"></td>
		</tr>

		<tr>
			<td>Status</td>
			<td><select name="customer[status]">>
				<?php if ($customer['status'] == 1):  ?>

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

		<input type="text" name="address[customer_id]" value="<?php echo $address['customer_id'] ?>" hidden>

		<tr>
			<td>Address</td>
			<td><input type="text" name="address[address]" value="<?php echo $address['address'] ?>"></td>
		</tr>

		<tr>
			<td>Postal code</td>
			<td><input type="number" name="address[postalCode]" value="<?php echo $address['postalCode'] ?>"></td>
		</tr>
		
		<tr>
			<td>city</td>
			<td><input type="text" name="address[city]" value="<?php echo $address['city'] ?>"></td>
		</tr>

		<tr>
			<td>state</td>
			<td><input type="text" name="address[state]" value="<?php echo $address['state'] ?>"></td>
		</tr>

		<tr>
			<td>country</td>
			<td><input type="text" name="address[country]" value="<?php echo $address['country'] ?>"></td>
		</tr>
		<tr>
			<td>Adress Type</td>
			<td><?php if ($address['billingAddress'] == 1):  ?>
			<input type="checkbox" name="address[billingAddress]" value="1" checked>

			<?php else: ?>
			<input type="checkbox" name="address[billingAddress]" value="1">

		
			<?php endif; ?>
			<label>Billing Address</label>

			<?php if ($address['shippingAddress'] == 1) :  ?>
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
	    		<button><a href = "<?php echo $this->getUrl('customer','grid',[],true) ?>">Cancel</a></button>
	    	</td>
	    </tr>
	</table>
	
	
</form>
</body>
</html>