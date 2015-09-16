<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/28/2015
 * Time: 2:18 PM
 */
class Widget_Slider_Model_Source_SlideQty
{
    public function toOptionArray()
    {
        return [
            ['value' => 0, 'label' => Mage::helper('adminhtml')->__('All Slides')],
            ['value' => 5, 'label' => Mage::helper('adminhtml')->__('5 Slides')],
            ['value' => 10, 'label' => Mage::helper('adminhtml')->__('10 Slides')],
            ['value' => 15, 'label' => Mage::helper('adminhtml')->__('15 Slides')],
            ['value' => 20, 'label' => Mage::helper('adminhtml')->__('20 Slides')],
            ['value' => 25, 'label' => Mage::helper('adminhtml')->__('25 Slides')],
        ];
    }
}