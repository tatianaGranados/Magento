<?php


namespace Unit2\ControllerResult\Controller\Demo;


use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Redirect extends \Magento\Framework\App\Action\Action
{
         //{domain}/resultdemo/demo/json
        //http://m2git.devbox/resuldemo/demo/json
        //http://192.168.56.103/resultdemo/demo/json


    public function execute()
    {

        $redirectResult = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        return $redirectResult->setPath('custome/account/login');

    }
}
