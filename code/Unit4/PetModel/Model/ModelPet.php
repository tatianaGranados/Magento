<?php


namespace Unit4\PetModel\Model;


use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class ModelPet extends AbstractModel
{
    protected function _construct()
    {
        //envio la clase de mi resourceModel
       // $this->_init(\Unit4\PetModel\Model\ResourceModel\Pet);
        $this->_init(\Unit4\PetModel\Model\ResourceModel\Pet::class);
    }

}
