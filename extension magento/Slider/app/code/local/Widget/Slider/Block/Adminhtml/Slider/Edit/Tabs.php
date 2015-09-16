<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/23/2015
 * Time: 12:10 PM
 */
class Widget_Slider_Block_Adminhtml_Slider_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('slider_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('widget_slider')->__('Slider Information'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('form_general_section', [
            'label'   => Mage::helper('widget_slider')->__('General'),
            'title'   => Mage::helper('widget_slider')->__('General'),
            'content' => $this->getLayout()
            ->createBlock('widget-slider/adminhtml_slider_edit_tab_general')
            ->toHtml(),
            ]);
        return parent::_beforeToHtml();
    }

}