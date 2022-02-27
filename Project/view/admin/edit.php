
<?php $admin=$this->getAdmin(); ?>

<html>
<head><title>Admin Edit</title></head>
<body>

<form action="<?php echo $this->getUrl('save','admin',['id'=>$admin->adminId],true) ?>" method="POST">
	<table border="1" width="100%" cellspacing="4">
		<tr>
			<td colspan="2"><b>Admin Information</b></td>
		</tr>
		<tr>
			<td width="10%">First Name</td>
			<td><input type="text" name="admin[firstName]" value="<?php echo $admin->firstName ?>"></td>
		</tr>
		
		<tr>
			<td width="10%">Last Name</td>
			<td><input type="text" name="admin[lastName]" value="<?php echo $admin->lastName ?>"></td>
		</tr>
		<tr>
			<td width="10%">Email</td>
			<td><input type="text" name="admin[email]" value="<?php echo $admin->email ?>"></td>
		</tr>
		<tr>
			<td width="10%">Password</td>
			<td><input type="text" name="admin[password]" value="<?php echo $admin->password ?>"></td>
		</tr>
		<tr>
			<td width="10%">Status</td>
			<td>
				<select name="admin[status]">
					<?php if($admin->status==1): ?>
					<option value="1" selected>Enabled</option>
					<option value="2">Disabled</option>
					<?php else: ?>
					<option value="1">Enabled</option>
					<option value="2" selected>Disabled</option>				
					<?php endif; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td width="10%">&nbsp;</td>
			<td>
				<input type="submit" name="submit" value="save">
				<button type="button"><a href="<?php echo $this->getUrl('grid','admin') ?>">Cancel</a></button>
			</td>
		</tr>
		
	</table>	
</form>
</body>
</html>





<!-- <?//php $result = $this->getAdmin(); ?>


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
<form action="<?php //echo $this->getUrl('admin','save',['id' => $result['adminId']],true) ?>" method="POST" >

	<table>
		  <input type="text" name="admin[adminId]" value="<?php// echo $result['adminId']?>" hidden>
		<tr>
			<td>First Name</td>
			<td><input type="text" name="admin[firstName]" value="<?php //echo $result['firstName']?>"></td>
		</tr>
		
		<tr>
			<td>Last Name</td>
			<td><input type="text" name="admin[lastName]" value="<?php //echo $result['lastName']?>"></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><input type="text" name="admin[email]" value="<?php //echo $result['email']?>"></td>
		</tr>

		<tr>
			<td>Password</td>
			<td><input type="Password" name="admin[password]" value="<?php //echo $result['password']?>"></td>
		</tr>

		<tr>
			<td>Status</td>
			<td><select name="admin[status]">>
				<?php// if ($result['status'] == 1):  ?>

				<option value="1" selected >Active</option>
				<option value="2">Inactive</option>

				<?php// else: ?>

				<option value="1">Active</option>
				<option value="2" selected>Inactive</option>
	
			    <?php //endif;  ?>
			</select></td>
		</tr>


	    <tr>
	    	<td></td>
	    	<td>
	    		<input type='submit' name='submit' id='submit' value='Update'>
	    		<button><a href = "<?php echo $this->getUrl('admin','grid') ?>">Cancel</a></button>
	    	</td>

	    </tr>
	
	</table>
	
	
</form>
</body>
</html> -->