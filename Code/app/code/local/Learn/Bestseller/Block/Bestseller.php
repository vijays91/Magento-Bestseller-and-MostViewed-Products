<?php
class Learn_Bestseller_Block_Bestseller extends Mage_Core_Block_Template
{
    /*
        Get Bestseller Products
    */
    public function getBestsellerItems($limt = 5)
    {
        $storeId = Mage::app()->getStore()->getId();
        
        $products = Mage::getResourceModel('reports/product_collection')
            ->addOrderedQty()
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image'))
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->setOrder('ordered_qty', 'desc'); // most best sellers on top
            
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
        $products->getSelect()->limit($limt);
        
        /* echo $products->getSelect(); */
        
        return $products;
    }
    
    public function getProductUrl($product)
    {
        if ($product instanceof Mage_Catalog_Model_Product) {
            return $product->getProductUrl();
        }
        elseif (is_numeric($product)) {
            return Mage::getModel('catalog/product')->load($product)->getProductUrl();
        }
        return false;
    }
}