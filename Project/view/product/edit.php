<?php

$result = $this->getData('products');

?>


<html>
<head><title>Edit</title></head>
<body> 
<form action="index.php?c=product&a=save&id=<?php echo $result['product_id'];  ?>" method="POST">

	<input type="text" name="id" value="<?php echo $result['product_id']; ?>" hidden>
	<br>
	Name:<input type='text' value="<?php echo $result['name']; ?>" name='product[name]' id='name'>
	<br>
	Prize:<input type='float' value="<?php echo $result['price']; ?>" name='product[price]' id='price'>
	<br>
	Quantity:<input type='number' value="<?php echo $result['quantity']; ?>" name='product[quantity]' id='quantity'>
	<br>
	Status:<input type='radio' value="active" name='product[pro_status]' <?php echo ($result['pro_status']=='active')?"checked":""?>>Active<input type='radio' name='product[pro_status]' value='inactive' <?php echo ($result['pro_status']=='inactive')?"checked":""?>>Inactive
	<br><input type='submit' name='Update' id='submit' value='update'>
</form>
</body>
</html>