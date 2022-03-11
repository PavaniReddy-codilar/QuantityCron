<?php
namespace Codilar\ProductAdmin\Block;
 
use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Magento\CatalogInventory\Model\Stock\StockItemRepository;
use Psr\Log\LoggerInterface;
 
class Stock extends Template
{    
    protected $stockItemRepository;
    protected $logger;
        
    public function __construct(
        Context $context,   
        LoggerInterface $logger,     
        StockItemRepository $stockItemRepository
    )
    {
        $this->stockItemRepository = $stockItemRepository;
        $this->logger = $logger;
        parent::__construct($context);
    }
    
    
    public function getStockItemInformation($productId)
    {
        

        return $this->stockItemRepository->get($productId);
    }
}