<?php

class Usuario {
    public $conexion;
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Método para registrar un usuario
    public function registrarUsuario($nombre, $correo, $contraseña) {
        $contraseña_cifrada = password_hash($contraseña, PASSWORD_DEFAULT); // Encripta la contraseña
        $sql = "INSERT INTO usuario (nombre, correo, contraseña) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($this->conexion, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $nombre, $correo, $contraseña_cifrada);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php");
        }
        mysqli_stmt_close($stmt);
        exit;
    }

    // Método para iniciar sesión
    public function iniciarSesion($correo, $contraseña) {
        $sql = "SELECT * FROM usuario WHERE correo = '$correo'";
        $resultado = mysqli_query($this->conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            $usuario = mysqli_fetch_assoc($resultado);
            if (password_verify($contraseña, $usuario['contraseña'])) {
                $_SESSION["usuario"] = $usuario["nombre"];
                $_SESSION["autenticado"] = true;
                header("Location: agenda/index.php");
                exit;
            }
        }
    }
}
?>