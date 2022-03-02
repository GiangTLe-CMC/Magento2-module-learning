<?php

namespace GiangModule\SampleModule\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface //implement one install method
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)  
    // SchemaSetupInterface: setup all functions to work with db
    // ModuleContextInterface information about module
    {
        $setup->startSetup();
        
        $table = $setup->getConnection()->newTable(
            $setup->getTable('giang_sample_item')
        )->addColumn(
            'id',                                                               //Col name
            Table::TYPE_INTEGER,                                                //Col type
            null,                                                               //Col size of field, default is null
            ['identity' => true, 'nullable' => false, 'primary' => true],       //Col options 
            'Item ID'                                                           //Col comment
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Item Name' 
        )->addIndex(                                                             //add index_name for table 
            $setup->getIdxName('giang_sample_item', ['name']),                  // (database name, array of fields)
            ['name']    
        )->setComment(
            'Sample Items'
        );

        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}