<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="sidebar.css">
    <title>Estadísticas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .container-sm {
            margin-top: 20px;
            margin-bottom: 40px;
        }

        h1, h2, h3 {
            color: #343a40;
        }

        h2{
            font-size: 15px;
        }

        table {
            width: 100%;
            margin: auto;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php include("../includes/sidebar.php"); ?>
    <div class="container-sm text-center">
        <h1>Estadísticas</h1>
        <h2>Aquí encontrarás un resumen de ventas y productos</h2>

        <h3>Productos Mensuales</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-sm mx-auto">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Ventas Mensuales</th>
                        <th>Ingresos Mensuales</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tazas</td>
                        <td>150</td>
                        <td>10,000 euros</td>
                    </tr>
                    <tr>
                        <td>Cojines</td>
                        <td>120</td>
                        <td>8,000 euros</td>
                    </tr>
                    <tr>
                        <td>Tarjetas de Regalo</td>
                        <td>90</td>
                        <td>6,000 euros</td>
                    </tr>
                    <tr>
                        <td>Pósters</td>
                        <td>190</td>
                        <td>16,000 euros</td>
                    </tr>
                    <tr>
                        <td>Fundas de Teléfono</td>
                        <td>100</td>
                        <td>16,000 euros</td>
                    </tr>
                    <tr>
                        <td>Gorras Bordadas</td>
                        <td>190</td>
                        <td>18,000 euros</td>
                    </tr>
                    <tr>
                        <td>Cuadernos Personalizados</td>
                        <td>190</td>
                        <td>18,000 euros</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="container-sm text-center">
        <h3>Ventas</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-sm mx-auto">
                <thead>
                    <tr>
                        <th>Nombre Empleado</th>
                        <th>Ventas Mensuales</th>
                        <th>Ventas Anuales</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Anna Ramirez</td>
                        <td>150</td>
                        <td>100,000 euros</td>
                    </tr>
                    <tr>
                        <td>Jose Fernandez</td>
                        <td>12</td>
                        <td>28,000 euros</td>
                    </tr>
                    <tr>
                        <td>Fernanda Araujo</td>
                        <td>9</td>
                        <td>26,000 euros</td>
                    </tr>
                    <tr>
                        <td>Armando Fernandez</td>
                        <td>190</td>
                        <td>36,000 euros</td>
                    </tr>
                 
                    
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
