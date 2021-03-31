<?php
namespace TrainingEssentialsUnit6\LoyalCustomer\Setup;

use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Config as EavConfig;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Api\AttributeManagementInterface;
use Magento\Eav\Api\AttributeSetRepositoryInterface;
use Magento\Eav\Api\AttributeGroupRepositoryInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Framework\Api\SearchCriteriaBuilder;

class InstallData implements InstallDataInterface
{
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    private $eavConfig;

    /**
     * @var AttributeManagementInterface
     */
    protected $attributeManagement;

    /**
     * @var AttributeSetRepositoryInterface
     */
    protected $attributeSetRepository;

    /**
     * @var AttributeGroupRepositoryInterface
     */
    protected $attributeGroupRepository;


    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;


    /**
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        EavConfig $eavConfig,
        AttributeManagementInterface $attributeManagement,
        AttributeSetRepositoryInterface $attributeSetRepository,
        AttributeGroupRepositoryInterface $attributeGroupRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->eavConfig           = $eavConfig;
        $this->eavSetupFactory     = $eavSetupFactory;
        $this->attributeManagement = $attributeManagement;
        $this->attributeSetRepository = $attributeSetRepository;
        $this->attributeGroupRepository = $attributeGroupRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            Customer::ENTITY,
            'is_loyal',
            [
                'type' => 'int',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                'label' => 'Is Loyal',
                'required' => false,
                'user_defined' => true,
                'unique' => false,
                //el ejercicio nos pide un valor por defecto NO por lo siguiente
                'default'=>false
            ]
        );

        $entityTypeId     = $this->eavConfig->getEntityType(Customer::ENTITY)->getEntityTypeId();
        $attributeSetId   = $this->getAttributeSetId($entityTypeId);
        $attributeGroupId = $this->getAttributeGroupId($attributeSetId);
        $this->attributeManagement->assign(Customer::ENTITY, $attributeSetId, $attributeGroupId, 'is_loyal', 100);
    }

    protected function getAttributeSetId($entityTypeId)
    {
        $searchCriteria = $this->searchCriteriaBuilder
                        ->addFilter('entity_type_id', $entityTypeId)
                        ->addFilter('attribute_set_name', 'Default')
                        ->create();
        $items = $this->attributeSetRepository->getList($searchCriteria)
               ->getItems();
        foreach ($items as $item) {
            return $item->getAttributeSetId();
        }
    }

    protected function getAttributeGroupId($attributeSetId)
    {
        $searchCriteria = $this->searchCriteriaBuilder->addFilter('attribute_set_id', $attributeSetId)
                        ->addFilter('default_id', 1)
                        ->create();
        $items = $this->attributeGroupRepository->getList($searchCriteria)
               ->getItems();
        foreach ($items as $item) {
            return $item->getAttributeGroupId();
        }
    }

}
