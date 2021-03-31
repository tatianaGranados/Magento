<?php


namespace Tati\InsertLogPsr\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Psr\Log\LoggerInterface;

class Ejemplo extends Action
{
    //necesito un constructor para llamar a mis logger interfaces de psr PSR\LOG
    // a traves de LoggerInterface $logger
    //eh inicializacion en el constructor (nos situamos antes del () y vamos al icon foco ->iniz)
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(Context $context, LoggerInterface $logger)
    {
        parent::__construct($context);
        $this->logger = $logger;
    }

    //llamamos a logger debug y le damos un mensaje
    public function execute()
    {
       $this->logger->debug("este es un mensaje desde el controlador");
       $this->logger->alert("este es un mensaje alert");
       $this->logger->critical("este es un mensaje critical");
       $this->logger->error("  este es un mensaje de error");
       $this->logger->info("este es un mensaje de info");
        echo "log escrito";
    }
}
