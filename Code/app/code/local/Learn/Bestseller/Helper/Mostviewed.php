<?php
class Learn_Bestseller_Helper_Mostviewed extends Mage_Core_Helper_Abstract
{
    const XML_PATH_MOST_VIEWED_ENABLE     = 'mostviewed_tab/mostviewed_setting/mostviewed_active';
    const XML_PATH_MOST_VIEWED_POSITION   = 'mostviewed_tab/mostviewed_setting/mostviewed_position';
    const XML_PATH_MOST_VIEWED_TITLE   	  = 'mostviewed_tab/mostviewed_setting/mostviewed_title';
    const XML_PATH_MOST_VIEWED_DISPLAY_COUNT = 'mostviewed_tab/mostviewed_setting/mostviewed_display_count';
    
	
	public function conf($code, $store = null) {
        return Mage::getStoreConfig($code, $store);
    }
	
	public function mostviewed_enable($store) {
		return $this->conf(self::XML_PATH_MOST_VIEWED_ENABLE, $store);
	}
    
	public function mostviewed_position($store) {
		return $this->conf(self::XML_PATH_MOST_VIEWED_POSITION, $store);
	}
    
    public function mostviewed_title() {
		return $this->conf(self::XML_PATH_MOST_VIEWED_TITLE, $store);
	}
        
    public function mostviewed_display_count() {
		return $this->conf(self::XML_PATH_MOST_VIEWED_DISPLAY_COUNT, $store);
	}
    
	public function postion_left() {
		if(self::mostviewed_enable() == 1 && self::mostviewed_position() == 1) {
			return "bestseller/mostviewed.phtml";
		}
		return false;
	}
    
	public function postion_right() {
		if(self::mostviewed_enable() == 1 && self::mostviewed_position() == 2) {
			return "bestseller/mostviewed.phtml";
		}
		return false;
	}
	
}