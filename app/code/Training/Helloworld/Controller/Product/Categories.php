<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 11/04/17
 * Time: 11:16
 */

namespace Training\Helloworld\Controller\Product;


class Categories extends \Magento\Framework\App\Action\Action
{


    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $productCollectionFactory;


    /**
     * @var \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory
     */
    protected $categoryCollectionFactory;

    /**
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute() {

        $productCollection = $this->productCollectionFactory->create();
        $productCollection->addAttributeToFilter('name', array('like' => '%bag%') )
                          ->addCategoryIds()
                          ->load()
        ;

        $categoryIds = [];
        foreach($productCollection->getItems() as $product) {
          $categoryIds = array_merge($categoryIds, $product->getCategoryIds());
          echo($product->getName());

        }

        $catCollection = $this->categoryCollectionFactory->create();
        $catCollection->addAttributeToFilter('entity_id', array('in' => $categoryIds))
            ->addAttributeToSelect('name')
            ->load();

        $categories = [];
        foreach($catCollection as $category) {
            $categories[$category->getId()] = $category->getName();
        }
        

        $html = '<ul>';
        foreach ($productCollection as $product) {
            $html.= '<li>';
            $html.= $product->getId().' => '.$product->getSku().' => '.$product->getName();
            $html.= '<ul>';
            foreach ($product->getCategoryIds() as $categoryId) {
                $html.= '<li>'.$categoryId.' => '.$categories[$categoryId].'</li>';
            }
            $html.= '</ul>';
            $html.= '</li>';
        }
        $html.= '</ul>';

        $this->getResponse()->appendBody($html);

    }


    /**
     * Categories constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
     * @param \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory
     */
    public function __construct( \Magento\Framework\App\Action\Context $context,
                                 \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
                                 \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory

    )
    {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->categoryCollectionFactory = $categoryCollectionFactory;

        parent::__construct($context);
    }

}