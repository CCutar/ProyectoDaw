<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="product.css">
    <title>Productos</title>
</head>
<body>
    <?php include("../includes/sidebar.php")?>

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
        include('../modelos/modeloProducto.php');
            $product = new Product();
            $products = $product->getProducts();

            if ($products) {
            foreach ($products as $product) {
                echo "<tr>";
                echo "<td>" . $product['id'] . "</td>";
                echo "<td>" . $product['nombre_producto'] . "</td>";
                echo "<td>" . $product['decripcion_producto'] . "</td>";
                echo "<td>" . $product['precio'] . "</td>";
                echo "<td>" . $product['margen_porcentaje'] . "</td>";

                echo "<td> 
                    <form method='post' action='./controladores/controladorProductos.php'>
                    <input type='hidden' name='action' value='update'>
                    <input type='hidden' name='id' value=" . $product['id'] .">
                    <label for='nuevoMargen'>Nuevo Margen:</label>
                                <input type='number' name='nuevoMargen' id='nuevoMargen' required>
                    <button type='submit'>Editar Margen </button>
                    </form>
                    </td>";
                    
                echo "</tr>";
            }
        } else {
            echo "<tr><td> 'No se encontraron productos.'</td></tr>";
        }
        ?>
    </table>

    </section>
</body>
</html>