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
            <th> <button id="openModalBtn">Agregar Producto</button></th>
        </tr>
        <?php
        include('../modelos/modeloProducto.php');
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

                echo "<td><a href=''../controladores/controladorProductos.php?action=delete&id=". $product['id']. "' ><input type='button' name='delete' id='delete' value='Borrar'></a></td>'"; // Botón de eliminación
                echo "<td><a href='../controladores/controladorProductos.php?action=update&id=".$product['id']. '.&nombre_producto'. $product['nombre_producto']. '.&decripcion_producto' . $product['decripcion_producto']. '&precio' . $product['precio'].' &margen_porcentaje' . $product['margen_porcentaje'] ."'<input type='button' name='update' id='update' value='Actualizar'></a></td>"; // Botón de eliminación

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