<?php

namespace GiangModule\SampleModule\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $setup->getConnection()->update(
                $setup->getTable('giang_sample_item'),
                [
                    'description' => 'Default Description'
                ],
                $setup->getConnection()->quoteInto('id = ?', 1)     //condition
            );
        }
        $setup->endSetup();
    }
}