<?php

namespace GiangModule\SampleModule\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface //implement one install method
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)  
    // ModuleDataSetupInterface: setup all functions to work with database
    // ModuleContextInterface information about module
    {
        $setup->startSetup();
        
        $setup->getConnection()->insert(
            $setup->getTable('giang_sample_item'),
            [
                'name' => 'Item 1'
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('giang_sample_item'),
            [
                'name' => 'Item 2'
            ]
        );
       
        $setup->endSetup();
    }
}