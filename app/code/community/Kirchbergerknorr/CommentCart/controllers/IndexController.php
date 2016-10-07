<?php
/**
 * @package     Kirchbergerknorr_CommentCart
 * @author      Leo Friedrichs <lf@kirchbergerknorr.de>
 * @copyright   Copyright (c) 2016 kirchbergerknorr GmbH (http://www.kirchbergerknorr.de)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Kirchbergerknorr_CommentCart_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction()
    {
        $request = $this->getRequest();
        $helper = Mage::helper('kirchbergerknorr_commentcart');

        $comment = $request->getParam('comment');
        $helper->setComment($comment);
    }

}