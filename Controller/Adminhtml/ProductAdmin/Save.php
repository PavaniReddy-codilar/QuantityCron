<?php

namespace Codilar\ProductAdmin\Controller\Adminhtml\ProductAdmin;

use Magento\Framework\App\Action\Action;
use Codilar\ProductAdmin\Model\ProductAdminFactory as ModelFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Codilar\ProductAdmin\Model\ResourceModel\ProductAdmin as ResourceModel;
use Magento\Framework\App\Action\Context;

class Save extends Action
{

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
        ModelFactory $modelFactory,
        ResourceModel $resourceModel
    )
    {
        parent::__construct($context);
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
    }


    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $product = $this->modelFactory->create();
        if(!empty($data['entity_id'])){
            $this->resourceModel->load($product,$data['entity_id']);
        }
       
        $product->setName($data['name'] ?? null);
        $product->setEmail($data['email'] ?? null);
        $product->setMobile($data['mobile'] ?? null);
        $product->setMessage($data['message'] ?? null);
        $product->setMessage($data['message'] ?? null);
         $product->setIsActive($data['is_active'] ?? null);
    
            $product->setModelImage($data['icon'][0]['url']);
    
        $this->resourceModel->save($product);
        $this->messageManager->addSuccessMessage(__('%1 saved successfully', $product->getName()));
        return $this->resultRedirectFactory->create()->setPath('*/*/index');
    }
}
//     public function imgupload()
// {
//    if (isset($data['model_image'][0]['name']) && isset($data['model_image'][0]['tmp_name'])) {
//                 $data['model_image'] = $data['model_image'][0]['name'];
//                 $this->imageUploader->moveFileFromTmp($data['image']);
//             } elseif (isset($data['model_image'][0]['name']) && !isset($data['model_image'][0]['tmp_name'])) {
//                 $data['model_image'] = $data['model_image'][0]['name'];
//             } else {
//                 $data['model_image'] = '';
//             }
// }
// }