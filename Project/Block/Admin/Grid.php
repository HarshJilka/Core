<?php 
Ccc::loadClass('Block_Core_Grid'); 
Ccc::loadClass('Block_Admin_Grid_Collection'); 

class Block_Admin_Grid extends Block_Core_Grid 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	/*public function getAdmins()
	{
		$request = Ccc::getModel('Core_Request');
        $page = (int)$request->getRequest('p', 1);
        $ppr = (int)$request->getRequest('ppr',20);

        $pagerModel = Ccc::getModel('Core_Pager');
        $adminModel = Ccc::getModel('Admin');	
        $totalCount = $pagerModel->getAdapter()->fetchOne("SELECT count(adminId) FROM `admin`");
        $pagerModel->execute($totalCount,$page,$ppr);
        $this->setPager($pagerModel);
        $admins = $adminModel->fetchAll("SELECT * FROM `admin` LIMIT {$pagerModel->getStartLimit()} , {$pagerModel->getEndLimit()}");
		return $admins;
	}*/
}


?>