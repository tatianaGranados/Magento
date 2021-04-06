<?php


namespace Unit4\ServiceContractsDemo\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;

class Index extends Action
{

    public function execute()
    {
        var_export(__METHOD__); die;
    }
}
