<?php

$result = $this->getProduct();
/*print_r($result);
exit();*/
?>


<html>
<head><title>Edit</title>
<style>
	body{
		text-align: center;

	}
	form{
		border: 5px solid;
	}
</style></head>
<body> 
<form action="<?php echo $this->getUrl('product','save',['id' => $result['product_id']],true) ?>" method="POST">

	<input type="text" name="product[product_id]" value="<?php echo $result['product_id']; ?>" hidden>
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