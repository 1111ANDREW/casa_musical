<?php
require_once("../auth.php");
require_once("../clases/gestion_agenda.php");
require_once("../conexion.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Crear instancia y eliminar estudiante
    $agenda = new Agenda($conexion);
    $agenda->eliminarAgenda($id);
        
}
?>