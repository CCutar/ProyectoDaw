<?php
// Configuración de la base de datos
$db_host = 'mariadb';
$db_user = 'super';
$db_pass = 'super';
$db_name = 'testdatabase';


// Conexión a la base de datos
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$con) {
    die('Error al conectar a la base de datos: ' . mysqli_connect_error());
}
?>