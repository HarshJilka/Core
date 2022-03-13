<h4>Footer</h4>



<?php 
	$children =$this->getChildren();

	foreach ($children as $child) {

		echo $child->toHtml();
		// code...
	}
