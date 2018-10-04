<?php

namespace TDK\CustomerActionLog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use TDK\CustomerActionLog\Api\Data\LogInterface;

interface LogRepositoryInterface
{
    public function save(LogInterface $page);

    public function getById($id);

    public function getList(SearchCriteriaInterface $criteria);

    public function delete(LogInterface $page);

    public function deleteById($id);

    public function deleteByTimeMark($timeMark);
}
