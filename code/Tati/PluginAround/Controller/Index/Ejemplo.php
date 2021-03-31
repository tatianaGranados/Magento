<?php


namespace Tati\PluginAround\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;

class Ejemplo extends  Action
{
    protected $title;
    public function execute()
    {
        echo $this->setTitle('bienvenido');
        echo $this->getTitle();
    }

    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function  getTitle(){
        return $this->title;
    }
}
