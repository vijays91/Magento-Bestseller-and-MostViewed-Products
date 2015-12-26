<?php
class Learn_Bestseller_Model_Dropdown_Position extends Mage_Core_Model_Abstract
{
	public function toOptionArray()
	{
		return array(
			array(
				'value' => '1',
				'label' => 'Left',
			),
			array(
				'value' => '2',
				'label' => 'Right',
			),
		);
	}
}