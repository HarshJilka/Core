<?php include 'File.php'; 

if (isset($_POST['deletebtn'])) 
{
   
 $conn = mysqli_connect("localhost","root","","crud") or die("Connection failed");
 $stu_id = $_POST['sid'];

  $sql = "delete from student where sid = {$stu_id}";
  $result = mysqli_query($conn,$sql) or die("Unsuccessful!");

  header("Location: http://localhost/PHP/Core/php_practice/31th_Jan/Application/product-grid.php"); 
  mysql_close($conn);
}
?>

<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="form-group">
            <label>Id</label>

            <input type="text" name="sid" />
        
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>
 

