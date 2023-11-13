<?php
include('../controladores/usuarios.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de Usuarios</title>
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Agregar Usuarios</h1>

    <!-- Formulario para agregar/editar usuarios -->
    <form method="post" action="">
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

        <button type="submit" class="btn btn-primary" name="accion" value="agregar">Guardar Usuario</button>
    </form>

    <hr>

    <h2>Lista de Usuarios</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Username</th>
                <th>Es Admin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tablaUsuarios">
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['nombre'] ?></td>
                    <td><?= $usuario['apellido'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td><?= $usuario['username'] ?></td>
                    <td><?= $usuario['es_admin'] == 1 ? 'Sí' : 'No' ?></td>
                    <td>
                    
                        <form method="post" action="UserManager.php">
                        <input type="hidden" name="accion" value="editar">
                        <input type="hidden" name="idUsuario" value="<?= $usuario['id'] ?>">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $usuario['nombre'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $usuario['apellido'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $usuario['email'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de usuario:</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $usuario['username'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="es_admin" class="form-label">¿Es administrador?</label>
                            <select class="form-select" id="es_admin" name="es_admin" required>
                                <option value="1" <?= $usuario['es_admin'] == 1 ? 'selected' : '' ?>>Sí</option>
                                <option value="0" <?= $usuario['es_admin'] == 0 ? 'selected' : '' ?>>No</option>
                            </select>
                        </div>

                        <button type="submit">Guardar Usuario</button>
                    </form>

                            <form method="post" action="vistaUsuarios.php">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="idUsuario" value="<?= $usuario['id'] ?>">
                            <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Borrar</button>
                        </form>
                    
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>    
    </table>
</div>
</body>
</html>



