<?php Ccc::loadClass('Block_Core_Grid_Collection');

class Block_Customer_Grid_Collection extends Block_Core_Grid_Collection
{
    public function __construct()
    {

        $this->setCurrentCollection('personal');
        parent::__construct();
    }

    public function prepareCollections()
    {
        $this->addCollection([
            'header' => ['CustomerId','First Name','Last Name','Email','Status','CreatedAt','UpdatedAt','BillingAddress','ShippingAddress'],
            'url' => $this->getUrl(null,null,['Collection' => 'personal'])
        ],'personal');
        $this->prepareCollectionContent();       
    }

    public function prepareCollectionContent()
    {
        $customers = $this->getCustomers();
        foreach ($customers as $customer) {
            $customer->setData(['billing'=>$customer->getBillingAddress()]);
            $customer->setData(['shipping'=>$customer->getShippingAddress()]);
        }
        $array=[];
        foreach($customers as $customer)
        {
            $customer->status = $customer->getStatus($customer->status);
            $array1=[];   
            foreach($customer->getData() as $key => $value)
            {

                $array1[]=$value;
                if($key == 'billing'||$key == 'shipping')
                {
                    $address= null;
                    foreach ($value->getData() as $k => $data) 
                    {   
                        if($k != 'billing' && $k != 'shipping' && $k != 'addressId' && $k != 'customerId')
                        {
                            $address .= $k." => ".$data."<br>";
                        }
                    }
                    array_push($array1,$address);
                }
            }
                unset($array1[9]);
                unset($array1[7]);
            array_push($array,$array1);
            
        }
        $this->setColumns($array);
        return $this;
    }
    public function getCustomers()
    {
        $request = Ccc::getModel('Core_Request');
        $page = (int)$request->getRequest('p', 1);
        $ppr = (int)$request->getRequest('ppr',20);

        $pagerModel = Ccc::getModel('Core_Pager');
        
        $customerModel = Ccc::getModel('Customer');   
        $totalCount = $pagerModel->getAdapter()->fetchOne("SELECT count(customerId) FROM `customer`");
        
        $pagerModel->execute($totalCount,$page,$ppr);
        $this->setPager($pagerModel);
        $customers = $customerModel->fetchAll("SELECT `customerId`,`firstName`,`lastName`,`email`,`status`,`createdAt`,`updatedAt` FROM `customer` LIMIT {$pagerModel->getStartLimit()} , {$pagerModel->getEndLimit()}");
        $this->setPagerModel($pagerModel);
        return $customers;

    }

}