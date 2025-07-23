<?php
namespace Bhavesh\Deliverydate\Block\Product;

use Magento\Framework\View\Element\Template;
use Bhavesh\Deliverydate\Helper\Data as DeliveryDateHelper;

class DeliveryDate extends Template
{
    protected $helper;

    public function __construct(
        Template\Context $context,
        DeliveryDateHelper $helper,
        array $data = []
    ) {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }

    public function isEnabled()
    {
        return $this->helper->isEnabled();
    }

    public function getCurrentProduct()
    {
        return $this->getLayout()->getBlock('product.info')->getProduct();
    }
}
