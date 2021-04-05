4.1. Crear una tabla que se llame pet con los siguientes campos:
* pet_id
* customer_id  -> este debe hacer referencia al customer ID -> tener una llave foranea
* pet_name
* created_at
* update_at

comandos:

bin/magento setup:db-declaration:generate-whiteList --module-name Unit4_Pet
bin/magento setup:db-schema:upgrade


