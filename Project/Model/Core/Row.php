<?php


class Model_Core_Row 
{
	public $data = [];
	public $tableClassName = 'Model_Core_Table';

/*
	public function update()
	{
		$rowTable = Ccc::getModel('Core_Table');
		$rowTable->update($this->data,$this->id);
	}
*/

	public function __set($name, $value)
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
    }
}

  ?>
