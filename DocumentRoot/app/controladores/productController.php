<?php
include('product.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se está agregando un nuevo producto
    if (isset($_POST["nombre_producto"]) && isset($_POST["descripcion_producto"]) && isset($_POST["precio"]) && isset($_POST["margen_porcentaje"])) {
        $nombre_producto = $_POST["nombre_producto"];
        $descripcion_producto = $_POST["descripcion_producto"];
        $precio = $_POST["precio"];
        $margen_porcentaje = $_POST["margen_porcentaje"];

        $product = new Product();
        $result = $product->addProduct($nombre_producto, $descripcion_producto, $precio, $margen_porcentaje);

        if ($result) {
            // Producto agregado exitosamente
            // Puedes redirigir a la página de productos o realizar otras acciones
            header("Location: pageProduct.php");
            exit();
        } else {
            // Ocurrió un error al agregar el producto
            echo "Error al agregar el producto.";
        }
    }
}

// Si se desea manejar la eliminación de productos aquí, se podría hacer algo similar a la adición de productos.
// Por ejemplo, podrías verificar si se recibió un parámetro 'action' y si es 'delete', entonces procesar la eliminación.

// Ejemplo de manejo de eliminación:
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["action"]) && $_GET["action"] == "delete" && isset($_GET["id"])) {
    $product_id = $_GET["id"];

    $product = new Product();
    $result = $product->deleteProduct($product_id);

    if ($result) {
        // Producto eliminado exitosamente
        // Puedes redirigir a la página de productos o realizar otras acciones
        header("Location: pageProduct.php");
        exit();
    } else {
        // Ocurrió un error al eliminar el producto
        echo "Error al eliminar el producto.";
    }
}
?>


