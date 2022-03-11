<?php

namespace Codilar\ProductAdmin\Cron;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Action;
use Magento\Catalog\Model\Product\Type;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\ConfigurableProduct\Model\Product\Type\Configurable;
use Magento\Framework\App\Action\Context;
use Magento\Store\Model\StoreManagerInterface;
use Psr\Log\LoggerInterface;  
use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\CatalogInventory\Model\Stock\StockItemRepository;


class Test 
{
    protected $stockItemRepository;
    protected $productRepository;
    protected $logger;
    protected $product;
    public function __construct(
        StockRegistryInterface $stockItemRepository,
        Context  $context,
        StoreManagerInterface  $storeManager,
        CollectionFactory  $productCollectionFactory,
        Product $product,
        LoggerInterface $logger,
      
        Action $action)
    {
        $this->stockItemRepository = $stockItemRepository;
        $this->storeManager = $storeManager;
        $this->productCollectionFactory = $productCollectionFactory;
        $this->action = $action;
        $this->product = $product;
        $this->logger = $logger;

    } 
	public function execute()
	{
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
/** @var \Magento\Catalog\Model\ResourceModel\Product\Collection $productCollection */
$productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
/** Apply filters here */
$collection = $productCollection->addAttributeToSelect('*')
        ->load();
    foreach ($collection as $product){
        $Id=$product->getId();

        $price=$product->getMinQty();
        $min=$product->getMinSaleQty();
         $sku=$product->getSku();
         echo 'Name  =  '.$product->getDescription().'<br>';
         $this->logger->info('quantity CODILARCRON');
         $productitem =$this->stockItemRepository->getStockItem($Id);
       
   $quantity=$productitem->getQty();
   if($quantity <= 100)
   {
    $product->setStatus(\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_DISABLED);
    $product->save();
    $this->logger->debug('quantity CODILARCRON');
    
   }

        
    }
    
    }
}