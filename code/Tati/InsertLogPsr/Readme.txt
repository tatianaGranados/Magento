LOGS: Se usan mas con el fin de debugear o sacar un reporte de algo o que datos estoy recibiendo por
parte de alguna dependencia. y asegurarnos que se muestra toda la informacion.
Se realiza mediante 2 formas:
* zentFramework -> tiene una dependencia que nos permite usar archivos log y crear en el directorio
                    var
* Dependecia LoggerInterface-> por medio de modulo PSR

para este modulo se creara mediante:

creamos un log mediante la dependencia LoggerInterface PSR

nuestro archivo esta en var/log/debug.log
revisarlo para ver que muestra esta al final
tiene varios metodos como:
* alert->
* critical ->
* error->
* infor->

tenemos que saber manera segun el problema, y lo envian al sytem en orden

route: http://m2git.devbox/insertLogPsr/Index/ejemplo

