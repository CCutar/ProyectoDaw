<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/sidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
    <script src="../js/validacioncms.js"></script>

    <title>Document</title>
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
        <li><a href="../main.php"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="#"><i class="fas fa-chart-bar"></i> Pedidos</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Productos</a></li>
            <li><a href="../controladores/controladorcms.php"><i class="fas fa-cog"></i> CMS</a></li>
            <li><a href="../controladores/controladortraducciones.php"><i class="fas fa-cog"></i>Traducciones</a></li>
        </ul>
        <section class="logout">
            <a href="../kill.php"><i class="fas fa-cog"></i> LOG OUT</a>

        </section>
    </div>
    <div class="cms" style="margin-left: 36%">
    <h1>Lista de CMS</h1>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Pàgina</th>
            <th>Contenido pàgina</th>
            <th>Actualizar valores</th>
            
        </tr>

        <?php
        if(isset($cms)){
            foreach ($cms as $cms) {
                echo "<tr>";
                echo "<td>{$cms['id']}</td>";
                echo "<td>{$cms['politica']}</td>";
                echo "<td>{$cms['valor_politica']}</td>";
                echo "<td>
                        <form id='formulariocms' name='formulario_cms' method='POST' action='../controladores/controladorcms.php'>
                            <textarea id='nuevocms' name='nuevo_cms' placeholder='Nueva traducción'></textarea>
                            <input type='hidden' name='cms_id' value='{$cms['id']}'><br>
                            <span style='color: red' id='errorcms_id' class='error-message'>";

                if (isset($errorcms[$cms['id']]))
                    echo $errorcms[$cms['id']];

                echo "</span><br>
                            <input id='submitcms' type='submit' value='Actualizar'>
                            
                        </form>
                    </td>";
                echo "</tr>";
            }
        }
        ?>

    </table>


    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>