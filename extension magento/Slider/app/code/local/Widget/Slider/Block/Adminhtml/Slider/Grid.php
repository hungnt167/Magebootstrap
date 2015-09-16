<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/21/2015
 * Time: 11:51 PM
 */
class Widget_Slider_Block_Adminhtml_Slider_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Internal constructor, that is called from real constructor
     */
    protected function _construct()
    {
        $this->setId('widget_slider_list_grid');
        $this->setUseAjax(true);
        $this->setSaveParametersInSession(true);
        parent::_construct(); // TODO: Change the autogenerated stub
    }

    protected function _prepareGrid()
    {
        return parent::_prepareGrid(); // TODO: Change the autogenerated stub
    }


    /**
     * Prepare grid collection object
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('widget_slider/slider')->getCollection()->addAttributeToSelect('*');


        $this->setCollection($collection);
        return parent::_prepareCollection(); // TODO: Change the autogenerated stub
    }

    protected function _prepareColumns()
    {
        $helper     = Mage::helper('widget_slider');
        $storeList  = $helper->getStores();
        $typeList   = $helper->getTypes();
        $statusList = $helper->getStatuses();

        $this->addColumn('entity_id', [
            'header' => $helper->__('Id'),
            'width'  => '50px',
            'align'  => 'left',
            'index'  => 'entity_id',
            ]);
        $this->addColumn('name', [
            'header' => $helper->__('Name Slider'),
            'align'  => 'left',
            'index'  => 'name',
            ]);
        $this->addColumn('store', [
            'header'  => $helper->__('In Store'),
            'align'   => 'left',
            'index'   => 'store',
            'type'    => 'options',
            'options' => $storeList,
            ]);
        $this->addColumn('type', [
            'header'  => $helper->__('Type'),
            'align'   => 'left',
            'index'   => 'type',
            'type'    => 'options',
            'options' => $typeList,
            ]);
        $this->addColumn('status', [
            'header'  => $helper->__('Status'),
            'align'   => 'left',
            'index'   => 'status',
            'type'    => 'options',
            'options' => $statusList,
            ]);
        $this->addColumn('action',
            [
            'header'   => $helper->__('Action'),
            'width'    => '100px',
            'type'     => 'action',
            'getter'   => 'getId',
            'actions'  => [
            [
            'caption' => $helper->__('Edit'),
            'url'     => ['base' => '*/*/edit'],
            'field'   => 'id',
            ],
            ],
            'filter'   => false,
            'sortable' => false,
            'index'    => 'slider',
            ]);
        $this->addColumn('view slider',
            [
            'header'   => $helper->__('View slider'),
            'width'    => '100px',
            'type'     => 'action',
            'getter'   => 'getId',
            'actions'  => [
            [
            'caption' => $helper->__('View Slider'),
            'url'     => ['base' => '*/slide/index'],
            'field'   => 'id',
            ],
            ],
            'filter'   => false,
            'sortable' => false,
            'index'    => 'slider',
            ]);


        return parent::_prepareColumns(); // TODO: Change the autogenerated stub
    }

    protected function _prepareMassaction()
    {
        $helper = Mage::helper('widget_slider');
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('slider');
        $this->getMassactionBlock()->addItem('delete', [
            'label'   => $helper->__('Delete'),
            'url'     => $this->getUrl('*/*/massDelete'),
            'confirm' => $helper->__('Are you sure?'),
            ]);


        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['id' => $row->getId()]);
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }


}