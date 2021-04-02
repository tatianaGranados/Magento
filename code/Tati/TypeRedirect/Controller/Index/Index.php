<?php


namespace Tati\TypeRedirect\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class Index extends Action
{

    /**
     * @var RedirectFactory
     */
    private $redirectFactory;

    public function __construct(Context $context, RedirectFactory $redirectFactory)
    {
        parent::__construct($context);
        $this->redirectFactory = $redirectFactory;
    }

    public function execute()
    {
        $result = $this->redirectFactory->create();
        return $result->setUrl('http://www.google.com');
        //echo "este es un tipo redirect";
    }
}
