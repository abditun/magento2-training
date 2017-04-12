<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 12/04/17
 * Time: 09:20
 */

namespace Training\Seller\Api\Data;


use Magento\Framework\Api\SearchResultsInterface;


/**
 * Interface SelleerSearchResultsInterface
 * @api
 * @package Training\Seller\Api\Data
 */
Interface SellerSearchResultsInterface extends SearchResultsInterface
{


    /**
     * @return \Training\Seller\Api\Data\SellerInterface[]
     */
    public function getItems();


    /**
     * @param \Training\Seller\Api\Data\SellerInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}