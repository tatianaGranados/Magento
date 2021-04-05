<?php

namespace Ejemplo\HolaMundo\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, 
            ModuleContextInterface $context) {
        $setup->startSetup();
        
        $table = $setup->getConnection()->newTable(
                $setup->getTable('ejemplo_holamundo_item')
                )->addColumn(
                        'id',
                        Table::TYPE_INTEGER,
                        null,
                        ['identity' => true, 'nullable' => false, 'primary' => true],
                        'Item ID'
                )->addColumn(
                        'name',
                        Table::TYPE_TEXT,
                        255,
                        ['nullable' => false],
                        'Item Name'
                )->addIndex(
                        $setup->getIdxName('ejemplo_holamundo_item', ['name']),
                        ['name']
                )->setComment(
                        'Items'
                );
        $setup->getConnection()->createTable($table);
        
        $setup->endSetup();
    }
}