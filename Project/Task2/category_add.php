<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Category</title>
</head>
<body>
	<form action="Category_save.php" method="post">
		CategoryName : <input type="text" name="name" id="name"><br>
		Status : <select name="status">
					<option value="active">Active</option>
					<option value="inactive">Inactive</option>
				</select>
				<br>
		<input type="submit" name="submit" value="Add"><br>

	</form>

</body>
</html>