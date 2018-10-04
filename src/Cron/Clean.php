<?php

namespace TDK\CustomerActionLog\Cron;

use Carbon\Carbon;

class Clean
{
    /**
     * @var \TDK\CustomerActionLog\Helper\Config
     */
    private $config;
    /**
     * @var \TDK\CustomerActionLog\Model\LogRepository
     */
    private $logRepository;

    public function __construct(
        \TDK\CustomerActionLog\Helper\Config $config,
        \TDK\CustomerActionLog\Model\LogRepository $logRepository
    ) {
        $this->config = $config;
        $this->logRepository = $logRepository;
    }

    public function execute()
    {
        $timeLine = $this->config->getLogLifeTime();
        $timeMark = Carbon::now()->subDays($timeLine)->format('Y-m-d H:i:s');
        $this->logRepository->deleteByTimeMark($timeMark);
    }
}
