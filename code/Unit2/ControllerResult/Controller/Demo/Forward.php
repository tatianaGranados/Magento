<?php

namespace Unit2\ControllerResult\Controller\Demo;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Forward extends \Magento\Framework\App\Action\Action
{
    // {domain}/resultdemo/demo/forward
    // http://m2git.devbox/resultdemo/demo/forward
    // http://192.168.56.103/resultdemo/demo/forward
    public function execute()
    {
        $forwardResult = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_FORWARD);
//        return $forwardResult->forward('json');

        // Prueba adicional redireccionar a: /customer/account/create
        $forwardResult->setModule('customer')
        ->setController('account')
        ->forward('create');

        return $forwardResult;
    }
}
