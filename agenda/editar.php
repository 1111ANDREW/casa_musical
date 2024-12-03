<?php
require_once("../auth.php");
require_once("../clases/gestion_agenda.php");
require_once("../conexion.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$sql = "SELECT * FROM agenda WHERE id = $id";
$resultado = mysqli_query($conexion, $sql);
$datos = mysqli_fetch_assoc($resultado);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $estado = isset($_POST["estado"]);
    $agenda = new Agenda($conexion);
    $agenda->actualizarAgenda($id, $nombre, $descripcion, $estado);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Editar</title>
</head>
<body class="bg-light">
  <div class="container my-5">
    <!-- Título -->
    <h1 class="text-center mb-4 text-primary">Editar instrumento</h1>

    <!-- Formulario -->
    <form method="POST" class="p-3 bg-white rounded shadow-sm">
      <!-- Nombre -->
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= $datos["nombre"] ?>" required>
      </div>

      <!-- Descripción -->
      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control" rows="3" required><?= $datos["descripcion"] ?></textarea>
      </div>

      <!-- Estado -->
      <div class="form-check mb-3">
        <input type="checkbox" name="estado" class="form-check-input" id="estado" <?= $datos["estado"] ? "checked" : "" ?>>
        <label for="estado" class="form-check-label">Activo</label>
      </div>

      <!-- Botón -->
      <button type="submit" class="btn btn-primary w-100">Actualizar</button>
    </form>
  </div>

  <!-- Bootstrap JS (opcional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>