<?php

namespace Codilar\ProductAdmin\Controller\Adminhtml\ProductAdmin;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
         
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
        $StockState = $objectManager->get('\Magento\CatalogInventory\Api\StockStateInterface');
    
        $productCollection = $productCollection->create()
                    ->addAttributeToSelect('*')
                    ->load();
 
        foreach ($collection as $product){
    
                 $qty=$StockState->getQty($product->getId());
              $arr[] =[$qty];
                 $this->logger->debug($qty);
                //  if( $qty < 2){
                // $product->setStatus(\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_DISABLED);
                // $this->logger->debug($qty.'CODILARCRON');
                // $product->save();
                //  }
         }  
         print_r($arr);
         die();


        return $this->pageFactory->create();
    }
}