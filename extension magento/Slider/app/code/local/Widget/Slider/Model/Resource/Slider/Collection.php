<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/22/2015
 * Time: 12:41 AM
 */
class Widget_Slider_Model_Resource_Slider_Collection extends Mage_Eav_Model_Entity_Collection
{
    public function _construct()
    {
        $this->_init('widget_slider/slider');
    }
}