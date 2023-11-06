<?php
// Incluir el archivo de conexión a la base de datos (db.php)
include('db.php');



    // Recuperar los datos del formulario
    $username = htmlspecialchars($_POST['name']);
    $pass = htmlspecialchars($_POST['password']);
try {    
    $query = "SELECT email, contrasena FROM usuario WHERE email = :username AND contrasena = :pass ";
    $stmt = $pdo->prepare($query);

    // Enlazar los parámetros
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    
    $stmt->execute();

    // Verificar si se encontró un registro
    if ($stmt->rowCount() == 1) {
        // Inicio de sesión exitoso
        header('Location: main.php'); // Redirige a la página de inicio después del inicio de sesión exitoso
        die();
    } else {
        // Inicio de sesión fallido
        //header('Location: index.php?fallo=true');
        die();
    }
} catch (PDOException $e) {
    // Manejar errores de conexión o consulta
    echo "Error: " . $e->getMessage();
}
