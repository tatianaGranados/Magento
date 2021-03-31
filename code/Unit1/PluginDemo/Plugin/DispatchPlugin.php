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
        $this->logger->alert('test log');
        var_dump(__METHOD__);die;
        return $result;
    }

}
