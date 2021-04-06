<?php


namespace Unit4\PetModel\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Pet extends AbstractDb
{


    protected function _construct()
    {
        //enviamos el nombre de la tabla y el campo que es el id
        $this->_init('pet', 'pet_id');
    }
}
