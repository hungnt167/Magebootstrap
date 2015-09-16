<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 9/1/2015
 * Time: 9:17 AM
 */
class Widget_Slider_Model_Source_Width
{
    public function toOptionArray()
    {
        return [
            ['value' => 1198, 'label' => Mage::helper('adminhtml')->__('100%')],
            ['value' => 719, 'label' => Mage::helper('adminhtml')->__('60%')],
            ['value' => 599, 'label' => Mage::helper('adminhtml')->__('50%')],
        ];
    }
}