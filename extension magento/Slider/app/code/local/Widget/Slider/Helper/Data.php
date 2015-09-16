<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/22/2015
 * Time: 12:12 AM
 */
class Widget_Slider_Helper_Data extends Mage_Core_Helper_Abstract
{
    const PATH_CONFIG_ENABLE_EXTENSION = 'widget_slider_section/general/enabled';

    const SHOW_ALL = 0;
    public
    $_stores = ['0' => 'All'],
    $_types
    = [
    '0' => 'Default',
    '1' => 'Thumbnail',
    '2' => 'Vertical-thumbnail',
    '3' => 'Vertical',
    ],
    $_statuses
    = [
    '1' => 'Active',
    '0' => 'Inactive'];


    public function getSliderData($slider_id, $limit = 100)
    {
        $storeId = Mage::app()->getStore()->getId();
        $slider  = Mage::getModel('widget_slider/slider')->load($slider_id);
        if ($slider->getStore() != $storeId && $slider->getStore() != self::SHOW_ALL) return null;
        if ($limit != '') {
            $collection = Mage::getModel('widget_slider/slide')->getCollection()
            ->addAttributeToSelect('*')
            ->addFieldToFilter('slider_id', ['eq' => $slider_id])
            ->addAttributeToFilter('status', ['eq' => 1])
            ->addAttributeToSort('position', 'asc')
            ->setPageSize($limit);
            return $collection;
        }
        $collection = Mage::getModel('widget_slider/slide')->getCollection()
        ->addAttributeToSelect('*')
        ->addFieldToFilter('slider_id', ['eq' => $slider_id])
        ->addAttributeToFilter('status', ['eq' => 1])
        ->addAttributeToSort('position', 'asc');

        return $collection;
    }

    public function getPositionList()
    {
        $slider_id    = Mage::app()->getRequest()->getParam('slider_id');
        $sliders      = $this->getSliderData($slider_id, $limit = 10);
        $positionList = [];
        $count        = 1;
        foreach ($sliders as $slide) {
            $positionList[$slide->getPosition()] = $slide->getPosition();
            $count++;
        }
        return $positionList;
    }

    public function getStores()
    {
        $stores = Mage::app()->getStores();
        foreach ($stores as $k => $store) {
            $this->_stores[$k] = $store->getName();
        }
        return $this->_stores;
    }

    public function getTypes()
    {
        return $this->_types;
    }

    public function getStatuses()
    {
        return $this->_statuses;
    }

    public function getTypeSlider($sliderId)
    {
        $model = Mage::getModel('widget_slider/slider')->load($sliderId);
        return $model->getType();
    }

}