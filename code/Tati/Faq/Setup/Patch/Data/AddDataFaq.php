<?php


namespace Tati\Faq\Setup\Patch\Data;


use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class AddDataFaq implements DataPatchInterface
{

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public static function getDependencies()
    {
        // no tiene dependencia a otro patch
        return [];
    }

    public function getAliases()
    {
        // no tenemos alias
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $faqList =[
            ['question'=>'¿Puedo probar Magento antes de decidirme a instalarlo?',
                'answer'=>'Sí, la web oficial de magento tiene montada una tienda online para que puedas probar magento antes de instalarlo.',
                'customer_id'=>1],
            ['question'=>'¿Puedo utilizar MAGENTO ya y montar una tienda?',
                'answer'=>'NO. aún se encuentra en un período de pruebas,',
                'customer_id'=>''],
            ['question'=>'¿Is this question one?',
                'answer'=>'this is my answer one',
                'customer_id'=>''],
            ['question'=>'¿Is this question two?',
                'answer'=>'this is my answer two',
                'customer_id'=>'']
        ];
        $conection= $this->moduleDataSetup->getConnection();
        $faqTable=$conection->getTableName('faq');
        foreach ($faqList as $faq){
            $conection->insertForce($faqTable,$faq);
        }
        $this->moduleDataSetup->endSetup();
    }
}
