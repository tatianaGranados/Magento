<?php


namespace Unit3\TextBlockDemo\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{

    public function execute()
    {
        //var_dump(__METHOD__); die;
        //opcion 1
        $layout= $this->_view->getLayout();

        //opcion 2
       // $pageResult = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        //$layout= $pageResult->getLayout();

        /** @var \Magento\Framework\View\Element\Text $textBlock */
        $textBlock=$layout->createBlock(\Magento\Framework\View\Element\Text::class);
        $textBlock->setText('TextBlock: herllo world');
        $textBlockOut =$textBlock->toHtml();

        $rawResult= $this->resultFactory->create(ResultFactory::TYPE_RAW);
        return $rawResult->setContents($textBlockOut);
    }
}
