<?php

/**
 * Created by PhpStorm.
 * User: formation
 * Date: 10/04/17
 * Time: 16:50
 */

namespace Training\Helloworld\Observer;
 use Magento\Framework\Event\ObserverInterface;
 use Magento\Framework\Event\Observer;


class PredispatchLogUrl implements ObserverInterface
{

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;


    /**
     * PredispatchLogUrl constructor.
     * @param \Psr\Log\LoggerInterface $log
     */
    public function __construct(\Psr\Log\LoggerInterface $log)
    {
        $this->logger = $log;
    }


    /**
     * @param Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer) {

       $url = $observer->getEvent()->getRequest()->getPathInfo();
       $this->logger->debug('Current url :'.$url);
    }
}