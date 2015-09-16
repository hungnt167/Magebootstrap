<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/21/2015
 * Time: 11:50 PM
 */
class Widget_Slider_Block_Slider extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface
{
    const PATH_TEMPLATE = 'widget/slider/';
    const PATH_SKIN_CSS_LIB = 'css/widget/slider/slider.css';
    const PATH_SKIN_JS_LIB = 'js/widget/slider/jssor.js';
    const PATH_SKIN_JS_LIB1 = 'js/widget/slider/jssor.slider.js';

    protected $_parameter = [];
    protected $_templateId = '';

    public function getSlider()
    {
        $para   = $this->getParameter();
        $slider = Mage::helper('widget_slider')->getSliderData(
            $para['slider'],
            $para['limit']
        );
        return $slider;
    }

    public function getParameter()
    {
        return $this->_parameter;

    }

    protected function _prepareLayout()
    {
        $helper = Mage::helper('widget_slider');
        if (Mage::getStoreConfig($helper::PATH_CONFIG_ENABLE_EXTENSION)) {
            $this->_parameter  = $this->getData();
            $this->_templateId = Mage::helper('widget_slider')
                ->getTypeSlider($this->_parameter['slider']);
            $templateList      = Mage::helper('widget_slider')->getTypes();
            $head              = Mage::app()->getLayout()->getBlock('head');
            $head->addItem('skin_css', self::PATH_SKIN_CSS_LIB);
            $head->addItem('skin_js', self::PATH_SKIN_JS_LIB);
            $head->addItem('skin_js', self::PATH_SKIN_JS_LIB1);
            //set template  with each type
            $templateName = strtolower($templateList[$this->_templateId]);
            $template = self::PATH_TEMPLATE . $templateName . '.phtml';
            $this->setTemplate($template);
        }
    }
}