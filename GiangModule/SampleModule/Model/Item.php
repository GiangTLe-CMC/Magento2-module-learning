<?php

namespace GiangModule\SampleModule\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\GiangModule\SampleModule\Model\ResourceModel\Item::class);
    }
}