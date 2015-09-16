<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/14/2015
 * Time: 1:17 PM
 */
class Widget_Slider_Block_Adminhtml_Slider_Slide_Edit_Form_Element_Image extends Varien_Data_Form_Element_Image
{
    protected function _getUrl()
    {
        $url = false;
        if ($this->getValue()) {
            $url = Mage::helper('widget_slider/image')->getBaseUrl() . '/' . $this->getValue();
        }
        return $url;
    }
}