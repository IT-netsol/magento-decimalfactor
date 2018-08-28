<?php
namespace Netsolution\Decimalfactor\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for decimal factor module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        if (!$installer->tableExists('netsolution_decimalfactor')) {
            $table = $installer->getConnection()
                ->newTable($installer->getTable('netsolution_decimalfactor'))
                ->addColumn('id',Table::TYPE_INTEGER,10,['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true],'Decimal Factor Id')
                ->addColumn('order_id', Table::TYPE_TEXT, 50, ['nullable' => false],'Order Id')
                ->addColumn('decimal_factor', Table::TYPE_DECIMAL, '12,2', ['nullable' => false],'Decimal Factor Value')
                ->addColumn('order_value', Table::TYPE_DECIMAL, '12,2', ['nullable' => false], 'Total Order Amount')
                ->addColumn('final_value', Table::TYPE_DECIMAL, '12,2', ['nullable' => false], 'Amount with Decimal Value')
                ->addColumn('created_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false,'default' => Table::TIMESTAMP_INIT], 'Creation Time')
                ->setComment('Stores decimal Factor Calculation for orders');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
