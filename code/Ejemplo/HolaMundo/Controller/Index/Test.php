<?php
namespace Ejemplo\HolaMundo\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Test extends \Magento\Framework\App\Action\Action
{
       
    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $pageFactory;
    }

    public function execute()
    {
        $result = $this->resultPageFactory->create();
        return $result;
    }
    
}
