Practices is: 4.1 , 4.2

4.3. crear un data patch y insertar 2 valores (records) en la table pets


nota:
1° los data patch se generan en el dir Setup\Patch\Data
si quiere ver las ruta en la base de datos esta en la tabla patch_list  -> registra todos los patch instalados
nos sirve de guia para copiar configuracion de su archivo
ej: \Magento\Directory\Setup\Patch\Data\AddDataForMexico

2° creamos una clase php
3° implementamos en la clase DataPatchInterface ->  implements DataPatchInterface
   y sus inyecciones

4° crear su constructor para agregar esos 2 records con ModuleDataSetupInterface
5° inizializacion sus propiedades
6° en la funcion apply creamos los arreglos for add


comandos de ejecucion:
bin/magento setup:db-data:upgrade




