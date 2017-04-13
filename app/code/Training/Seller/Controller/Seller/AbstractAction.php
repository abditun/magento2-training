<?php

/**
 * Created by PhpStorm.
 * User: formation
 * Date: 12/04/17
 * Time: 16:28
 */

namespace Training\Seller\Controller\Seller;


use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Registry;
use Training\Seller\Model\Repository\Seller as SellerRepository;
use Magento\Framework\View\Result\PageFactory as ResultPageFactory;



/**
 * Class AbstractAction
 * @package Training\Seller\Controller\Seller
 */
Abstract  class AbstractAction extends Action
{
    /**
     * @var SellerRepository
     */
  protected $sellerRepository;

    /**
     * @var SearchCriteriaBuilder
     */
  protected $searchCriteriaBuilder;


    /**
     * @var FilterBuilder
     */
  protected $filterBuilder;

    /**
     * @var SortOrderBuilder
     */
  protected $sortOrderBuilder;

    /**
     * @var ResultPageFactory
     */
  protected $resultPageFactory;

    /**
     * @var Registry
     */
  protected $registry;


    /**
     * AbstractAction constructor.
     * @param Context $context
     * @param SellerRepository $sellerRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
      Context $context,
      SellerRepository $sellerRepository,
      SearchCriteriaBuilder $searchCriteriaBuilder,
      Registry $registry,
      ResultPageFactory $resultPageFactory,
      SortOrderBuilder $sortOrderBuilder,
      FilterBuilder $filterBuilder

  ) {
      $this->sellerRepository = $sellerRepository;
      $this->searchCriteriaBuilder = $searchCriteriaBuilder;
      $this->registry = $registry;
      $this->resultPageFactory = $resultPageFactory;
      $this->sortOrderBuilder = $sortOrderBuilder;
      $this->filterBuilder = $filterBuilder;


      parent::__construct($context);
  }
}