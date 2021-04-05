<?php

namespace Ejemplo\HolaMundo\Model;

use Ejemplo\HolaMundo\Api\ItemRepositoryInterface;
use Ejemplo\HolaMundo\Model\ResourceModel\Item\CollectionFactory;

class ItemRepository implements ItemRepositoryInterface
{
    private $collectionFactory;
    
    public function __construct(CollectionFactory $collectionFactory){
        $this->collectionFactory = $collectionFactory;
    }


    public function getList(){
        return $this->collectionFactory->create()->getItems();
    }

}
