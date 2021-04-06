<?php
namespace Unit4\ProductAttribute\Setup\Patch\Data;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class AddProductAttribute implements DataPatchInterface
{
    /**
     * @var \Magento\Eav\Setup\EavSetupFactory
     */
    private $eavSetupFactory;
    /**
     * @var \Magento\Framework\Setup\ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    public function __construct(
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
    )
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        /** @var \Magento\Eav\Setup\EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'is_recyclable',
            [
                // configuraciones en la tabal eav_attribtue
                'type' => 'int',
                'input' => 'boolean',
                'label' => 'Is Recyclable',
                'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                'user_defined' => true, // permite eliminar el atributo desde el admin
                'required' => false,
                // configuraciones de la entidad catalog tabla catalog_eav_attribute
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                // configuraciones adcionales a las tablas eav_Attribute y catalog_eav_attribute
                'group' => 'General'
            ]
        );
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}
