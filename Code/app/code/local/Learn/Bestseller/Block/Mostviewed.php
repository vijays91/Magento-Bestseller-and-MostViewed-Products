<?php
class Learn_Bestseller_Block_Mostviewed extends Mage_Core_Block_Template
{
    /*
        Get Mostviewed Products
    */
    public function getMostviewedItems($limt = 5)
    {
        $storeId = Mage::app()->getStore()->getId();
        
        $products = Mage::getResourceModel('reports/product_collection')
            ->addAttributeToSelect('*')
            ->addMinimalPrice()
            ->addUrlRewrite()
            ->addTaxPercents()          
            ->addAttributeToSelect(array('name', 'price', 'small_image')) //edit to suit tastes
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->addViewsCount();  
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