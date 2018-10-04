<?php

namespace TDK\CustomerActionLog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use TDK\CustomerActionLog\Model\Log as LogModel;

class Log extends AbstractDb
{
    protected function _construct()
    {
        $this->_init(LogModel::TABLE, 'log_id');
    }
}
