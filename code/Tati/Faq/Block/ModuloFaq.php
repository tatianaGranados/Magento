<?php


namespace Tati\Faq\Block;


use Magento\Framework\View\Element\Template;
use Tati\Faq\Model\ResourceModel\Faq\Collection;
use Tati\Faq\Model\ResourceModel\Faq\CollectionFactory;

class ModuloFaq extends Template
{
    //public function prueba(){
      //  return "hola este es mi block template";
    //}

    /**
     * @var Tati\Faq\Model\ResourceModel\Faq\CollectionFactory
     */
    private $collectionFactory;

    public function __construct(Template\Context $context,
                                CollectionFactory $collectionFactory,
                                array $data = [] )
    {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getItems()
    {
        return $this->collectionFactory->create()->getItems();
    }



}
