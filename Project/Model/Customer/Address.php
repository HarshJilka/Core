<?php Ccc::loadClass('Model_Core_Table');
class Model_Customer_Address extends Model_Core_Table
{
	public function __construct()
	{
		$this->setTableName('address')->setPrimaryKey('addressId');
		$this->setRowClassName('Customer_Address_Row');
	}

}
?>