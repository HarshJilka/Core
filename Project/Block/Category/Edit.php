<?php
Ccc::loadClass('Block_Core_Template');
class Block_Category_Edit extends Block_Core_Template   
{ 

    public function __construct()
    {
        $this->setTemplate('view/category/edit.php');
    }
    
    public function getCategories()
    {
        return $this->getData('categories');
    }
    public function getCategory()
    {
        return $this->getData('category');
    }
     public function pathAction()
    {
        $adapter = new Model_Core_Adapter();
        $categoryName = $adapter->fetchPair('SELECT `categoryID`, `name` FROM `category`');
        $categoryPath = $adapter->fetchPair('SELECT `categoryID`, `path` FROM `category`');
        $categories=[];
        foreach ($categoryPath as $key => $value) {
                $explodeArray=explode('/', $value);
                $tempArray = [];

                foreach ($explodeArray as $keys => $value) {
                    if(array_key_exists($value,$categoryName)){
                        array_push($tempArray,$categoryName[$value]);
                    }
                }

                $implodeArray = implode('/', $tempArray);
                $categories[$key]= $implodeArray;
        }
        return $categories;
    }
}
?>