<?php


namespace Tati\Faq\Model;


use Magento\Framework\Model\AbstractModel;

class Faq extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Tati\Faq\Model\ResourceModel\FaqModel::class);
    }
}
