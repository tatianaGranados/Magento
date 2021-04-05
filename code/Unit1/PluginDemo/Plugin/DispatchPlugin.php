<?php


namespace Unit1\PluginDemo\Plugin;

use Psr\Log\LoggerInterface;

class DispatchPlugin
{

    /**
     * @var LoggerInterface
     */
    private $logger;
    //  2 insert una dependency que es \Psr\Log\LoggerInterface in el plugin e inicializas el constructor
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function afterDispatch(\Magento\Framework\App\Action\Action $subject, $result){

        $fullActionName = $subject->getRequest()->getFullActionName();
        $this->logger->alert('test log');
        //no dejamos que complete el proceso y no se genere el cache
        //var_dump(__METHOD__);die;
        return $result;
    }

}
