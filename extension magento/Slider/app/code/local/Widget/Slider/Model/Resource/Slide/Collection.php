<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/22/2015
 * Time: 12:58 AM
 */
class Widget_Slider_Model_Resource_Slide_Collection extends Mage_Eav_Model_Entity_Collection
{
    /**
     * Initialize resource
     */
    public function _construct()
    {
        $this->_init('widget_slider/slide');
    }

}