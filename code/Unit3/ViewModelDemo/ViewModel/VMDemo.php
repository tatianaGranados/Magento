<?php


namespace Unit3\ViewModelDemo\ViewModel;


use Magento\Framework\View\Element\Block\ArgumentInterface;

class VMDemo implements ArgumentInterface
{
    public function sayHello(){
        return "helol!";
    }
}
