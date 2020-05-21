<?php
#CONFIGURAR ACCESO A LA BASE DE DATOS

define('DB_MOTOR','mysqli');/*en caso de usar ADODB */
define('DB_HOST','localhost:3308');
define('DB_USUARIO','root');
define('DB_PASSWORD','');
define('DB_NOMBRE','pw2020');

#RUTA DE LA APLICACIÓN
// echo dirname(dirname(__FILE_)); /* para probar */
define('RUTA_APP', dirname(dirname(__FILE__)));

// define('RUTA_URL','_URL_'); http://dominio/recurso





define('RUTA_URL', 'http://localhost/pw20201mvc');

define('NOMBRE_SITIO', 'Programación Web - I.T. de Deliicias');


?>