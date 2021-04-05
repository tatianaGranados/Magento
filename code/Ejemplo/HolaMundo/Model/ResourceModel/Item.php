<?php

namespace Ejemplo\HolaMundo\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Item extends AbstractDb
{
    protected function _construct() {
        $this->_init('ejemplo_holamundo_item','id');
    }
}
