<h3 align="center">Footer</h3>



<?php 
	$children =$this->getChildren();

	foreach ($children as $child) {

		echo $child->toHtml();
		// code...
	}
