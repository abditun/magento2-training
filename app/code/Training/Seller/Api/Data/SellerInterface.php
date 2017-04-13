<?php

namespace Training\Seller\Api\Data;


/**
 * @api
 * Interface SellerInterface
 * @package Training\Seller\Api\Data
 */
Interface SellerInterface
{


  const TABLE_NAME = 'training_seller';
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
  const FIELD_SELLER_ID = 'seller_id';
  const FIELD_IDENTIFIER = 'identifier';
  const FIELD_NAME = 'name';
  const FIELD_CREATED_AT = 'created_at';
  const FIELD_UPDATED_AT = 'updated_at';
  const FIELD_DESCRIPTION = 'description';


    /**
     * Get ID
     *
     * @return int|null
     */
    public function getSellerId();


    /**
     * Get Identifier
     *
     * @return string
     */
    public function getIdentifier();


    /**
     * Get Name
     *
     * @return string
     */
    public function getName();


    /**
     * Get CreatedAt
     *
     * @return string|null
     */
    public function getCreatedAt();


    /**
     * Get UpdatedAt
     *
     * @return string|null
     */
    public function getUpdatedAt();



  /**
   * Get field: description
   *
   * @return string|null
   */
    public function getDescription();


    /**
     * Set field: selled_id
     * @param int $sellerId
     * @return sellerInterface
     */
    public function setSellerId($sellerId);



    /**
     * Set field: identifier
     * @param string $identifier
     * @return sellerInterface
     */
    public function setIdentifier($identifier);


    /**
     * Set field: name
     * @param string $value
     * @return sellerInterface
     */
    public function setName($value);


    /**
     * Set field: identifier
     * @param string $value
     * @return sellerInterface
     */
    public function setCreatedAt($value);



    /**
     * Set field: identifier
     * @param string $value
     * @return sellerInterface
     */
    public function setUpdatedAt($value);


  
  /**
   * @param string $value
   * @return sellerInterface
   */
    public function setDescription($value);


























}