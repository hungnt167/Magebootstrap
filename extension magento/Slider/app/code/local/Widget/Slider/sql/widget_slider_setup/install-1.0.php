<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/22/2015
 * Time: 12:09 AM
 */
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
//die(dfgd);
//$connection->getConnection();
$installer->startSetup();
/*
 * create entity type*/

$this->addEntityType('widget_slider', [
    'entity_model' => 'widget_slider/Slider',
    'table'        => 'widget_slider/Slider',
]);

/*
 * create table*/
$this->createEntityTables(
    $this->getTable('widget_slider/Slider')
);
$this->addAttribute('widget_slider', 'name', [
    'type'         => 'varchar',
    'label'        => 'Name',
    'input'        => 'text',
    'required'     => true,
    'user_defined' => true,
    'unique'       => true,
]);
$this->addAttribute('widget_slider', 'store', [
    'type'         => 'int',
    'label'        => 'Store',
    'default'      => 1,
    'input'        => 'select',
    'user_defined' => true,
]);
$this->addAttribute('widget_slider', 'type', [
    'type'         => 'int',
    'label'        => 'Type',
    'default'      => 1,
    'input'        => 'select',
    'user_defined' => true,
]);
$this->addAttribute('widget_slider', 'status', [
    'type'         => 'int',
    'label'        => 'Status',
    'default'      => 1,
    'input'        => 'select',
    'user_defined' => true,
]);
//$entityTypes = ['datetime', 'decimal', 'int', 'text', 'varchar'];
//foreach ($entityTypes AS $type) {
//    $connection->addIndex(
//        $this->getTable('widget_slider/Slider') . '_' . $type,
//        $installer->getIdxName(
//            'widget_slider/Slider',
//            ['entity_id', 'attribute_id', 'store_id'],
//            Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE
//        ),
//        ['entity_id', 'attribute_id', 'store_id'],
//        ['type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE]
//    );
//}

$installer->endSetup();