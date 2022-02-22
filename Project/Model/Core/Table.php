<?php 
 
Ccc::loadClass('Model_Core_Table_Row');
class Model_Core_Table
{
    protected $adapter = null;
    protected $tableName = null; //admin
    protected $primaryKey = null; //adminId

    protected $rowClassName;

    public function getRowClassName()
    {
        return $this->rowClassName;
    }

    public function setRowClassName($rowClassName)
    {
        $this->rowClassName = $rowClassName;
        return $this;
    }

    public function getRow()
    {
        return Ccc::getModel($this->getRowClassName());
    }

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

        $insertQuery = "INSERT INTO {$this->getTableName()} (" . implode(',',array_keys($data)) . 
            ") VALUES ( ". implode(',', array_values($prep)) . ")";
             // valuestring = 'harsh','jilka','48964988'
        //firstname , lastname ,mobile
            
        $insertId=$adapter->insert($insertQuery);
    
        if(!$insertId)
        {
            throw new Exception("Error Processing Request", 1);       
        }
        return $insertId;
    }


    public function update(array $data,$primaryKey)
    {
        $adapter = $this->getAdapter();
        $f="";
        foreach($data as $key => $value ) 
        {
            $prep[''.$key] ="'".$value."'";
            $f.= $key."=".$prep[''.$key].",";
        }
        $final=rtrim($f,',');
        $updateQuery="UPDATE $this->tableName SET $final WHERE $this->tableName.$this->primaryKey = $primaryKey";

        /*print_r($updateQuery);
        exit();*/

        $update=$adapter->update($updateQuery);
        if(!$update)
        {
            throw new Exception("Error Processing Request", 1);
            
        }
    }

   /* public function update(array $data=null,$primaryKey)
    {
        $adapter = $this->getAdapter();
        $f="";

        foreach($data as $key => $value )
        {
            $prep[''.$key] ="'".$value."'";
            $f.= $key."=".$prep[''.$key].","; //firstname = harsh , lasthname = jilka ,
        }

        $final=rtrim($f,',');//firstname = harsh , lasthname = jilka 

        $updateQuery="UPDATE {$this->getTableName()} SET $final WHERE {$this->getTableName()}.{$this->getPrimaryKey()} = {$this->primaryKey}";

        print_r($updateQuery);
        exit();
        
        $update = $adapter->update($updateQuery);

        if(!$update)
        {
            throw new Exception("Error Processing Request", 1);
        }
        
    }*/


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

    public function fetchRow($query)
    {
        $adapter = $this->getAdapter(); // getadapter->adapter
        
        $fetchRow=$adapter->fetchRow($query);
       /* print_r($fetchRow);
        exit();*/
        if(!$fetchRow)
        {
            return null;       
            throw new Exception("Error Processing Request", 1);
        }

        return $fetchRow; 
    }  

    public function load($id)
    {
        $rowData = $this->fetchRow("SELECT * FROM {$this->getTableName()} WHERE {$this->getPrimaryKey()} = {$id}");
        if(!$rowData)
        {
            return false;
        }
        $row = $this->getRow();
        $row->setData($rowData);
        return $row;
    }  


}

