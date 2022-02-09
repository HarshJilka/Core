?>

<html>
<head><title>Add</title>
<style>
	body{
		text-align: center;
	}
	form{
		border: 5px solid	;
	}
</style>
</head>
<body>
<form action="index.php?c=product&a=save" method="POST">
	
	<br>Name:<input type='text' name=product[name] id='name'><br>

	<br>Prize:<input type='float' name=product[price] id='price'><br>

	<br>Quantity:<input type='number' name=product[quantity] id='quantity'><br>

	<br>Status:<select name="product[pro_status]">
				<option value="1">Active</option>
				<option value="2">Inactive</option>
			</select>

	<br><input type='submit' name='submit' id='submit' value='save'><br>
</form>
</body>
</html>