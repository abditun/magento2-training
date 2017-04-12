<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 12/04/17
 * Time: 11:44
 */

namespace Training\Seller\Model\Repository;


use Training\Seller\Api\Data\SellerInterface;
use Training\Seller\Api\SellerRepositoryInterface;
use Training\Seller\Model\Repository\AbstractRepository;


/**
 * Class Seller
 * @package Training\Seller\Model\Repository
 */
class Seller extends AbstractRepository implements SellerRepositoryInterface
{

    /**
     * Seller constructor.
     * @param \Magento\Framework\Model\AbstractModelFactory $objectFactory
     * @param \Magento\Framework\Model\ResourceModel\Db\AbstractDb $objectResource
     * @param \Magento\Framework\Api\SearchResultsFactory $searchResultsFactory
     */
    public function __construct(\Magento\Framework\Model\AbstractModelFactory $objectFactory,
                                \Magento\Framework\Model\ResourceModel\Db\AbstractDb $objectResource,
                                \Magento\Framework\Api\SearchResultsFactory $searchResultsFactory
    )
    {
        parent::__construct($objectFactory, $objectResource, $searchResultsFactory);

        $this->setIdentifierFieldName(SellerInterface::FIELD_NAME);
    }


    /**
     * @inheritdoc
     */
    public function getById($objectId)
    {
        return $this->getEntityById($objectId);
    }

    /**
     * @inheritdoc
     */
    public function getByIdentifier($objectIdentifier)
    {
        return $this->getEntityByIdentifier($objectIdentifier);
    }

    /**
     * @inheritdoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null)
    {
        return $this->getEntities($searchCriteria);
    }

    /**
     * @inheritdoc
     */
    public function save(SellerInterface $object)
    {
        return $this->saveEntity($object);
    }

    /**
     * @inheritdoc
     */
    public function deleteById($objectId)
    {
        return $this->deleteEntity($this->getEntityById($objectId));
    }

    /**
     * @inheritdoc
     */
    public function deleteByIdentifier($objectIdentifier)
    {
        return $this->deleteEntity($this->getEntityByIdentifier($objectIdentifier));
    }
    
}