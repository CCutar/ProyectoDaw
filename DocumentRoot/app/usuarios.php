<?php
session_start();
include('db.php');
include('UserManager.php');

// Crear una instancia de AdministradorUsuarios con tu conexión PDO
$administradorUsuarios = new AdministradorUsuarios($pdo);

// Manejar las solicitudes
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Acción de agregar o actualizar usuario
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        $datosUsuario = [
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'email' => $_POST['email'],
            'contrasena' => password_hash($_POST['contrasena'], PASSWORD_DEFAULT),
            'username' => $_POST['username'],
            'es_admin' => $_POST['es_admin']
        ];

        if ($accion == 'agregar') {
            // Agregar nuevo usuario
            $idUsuario = $administradorUsuarios->agregarUsuario($datosUsuario);
            echo 'success|Usuario agregado con éxito.|' . $idUsuario;
        } elseif ($accion == 'editar' && isset($_POST['idUsuario'])) {
            // Actualizar usuario existente
            $datosUsuario['idUsuario'] = $_POST['idUsuario'];
            if ($administradorUsuarios->actualizarUsuario($datosUsuario)) {
                echo 'success|Usuario actualizado con éxito.';
            } else {
                echo 'error|Error al actualizar el usuario.';
            }
        } else {
            echo 'error|Acción no válida.';
        }
    }
    // Acción de eliminar usuario
    elseif (isset($_POST['accion']) && $_POST['accion'] == 'eliminar' && isset($_POST['idUsuario'])) {
        $idUsuario = $_POST['idUsuario'];
        if ($administradorUsuarios->eliminarUsuario($idUsuario)) {
            echo 'success|Usuario eliminado con éxito.';
        } else {
            echo 'error|Error al eliminar el usuario.';
        }
    } else {
        echo 'error|Solicitud no válida.';
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Obtener todos los usuarios para mostrar en la tabla
    $usuarios = $administradorUsuarios->obtenerTodosLosUsuarios();
    $respuesta = 'success|' . json_encode($usuarios);
    echo $respuesta;
} else {
    echo 'error|Método no permitido.';
}
?>