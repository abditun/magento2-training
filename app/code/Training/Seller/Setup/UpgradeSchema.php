<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Seller\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Training\Seller\Api\Data\SellerInterface;



class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(SchemaSetupInterface $setup,
                            ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $this->addColumnDescription($setup);
        }

        $setup->endSetup();

    }

    public function addColumnDescription($setup) {
        $tableName = $setup->getTable(SellerInterface::TABLE_NAME);
        $setup->getConnection()->addColumn(
            $tableName,
            SellerInterface::FIELD_DESCRIPTION,
            array(
                'type' => Table::TYPE_TEXT,
                'length' => null,
                'nullable' => true,
                'comment' => 'Champ description'
            )
    );

    }

}


