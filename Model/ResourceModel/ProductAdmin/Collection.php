<?php

namespace Codilar\ProductAdmin\Model\ResourceModel\ProductAdmin;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Codilar\ProductAdmin\Model\ProductAdmin as Model;
use Codilar\ProductAdmin\Model\ResourceModel\ProductAdmin as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}