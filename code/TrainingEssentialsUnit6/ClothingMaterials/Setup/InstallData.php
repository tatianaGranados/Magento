<?php
namespace TrainingEssentialsUnit6\ClothingMaterials\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Api\AttributeManagementInterface;
use Magento\Eav\Api\AttributeSetRepositoryInterface;
use Magento\Eav\Api\AttributeGroupRepositoryInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\FilterBuilder;

class InstallData implements InstallDataInterface
{
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

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
     * @var FilterBuilder
     */
    protected $filterBuilder;

    
    /**
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        AttributeManagementInterface $attributeManagement,
        AttributeSetRepositoryInterface $attributeSetRepository,
        AttributeGroupRepositoryInterface $attributeGroupRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder
    ){
        $this->eavSetupFactory     = $eavSetupFactory;
        $this->attributeManagement = $attributeManagement;
        $this->attributeSetRepository = $attributeSetRepository;
        $this->attributeGroupRepository = $attributeGroupRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $this->addAttribute($setup);
        
        $attributeSetId   = $this->getAttributeSetId();
        $attributeGroupId = $this->getAttributeGroupId($attributeSetId);
        $this->attributeManagement->assign(Product::ENTITY, $attributeSetId, $attributeGroupId, 'clothing_materials', 100);

        $this->populateClothingMaterialsTable($setup);
    }

    protected function populateClothingMaterialsTable($setup)
    {
        $data = [
            ['material' => 'cotton'],
            ['material' => 'wool'],
            ['material' => 'linen'],
            ['material' => 'viscose']
        ];

        $setup->getConnection()->insertMultiple('clothing_material', $data);
    }
    
    protected function getAttributeSetId()
    {
        $searchCriteria = $this->searchCriteriaBuilder
                        ->addFilter('entity_type_id', 4)
                        ->addFilter('attribute_set_name', 'Top')
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

    protected function addAttribute($setup)
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        
        $eavSetup->addAttribute(
            Product::ENTITY,
            'clothing_materials',
            [
                'backend' => 'TrainingEssentialsUnit6\ClothingMaterials\Model\Product\Attribute\Backend\ClothingMaterials',
                'source'  => 'TrainingEssentialsUnit6\ClothingMaterials\Model\Product\Attribute\Source\ClothingMaterials',
                'type' => 'int',
                'frontend' => '',
                'input' => 'select',
                'label' => 'Clothing Materials',
                'frontend_class' => '',
                'required' => false,
                'user_defined' => true,
                'unique' => false,
                'note' => '',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'input_renderer' => '',
                'searchable' => true,
                'filterable' => true,
                'comparable' => false,
                'visible_on_front' => true,
                'is_html_allowed_on_front' => false,
                'visible_in_advanced_search' => true,
                'used_in_product_listing' => false,
                'used_for_sort_by' => false,
                'apply_to' => '',
                'position' => '50',
                'used_for_promo_rules' => true,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'group' => 'General',
            ]
        );
    }
}
