<?php

/**
 * Created by PhpStorm.
 * User: formation
 * Date: 12/04/17
 * Time: 16:27
 */

namespace Training\Seller\Controller\Seller;




/**
 * Class Index
 * @package Training\Seller\Controller\Seller
 */
class Index  extends AbstractAction
{


    /**
     *
     */
    public function execute() {

        $searchCriteria = $this->searchCriteriaBuilder->create();

        $SellersList = $this->sellerRepository->getList($searchCriteria);
        echo('<ul>');
        foreach($SellersList->getItems() as $Seller) {

            echo '<a href="/seller/'.$Seller->getIdentifier().'.html" >'.$Seller->getName().' </a>';
        }
        echo('</ul>');
    }
}