<?php


namespace Tati\Observer\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddressObserver implements ObserverInterface
{

    public function execute(Observer $observer)
    {
        //se capturara todos los valores de addres
        $data = $observer->getEvent()->getCustomerAddress()->getData();
        //var_dump($data);die;
        $writer= new \Zend\Log\Writer\Stream(BP.'/var/log/myaddress.log');
        $logger = new \Zend\Log\Logger();
        $logger=addWriter($writer);

        $logger->info("INFO: ".$data['telephone']);
    }
}
