<?php

namespace TDK\CustomerActionLog\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Config extends AbstractHelper
{
    const XPATH_LOG_LIFE_TIME = 'tdk_customer_action_log/general/log_life_time';

    public function getLogLifeTime()
    {
        return $this->scopeConfig->getValue(self::XPATH_LOG_LIFE_TIME);
    }
}
