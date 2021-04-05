<?php

namespace Ejemplo\HolaMundo\Model\ResourceModel\Item;

use\Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Ejemplo\HolaMundo\Model\Item;
use Ejemplo\HolaMundo\Model\ResourceModel\Item as Item_;

class Collection extends AbstractCollection
{
    protected $_idField = 'id';
    
    protected function _construct() {
        $this->_init(Item::class, Item_::class);
    }
}
