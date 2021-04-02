Creacion de un comando que dice hola

* 1° se crea el di.xml el cual llamara a la clase commandlist
* 2° se crea la clase en el directorio Console el cual extendera de synfony Command
* 3° en la clase se crea 2 metodos configure() and execute(InputInterface $input, OutptuInterface $output)
que nos ayudaran a crear este comando
 -  tenemos que declarar nuestra entrada con setName and setDescription
 -  y que saldra talvez con writeln


 para ver nuestro camando ejecutamos
 bin/magento list


 revisar algo anda mall
 solucione con esto
 rm -rf generated/* rm -rf pub/static/* y rm -rf var/*
