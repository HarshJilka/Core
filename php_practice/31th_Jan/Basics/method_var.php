<?php

echo "<pre>";

class car{

    public $name = null;
    protected $price = 0;

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    public function setPrice($price)
    {
        if(gettype($price) == "integer"){
            $this->$price= $price;
            return $this;
        }
        else{
            return;
        }
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->$price;
    }
}

$suzuki = new car();

print_r($suzuki);
echo "<br>";

$suzuki->setName("suzuki");
$suzuki->setprice(100);

print_r($suzuki);
echo "<br>";

$hundai = $suzuki;
print_r($hundai);

$suzuki->setName("hundai")->setPrice(2500000); //if we write return in the class method then only we use this type of mathon call
print_r($hundai);
echo "<br>";

print_r($suzuki);

?>