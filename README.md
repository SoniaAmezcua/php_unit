# phpunit
Ejemplo de pruebas con php unit
 https://codigofacilito.com/cursos/php-testing

 

Ejecutar test
composer dump-autoload
./vendor/bin/phpunit test
./vendor/bin/phpunit --bootstrap ./vendor/autoload.php test/firstTest.php


./vendor/bin/phpunit test/firstTest.php  

#Ejecutar una suite 
./vendor/bin/phpunit --testsuite unit