<?php


namespace Tati\Faq\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class FaqModel extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('faq','faq_id');
    }
}
