<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/27/2015
 * Time: 8:51 AM
 */
class Sm_Megamenu_Model_Source_Type
{
    public function toOptionArray()
    {
        $helper=Mage::helper('sm_megamenu');
        return [
            ['value' => $helper::$horizontal_type, 'label' => Mage::helper('adminhtml')->__('Horizontal')],
            ['value' => $helper::$vertical_type, 'label' => Mage::helper('adminhtml')->__('Vertical')],
        ];
    }
}