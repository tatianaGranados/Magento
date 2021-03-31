<?php

namespace TrainingEssentialsUnit6\ClothingMaterials\Model\ResourceModel;

class Material extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('clothing_material', 'material_id');
    }
}
