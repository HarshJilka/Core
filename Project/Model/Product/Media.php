<?php Ccc::loadClass('Model_Core_Row');

class Model_Product_Media extends Model_Core_Row
{
	protected $product;
	protected $mediaPath = 'Media/Product/';

	public function __construct()
	{
		$this->setResourceClassName('Product_Media_Resource');
		parent::__construct();
	}

	public function getProduct($reload = false)
	{
		$productModel = Ccc::getModel('Product');

		if(!$this->productId)
		{
			return $productModel;
		}

		if($this->product && !$reload)
		{
			return $this->product;
		}
		
		$product = $product->fetchRow("SELECT * FROM `product` where `productId` = {$this->productId}");

		if(!$product)
		{
			return $productModel;
		}
		$this->setProduct($product);
		return $this->product;
	}

	public function setProduct(Model_Product $product)
	{
		$this->product =$product;
		return $this;
	}

	public function getImgPath()
    {
        return Ccc::getBaseUrl($this->mediaPath.$this->name);
    }
}

