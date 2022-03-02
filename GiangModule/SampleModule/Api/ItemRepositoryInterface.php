<?php

namespace GiangModule\SampleModule\Api;

interface ItemRepositoryInterface
{
    /**
     * @return \GiangModule\SampleModule\Api\Data\ItemInterface[]
     */
    public function getList();
}