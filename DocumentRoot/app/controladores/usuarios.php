<?php
session_start();
include('../db.php');
include('../modelos/UserManager.php');

// Crear una instancia del AdministradorUsuarios con tu conexión PDO
$administradorUsuarios = new AdministradorUsuarios($pdo);

// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se envió el formulario para agregar o editar usuarios
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];

        if ($accion == 'agregar') {
            // Obtener los datos del formulario y agregar el usuario
            $datosUsuario = [
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'email' => $_POST['email'],
                'contrasena' => $_POST['contrasena'],
                'username' => $_POST['username'],
                'es_admin' => $_POST['es_admin']
            ];
            $administradorUsuarios->agregarUsuario($datosUsuario);
        } elseif ($accion == 'editar') {
            // Obtener los datos del formulario y actualizar el usuario
            $datosUsuario = [
                'idUsuario' => $_POST['idUsuario'],
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'email' => $_POST['email'],
                'contrasena' => $_POST['contrasena'],
                'username' => $_POST['username'],
                'es_admin' => $_POST['es_admin']
            ];
            $administradorUsuarios->actualizarUsuario($datosUsuario);
        }
    }

    // Verificar si se envió una solicitud para eliminar usuario
    if (isset($_POST['accion']) && $_POST['accion'] == 'eliminar' && isset($_POST['idUsuario'])) {
        // Obtener el ID del usuario a eliminar y ejecutar la función
        $idUsuarioEliminar = $_POST['idUsuario'];
        $administradorUsuarios->eliminarUsuario($idUsuarioEliminar);
    }
}

// Obtener todos los usuarios
$usuarios = $administradorUsuarios->obtenerTodosLosUsuarios();
?>
