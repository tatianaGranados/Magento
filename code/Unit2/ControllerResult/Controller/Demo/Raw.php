<?php


namespace Unit2\ControllerResult\Controller\Demo;


use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Raw extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    private $pageFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;

        //{domain}/resultdemo/demo/raw
        //http://m2git.devbox/resuldemo/demo/raw
        //http://192.168.56.103/resultdemo/demo/raw
    }

    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Raw  $pageResult */
        $pageRaw = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        $pageRaw->getConfig()->getTitle()->set('Hello World');
        return $pageRaw;
        //var_dump(__METHOD__);
        //return $this->pageFactory->create();
    }
}

