<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/23/2015
 * Time: 5:41 PM
 */
class Widget_Slider_Model_Source_Slider
{
    protected $_allSlider = [];

    public function getAllSlider()
    {
        $collection = Mage::getModel('widget_slider/slider')
        ->getCollection()
        ->addAttributeToSelect('*');;
        foreach ($collection as $k => $slider) {
            $this->_allSlider[] = [
            'value' => $slider->getId(),
            'label' => $slider->getName(),
            ];
        }
        return $this->_allSlider;
    }

    public function toOptionArray()
    {
        return $this->getAllSlider();
    }
}