<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/22/2015
 * Time: 12:59 AM
 */
class Widget_Slider_Model_Resource_Slide extends Mage_Eav_Model_Entity_Abstract
{
    public function _construct()
    {
        $resource = Mage::getSingleton('core/resource');
        $this->setType('widget_slide');
        $this->setConnection(
            $resource->getConnection('widget_slider_read'),
            $resource->getConnection('widget_slider_write')
            );
    }

    protected function _updateAttribute($object, $attribute, $valueId, $value)
    {
        $table = $attribute->getBackend()->getTable();
        if (!isset($this->_attributeValuesToSave[$table])) {
            $this->_attributeValuesToSave[$table] = [];
        }

        $entityIdField = $attribute->getBackend()->getEntityIdField();

        $data = [
        'entity_type_id' => $object->getEntityTypeId(),
        $entityIdField   => $object->getId(),
        'attribute_id'   => $attribute->getId(),
        'value'          => $this->_prepareValueForSave($value, $attribute),
        ];
        if ($valueId) {
            $data['value_id'] = $valueId;
        }

        $this->_attributeValuesToSave[$table][] = $data;

        return $this;
    }
}