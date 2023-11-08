<?php
session_start();
include('db.php');
include('PreferenceManager.php');

$manager = new PreferenceManager($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Verifica si la preferencia es "logoApp" (ID 6)
    if ($id === '6') {
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            // Configura las validaciones para el archivo
            $allowedExtensions = ["jpeg", "jpg"];
            $maxFileSize = 500 * 1024; // 500 KB (tamaño máximo permitido)

            $file = $_FILES['foto'];
            $fileInfo = pathinfo($file['name']);
            $fileExtension = strtolower($fileInfo['extension']);

            // Verifica si la extensión del archivo está permitida
            if (in_array($fileExtension, $allowedExtensions)) {
                // Verifica si el tamaño del archivo está dentro del límite permitido
                if ($file['size'] <= $maxFileSize) {
                    // Mueve el archivo a la ubicación de almacenamiento
                    $rutaArchivo = 'img/' . $file['name']; // Reemplaza con la ruta adecuada
                    move_uploaded_file($file['tmp_name'], $rutaArchivo);
                
                    // Actualiza la base de datos con la nueva ruta
                    if ($manager->updatePreferenceValue($id, $rutaArchivo)) {
                        echo "Imagen subida y ruta guardada en la base de datos correctamente.";
                    } else {
                        echo "Error al actualizar la ruta en la base de datos.";
                    }
                } else {
                    echo "El tamaño del archivo supera el límite permitido (500 KB).";
                }
            } else {
                echo "Tipo de archivo no permitido. Se permiten solo archivos JPEG/JPG.";
            }
        } else {
            echo "Ocurrió un error al cargar la imagen.";
        }
    } else {
        // Para las preferencias que no son "logoApp," verifica si se proporcionó un nuevo valor numérico para actualizar
        $nuevoValor = $_POST['nuevo_valor'];
        if (is_numeric($nuevoValor)) {
            if ($manager->updatePreferenceValue($id, $nuevoValor)) {
                echo "Registro actualizado con éxito.";
            } else {
                echo "Error al actualizar el registro.";
            }
        }
    }
}

$result = $manager->getPreferences();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Artee</title>
</head>
<body>
    <h1>Actualizar Valores</h1>
    <table>
        <tr>
            <th>Preferencia</th>
            <th>Valor Actual</th>
            <th>Actualizar</th>
        </tr>
        <?php
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['preferencia'] . "</td>";
            echo '<td>' . $row['valor'] . '</td>';
            echo '<td>
                    <form action="preferencias.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="' . $row['id'] . '">';
            
            if ($row['preferencia'] == 'logoApp') {
                echo '<input type="file" name="foto" accept="image/jpeg, image/jpg" required>';
            } else {
                echo '<input type="text" name="nuevo_valor" placeholder="Nuevo Valor" required>';
            }
            
            echo '<input type="submit" value="Actualizar">
                    </form>
                  </td>';
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
