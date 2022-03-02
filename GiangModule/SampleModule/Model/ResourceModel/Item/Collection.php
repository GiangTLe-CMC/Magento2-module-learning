<?php

namespace GiangModule\SampleModule\Model\ResourceModel\Item;

use GiangModule\SampleModule\Model\Item;
use GiangModule\SampleModule\Model\ResourceModel\Item as ItemResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;


class Collection extends AbstractCollection
{
    protected $_idFieldName ='id';

    protected function _construct()
    {
        $this->_init(Item::class, ItemResource::class);
    }
}