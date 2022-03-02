<?php

namespace GiangModule\SampleModule\Cron;

use GiangModule\SampleModule\Model\ItemFactory;
use GiangModule\SampleModule\Model\Config;

class AddItem
{
    private $itemFactory;

    private $config;

    public function __construct(ItemFactory $itemFactory, Config $config)
    {
        $this->itemFactory = $itemFactory;
        $this->config = $config;
    }

    // Execute function
    public function execute()
    {
        if ($this->config->isEnabled()) {
            $this->itemFactory->create()
            ->setName('Scheduled item')
            ->setDescription('Created at' . time())
            ->save();
        }
    }
}