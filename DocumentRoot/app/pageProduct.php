<!DOCTYPE html>
<html lang="en">
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
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            border: 1px solid red;
            padding: 8px;
            text-align: left;
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
            <li><a href="pageProduct.php"><i class="fas fa-users"></i> Productos</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Reclamaciones</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Usuarios</a></li>
        </ul>
        <section class="logout">
            <a href="kill.php"><i class="fas fa-cog"></i> LOG OUT</a>

        </section>
    </div>
    <section>
    <h1>Lista de Productos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre del Producto</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Margen Porcentaje</th>
        </tr>
        <?php
        include('product.php');
        $product = new Product();
        $products = $product->getProduct();
        if ($products) {
            foreach ($products as $product) {
                echo "<tr>";
                echo "<td>" . $product['id'] . "</td>";
                echo "<td>" . $product['nombre_producto'] . "</td>";
                echo "<td>" . $product['descripcion_producto'] . "</td>";
                echo "<td>" . $product['precio'] . "</td>";
                echo "<td>" . $product['margen_porcentaje'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No se encontraron productos.</td></tr>";
        }
        ?>
    </section>
</body>
</html>