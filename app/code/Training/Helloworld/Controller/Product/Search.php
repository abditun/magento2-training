<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 11/04/17
 * Time: 14:08
 */

namespace Training\Helloworld\Controller\Product;


class Search extends \Magento\Framework\App\Action\Action
{


    protected $productRepository;
    protected $searchCriteriaBuilder;
    protected $filterBuilder;
    protected $sortOrderBuilder;


    /**
     * Search constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param \Magento\Framework\Api\FilterBuilder $filterBuilder
     * @param \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder
     */
    public function __construct( \Magento\Framework\App\Action\Context $context,
                                 \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
                                 \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
                                 \Magento\Framework\Api\FilterBuilder $filterBuilder,
                                 \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder
                               )
    {
        parent::__construct($context);

        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }


    /**
     *
     */
    public function execute() {

        $product = $this->productRepository->getById(1);
        var_dump($product->getName());
        $products =  $this->getProductList();
        foreach($products as $product) {
          $this->outputProduct($product);
        }

    }


    /**
     * @return \Magento\Catalog\Api\Data\ProductInterface[]
     */
    public function getProductList() {

        $filterDesc[] = $this->filterBuilder
            ->setField('description')
            ->setConditionType('like')
            ->setValue('%comfortable%')
            ->create();

        $filterName[] = $this->filterBuilder
            ->setField('name')
            ->setConditionType('like')
            ->setValue('%bruno%')
            ->create();

        $sortOrder = $this->sortOrderBuilder->setField('name')
            ->setDirection(\Magento\Framework\Api\SortOrder::SORT_DESC)
            ->create();


        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilters($filterDesc)
            ->addFilters($filterName)
            ->addSortOrder($sortOrder)
            ->setPageSize(6)
            ->setCurrentPage(1)
            ->create();

        return $this->productRepository->getList($searchCriteria)->getItems();
        
    }


    /**
     * @param \Magento\Catalog\Api\Data\ProductInterface $product
     */
    protected function outputProduct(\Magento\Catalog\Api\Data\ProductInterface $product)
    {
        $this->getResponse()->appendBody(
            $product->getSku().' => '.$product->getName().'<br />'
        );
    }



}