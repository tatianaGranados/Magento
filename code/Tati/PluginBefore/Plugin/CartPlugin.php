<?php


namespace Tati\PluginBefore\Plugin;


class CartPlugin
{
    public function beforeAddProduct(\Magento\Checkout\Model\Cart $subject, $productInfo, $requestInfo = null){
        //cambiamos en valor del
        $requestInfo['qty']=19;
        return [$productInfo,$requestInfo];
    }
}
