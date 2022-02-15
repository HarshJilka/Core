
<html>
<head><title>Add</title>
<style>
 table,th,td{
 
 	border: 2px solid darkgray;
 }
 body{ 
 	text-align: center;
 }
 table{
 	border: 10px solid black;

 }
form{
	
	margin-left:550px;

}

 </style>
</head>
<body>
<form action="index.php?c=customer&a=save" method="POST">
	<table>
		<tr><td colspan="2"><h1>Customer Information</h1></td></tr>
		<tr>
			<td>First Name</td>
			<td><input type="text" name="customer[firstName]"></td>
		</tr>
		
		<tr>
			<td>Last Name</td>
			<td><input type="text" name="customer[lastName]"></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><input type="text" name="customer[email]"></td>
		</tr>

		<tr>
			<td>Mobile</td>
			<td><input type="text" name="customer[mobile]"></td>
		</tr>

		<tr>
			<td>Status</td>
			<td><select name="customer[status]">
				<option value="1">Active</option>
				<option value="2">Inactive</option>
			</select></td>
		</tr>
		<br>
		<br>

		<tr><td colspan="2"><h1>Address Information</h1></td></tr>
		<br>
		<tr>
			<td>Address:</td>
			<td><input type="text" name="address[address]"></td>
		</tr>
		
		<tr>
			<td>Postal code</td>
			<td><input type="number" name="address[postalCode]"></td>
		</tr>
		
		<tr>
			<td>city</td>
			<td><input type="text" name="address[city]"></td>
		</tr>

		<tr>
			<td>state</td>
			<td><input type="text" name="address[state]"></td>
		</tr>

		<tr>
			<td>country</td>
			<td><input type="text" name="address[country]"></td>
		</tr>
		<tr>
			<td>Adress Type</td>
			<td><input type="checkbox" name="address[billingAddress]" value="1" checked>
			<label>Billing Address</label>

			<input type="checkbox" name="address[shippingAddress]" value="1">
			<label>Shipping address</label>

		</td>
		</tr>


	    <tr>
	    	<td></td>
	    	<td>
	    		<input type='submit' name='submit' id='submit' value='save'>
	    		<button><a href = "index.php?c=customer&a=grid">Cancel</a></button>
	    	</td>
	    </tr>
	
	</table>
	
	
</form>
</body>
</html>