<?php

namespace TDK\CustomerActionLog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use TDK\CustomerActionLog\Model\Log;

class CustomerLoginObserver implements ObserverInterface
{
    /**
     * @var \Magento\Customer\Model\Session
     */
    private $customerSession;
    /**
     * @var \TDK\CustomerActionLog\Model\LogFactory
     */
    private $logFactory;
    /**
     * @var \TDK\CustomerActionLog\Model\LogRepository
     */
    private $logRepository;

    public function __construct(
        \Magento\Customer\Model\Session $customerSession,
        \TDK\CustomerActionLog\Model\LogFactory $logFactory,
        \TDK\CustomerActionLog\Model\LogRepository $logRepository
    ) {
        $this->customerSession = $customerSession;
        $this->logFactory = $logFactory;
        $this->logRepository = $logRepository;
    }

    /**
     * @param Observer $observer
     *
     * @return void
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function execute(Observer $observer)
    {
        if (!$this->customerSession->isLoggedIn()) {
            return;
        }

        /** @var \TDK\CustomerActionLog\Model\Log $log */
        $log = $this->logFactory->create();
        $log->addData([
            Log::FIELD_ENTITY_ID => $this->customerSession->getCustomerId(),
            Log::FIELD_ACTION => Log::ACTION_LOGIN,
        ]);
        $this->logRepository->save($log);
    }
}
