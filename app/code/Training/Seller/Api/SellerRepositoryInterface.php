<?php


namespace Training\Seller\Api;


/**
 * @api
 * Interface SellerRepositoryInterface
 * @package Training\Seller\Api
 */
Interface SellerRepositoryInterface {


    /**
     * @param int $id
     * @return \Training\Seller\Api\Data\SellerInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);


    /**
     * @param string $identifier
     * @return \Training\Seller\Api\Data\SellerInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getByIdentifier($identifier);



    // Magento/framework/Api/Searchcriteria

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $value
     * @return \Magento\Framework\Api\SellerSearchResultsInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getList(SearchCriteriaInterface $value);


    /**
     * @param \Training\Seller\Api\Data\SellerInterface $value
     * @return \Training\Seller\Api\Data\SellerInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(SellerInterface $value);


    /**
     * @param int $value
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function deleteById($value);


    /**
     * @param string $value
     * @return boolean
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function deleteByIdentifier($value);



    
}