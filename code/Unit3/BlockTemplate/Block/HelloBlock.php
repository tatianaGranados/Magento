<?php


namespace Unit3\BlockTemplate\Block;


use Magento\Framework\View\Element\Template;

class HelloBlock extends Template
{
    public function sayHello(){
        return "hello world tati";
    }
}
