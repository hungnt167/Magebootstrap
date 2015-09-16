<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/21/2015
 * Time: 11:51 PM
 */
class Widget_Slider_Block_Adminhtml_Slider extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct()
    {

        $this->_blockGroup = 'widget-slider';
        $this->_controller = 'adminhtml_slider';
        $this->_headerText = Mage::helper('widget_slider')->__('Slider manage');
    }

}