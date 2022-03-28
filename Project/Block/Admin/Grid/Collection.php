    <?php Ccc::loadClass('Block_Core_Grid_Collection');

class Block_Admin_Grid_Collection extends Block_Core_Grid_Collection
{
    public function __construct()
    {

        $this->setCurrentCollection('personal');
        parent::__construct();
    }

    public function prepareCollections()
    {
        $this->addCollection([
            'title' => 'Personal Info',
            'block' => 'Admin_Grid_Collection',
            'header' => ['AdminId','First Name','Last Name','Email','Status','CreatedAt','updatedAt'],
            'action' => $this->getActions(),
            'url' => $this->getUrl(null,null,['Collection' => 'personal'])
        ],'personal');
        $this->prepareCollectionContent();       
    }

    public function prepareCollectionContent()
    {
        $adminModel = Ccc::getModel('admin');
        $admins = $adminModel->fetchAll("SELECT `adminId`,`firstName`,`lastName`,`email`,`status`,`createdAt`,`updatedAt` FROM `admin`");
        $array=[];
        foreach($admins as $admin)
        {
            $array1=[];   
            foreach($admin->getData() as $key => $value)
            {
                $array1[]=$value;
            }
            array_push($array,$array1);
            
        }
        $this->setColumns($array);
    }

}