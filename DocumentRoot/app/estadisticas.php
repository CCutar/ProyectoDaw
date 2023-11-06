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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        h1 {
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
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
            <li><a href="estadisticas.php"><i class="fas fa-chart-bar"></i>Estadisticas</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Productos</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Reclamaciones</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Usuarios</a></li>
        </ul>
        <section class="logout">
            <a href="kill.php"><i class="fas fa-cog"></i> LOG OUT</a>

        </section>
    </div>
    <div class="container">
        <h2>Productos más vendidos</h2>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Ventas Mensuales</th>
                    <th>Ingresos Mensuales</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Producto A</td>
                    <td>150</td>
                    <td>$10,000</td>
                </tr>
                <tr>
                    <td>Producto B</td>
                    <td>120</td>
                    <td>$8,000</td>
                </tr>
                <tr>
                    <td>Producto C</td>
                    <td>90</td>
                    <td>$6,000</td>
                </tr>
                <!-- Agrega más filas con información de productos aquí -->
            </tbody>
        </table>
    </div>


</body>
</html>