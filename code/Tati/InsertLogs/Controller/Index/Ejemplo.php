<?php


namespace Tati\InsertLogs\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;

class Ejemplo extends Action
{

    //protected  $title;
    public function execute()
    {
        echo "generando Archivo Log";
        // Writer-> Creamos un archivo .log en este directorio con nombre miarchivo
        $writer = new \Zend\Log\Writer\Stream(BP.'/var/log/miarchivo.log');
        //creamos la variable logger
        $logger  = new \Zend\Log\Logger();
        //le agregamos la variable writer
        $logger->addWriter($writer);
        //escribiremos nuestro archivo .log a travez del metodo info
        $logger->info('este es una prueba de log');
        //BP: Es una variable constante de bootstrap
        $logger->info(BP);
        echo "archivo LOG generado";

    }
}
