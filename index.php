<!-- Login -->
<?php
// Inluye eñ archivo usuario y el archivo conexion
require_once "clases/usuario.php";
require_once "conexion.php";

// Comiensa una session para usar variables $_SESSION
session_start();

// Comprueba si se enviaron datos por el metodo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Limpia la variable correo para eliminar espacios en blanco o simbolos no permitidos
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);

    // Recibe el valor del formulario con nombre contraseña
    $contraseña = $_POST['contraseña'];

    // Crea el objeto usuario de la clase Usuario pasandole la conexion
    $usuario = new Usuario($conexion);

    // Llama al metodo iniciarSesion de la clase y le pasa el correo y la contraseña
    $usuario->iniciarSesion($correo, $contraseña);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Iniciar Sesión</title>
</head>

<body  class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card p-4 shadow" style="max-width: 400px; width: 100%;">
    <h1 class = "text-center">Iniciar Sesión</h1>   
    <hr>
    <!-- Formulario que envia los datos de inicio de sesion -->
    <form method="POST"> <!-- Envia los datos por el método POST con "method" -->
  <!-- Campo de correo -->
  <div class="mb-3">
    <label for="correo" class="form-label">Correo electrónico</label>
    <input type="email" class="form-control" name="correo" id="correo" required>
  </div>
  <!-- Campo de contraseña -->
  <div class="mb-3">
    <label for="contraseña" class="form-label">Contraseña</label>
    <input type="password" class="form-control" name="contraseña" id="contraseña" required>
  </div>
  <!-- Botón para enviar los datos -->
  <button type="submit" class="btn btn-primary">Ingresar</button>
  
  <!-- Enlace para registrarse -->
  <a href="register.php" class="btn btn-link">Registrarse</a>
</form>
</div>

    <!-- Fin del formulario -->
</body>

</html>