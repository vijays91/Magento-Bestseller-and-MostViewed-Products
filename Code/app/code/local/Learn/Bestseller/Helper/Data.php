<?php
class Learn_Bestseller_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_BESELL_PRUD_ENABLE     = 'bestseller_tab/bestseller_setting/bestseller_active';
    const XML_PATH_BESELL_PRUD_POSITION   = 'bestseller_tab/bestseller_setting/bestseller_position';
    const XML_PATH_BESELL_PRUD_TITLE   	  = 'bestseller_tab/bestseller_setting/bestseller_title';
    const XML_PATH_BESELL_PRUD_DISPLAY_COUNT = 'bestseller_tab/bestseller_setting/bestseller_display_count';
    
	
	public function conf($code, $store = null) {
        return Mage::getStoreConfig($code, $store);
    }
	
	public function bestseller_enable($store) {
		return $this->conf(self::XML_PATH_BESELL_PRUD_ENABLE, $store);
	}
    
	public function bestseller_position($store) {
		return $this->conf(self::XML_PATH_BESELL_PRUD_POSITION, $store);
	}
    
    public function bestseller_title() {
		return $this->conf(self::XML_PATH_BESELL_PRUD_TITLE, $store);
	}
        
    public function bestseller_display_count() {
		return $this->conf(self::XML_PATH_BESELL_PRUD_DISPLAY_COUNT, $store);
	}
    
	public function postion_left() {
		if(self::bestseller_enable() == 1 && self::bestseller_position() == 1) {
			return "bestseller/bestseller.phtml";
		}
		return false;
	}
    
	public function postion_right() {
		if(self::bestseller_enable() == 1 && self::bestseller_position() == 2) {
			return "bestseller/bestseller.phtml";
		}
		return false;
	}
	
}