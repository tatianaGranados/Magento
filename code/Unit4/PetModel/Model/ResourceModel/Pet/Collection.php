<?php


namespace Unit4\PetModel\Model\ResourceModel\Pet;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        //llamamos a las clases del modelo y el resouce model
        $this->_init(\Unit4\PetModel\Model\ModelPet::class, \Unit4\PetModel\Model\ResourceModel\Pet::class);
    }
}
