<?php
/**
 * @package     Kirchbergerknorr_CommentCart
 * @author      Leo Friedrichs <lf@kirchbergerknorr.de>
 * @copyright   Copyright (c) 2016 kirchbergerknorr GmbH (http://www.kirchbergerknorr.de)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */ 
class Kirchbergerknorr_CommentCart_Helper_Data extends Mage_Core_Helper_Abstract {

    public function setComment($comment)
    {
        $quote = Mage::getSingleton('checkout/session')->getQuote();
        if (!$quote) {
            return;
        }
        $quote->setData('customer_order_comment', $comment);
        $quote->save();
    }

    public function getComment()
    {
        $quote = Mage::getSingleton('checkout/session')->getQuote();
        if (!$quote) {
            return false;
        }
        return $quote->getData('customer_order_comment');
    }

    public function getUrl() {
        return Mage::getUrl('commentcart');
    }

}