<?php $messages = $this->getMessages();
	

if($messages)
{
	foreach ($messages as $type => $message)
	 {
	 	if($type == "Success")
	 	{
	 		echo $message;	
	 	}
		if($type == "Warning")
	 	{
	 		echo $message;	
	 	}
		if($type == "Error")
	 	{
	 		echo $message;	
	 	}
		
	}
}