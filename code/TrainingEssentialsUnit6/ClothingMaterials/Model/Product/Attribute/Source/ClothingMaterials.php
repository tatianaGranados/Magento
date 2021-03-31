<?php

namespace TrainingEssentialsUnit6\ClothingMaterials\Model\Product\Attribute\Source;

//use Magento\Eav\Model\Entity\Attribute\Source\SourceInterface;
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

use TrainingEssentialsUnit6\ClothingMaterials\Model\ResourceModel\Material\CollectionFactory;

class ClothingMaterials extends AbstractSource
{

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    protected $options = [];
    
    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    public function getAllOptions()
    {
        if (!$this->options) {
            $collection = $this->collectionFactory->create();
            foreach ($collection as $item) {
                $this->options[] = [
                    'value' => $item->getMaterialId(),
                    'label' => $item->getMaterial()
                ];
            }
        }

        return $this->options;
    }


    public function getOptionText($value)
    {
        foreach($this->getAllOptions() as $option) {
            if ($option['value'] == $value) {
                return $option['label'];
            }
        }
        return null;
    }

}
