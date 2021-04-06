<?php


namespace Tati\Faq\Model\ResourceModel\Faq;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Tati\Faq\Model\Faq;
use Tati\Faq\Model\ResourceModel\FaqModel;

class Collection extends AbstractCollection
{
    protected $_idField = 'id';

    protected function _construct()
    {
        $this->_init(Faq::class, FaqModel::class);
    }
}
