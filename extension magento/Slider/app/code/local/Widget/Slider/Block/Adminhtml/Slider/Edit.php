<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/23/2015
 * Time: 12:07 PM
 */
class Widget_Slider_Block_Adminhtml_Slider_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_objectId   = 'id';
        $this->_headerText = 'Edit';
        $this->_blockGroup = 'widget-slider';
        $this->_controller = 'adminhtml_slider';

        $this->_updateButton('save', 'label', Mage::helper('widget_slider')->__('Save'));
        $this->_updateButton('delete', 'label', Mage::helper('widget_slider')->__('Delete'));

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