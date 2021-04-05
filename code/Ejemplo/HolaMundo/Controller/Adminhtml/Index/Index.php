<?php
namespace Ejemplo\HolaMundo\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action
{
       
    public function execute(){
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents("Hola Administrador");
        return $result;
    }
    
}
