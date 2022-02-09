
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


 </style>
</head>
<body>
<form action="index.php?c=customer&a=save" method="POST">
	<table>
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