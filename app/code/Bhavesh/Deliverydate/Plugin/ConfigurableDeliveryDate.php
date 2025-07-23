<?php
namespace Bhavesh\Deliverydate\Plugin;

class ConfigurableDeliveryDate
{
    public function afterGetJsonConfig(
        \Magento\ConfigurableProduct\Block\Product\View\Type\Configurable $subject,
        $result
    ) {
        $product = $subject->getProduct();
        $simpleProducts = $product->getTypeInstance()->getUsedProducts($product);

        $dates = [];
        foreach ($simpleProducts as $simpleProduct) {
            if ($simpleProduct->getDeliveryDate()) {
                $dates[] = strtotime($simpleProduct->getDeliveryDate());
            }
        }

        if ($dates) {
            $nearest = min($dates);
            $resultArray = json_decode($result, true);
            $resultArray['delivery_date'] = date('Y-m-d', $nearest);
            return json_encode($resultArray);
        }

        return $result;
    }
}