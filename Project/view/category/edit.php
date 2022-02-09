<?php 
 	try 
 	{
        if(!isset($_GET['id']))
        { 
            throw new Exception("Invalid Request.", 1);
        }
		$category_id = $_GET['id'];
		$adapter =  new Model_Core_Adapter();
		$row = $adapter->fetchRow("select * from category where id=$category_id");
	} 
	catch (Exception $e) 
	{
        echo $e->getMessage();
    }
    
    $fetch =  new Model_Core_Adapter();
    $categories = $fetch->fetchAll("SELECT * FROM `category`");

	function path($categoryId,$array)
	{
	    $len = count($array);
	    for($i = 0;$i< $len; $i++)
	    {
	        if($categoryId == $array[$i]["id"])
	        {
	            if($array[$i]["parent_id"] == null){
	                return $array[$i]["name"];
	            }
	            return path($array[$i]["parent_id"],$array)."=>".$array[$i]["name"];
	    }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Category</title>
</head>
<body>

	<form action="index.php?c=category&a=save&id=<?php echo $_GET['id'];?>" method="post">
		<table>
		<tr>
			<td>CategoryName : <input type="text" name="category[name]" id="name" value="<?php echo $row['name']?>"></td>
		<br>
		<tr>
             <td>Subcategory
                        <select name="category[parentId]" id="parentId">
                            <option value="<?php echo $row['id']; ?>"><?php  echo path($row['id'],$categories); ?></option>
                        </select>
             </td>
         </tr>


		<tr>
		    <td>Status : <select name="category[status]" >

			<?php if($result['status']== 'active' ) {?>

					<option value="active" selected>Active</option>
					<option value="inactive" >Inactive</option>
					

			<?php } else { ?>
					<option value="active">Active</option>
					<option value="inactive" selected >Inactive</option>
					<?php } ?>

				</select><td>
				<br>
		<input type="submit" name="submit" value="Edit"><br>
		</table>
	</form>

</body>
</html>