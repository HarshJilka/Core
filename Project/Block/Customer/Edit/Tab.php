<?php Ccc::loadClass('Block_Core_Edit_Tab');

class Block_Customer_Edit_Tab extends Block_Core_Edit_Tab
{
    public function __construct()
    {
        parent::__construct();
        $this->setCurrentTab('customer');
    }

    public function prepareTabs()
    {
        $this->addTab([
            'title' => 'CUSTOMER INFO',
            'block' => 'Customer_Edit_Tabs_Customer',
            'url' => $this->getUrl(null,null,['tab' => 'customer'])
        ],'customer');
        $this->addTab([
            'title' => 'ADDRESS INFO',
            'block' => 'Customer_Edit_Tabs_Address',
            'url' => $this->getUrl(null,null,['tab' => 'address'])
        ],'address');
    }
}