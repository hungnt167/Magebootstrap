<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 8/17/2015
 * Time: 4:17 PM
 */
$installer = $this;
$connection->getConnection();
$installer->startSetup();
///your entity types
$entityTypes = ['datetime', 'decimal', 'int', 'text', 'varchar'];
foreach ($entityTypes AS $type) {
    $connection->addIndex(
        $this->getTable('widget_slider/Slider') . '_' . $type,
        $installer->getIdxName(
            'widget_slider/Slider',
            ['entity_id', 'attribute_id', 'store_id'],
            Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE
        ),
        ['entity_id', 'attribute_id', 'store_id'],
        ['type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE]
    );
}
$installer->endSetup();