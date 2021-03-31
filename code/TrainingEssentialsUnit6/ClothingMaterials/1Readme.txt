exercise 6.1.  y 6.2
6.1. Crear un atributo de producto
* crear una nueva tabla llamada clothing_material con 3 columnas:
    - materia_id
    - material
    - count
   hay que llenar con la siguiente informacion: cotton, wool. lines, viscose
   y el contador inicializara en 0 siempre.
   usa db_schemas ni db_patch

* Crear un nuevo atributo clothing_material de tipo select, de scope global
    -  debe poder ser ejecutable desde la navegacion por capas
    - agregar este atributo a  atributo set Top (explora el folder Magento/Eav/Api para encontrar la interfaz
    correcta)
        - el resource model debe tomar los valores de la talba clothing materia
        - crear un backend model que actualize el contador de nuestra tabla clothing materia cada vez
          que un atributo es guardado.


InstallSchema.php -> crea la tabla , es una manera antigua de crearlas en la v2.2.
installDat.php->crea informacion en este caso el atributo.


backend-> en add atributo agrega un contador
source-> carga una coleccion de los materiales



comandos:
bin/magento setup:upgrade
bin/magento s:s:de -ft Magento/Backend  -> para que no tarde en deployar el admin

