6.3.

Agregar un nuevo atributo customer, loyal_customer con valor yes/no
 * colocar el valor NO por defecto
 * si el customer place realiza 2 o mas orders poner yes
 * no olvides algregar el valor por defecto al atributo set de un customer entity


1° instalar el atributo ->setup\installData.php
2° setear lo valores de yes/no  ->observer\UpdateLoyalCustomerFlag.php

esto por events



nota: para ver los atributos creados en la tabla eav_attribute
pws nueva accont: prueba123!

comandos.
 bin/magento setup:upgrade   -> para iniciar el atributo

