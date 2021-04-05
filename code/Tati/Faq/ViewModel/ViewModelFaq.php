<?php


namespace Tati\Faq\ViewModel;


use Magento\Framework\View\Element\Block\ArgumentInterface;

class ViewModelFaq implements ArgumentInterface
{
    public function sayHello(){
        return "hella view model!";
    }
}
