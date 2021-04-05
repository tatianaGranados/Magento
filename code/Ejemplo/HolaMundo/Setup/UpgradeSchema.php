<?php

namespace Ejemplo\HolaMundo\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, 
            ModuleContextInterface $context) {
        $setup->startSetup();
        
        if(version_compare($context->getVersion(), '1.0.1', '<')){
            $setup->getConnection()->addColumn(
                $setup->getTable('ejemplo_holamundo_item'),
                'description',
                [
                    'type' => Table::TYPE_TEXT,
                    'nullable' => true,
                    'comment' => 'Item Description'
                ]
            );
        }
        
        $setup->endSetup();
    }
}
