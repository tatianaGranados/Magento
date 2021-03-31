<?php
namespace TrainingEssentialsUnit6\ClothingMaterials\Model;

class Material extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('TrainingEssentialsUnit6\ClothingMaterials\Model\ResourceModel\Material');
    }
}
