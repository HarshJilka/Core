
<?php require_once('Model/Core/Model_Core_Adapter.php'); ?>
<?php $id=$_GET['id']; ?>
<?php

	$id=$_GET['id'];

	try
	{
		$id=$_GET['id'];
		if(!$id)
		{
			throw new Exception("Invelid Request", 1);
			
		}

		$adapter=new Model_Core_Adapter();
		$row = $adapter->fetchRow("select * FROM `category` WHERE `category`.`category_id` = '$id'");
	}
	catch(Exception $e)
	{
		throw new Exception("Invelid Request", 1);
	}

	$categories = $adapter->fetchAll("SELECT * FROM `category`");

$result=$adapter->pathAction();

?>
<html>
<head><title>Category Add</title></head>
<body>

<form action="index.php?c=category&a=save&id=<?php echo $id ?>" method="POST">
	<table border="1" width="100%" cellspacing="4">
		<tr>
			<td colspan="2"><b>Category Information</b></td>
		</tr>
		 <tr>
                    <td width="10%">Subcategory</td>
                    <td>
                        <!-- <select name="category[p_category_id]" id="parentId">
                            <option value="<?php echo $row['category_id']; ?>"><?php echo $result[$id];?></option>
                        </select> -->
                        <select name="category[p_category_id]" id="parentId">
                        	<option value="NULL">Root</option>
                 	
                            <option value="<?php echo $row['category_id']; ?>"><?php echo $result[$id];?></option>
                        </select>
                    </td>
                </tr>
                <tr>
		<tr>
			<td width="10%">Category Name<input type="text" name="category[category_id]" value="<?php echo $row['category_id'] ?>" hidden></td>
			<td><input type="text" name="category[name]" value="<?php echo $row['name'] ?>"></td>
		</tr>
		<tr>
			<td width="10%">Status</td>
			<td>
				<select name="category[status]">
					<?php if($category['status']==1): ?>
					<option value="1" selected>Active</option>
					<option value="2">Inactive</option>
					<?php else: ?>
					<option value="1">Active</option>
					<option value="2" selected>Inactive</option>				
					<?php endif; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td width="10%">&nbsp;</td>
			<td>
				<input type="submit" name="submit" value="update">
				<button type="button"><a href="index.php?c=cateogry&a=grid">Cancel</a></button>
			</td>
		</tr>
		
	</table>	
</form>
</body>
</html>