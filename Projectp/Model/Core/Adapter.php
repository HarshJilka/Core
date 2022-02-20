<?php

class Model_Core_Adapter
{
	public $config = [ 
		'host' => 'localhost',
		'username'=> 'root',
		'password' => '',
		'dbname' => 'ecommerce'
	 ];


	private $connect = NULL;

	public function getConfig()
	{
		return $this->config;
	}

	public function setConfig($config)
	{
		$this->config = $config;
		return $this;
	}
	public function getConnect()
	{
		 return $this->connect;
	}

	public function setConnect($connect)
	{
	  $this->connect = $connect;
	  return $this;
	}

	public function connect()
	{
		$connect = mysqli_connect($this->config['host'],$this->config['username'],$this->config['password'],$this->config['dbname']);
		$this->setConnect($connect);
		return $connect;
	}

	public function query($query) // pass query
	{

		if(!$this->getConnect()) // connection set 
		{
		  $this->connect();
		}
		$result = $this->getConnect()->query($query); //query in build
		return $result;
	}

	public function insert($query)
	{
		$result = $this->query($query);

		if($result) 
		{
			return $this->getConnect()->insert_id();
		}
		return $result;
	}

	public function update($query)
	{
		$result = $this->query($query);
		return $result;
	}

	public function delete($query)
	{
		$result = $this->query($query);
		return $result;
	}

	public function fetchAssoc($query)
	{
		$result = $this->query($query);
		return $result->fetch_assoc(); // assosiative array return
	}

	public function fetchRow($query)
	{
	   $result = $this->query($query); // single fetch row

	   if ($result->num_rows) // inbuilt
	   {
	   	 return $result->fetch_assoc(); 
	   }
	   return false;
	}

	public function fetchAll($query,$mode=MYSQLI_ASSOC) // bydefault mysquli_assoc 
	{
		$result = $this->query($query);
	/*	echo $result;
		exit();*/

		if ($result->num_rows)
		{
			return $result->fetch_all($mode); // all query fetch ,by default my assoc 
		}
		return false;
	}

	public function fetchPair($query)
	{
		$result = $this->fetchAll($query,MYSQLI_NUM); // num wise query & fetch all

		if(!$result)
		{
			return false;
		}

		$keys = array_column($result,'0'); // 0 index -> key
		$values = array_column($result,'1'); // 0 index -> value

		if (!$values)
		{
		 	$values = array_fill(0,count($keys),null); // if key-1, value-0, then value=null
		} 

		$result = array_combine($keys,$values); // array all value and keys return 
		return $result;
	}

}




  ?>