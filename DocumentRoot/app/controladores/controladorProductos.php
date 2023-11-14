<?php
session_start();

// Incluir el modelo de productos
include('../modelos/modeloProducto.php');

// Crear una instancia de la clase Product
$product = new Product();

// Manejar la inserción de productos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre_producto'], $_POST['descripcion_producto'], $_POST['precio'], $_POST['margen_porcentaje'])) {
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion_producto = $_POST['descripcion_producto'];
    $precio = $_POST['precio'];
    $margen_porcentaje = $_POST['margen_porcentaje'];

    // Llamar al método de inserción del modelo
    $result = $product->insertProduct($nombre_producto, $descripcion_producto, $precio, $margen_porcentaje);

    if ($result) {
        // Producto insertado exitosamente
        header('Location: product.php'); // Redirigir a la misma página después de la inserción
        exit();
    } else {
        // Ocurrió un error al insertar el producto
        echo "Error al insertar el producto.";
    }
}

// Manejar la eliminación de productos
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete']) && isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    // Llamar al método de eliminación del modelo
    $result = $product->deleteProduct($id_producto);

    if ($result) {
        // Producto eliminado exitosamente
        header('Location: product.php'); // Redirigir a la misma página después de la eliminación
        exit();
    } else {
        // Ocurrió un error al eliminar el producto
        echo "Error al eliminar el producto.";
    }
}

// Manejar la actualización de productos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update']) && isset($_POST['id_producto'])) {
    $id_producto = $_POST['id_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion_producto = $_POST['descripcion_producto'];
    $precio = $_POST['precio'];
    $margen_porcentaje = $_POST['margen_porcentaje'];

    // Llamar al método de actualización del modelo
    $result = $product->updateProduct($id_producto, $nombre_producto, $descripcion_producto, $precio, $margen_porcentaje);

    if ($result) {
        // Producto actualizado exitosamente
        header('Location: product.php'); // Redirigir a la misma página después de la actualización
        exit();
    } else {
        // Ocurrió un error al actualizar el producto
        echo "Error al actualizar el producto.";
    }
}

//analizo los parámetros del formulario
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'delete' && isset($_GET['id'])) {
        // Lógica para eliminar el producto con el id proporcionado
        $productId = $_GET['id'];
        // Llama a la función deleteProduct en tu modelo
    } elseif ($_GET['action'] === 'update' && isset($_GET['id'], $_GET['nombre_producto'], $_GET['descripcion_producto'], $_GET['precio'], $_GET['margen_porcentaje'])) {
        // Lógica para actualizar el producto con los datos proporcionados
        $productId = $_GET['id'];
        $nombre_producto = $_GET['nombre_producto'];
        $descripcion_producto = $_GET['descripcion_producto'];
        $precio = $_GET['precio'];
        $margen_porcentaje = $_GET['margen_porcentaje'];
        // Llama a la función updateProduct en tu modelo
    }
}


?>
