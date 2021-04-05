<?php


namespace Tati\CreateLayoutHello\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{

    public function execute()
    {
        //echo "mi primer layout";
        //1° creamos la pagina
        $pageResult=$this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $pageResult;


    }
}
