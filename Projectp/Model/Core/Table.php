<?php 


class Model_Core_Table
{
	protected $tableName = null;
	protected $primaryKey = null;

	public function getTableName()
	{
		return $this->tableName;
	}

	public function setTableName($tableName)
	{
		$this->tableName = $tableName;
		return $this;
	}

	public function getPrimaryKey()
	{
		return $this->primaryKey;
	}

	public function setPrimaryKey($primaryKey)
	{
		$this->primaryKey = $primaryKey;
		return $this;
	}

	public function insert(array $data=null)
	{ 
		global $adapter;
		$prep = array(); 
		foreach ($data as $key => $value) // key=colname value=uservalue
		{
			$prep[''.$key] = "'".$value."'";	// prep[key]=value
		}
		$insertQuery = ("INSERT INTO $this->tableName (".implode(',', array_keys($data)).") values (".implode(',', array_values($prep)).")"); 

		$insertId = $adapter->insert($insertQuery); // Adapter =-> insert() -> last insert id return from insert()  
		if (!$insertId)
		{ 
		 throw new Exception("Error Processing Request", 1);
	    }	
	}

	public function update(array $data = null,$primaryKey = null ) // array form needed
	{ 
		global $adapter;
		$f = ""; // string = null

		foreach ($data as $key => $value)
		{
			$prep[''.$key] = "'".$value."'"; // same

			$f.=$key."=".$prep[''.$key].","; // key = value, ex:-fname=harsh, 
		}

		$final = rtrim($f,','); // for last key=value
		$updateQuery = "update $this->tableName set $final where $this->primaryKey = $primaryKey"; 
		$update = $adapter->update($updateQuery); 

		if (!$update)
		{
			throw new Exception("Error Processing Request", 1);
			
		}
	}

	public function delete($primaryKey = null , $data = null)
	{
		global $adapter;
	   $deleteQuery = "delete from $this->tableName where $this->primaryKey = $primaryKey";
	   $delete = $adapter->delete($deleteQuery);

	   if (!$delete)
	   {
	   	 throw new Exception("Error Processing Request", 1);
	   }
	}

	public function fetchAll()
	{
		global $adapter;
		$fetchQuery = "select * from $this->tableName"; 
		/*echo $fetchQuery;
		exit();*/
		$fetchAll = $adapter->fetchAll($fetchQuery); // adapter -> fetchall() =  return all rows

		if (!$fetchAll)
		 {
			throw new Exception("Error Processing Request", 1);
			
		}
		return $fetchAll;
	}
	
	public function fetchRow($primaryKey = null)
	{
		global $adapter;
		$fetchQuery = "select * from $this->tableName where $this->primaryKey = $primaryKey";
		$fetchRow = $adapter->fetchRow($fetchQuery); // adapter -> fetchRow() =  return perticular rows

		if ($fetchRow)
		{
			throw new Exception("Error Processing Request", 1);
			
		}
		return $fetchRow;
	}
}
?>