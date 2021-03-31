<?php


namespace Tati\MiPrimerModulo\Controller\Control;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;

class index extends Action
{

    public function execute()
    {
        //echo "hello";
        $parametro = $this->getRequest()->getParams();
        //print_r($parametro);

        $parametro1 = $this->getRequest()->getParam("parametro1");
        $parametro2 =  $this->getRequest()->getParam("parametro2");

        echo "parametro 1:",$parametro1;

    }
}
