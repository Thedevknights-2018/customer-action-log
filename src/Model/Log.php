<?php

namespace TDK\CustomerActionLog\Model;

use Magento\Framework\Model\AbstractModel;
use TDK\CustomerActionLog\Api\Data\LogInterface;
use TDK\CustomerActionLog\Model\ResourceModel\Log as LogResource;

class Log extends AbstractModel implements LogInterface
{
    const TABLE = 'tdk_customeractionlog_log';

    const FIELD_ID = 'log_id';
    const FIELD_ENTITY_ID = 'entity_id';
    const FIELD_ACTION = 'action';
    const FIELD_CREATED_AT = 'created_at';
    const FIELD_UPDATED_AT = 'updated_at';

    const ACTION_LOGIN = 1;

    protected function _construct()
    {
        $this->_init(LogResource::class);
    }
}
