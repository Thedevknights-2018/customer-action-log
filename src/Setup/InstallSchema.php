<?php

namespace TDK\CustomerActionLog\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use TDK\CustomerActionLog\Model\Log;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param \Magento\Framework\Setup\SchemaSetupInterface   $setup
     * @param \Magento\Framework\Setup\ModuleContextInterface $context
     *
     * @throws \Zend_Db_Exception
     */
    public function install(
        \Magento\Framework\Setup\SchemaSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        //START table setup
        $table = $installer->getConnection()->newTable(
            $installer->getTable(Log::TABLE)
        )->addColumn(
            Log::FIELD_ID,
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true,],
            'Entity ID'
        )->addColumn(
            Log::FIELD_ENTITY_ID,
            Table::TYPE_INTEGER,
            null,
            ['unsigned' => true],
            'Entity Id'
        )->addColumn(
            Log::FIELD_ACTION,
            Table::TYPE_SMALLINT,
            null,
            ['unsigned' => true],
            'Action'
        )->addColumn(
            Log::FIELD_CREATED_AT,
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT,],
            'Created At'
        )->addColumn(
            Log::FIELD_UPDATED_AT,
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE,],
            'Updated At'
        )->addIndex(
            $setup->getIdxName(
                Log::TABLE,
                [
                    Log::FIELD_ENTITY_ID,
                    Log::FIELD_ENTITY_ID,
                    Log::FIELD_CREATED_AT,
                ]
            ),
            [
                Log::FIELD_ENTITY_ID,
                Log::FIELD_ENTITY_ID,
                Log::FIELD_CREATED_AT,
            ]
        );
        $installer->getConnection()->createTable($table);
        //END   table setup
        $installer->endSetup();
    }
}
