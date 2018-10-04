<?php

namespace TDK\CustomerActionLog\Model\ResourceModel\Log;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use TDK\CustomerActionLog\Model\Log;
use TDK\CustomerActionLog\Model\ResourceModel\Log as LogResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Log::class, LogResource::class);
    }
}
