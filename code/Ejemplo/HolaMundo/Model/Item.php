<?php

namespace Ejemplo\HolaMundo\Model;

class Item extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct() {
        $this->_init(\Ejemplo\HolaMundo\Model\ResourceModel\Item::class);
    }
}
