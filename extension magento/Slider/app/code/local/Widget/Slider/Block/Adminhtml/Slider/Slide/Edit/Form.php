<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/14/2015
 * Time: 11:35 AM
 */
class  Widget_Slider_Block_Adminhtml_Slider_Slide_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form([
            'id'      => 'edit_form',
            'action'  => $this->getUrl('*/*/save', [
                'id'        => $this->getRequest()->getParam('id'),
                'store'     => $this->getRequest()->getParam('store'),
                'slider_id' => $this->getRequest()->getParam('slider_id'),
                ]),
            'method'  => 'post',
            'enctype' => 'multipart/form-data',
            ]);

        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}