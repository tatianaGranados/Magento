4.2. Crear un nuevo modulo y agregar otra columna pet_type
 * variable varchar(100) con el valor por defecto Cat en la tabla pets



nota: cuando es una tabla creada por otro modulo, lo unico que declaramos es el nombre de la tabla
en el archivo db_schema.xml

    * agregamos la columna que deseemos aumentar a la tabla pet
        <column xsi:type="varchar" name="pet_type" nullable="false" default="Cat" length="100"
                comment="Pet type"/>

    * si queremos eliminar una columna: ponemos el nombre de la columnda y disable en true
       <column name="updated_at" disable="true" />


comandos:
bin/magento setup:db-declaration:generate-whiteList --module-name Unit4_Pet
bin/magento setup:db-schema:upgrade

4.3. crear un data patch
