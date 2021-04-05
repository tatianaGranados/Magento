<?php

namespace Ejemplo\HolaMundo\Block;

use Magento\Framework\View\Element\Template;
use Ejemplo\HolaMundo\Model\ResourceModel\Item\CollectionFactory;

class Hello extends Template
{
    private $collectionFactory;
    
    public function __construct(Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
        ){
            $this->collectionFactory = $collectionFactory;
            parent::__construct($context, $data);
        }

    public function getItems(){
        return $this->collectionFactory->create()->getItems();
    }
    
}
