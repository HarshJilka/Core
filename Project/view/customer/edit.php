<?php

$id=$_GET['id'];
$adapter=new Model_Core_Adapter();
$result=$adapter->fetchRow("select * FROM `customer` WHERE `customer`.`customer_id` = '$id'");
?>


<html>
<head><title>Edit</title>
<style>
 table,th,td{
 	border: 1px solid black;

 }
 body{
 	text-align: center;
 }
 </style>
</head>
<body>
<form action="index.php?c=customer&a=save&id=<?php echo $result['customer_id']; ?>" method="POST" >
	<table>
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