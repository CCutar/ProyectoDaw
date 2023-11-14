<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="sidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Artee</title>
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
            <?php echo "<p> ". $_SESSION["username"] . "</p>";?>
            <?php if($_SESSION['es_admin']){echo "<p>Admin</p>";}else{echo "<p>User</p>";}?>
        </div>
        <ul>
            <li><a href="main.php"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="#"><i class="fas fa-chart-bar"></i> Traducciones</a></li>
            <li><a href="#"><i class="fas fa-users"></i> CMS</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Estadisticas</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Paises</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Productos/Margen</a></li>
            <li><a href="../vistas/vistaPreferencias.php"><i class="fas fa-cog"></i> Preferencias</a></li>
            <li><a href="../vistas/vistaUsuarios.php"><i class="fas fa-cog"></i> Usuarios</a></li>
        </ul>
        <section class="logout">
            <a href="kill.php"><i class="fas fa-cog"></i> LOG OUT</a>

        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
