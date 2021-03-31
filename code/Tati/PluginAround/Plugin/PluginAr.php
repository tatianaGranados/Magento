<?php


namespace Tati\PluginAround\Plugin;


use Magento\ImportExport\Block\Adminhtml\Import\Edit\Before;

class PluginAr
{
    public function beforeSetTitle(\Tati\PluginAround\Controller\Index\Ejemplo $subject, $title)
    {
        $title = $title . ' a ';
        echo __METHOD__.'</br>';
        //1 ° Tati\PluginAround\Plugin\PluginAr::beforeSetTitle
        return [$title];
        //concatena $title

    }

    public  function afterGetTitle(\Tati\PluginAround\Controller\Index\Ejemplo $subject, $result)
    {
        echo __METHOD__.'</br>';
        return '<h1>'.$result.'afteGetTitle_Tati'.'</h1>';
        //5° bienvenido a afteGetTitle_Tati
    }

    public function aroundGetTitle(\Tati\PluginAround\Controller\Index\Ejemplo $subject, callable $proceed)
    {
        echo __METHOD__. '- Before proceed() </br>';
        //2° bienvenido a Tati\PluginAround\Plugin\PluginAr::aroundGetTitle- Before proceed()

        $result= $proceed();
        echo __METHOD__. '- After proceed() </br>';
        //3° Tati\PluginAround\Plugin\PluginAr::aroundGetTitle- After proceed()
        return $result;
        //4° Tati\PluginAround\Plugin\PluginAr::afterGetTitle
    }
}
