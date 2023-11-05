<?php
// Incluir el archivo de conexión a la base de datos (db.php)
include('db.php');

// Recuperar los datos del formulario
$username = $_POST['name'];
$password = $_POST['password'];
// Validar las credenciales (esto es muy básico, se debe mejorar)
$query = "SELECT * FROM usuarios WHERE username ='$username' AND pass ='$password'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) == 1) {
    // Inicio de sesión exitoso
    header('Location: main.php'); // Redirige a la página de inicio después del inicio de sesión exitoso
    die();
} else {
    // Inicio de sesión fallido
    header('Location: index.php?fallo=true');
    die();
}
?>
