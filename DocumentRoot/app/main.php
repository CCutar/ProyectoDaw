<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="sidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Home</title>
    <style>
         /* Estilo personalizado para la barra de navegación */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 20%;
            background-color: #343a40;
            padding: 20px;
            color: #fff;
        }

        /* Estilo para los íconos de FontAwesome (debes incluir FontAwesome en tu proyecto) */
        .sidebar i {
            margin-right: 10px;
        }

        /* Estilo para los elementos del menú */
        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="sidebar">
        <h1>Backoffice</h1>
        <div class="info-menu-lateral">
            <img class="logo-menu-lateral" src="https://www.logomaker.com/api/main/images/1j+ojFVDOMkX9Wytexe43D6kh...OJqBBPmhrFwXs1M3EMoAJtliklh...Rs9...8+ " alt="Logo de la empresa" width="95" height="57">
            <a>Nombre</a>
            <a>ROL</a>
        </div>
        <ul>
            <li><a href="main.php"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="estadisticas.php"><i class="fas fa-chart-bar"></i> Estadisticas</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Productos</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Reclamaciones</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Usuarios</a></li>
        </ul>
        <section class="logout">
            <a href="kill.php"><i class="fas fa-cog"></i> LOG OUT</a>

        </section>
    </div>
    <div class="container text-center">
    <h1>HOME</h1>
    </div>
    <!-- Contenido principal -->
    <div class="content" style="margin-left: 20%;">
        <div class="grid-container">
    
            <div class="top-left">
                <h2>Productos Populares</h2>
                <img src="http://2.bp.blogspot.com/_QiCa_HtqEag/TBenazjFF0I/AAAAAAAAAAM/Hvp5sAJwcwE/s1600/1.jpg" alt="imagen">
            </div>
            <div class="top-right">
                <h2>Ventas mensuales </h2>
                <img src="https://mktefa.ditrendia.es/hubfs/Imagen7.png" alt="imagen2">
            </div>
            <div class="bottom-left">
                <h2>Ventas Anuales </h2>
                <img src="http://2.bp.blogspot.com/_QiCa_HtqEag/TBenazjFF0I/AAAAAAAAAAM/Hvp5sAJwcwE/s1600/1.jpg" alt="">
            </div>
            <div class="bottom-right">
                <h2>Ventas por países </h2>
                <img src="http://2.bp.blogspot.com/_QiCa_HtqEag/TBenazjFF0I/AAAAAAAAAAM/Hvp5sAJwcwE/s1600/1.jpg" alt="">
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>