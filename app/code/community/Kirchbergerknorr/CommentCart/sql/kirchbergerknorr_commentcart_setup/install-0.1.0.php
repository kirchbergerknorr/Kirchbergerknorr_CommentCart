<?php
/**
 * Description
 *
 * @category    Designandmiles
 * @package     Designandmiles_CommentCart
 * @author      Leo Friedrichs <lf@kirchbergerknorr.de>
 * @copyright   Copyright (c) 2016 kirchbergerknorr GmbH (http://www.kirchbergerknorr.de)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */ 
/* @var $installer Mage_Sales_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$installer->addAttribute('quote', 'customer_order_comment', array(
  'type' => Varien_Db_Ddl_Table::TYPE_TEXT
));

$installer->addAttribute('order', 'customer_order_comment', array(
  'type' => Varien_Db_Ddl_Table::TYPE_TEXT
));

$installer->endSetup();