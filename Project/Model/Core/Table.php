<?php require_once('Model/Core/Adapter.php'); 

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
        foreach($data as $k => $v ) 
        {
            $prep[''.$k] ="'".$v."'";
        }

        $sth = ("INSERT INTO $this->tableName (" . implode(',',array_keys($data)) . 
            ") VALUES ( ". implode(',', array_values($prep)) . ")");

        try{
            
            $insertId=$adapter->insert($sth);
            print_r($insertId);
            if(!$insertId)
            {
                throw new Exception("Error Processing Request", 1);
                
            }

        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

        


   

}