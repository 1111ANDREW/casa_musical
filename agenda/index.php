<?php
require_once("../conexion.php");
require_once("../auth.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Agenda de registro</title>

</head>

<body class="bg-light">

<div class="container my-5">
    <!-- Título de la página -->
    <div class="d-flex justify-content-between align-items-center mb-4">

      <h1 class="text-primary">REGISTRO DE INSTRUMENTOS</h1>
      <a href="nuevo.php" class="btn btn-success">+ Nuevo Instrumento</a>
    </div>

    <!-- Bienvenida y Cerrar Sesión -->
    <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded shadow-sm mb-4">
        <div class="card text-center">
            <div class="card-body">
            <h6 class="mb-0" style="font-size: 1.25rem; font-weight: bold; color: #4CAF50;">Bienvenido, <strong><?= $_SESSION['usuario'] ?></strong></h6>
            </div>
        </div>
      <a href="../logout.php" class="btn btn-danger btn-sm">Cerrar Sesión</a>
    </div>

    <!-- Tabla de Instrumentos -->
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-primary">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Propietario</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
            <?php 
            $sql = "SELECT * FROM agenda";
            $resultado = mysqli_query($conexion, $sql);
            ?>
            <?php if (mysqli_num_rows($resultado) > 0): ?>
                <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                    <tr>
                        <td><?= $fila["id"] ?></td>
                        <td><?= $fila["nombre"] ?></td>
                        <td><?= $fila["descripcion"] ?></td>
                        <td><?= $fila["propietario"] ?></td>
                        <td><?= $fila["estado"] ? "Activo" : "Inactivo" ?></td>
                        <td>
                            <a href="editar.php?id=<?= $fila["id"] ?> "class="btn btn-warning">Editar</a>
                            <a href="eliminar.php?id=<?= $fila['id'] ?>" class="btn btn-danger" onclick="confirm('¿Seguro que deseas elminar este registro?')">Eliminar</a>
                            </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <td colspan="6">0 resultados</td>
            <?php endif; ?>
        </table>
    </div>

</body>

</html>