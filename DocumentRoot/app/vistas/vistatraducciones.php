<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/sidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <li><a href="controladorcms.php"><i class="fas fa-cog"></i> CMS</a></li>
            <li><a href="controladortraducciones.php"><i class="fas fa-cog"></i>Traducciones</a></li>
        </ul>
        <section class="logout">
            <a href="../kill.php"><i class="fas fa-cog"></i> LOG OUT</a>

        </section>
    </div>
    <div class="traducciones" style="margin-left: 36%">
    <h1>Lista de Traducciones</h1>
    
    <form method="POST" action="../controladores/controladortraducciones.php">
        <label for="idioma">Filtrar por Idioma:</label>
        <select name="idioma" id="idioma">
            <option value="">Todos los idiomas</option>
            <option value="ESP">Español</option>
            <option value="ENG">Inglés</option>
            <option value="CAT">Català</option>
            <!-- Agrega más opciones para otros idiomas según tu base de datos -->
        </select>
        <input type="submit" value="Filtrar">
    </form>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Traducción</th>
            <th>Original</th>
            <th>Idioma</th>
            <th>Actualizar</th>
        </tr>
        <?php
        if(isset($traducciones)){
        foreach ($traducciones as $traduccion) {
            echo "<tr>";
            echo "<td>{$traduccion['TraduccionIdiomaID']}</td>";
            echo "<td>{$traduccion['Traduccion']}</td>";
            echo "<td>{$traduccion['TextoOriginal']}</td>";
            echo "<td>{$traduccion['Idioma']}</td>";
            echo "<td>
                    <form method='POST' action='../controladores/controladortraducciones.php'>
                        <input type='text' name='nueva_traduccion' placeholder='Nueva traducción'>
                        <input type='hidden' name='traduccion_id' value='{$traduccion['TraduccionIdiomaID']}'>
                        <input type='submit' value='Actualizar'>
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