<?php
// Crea la clase Agenda
class Agenda {
    // Crea una variable privada conexion que solo es accesible desde la clase
    private $conexion;
    // Constructor para recibir la conexión
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Funcion para insertear una agenda que recibe los valores nombre, descripcion, propietario y estado
    public function insertarAgenda($nombre, $descripcion, $propietario, $estado) {
        // Crea la consulta sql para insertar datos en la bd
        $sql = "INSERT INTO agenda (nombre, descripcion, propietario, estado) VALUES (?, ?, ?, ?)";

        // Prepara la consulta
        $stmt = mysqli_prepare($this->conexion, $sql);

        // Reemplaza los "?" por los datos enviados
        mysqli_stmt_bind_param($stmt, "ssss", $nombre, $descripcion, $propietario, $estado); // "sss" significa string como "i" significaria int

        // Comprueba si se ejecuto la consulta
        if (mysqli_stmt_execute($stmt)) {
            // Redirije al index de la pagina principal
            header("Location: index.php");
        }
        // Cierra el stmt
        mysqli_stmt_close($stmt);

        // Termina la ejecucion del programa
        exit;
    }

    // Funcion para actualizar una agenda que recibe el id, nombre, descripcion y estado
    public function actualizarAgenda($id, $nombre, $descripcion, $estado) {
        // Crea la consulta que actualiza los datos de la agenda que tenga la id especificada
        $sql = "UPDATE agenda SET nombre = ?, descripcion = ?, estado = ? WHERE id = ?";

        // Prepara la consulta
        $stmt = mysqli_prepare($this->conexion, $sql);

        // Reemplaza los "?" por los valores enviados
        mysqli_stmt_bind_param($stmt, "ssii", $nombre, $descripcion, $estado, $id); // "sss" significa string como "i" significaria int

        // Comprueba si se ejecuto la consulta
        if (mysqli_stmt_execute($stmt)) {
            // Redirije al index de la pagina principal
            header("Location: index.php");
        }
        
        // Cierra el stmt
        mysqli_stmt_close($stmt);

        // Termina la ejecucion
        exit;
    }

    // Funcion para eliminar una agenda que recibe la id
    public function eliminarAgenda($id) {
        // Crea la conslta para borrar el elemento
        $sql = "DELETE FROM agenda WHERE id = ?";

        // Prepara la consulta
        $stmt = mysqli_prepare($this->conexion, $sql);

        // Reemplaza los "?" con la id
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Ejecuta la consulta
        mysqli_stmt_execute($stmt);

        // reirije al index
        header("Location: index.php");

        // Cierra el stmt
        mysqli_stmt_close($stmt);

        // Termina la ejecucion
        exit;
    }
}

?>
