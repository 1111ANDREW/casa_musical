<?php
// Inluye eñ archivo usuario y el archivo conexion
require_once('conexion.php');
require_once('clases/usuario.php');

// Crea el objeto usuario de la clase Usuario pasandole la conexion
$usuario = new Usuario($conexion);

// Inicia una sesion
session_start();

// Comprueba si se enviaron datos por el metodo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Define variables con los datos recepcionados
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $contraseña = $_POST['contraseña'];

  // Llama a la funcion registrarUsuario de la clase y le pasa los datos
  $usuario->registrarUsuario($nombre, $correo, $contraseña);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>casa musical</title>
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card p-4 shadow" style="max-width: 400px; width: 100%;">
        <!-- Formulario -->
  <h1>Registrarse</h1><hr>


    <form method="POST">
      <!-- Campo de nombre -->
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" required>
      </div>

      <!-- Campo de correo -->
      <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" id="correo" name="correo" class="form-control" required>
      </div>

      <!-- Campo de contraseña -->
      <div class="mb-3">
        <label for="contraseña" class="form-label">Contraseña</label>
        <input type="password" id="contraseña" name="contraseña" class="form-control" required>
      </div>

      <!-- Botón de registro -->
      <button type="submit" class="btn btn-primary w-100">Registrar</button>

      <!-- Enlace a iniciar sesión -->
      <a href="index.php" class="btn btn-link w-100 text-center mt-2">Iniciar Sesión</a>
    </form>
  </div>
</body>

</html>