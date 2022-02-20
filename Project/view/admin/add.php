
<html>
<head><title>Add</title>
<style>
 table,th,td{
 
 	border: 5px solid darkgray;
 }
 body{ 
 	text-align: center;
 }
 table{
 	border: 10px solid black;
 	margin-left: 600px;
 	margin-top: 50px;
 }


 </style>
</head>
<body>
<form action="<?php echo $this->getUrl('admin','save') ?>" method="POST">
	<table>
		<tr>
			<td>First Name</td>
			<td><input type="text" name="admin[firstName]"></td>
		</tr>
		
		<tr>
			<td>Last Name</td>
			<td><input type="text" name="admin[lastName]"></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><input type="text" name="admin[email]"></td>
		</tr>

		<tr>
			<td>Password</td>
			<td><input type="password" name="admin[password]"></td>
		</tr>

		<tr>
			<td>Status</td>
			<td><select name="admin[status]">
				<option value="1">Active</option>
				<option value="2">Inactive</option>
			</select></td>
		</tr>

	    <tr>
	    	<td></td>
	    	<td>
	    		<input type='submit' name='submit' id='submit' value='save'>
	    		<button><a href = "<?php echo $this->getUrl('admin','grid') ?>">Cancel</a></button>
	    	</td>
	    </tr>
	
	</table>
	
	
</form>
</body>
</html>