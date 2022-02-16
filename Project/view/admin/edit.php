<?php $result = $this->getData('admin'); ?>


<html>
<head><title>Edit</title>
<style>
 table,th,td{
 	border: 1px solid black;

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
<form action="index.php?c=admin&a=save&id=<?php echo $result['adminId']; ?>" method="POST" >

	<table>
		  <input type="text" name="admin[adminId]" value=<?php echo $result['adminId']?> hidden>
		<tr>
			<td>First Name</td>
			<td><input type="text" name="admin[firstName]" value=<?php echo $result['firstName']?>></td>
		</tr>
		
		<tr>
			<td>Last Name</td>
			<td><input type="text" name="admin[lastName]" value=<?php echo $result['lastName']?>></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><input type="text" name="admin[email]" value=<?php echo $result['email']?>></td>
		</tr>

		<tr>
			<td>Password</td>
			<td><input type="Password" name="admin[password]" value=<?php echo $result['password']?>></td>
		</tr>

		<tr>
			<td>Status</td>
			<td><select name="admin[status]">>
				<?php if ($result['status'] == 1):  ?>

				<option value="1" selected >Active</option>
				<option value="2">Inactive</option>

				<?php else: ?>

				<option value="1">Active</option>
				<option value="2" selected>Inactive</option>
	
			    <?php endif;  ?>
			</select></td>
		</tr>


	    <tr>
	    	<td></td>
	    	<td>
	    		<input type='submit' name='submit' id='submit' value='Update'>
	    		<button><a href = "index.php?c=admin&a=grid">Cancel</a></button>
	    	</td>

	    </tr>
	
	</table>
	
	
</form>
</body>
</html>