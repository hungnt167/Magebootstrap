<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/14/2015
 * Time: 11:19 AM
 */
class Widget_Slider_Block_Adminhtml_Slider_Slide_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    protected function _prepareForm()
    {
        $helper = Mage::helper('widget_slider');
        $form   = new Varien_Data_Form();
        $this->setForm($form);

        $data     = Mage::registry('slide')->getData();
        $fieldset = $form->addFieldset('slider_form', [
            'legend' => $helper->__('Slide information'),
            ]);


        /*Edit truong kieu text*/
        $fieldset->addField('title', 'text', [
            'label' => $helper->__('Title'),
            'name'  => 'title',
            ]);
        $fieldset->addField('url', 'text', [
            'label' => $helper->__('Link'),
            'name'  => 'url',
            'value' =>'http://',
            ])
        ;
        /*Edit truong kieu select*/
        $fieldset->addField('position', 'select', [
            'label'  => $helper->__('Position'),
            'values' => $helper->getPositionList(),
            'name'   => 'position',
            ]);
        $this->_addElementTypes($fieldset);
        $fieldset->addField('image', 'image', [

            'name'     => 'image',
            'label'    => $helper->__('Image'),

            'title'    => $helper->__('Image'),
            'required' => true,

            'disabled' => false]);

//        /*Edit truong kieu select*/
        $fieldset->addField('status', 'select', [
            'label'    => $helper->__('Status'),
            'name'     => 'status',
            'onclick'  => "",
            'onchange' => "",
            'values'   => $helper->getStatuses(),
            'disabled' => false,
            'readonly' => false,
            'tabindex' => 1,
            ]);

        $form->setValues($data);
        return parent::_prepareForm();
    }

    protected function _getAdditionalElementTypes()

    {
        return [

        'image'    => Mage::getConfig()->getBlockClassName('widget-slider/adminhtml_slider_slide_edit_form_element_image'),
        ];

    }

    /**
     * Can show tab in tabs
     * @return boolean
     */
    public function canShowTab()
    {
        // TODO: Implement canShowTab() method.
        return true;
    }

    /**
     * Return Tab label
     * @return string
     */
    public function getTabLabel()
    {
        // TODO: Implement getTabLabel() method.
        return Mage::helper('widget_slider')->__('Slide');
    }

    /**
     * Return Tab title
     * @return string
     */
    public function getTabTitle()
    {
        // TODO: Implement getTabTitle() method.
        return Mage::helper('widget_slider')->__('Slide');
    }

    /**
     * Tab is hidden
     * @return boolean
     */
    public function isHidden()
    {
        // TODO: Implement isHidden() method.
        return false;
    }

}