<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="product.css">
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

        .circular-image {
        border-radius: 50%;
        width: 50px; /* Ajusta el tamaño según sea necesario */
        height: 50px; /* Ajusta el tamaño según sea necesario */
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
            <img class="circular-image" src="../img/logoArtee.png">
            <?php echo $_SESSION["username"];?>
            <a>ROL</a>
        </div>
        <ul>
            <li><a href="main.php"><i class="fas fa-home"></i> HOME</a></li>
            <li><a href="estadisticas.php"><i class="fas fa-chart-bar"></i> ESTADÍSTICAS</a></li>
            <li><a href="pageProduct.php"><i class="fas fa-users"></i>PRODUCTOS</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> TRADUCCIONES</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> USUARIOS</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> PREFERENCIAS</a></li>
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
            <th> <button id="openModalBtn">Agregar Producto</button></th>
        </tr>
        <?php
        include('product.php');
            $product = new Product();
            $products = $product->getProducts();
            // Resto del código para manejar los productos
        if ($products) {
            foreach ($products as $product) {
                echo "<tr>";
                echo "<td>" . $product['id'] . "</td>";
                echo "<td>" . $product['nombre_producto'] . "</td>";
                echo "<td>" . $product['decripcion_producto'] . "</td>";
                echo "<td>" . $product['precio'] . "</td>";
                echo "<td>" . $product['margen_porcentaje'] . "</td>";

                echo "<td><a href='product.php?id=" . $product['id']. "' ><input type='button' name='delete' id='delete' value='Borrar'></a></td>'"; // Botón de eliminación
                echo "<td><input type='button' name='update' id='update' value='Actualizar'" . $product['id'] . "'></td>"; // Botón de eliminación

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No se encontraron productos.</td></tr>";
        }
        ?>
    </table>
            <!-- Agrega un botón que abrirá la ventana modal -->

    </section>
    
    <section>

    </section>


<section>
<!-- Define la ventana modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeModal">&times;</span>
    <!-- Contenido de la ventana modal, aquí puedes agregar un formulario para agregar productos -->
    <!-- Por ejemplo, un formulario con campos para nombre del producto, descripción, precio, etc. -->
    <form action="" id="productForm" method="post">
        <input type="text" name="nombre_producto" placeholder="Nombre del Producto">
        <input type="text" name="descripcion_producto" placeholder="Descripción">
        <input type="number" name="precio" placeholder="Precio">
        <input type="number" name="margen_porcentaje" placeholder="Margen Porcentaje">
        <input type="submit" value="Agregar">
    </form>
  </div>
</div>
</section>

<script> 
// Obtener todos los botones de eliminación por su clase CSS
var deleteButtons = document.querySelectorAll(".delete-product");

// Agregar un manejador de eventos para cada botón de eliminación
deleteButtons.forEach(function(button) {
    button.addEventListener("click", function() {
        var productId = button.getAttribute("data-product-id");

        // Llamar al método eliminarProducto de la clase Product
        var product = new Product();
        product.deleteProduct(productId).then(function(response) {
            if (response) {
                alert("Se elimino el producto");
                // Producto eliminado exitosamente, puedes actualizar la tabla o realizar otras acciones
            } else {
                // Ocurrió un error al eliminar el producto
                alert("Error al eliminar el producto.");
            }
        });
    });
});
</script> 
<script src="modal.js"></script>   
</body>
</html>