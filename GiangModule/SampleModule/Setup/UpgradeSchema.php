<?php

namespace GiangModule\SampleModule\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface //implement one install method
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)  
    // SchemaSetupInterface: setup all functions to work with db
    // ModuleContextInterface information about module
    {
        $setup->startSetup();
        
        if (version_compare($context->getVersion(), '1.0.1', '<')) {    //if the version is < 1.0.1 then the script should run
                                                                        //if the version is > 1.0.1 the script already run, we do not have to run again
            $setup->getConnection()->addColumn(
                $setup->getTable('giang_sample_item'),
                'description',
                [
                    'type' => Table::TYPE_TEXT,
                    'nullable' => true,
                    'comment' => 'Item Description'
                ]
            );                                                                                                      
        }
        if (version_compare($context->getVersion(), '1.0.2', '<')) {    //if the version is < 1.0.1 then the script should run
            //if the version is > 1.0.1 the script already run, we do not have to run again
            $setup->getConnection()->addColumn(
                $setup->getTable('sales_order_grid'),
                'base_tax_amount',
                [
                    'type' => Table::TYPE_DECIMAL,
                    'comment' => 'Base Tax Amount'
                ]
            );                                                                                                      
        }
            
        $setup->endSetup();
    }
}