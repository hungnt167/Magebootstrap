<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/28/2015
 * Time: 1:54 PM
 */
class Widget_Slider_Model_Source_Speed
{
    public function toOptionArray()
    {
        return [
            ['value' => 1000, 'label' => Mage::helper('adminhtml')->__('1s')],
            ['value' => 2000, 'label' => Mage::helper('adminhtml')->__('2s')],
            ['value' => 3000, 'label' => Mage::helper('adminhtml')->__('3s')],
            ['value' => 4000, 'label' => Mage::helper('adminhtml')->__('4s')],
        ];
    }
}