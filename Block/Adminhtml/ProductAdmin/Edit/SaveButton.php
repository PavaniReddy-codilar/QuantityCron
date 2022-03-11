<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Codilar\ProductAdmin\Block\Adminhtml\ProductAdmin\Edit;

use Magento\Ui\Component\Control\Container;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
   
public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'on_click' => sprintf("location.href = '%s';", $this->getSaveUrl()),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'productdetails_form.productdetails_form',
                                'actionName' => 'save',
                                'params' => [
                                    false
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'class_name' => Container::SPLIT_BUTTON,
            'options' => $this->getOptions(),
            'sort_order' => 90,
        ];
    }

    /**
     * Retrieve options
     *
     * @return array
     */
    private function getOptions()
    {
        $options = [
            [
                'id_hard' => 'save_and_close',
                'label' => __('Save & Close'),
                'data_attribute' => [
                    'mage-init' => [
                        'buttonAdapter' => [
                            'actions' => [
                                [
                                    'targetName' => 'productdetails_form.productdetails_form',
                                    'actionName' => 'save',
                                    'params' => [
                                        true
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
            ]
        ];

        return $options;
    }
    public function getSaveUrl()
    {
        return $this->getUrl('productdetails/productadmin/form');
    }
}
    
    