<?php 
 Ccc::loadClass('Model_Core_Adapter');
class Model_Core_Table
{
    protected $adapter = null;
    protected $tableName = null; //admin
    protected $primaryKey = null; //adminId

    public function getAdapter()
    {         
        if($this->adapter)
        {
             return $this->adapter;
        }
        $this->adapter = new Model_Core_Adapter(); 
        return $this->adapter;
    }
    
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
        $adapter = $this->getAdapter();
        $prep = array();
        foreach($data as $k => $v ) 
        {
            $prep[''.$k] ="'".$v."'"; //['harsh','jilka']
        }

        $insertQuery = ("INSERT INTO $this->tableName (" . implode(',',array_keys($data)) . 
            ") VALUES ( ". implode(',', array_values($prep)) . ")"); // valuestring = 'harsh','jilka','48964988'
        //firstname , lastname ,mobile
            
        $insertId=$adapter->insert($insertQuery);
    
        if(!$insertId)
        {
            throw new Exception("Error Processing Request", 1);       
        }
        return $insertId;
    }

    public function update(array $data=null,$primaryKey=null)
    {
        $adapter = $this->getAdapter();
        $f="";

        foreach($data as $key => $value )
        {
            $prep[''.$key] ="'".$value."'";
            $f.= $key."=".$prep[''.$key].","; //firstname = harsh , lasthname = jilka ,
        }

        $final=rtrim($f,',');//firstname = harsh , lasthname = jilka 
        $updateQuery="UPDATE $this->tableName SET $final WHERE $this->tableName.$this->primaryKey = $primaryKey";


        
        $update = $adapter->update($updateQuery);

        if(!$update)
        {
            throw new Exception("Error Processing Request", 1);
        }
        
    }


    public function delete($primaryKey = null,array $data = null)
    {
        $adapter = $this->getAdapter();
        $deleteQuery = "DELETE FROM $this->tableName WHERE $this->primaryKey=$primaryKey";
  
        $delete = $adapter->delete($deleteQuery);

        if(!$delete)
        {
            throw new Exception("Error Processing Request", 1);
        }
    }


    public function fetchAll()
    {
        $adapter = $this->getAdapter();
        $fetchQuery="SELECT * FROM $this->tableName";
       

        $fetchAll=$adapter->fetchAll($fetchQuery);
        if(!$fetchAll)
        {
            throw new Exception("Error Processing Request", 1);
        }
        
        return $fetchAll;
    }

    public function fetchRow($primaryKey=null)
    {
        $adapter = $this->getAdapter();
        $fetchQuery="SELECT * FROM $this->tableName WHERE $this->primaryKey=$primaryKey";
        global $adapter;

        $fetchRow=$adapter->fetchRow($fetchQuery);
        if(!$fetchRow)
        {
            throw new Exception("Error Processing Request", 1);
            
        }
        return $fetchRow;
    }    
}