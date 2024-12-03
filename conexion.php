<?php
// Define el host, el nombre de usuario, la contraseña, y el nombre de la base de datos que se usaran
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_agenda';

// Conecta con la base de datos con las variables anteriormente definidas
$conexion = mysqli_connect($host, $username, $password, $database);

// Verificar la conexión
if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>