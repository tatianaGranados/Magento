<?php


namespace Unit2\ControllerResult\Controller\Demo;


use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Page extends \Magento\Framework\App\Action\Action
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

        //{domain}/resultdemo/demo/page
        //http://m2git.devbox/resuldemo/demo/page
        //http://192.168.56.103/resultdemo/demo/page
    }

    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page  $pageResult */
        $pageResult = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        $pageResult->getConfig()->getTitle()->set('result Page');
        return $pageResult;
        //var_dump(__METHOD__);
        //return $this->pageFactory->create();
    }
}
