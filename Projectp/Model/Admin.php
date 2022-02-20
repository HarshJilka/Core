<?php 

Ccc::loadClass('Model_Core_Table');

class Model_Admin extends Model_Core_Table 
{
	/*public $data = [];
	public $name = 'meet';*/

	public function __construct()
	{
		$this->setTableName('admin')->setPrimaryKey('adminId');
	}

	/*public function __set($name, $value)
    {
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) 
        {
            return $this->data[$name];
        }
    }*/
}

?>
