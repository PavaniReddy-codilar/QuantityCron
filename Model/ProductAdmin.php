<?php

namespace Codilar\ProductAdmin\Model;

use Magento\Framework\Model\AbstractModel;
use Codilar\ProductAdmin\Model\ResourceModel\ProductAdmin as ResourceModel;

class ProductAdmin extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}