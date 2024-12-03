<?php
require_once("../auth.php");
require_once("../conexion.php");
require_once("../clases/gestion_agenda.php");
$agenda = new Agenda($conexion);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $propietario = $_SESSION["usuario"];
    $estado = true;
    $agenda->insertarAgenda($nombre, $descripcion, $propietario, $estado);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <title>Agregar</title>
</head>
<body class="bg-light">
  <div class="container my-5">
    <!-- Título de la página -->
    <h1 class="text-primary text-center mb-4">Agregar Instrumento</h1>

    <!-- Formulario -->
    <form method="POST" class="bg-white p-4 rounded shadow-sm">
      <!-- Campo de Nombre -->
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre del instrumento" required>
      </div>

      <!-- Campo de Descripción -->
      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control" rows="4" placeholder="Ingrese una descripción del instrumento" required></textarea>
      </div>

      <!-- Botón de envío -->
      <button type="submit" class="btn btn-primary w-100">Crear Instrumento</button>
    </form>
  </div>

  <!-- Enlace al JS de Bootstrap (opcional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>