<?php 


$load = new Model_Core_Adapter();
$categories = $load->fetchAll("SELECT * FROM `category`");

function path($categoryId,$array)
{

    $len = count($array);

    for($i = 0; $i< $len; $i++)
    {
        if($categoryId == $array[$i]["id"])
        {
            if($array[$i]["parent_id"] == null)
            {
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
	<title>Category</title>
	<style>
		body,td{
			text-align: center;
		}
		table{
			border-color: skyblue;
		}
		#Added{
			width: 250px;
			border-width: 10px;
			border-color: skyblue;
			border-radius: 10px;
		}
	</style>
</head>
<body>
	<button id="Added"><a href="index.php?c=category&a=add">ADD</a></button>
	<table border="5px" width="100%">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Status</th>
			<th>Created_date</th>
			<th>Updated_date</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php if (!$categories): ?>
    		  <tr><td colspan="8">No Record Found!</td></tr>
    	<?php else: ?>
    	 	  <?php foreach ($categories as $category) { ?>
    	 	  <?php $result = ($category['status'] == 'active')? 'active':'inactive'; ?>
	    <tr>
			<td><?php echo $category['id'] ?></td>
			<td><?php echo path($category['id'],$categories); ?></td>
			<td><?php echo $result; ?></td>
			<td><?php echo $category['created_date'] ?></td>
			<td><?php echo $category['updated_date'] ?></td>
			<td><a href = "index.php?c=category&a=edit&id=<?php echo $category['id']; ?>">Edit</a></td>
			<td><a href = "index.php?c=category&a=delete&id=<?php echo $category['id']; ?>">delete</a></td>
		</tr>
	<?php } endif; ?>
	</table>
</body>
</html>