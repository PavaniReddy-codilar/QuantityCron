<?php

namespace Codilar\ProductAdmin\Controller\Adminhtml\ProductAdmin;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Codilar\ProductAdmin\Model\ProductAdminFactory as ModelFactory;
use Codilar\ProductAdmin\Model\ResourceModel\ProductAdmin as ResourceModel;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @var ModelFactory
     */
    protected $modelFactory;

    /**
     * @var ResourceModel
     */
    protected $resourceModel;


    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        ModelFactory $modelFactory,
        ResourceModel $resourceModel
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
    }
     public function execute()
    {
         $page=$this->pageFactory->create();
         $data=$this->getRequest()->getParams();
         $ProductAdmin = $this->modelFactory->create();
         $ProductAdmin->load($data['entity_id']);
         $page->getConfig()->getTitle()->set('ProductAdmin '.$ProductAdmin->getName().' details');
         return $page;
    }
}