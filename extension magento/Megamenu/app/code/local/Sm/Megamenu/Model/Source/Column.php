<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/28/2015
 * Time: 11:13 AM
 */
class Sm_Megamenu_Model_Source_Column
{
    public function toOptionArray()
    {
        return [
            ['value' => 1, 'label' => Mage::helper('adminhtml')->__('1 Column')],
            ['value' => 2, 'label' => Mage::helper('adminhtml')->__('2 Columns')],
            ['value' => 3, 'label' => Mage::helper('adminhtml')->__('3 Columns')],
            ['value' => 4, 'label' => Mage::helper('adminhtml')->__('4 Columns')],
            ['value' => 5, 'label' => Mage::helper('adminhtml')->__('5 Columns')],
            ['value' => 6, 'label' => Mage::helper('adminhtml')->__('6 Columns')],
        ];
    }
}