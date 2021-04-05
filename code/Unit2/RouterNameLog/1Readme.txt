2.1. Crear una extension y que cree un log de la lista de routers de cada request
que se hace usando la funcion get_class($router)

Utiliza la clase FrontController.php -> Magento\Framework\App
la funcion distpath y haremos un override de esa funcion
click derecho sobre el nombre de la funcion y seleccionamos override para heredar
    * area->global->porq esta en App
    * class name->FrontController
    * directory->App
se crea la clase y configuracion de DI
