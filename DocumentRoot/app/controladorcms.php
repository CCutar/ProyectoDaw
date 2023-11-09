<?php

session_start();

include 'modelocms.php';
?>

<table border="1">
        <tr>
            <th>id</th>
            <th>politica</th>
            <th>Valor politica</th>
            <th>Actualizar valores</th>
            
        </tr>

<?php
$cms = Cms::mostrarCMS();
if(isset($cms)){
    foreach ($cms as $cms) {
        echo "<tr>";
        echo "<td>{$cms['id']}</td>";
        echo "<td>{$cms['politica']}</td>";
        echo "<td>{$cms['valor_politica']}</td>";
        echo "<td>
                <form method='POST' action='controladortraducciones.php'>
                    <input type='text' name='nueva_traduccion' placeholder='Nueva traducción'>
                    <input type='hidden' name='traduccion_id' value='{$cms['id']}'>
                    <input type='submit' value='Actualizar'>
                </form>
            </td>";
        echo "</tr>";
    }
}
?>

</table>


<?php

//include 'vistatraducciones.php';



?>

