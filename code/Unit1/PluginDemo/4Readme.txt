practice 4:

* crear un plugin que sea de tipo after para la funcion dispatch \Magento\framework\App\Action\Action::dispatch
de esa clase, y es llamado cada vez que se procese una url,
 - solo funciana en frontend  -> por lo que estara en la carpeta /etc/frontend de mi modulo

Nota: la ruta \Magento\framework\App\Action\Action se encuentra el lib\internal


* insertar una dependencia que es \Psr\Log\LoggerInterface dentro el plugin
  - esto se hace en el control o class plugin y se crea el contructor
  - se vera el la carpeta var/log/system


*
