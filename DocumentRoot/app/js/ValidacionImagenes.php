<?php
// Verifica si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Comprueba si se ha enviado un archivo llamado "foto" y si no hay errores en la carga
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
        // Obtiene información sobre el archivo cargado
        $file = $_FILES["foto"];
        $allowedExtensions = ["jpeg", "jpg"];
        $maxFileSize = 500 * 1024; // 500 KB (tamaño máximo permitido)

        // Obtiene la extensión del archivo
        $fileInfo = pathinfo($file["name"]);
        $fileExtension = strtolower($fileInfo["extension"]);

        // Verifica si la extensión del archivo está permitida
        if (in_array($fileExtension, $allowedExtensions)) {
            // Verifica si el tamaño del archivo está dentro del límite permitido
            if ($file["size"] <= $maxFileSize) {
                // Aquí puedes realizar acciones adicionales, como mover el archivo a una ubicación segura y redimensionarlo si es necesario.
                move_uploaded_file($file["tmp_name"], "ruta/de/almacenamiento/" . $file["name"]);
                echo "Archivo subido correctamente.";
            } else {
                echo "El tamaño del archivo supera el límite permitido (500 KB).";
            }
        } else {
            echo "Tipo de archivo no permitido. Se permiten solo archivos JPEG/JPG.";
        }
    } else {
        echo "Ocurrió un error al cargar el archivo.";
    }
}
?>

