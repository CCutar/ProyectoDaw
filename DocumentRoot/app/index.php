<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script> -->
    <!-- <script src="constraits.js"></script> -->
    
    <title>LOGIN ADMIN</title>

        <!-- Favicons -->
    <link rel="icon" href="https://www.logomaker.com/api/main/images/1j+ojFVDOMkX9Wytexe43D6kh...OJqBBPmhrFwXs1M3EMoAJtliklh...Rs9...8+ ">
    <meta name="theme-color" content="#7952b3">

</head>
<link href="signin.css" rel="stylesheet">
<body class="text-center">  
    <main class="form-signin">
      <form id="myForm" action="login.php" method="post">
        <img class="mb-4" src="https://www.logomaker.com/api/main/images/1j+ojFVDOMkX9Wytexe43D6kh...OJqBBPmhrFwXs1M3EMoAJtliklh...Rs9...8+ " alt="Logo de la empresa" width="95" height="57">
        <h1 class="h3 mb-3 fw-normal">Login Admin</h1>
        <?php
            if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
            {
                echo "<div style='color:red'>Usuario o contraseña invalido </div>";
            }
        ?>
        <div class="form-floating" width="90" height="90">
          <input class="form-control" id="floatingInput" name="name" placeholder="name@example.com">
          <label for="floatingInput">Dirección de correo</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
          <label for="floatingPassword">Contraseña</label>
        </div>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Recuerdame
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
        <p class="mt-5 mb-3 text-muted">2023-2024</p>
      </form>
    </main>
    
    
      </body>
</html>