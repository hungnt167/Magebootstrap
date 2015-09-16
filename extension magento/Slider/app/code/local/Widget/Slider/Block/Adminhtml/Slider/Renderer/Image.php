<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/23/2015
 * Time: 1:30 PM
 */
class Widget_Slider_Block_Adminhtml_Slider_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
	public function render(Varien_Object $row)
	{
		$val = Mage::helper('widget_slider/image')->getBaseUrl() . '/' . $row->getImage();
		$out = "<img src=" . $val . " height='100px'/>";
		return $out;
	}
}