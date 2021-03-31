<?php


namespace Unit2\ControllerResult\Controller\Demo;


use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Json extends \Magento\Framework\App\Action\Action
{
         //{domain}/resultdemo/demo/json
        //http://m2git.devbox/resuldemo/demo/json
        //http://192.168.56.103/resultdemo/demo/json


    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Raw  $jsonResult */
        $jsonResult = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON);
        return $jsonResult->setData(["Hello World"]);;
        //var_dump(__METHOD__);
        //return $this->pageFactory->create();
    }
}
