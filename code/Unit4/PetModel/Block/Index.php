<?php


namespace Unit4\PetModel\Block;


use Magento\Framework\View\Element\Template;
use Unit4\PetModel\Model\ResourceModel\Pet\Collection;

class Index extends Template
{
    /**
     * @var \Unit4\PetModel\Model\ResourceModel\Pet\CollectionFactory
     */
    private $collectionFactory;

    public function __construct(Template\Context $context,
                                \Unit4\PetModel\Model\ResourceModel\Pet\CollectionFactory $collectionFactory ,
                                array $data = [])
    {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory;
    }

    public function getItems()
    {
        return $this->collectionFactory->create()->getItems();
    }
}
