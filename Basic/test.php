<?php 

	include('Task1_StaticPage.php');
	$obj=new query();
    $result=$obj->getData('user');
    echo "<pre>";
    print_r($result);
 ?>