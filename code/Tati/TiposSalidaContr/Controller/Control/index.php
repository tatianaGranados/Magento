<?php

namespace Tati\TiposSalidaContr\Controller\Control;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class index extends Action
{
    /**
     * @var JsonFactory
     */
    private $jsonResult;

    public function __construct(Context $context, JsonFactory $jsonResultFactory)
    {
        parent::__construct($context);
        $this->jsonResultFactory = $jsonResultFactory;
    }

    public function execute()
    {
        //echo "hello tipos salida";
        $persona=['nombre'=>'maribel', 'apellido'=> 'gomez'];
        $result= $this->jsonResultFactory->create();
        $result->setData($persona);

        return $result;

    }

}
