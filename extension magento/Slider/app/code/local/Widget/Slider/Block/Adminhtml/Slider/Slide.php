<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/21/2015
 * Time: 11:54 PM
 */
class Widget_Slider_Block_Adminhtml_Slider_Slide extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_controller = 'adminhtml_slider_slide';
        $this->_blockGroup = 'widget-slider';
        $this->_headerText = Mage::helper('widget_slider')->__('Slide Manage');
        $this->updateButton('add', 'onclick', 'setLocation(\'' . $this->getUrl('*/slide/new/slider_id/' .
            $this->getRequest()->getParam('id')) . '\')');
        $this->addButton('backtoslider', [
            'label'   => Mage::helper('adminhtml')->__('Back to Slider'),
            'onclick' => 'setLocation(\'' . $this->getUrl('*/slider/index') . '\')',
            'class'   => 'back',
            ], -100);
    }
}