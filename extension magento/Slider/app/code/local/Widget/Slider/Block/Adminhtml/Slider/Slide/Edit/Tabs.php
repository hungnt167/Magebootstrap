<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/14/2015
 * Time: 11:43 AM
 */
class Widget_Slider_Block_Adminhtml_Slider_Slide_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('slider_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('widget_slider')->__('Slide Information'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('form_section', [
            'label'   => Mage::helper('widget_slider')->__('Information Slide'),
            'title'   => Mage::helper('widget_slider')->__('Information Slide'),
            'content' => $this->getLayout()
            ->createBlock('widget-slider/adminhtml_slider_slide_edit_tab_form')
            ->toHtml(),
            ]);
        return parent::_beforeToHtml();
    }
}