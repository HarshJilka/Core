<?php

$load = new Model_Core_Adapter();
$categories = $load->fetchAll("SELECT * FROM `category` ORDER BY `parent_id`");
function path($categoryId,$array){

    $len = count($array);

    for($i = 0;$i< $len;$i++)
    {

        if($categoryId == $array[$i]["id"]){
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
	<style>
		body{
			text-align: center;
		}
		table{
			border: 10px solid black;
			text-align: center;
		}
		th,td{
			border: 2px solid skyblue;
		}
	</style>

</head>
<body>
	
	<form action="index.php?c=category&a=save" method="POST" >

	<table border="1px" align="center">
		<tr>
			<td>CategoryName : <input type="text" name="category[name]" id="name"></td>
		</tr>
		<br>
	    <tr>
			 <td>sub category
                    <select name="category[parentId]" id="parentId">
                        <option value=<?php echo null; ?>>Root Category</option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo path($category['id'],$categories); ?></option>
                    <?php endforeach; ?>
                    </select>
                </td>
		</tr>
		<tr>
			<td>Status:
				<select name="category[pro_status]" id="status">
                    <option value="1">active</option>
                    <option value="2">inactive</option>
                </select>
            </td>
		</tr>
		<tr>
				<td><input type="submit" name="submit" value="Add"></td>
		</tr>
		
	</table>
	</form>

</body>
</html>