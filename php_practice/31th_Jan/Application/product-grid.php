<?php include 'File.php';?>

<div id="main-content">
	<h2>All Records</h2>
    

 	<?php 

 	  $conn = mysqli_connect("localhost","root","","crud") or die("Connection failed");
      
      $sql = "Select * from student join studentclass where student.sclass = studentclass.cid";
	  $result = mysqli_query($conn,$sql) or die("Unsuccessful!");  
	  if (mysqli_num_rows($result)>0) 
	  { ?>


	  <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>  
        <th>Address</th>
        <th>Class</th>	
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php 
            $i=1;

        	while($row =mysqli_fetch_assoc($result))
        	{
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['sname']; ?></td>
                <td><?php echo $row['saddress']; ?></td>
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['sphone']; ?></td>
                <td>
                    <a href='product-edit.php?id= <?php echo $row['sid']; ?>'>Edit</a>
                    <a href='product-delete-inline.php?id= <?php echo $row['sid'];?>'>Delete</a>
                </td>
            </tr>

	  	 <?php $i++; } ?>
		  </tbody>
	   </table>
 	<?php } 
 	else{
		 echo "<h2>NO RECORD FOUND!</h2>";
	     }
 	mysqli_close($conn);
 	?>
</div>
</div>
</body>
</html>

