<h4>Footer</h4>



<?php 
	$children =$this->getChildren();

	foreach ($children as $child) {

		$child->toHtml();
		// code...
	}
