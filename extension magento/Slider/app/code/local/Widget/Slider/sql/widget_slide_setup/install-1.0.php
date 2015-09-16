<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/22/2015
 * Time: 12:09 AM
 */
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
//$connection->getConnection();
$installer->startSetup();
/*
 * create entity type*/

$this->addEntityType('widget_slide', [
    'entity_model' => 'widget_slider/Slide',
    'table'        => 'widget_slider/Slide',
    ]);

/*
 * create table*/
$this->createEntityTables(
    $this->getTable('widget_slider/Slide')
    );
$this->addAttribute('widget_slide', 'title', [
    'type'         => 'varchar',
    'label'        => 'Title',
    'input'        => 'text',
    'required'     => true,
    'user_defined' => true,
    'unique'       => true,
    ]);
$this->addAttribute('widget_slide', 'image', [
    'type'         => 'text',
    'label'        => 'Image',
    'input'        => 'text',
    'required'     => true,
    'user_defined' => true,
    'unique'       => true,
    ]);
$this->addAttribute('widget_slide', 'url', [
    'type'         => 'text',
    'label'        => 'Url',
    'input'        => 'text',
    'required'     => true,
    'user_defined' => true,
    'unique'       => true,
    ]);
$this->addAttribute('widget_slide', 'slider_id', [
    'type'         => 'int',
    'label'        => 'Slider Id',
    'default'      => 1,
    'input'        => 'select',
    'user_defined' => true,
    ]);
$this->addAttribute('widget_slide', 'status', [
    'type'         => 'int',
    'label'        => 'Status',
    'default'      => 1,
    'input'        => 'select',
    'user_defined' => true,
    ]);
$this->addAttribute('widget_slide', 'position', [
    'type'         => 'int',
    'label'        => 'Position',
    'default'      => 1,
    'input'        => 'select',
    'user_defined' => true,
    ]);
//$entityTypes = ['datetime', 'decimal', 'int', 'text', 'varchar'];
//foreach ($entityTypes AS $type) {
//    $connection->addIndex(
//        $this->getTable('widget_slide/Slide') . '_' . $type,
//        $installer->getIdxName(
//            'widget_slide/Slide',
//            ['entity_id', 'attribute_id', 'store_id'],
//            Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE
//        ),
//        ['entity_id', 'attribute_id', 'store_id'],
//        ['type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE]
//    );
//}

$installer->endSetup();