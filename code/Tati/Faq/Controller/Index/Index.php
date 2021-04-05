<?php


namespace Tati\Faq\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{

    //creating my view with factory and inicializar propiedades pagfaq
    /**
     * @var PageFactory
     */
    private $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory= $resultPageFactory;

    }

    public function execute()
    {
       //echo "vista de mi faq";
        //creamos y retornamos mi page
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
