<?php

namespace TrainingEssentialsUnit6\ClothingMaterials\Model\ResourceModel\Material;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Initialize resource
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('TrainingEssentialsUnit6\ClothingMaterials\Model\Material', 'TrainingEssentialsUnit6\ClothingMaterials\Model\ResourceModel\Material');
    }
}
