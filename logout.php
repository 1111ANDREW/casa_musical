<?php
// Inicia la session
session_start();

// Destruye la sesion y borra las variables
session_destroy();

// Redirije al login
header("Location: index.php");

// Termina la ejecucion
exit;
?>