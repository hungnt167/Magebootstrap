<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/21/2015
 * Time: 11:55 PM
 */
class Widget_Slider_Block_Adminhtml_Slider_Slide_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_objectId   = 'id';
        $this->_headerText = 'Edit';
        $this->_blockGroup = 'widget-slider';
        $this->_controller = 'adminhtml_slider_slide';
        $this->_updateButton('back', 'onclick', 'setLocation(\'' . $this->getUrl('*/*/index/id/' .
            $this->getRequest()->getParam('slider_id')) . '\')');
        $this->_updateButton('delete', 'onclick', 'setLocation(\'' . $this->getUrl('*/*/delete/slider_id/' .
            $this->getRequest()->getParam('slider_id') . "/id/" .
            $this->getRequest()->getParam('id')) . '\')');
        $this->_updateButton('save', 'label', Mage::helper('widget_slider')->__('Save'));
        $this->_addButton('saveandcontinue', [
            'label'   => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class'   => 'save',
            ], -100);

        $this->_formScripts[]
        = "
        function saveAndContinueEdit(){
           editForm.submit($('edit_form').action+'back/edit/');
       }
       ";
   }
}