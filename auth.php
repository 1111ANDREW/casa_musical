<?php
// Comiensa una session para usar variables $_SESSION
session_start();

// Comprueba si el usuario no esta autenticado en tal caso redirije al login
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    // Redirije a la pagina
    header("Location: ../index.php");
    
    // Finaliza la ejecucion
    exit;
}

// Comprueba si paso 1 hora desde el ultimo inicio de sesion si el se da el caso cerrar la session 
if (isset($_SESSION['ultimo_acceso']) && (time() - $_SESSION['ultimo_acceso']) > 3000) {
    // Destrulle la session y borra las variables
    session_destroy();

    // Redirije al login
    header("Location: ../index.php");

    // Termina la ejecucion
    exit;
}

// Crea una variable session "ultimo acceso" que toma el tiempo actual
$_SESSION['ultimo_acceso'] = time();