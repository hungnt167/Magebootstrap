<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/21/2015
 * Time: 11:55 PM
 */
class Widget_Slider_Block_Adminhtml_Slider_Slide_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    private $_currentSlider;
    public $_statuses = [];

    /**
     * @return mixed
     */
    public function getCurrentSlider()
    {
        return $this->_currentSlider = Mage::app()->getRequest()->getParam('id');
    }

    public function _construct()
    {
        $this->_statuses = Mage::helper('widget_slider')->getStatuses();
        $this->getCurrentSlider();
        $this->setId('slider_list_grid');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('widget_slider/slide')->getCollection()
        ->addAttributeToSelect('*')
        ->addAttributeToFilter('slider_id', $this->_currentSlider);;
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $helper=Mage::helper('widget_slider');
        $this->addColumn('entity_id', [
            'header' => $helper->__('Id'),
            'align'  => 'left',
            'width'  => '50px',
            'index'  => 'entity_id',
            ]);
        $this->addColumn('position', [
            'header' => $helper->__('Position'),
            'width'  => '50px',
            'align'  => 'left',
            'index'  => 'position',
            ]);
        $this->addColumn('image', [
            'header'   => $helper->__('Image'),
            'align'    => 'left',
            'index'    => 'image',
            'renderer' => 'widget-slider/adminhtml_slider_renderer_image',
            ]);
        $this->addColumn('title', [
            'header' => $helper->__('Title'),
            'align'  => 'left',
            'index'  => 'title',
            ]);
        $this->addColumn('url', [
            'header' => $helper->__('Link'),
            'align'  => 'left',
            'index'  => 'url',
            ]);

        $this->addColumn('status', [
            'header'  => $helper->__('Status'),
            'align'   => 'left',
            'width'   => '80px',
            'index'   => 'status',
            'type'    => 'options',
            'options' => $this->_statuses,
            ]);
        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $helper=Mage::helper('widget_slider');
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('slide');
        $this->getMassactionBlock()->addItem('delete', [
            'label'   => $helper->__('Delete'),
            'url'     => $this->getUrl('*/*/massDelete', ['slider_id' => $this->_currentSlider]),
            'confirm' => $helper->__('Are you sure?'),
            ]);
        /*mass change status*/

//        array_unshift($statuses, array('label' => '', 'value' => ''));
        $this->getMassactionBlock()->addItem('status', [
            'label'      => $helper->__('Change status'),
            'url'        => $this->getUrl('*/*/massStatus', ['_current' => true, 'slider_id' => $this->_currentSlider]),
            'additional' => [
            'visibility' => [
            'name'   => 'status',
            'type'   => 'select',
            'class'  => 'required-entry',
            'label'  => $helper->__('Status'),
            'values' => $this->_statuses,
            ]],
            ]);


        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['slider_id' => $this->_currentSlider, 'id' => $row->getId()]);
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }

}