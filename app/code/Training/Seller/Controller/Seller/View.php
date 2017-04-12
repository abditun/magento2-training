<?php

/**
 * Created by PhpStorm.
 * User: formation
 * Date: 12/04/17
 * Time: 16:27
 */

namespace  Training\Seller\Controller\Seller;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class View
 * @package Training\Seller\Controller\Seller
 */
class View extends AbstractAction
{


    public function execute() {

        $identifier = $this->getRequest()->getParam('identifier');
       if(!$identifier) {
           $this->_forward('noreoute');

           return null;
       }

        try {
         $seller = $this->sellerRepository->getByIdentifier($identifier);


        } catch(NoSuchEntityException $exception) {
            $this->forward('noroute');
            
            return null;
        }

        echo '<h1>'.$seller->getName().'</h1>';
        echo '<hr />';
        echo '<p>#'.$seller->getIdentifier().'</p>';
        echo '<hr />';
        echo '<a href="/sellers.html">back to the list</a>';

    }
}