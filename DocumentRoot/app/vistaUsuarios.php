<?php
include('usuarios.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Administrador de Usuarios</h1>

    <!-- Formulario para agregar/editar usuarios -->
    <form id="usuarioForm">
        <input type="hidden" id="accion" name="accion" value="">
        <input type="hidden" id="idUsuario" name="idUsuario" value="">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Nombre de usuario:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
            <label for="es_admin" class="form-label">¿Es administrador?</label>
            <select class="form-select" id="es_admin" name="es_admin" required>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <button type="button" class="btn btn-primary" onclick="guardarUsuario()">Guardar Usuario</button>
    </form>

    <hr>

    <!-- Tabla para mostrar usuarios -->
    <h2>Lista de Usuarios</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Username</th>
                <th>Es Admin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tablaUsuarios">
            <!-- Aquí se mostrarán los usuarios -->
        </tbody>
    </table>
</div>

</body>
</html>



