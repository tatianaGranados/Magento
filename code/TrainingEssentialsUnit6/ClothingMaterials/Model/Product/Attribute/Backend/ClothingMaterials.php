<?php

namespace TrainingEssentialsUnit6\ClothingMaterials\Model\Product\Attribute\Backend;

use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;

use TrainingEssentialsUnit6\ClothingMaterials\Model\MaterialFactory;

class ClothingMaterials extends AbstractBackend
{

    protected $materialFactory;

    public function __construct(
        MaterialFactory $materialFactory
    ) {
        $this->materialFactory = $materialFactory;
    }


    public function beforeSave($object)
    {
        $code = $this->getAttribute()->getAttributeCode();
        $oldValue = $object->getOrigData($code);
        $newValue = $object->getData($code);

        $oldMaterial = $this->materialFactory
                     ->create()
                     ->load($oldValue);
        if ($oldMaterial->getCount() > 0) {
            $oldMaterial->setCount($oldMaterial->getCount() - 1)
                ->save();
        }

        $newMaterial = $this->materialFactory
                     ->create()
                     ->load($newValue);
        $newMaterial->setCount($newMaterial->getCount() + 1)
            ->save();
    }
}
