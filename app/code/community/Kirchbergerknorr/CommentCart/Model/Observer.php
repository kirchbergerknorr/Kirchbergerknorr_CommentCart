<?php
/**
 * Observer
 *
 * @category    Kirchbergerknorr
 * @package     Kirchbergerknorr_CommentCart
 * @author      Aleksey Razbakov <ar@kirchbergerknorr.de>
 * @copyright   Copyright (c) 2016 kirchbergerknorr GmbH (http://www.kirchbergerknorr.de)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Kirchbergerknorr_CommentCart_Model_Observer
{
    /**
     * Save comment in order status history
     *
     * @param $observer
     */
    public function saveComment($observer)
    {
        if (!Mage::registry('saving_comment')) {
            Mage::register('saving_comment', 1);
            /** @var Mage_Sales_Model_Order $order */
            $order = $observer->getEvent()->getOrder();
            $comment = $order->getData('customer_order_comment');
            $order->addStatusHistoryComment($comment)->setIsVisibleOnFront(true);
            $order->save();
        }
    }
}