<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>

    <title>Login Admin</title>
    <link rel="favicon" href="img/logoArtee.png">
    <link href="signin.css" rel="stylesheet">
    <meta name="theme-color" content="#7952b3">
</head>
<body>
    <!--call to Login-->
    <?php include("Login.php"); ?>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <img src="/img/logoArtee.png" alt="Logo Artee" class="rounded-circle mb4" width="100" height="100">
        
            <div id="login-tittle">
                <h1 class="text-center">Login</h1>
            </div>
            <!--Recuperación de contraseña-->
            <div id="recoveryTittle" style="display: none;">
                <h2 class="text-center">Recuperación de Contraseña</h1>
            </div>
            <div id="loginForm">
            <form action="Login.php" method="post" id="form">
                <div class="alert alert-danger" id="generalAlert" role="alert" ></div>
                    <div class="row">  
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Write your email"  name="email" id="email">
                                <div class="mt-3 alert alert-danger" id="alertmail" role="alert" ></div>
                            </div>
                            <div class="mb-4">
                                <label for="pass" class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Write your password"  name="pass" id="pass">
                                <div class="mt-3 alert alert-danger" id="alertPass" role="alert" ></div>
                            </div>
                            <div class="mb-4"></div>
                            <div class="text-right">
                                <a href="#" id="lost-pass"><p>He olvidado mi contraseña</p></a>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="mb-3 boto text-center">Enviar</button>
                        </div>
                        <div>
                            <label for="checkbox"><input type="checkbox" name="checkbox" id="checkbox" onclick="checkDates()">Recordar sesión</label>
                        </div>
                    </div>    
                </div> 
            </form>
            <div class="col"></div>
        </div>  
</div>
    </div>
     <!--Formulario que se abre al clickear en he olvidado mi contraseña-->
     <div id="recoveryForm" style="display: none;">
        <label for="recoveryEmail">Ingrese su correo electrónico:</label>
        <input type="email" id="recoveryEmail" name="recoveryEmail" required>
        <button type="submit" id="submit"name="recoverPassword">Enviar</button>
     </div>
    <div id="submitMessage" style="display:none;">
        <p>¡Te hemos enviado un mensaje a tu correo electrónico!</p>
        <a href="main.php"><p>Volver al Login</p></a>
    </div>
    <script>
    $(document).ready(function() {
        $("#lost-pass").click(function(e) {
            e.preventDefault();
            $("#login-tittle").hide();
            $("#loginForm").hide();
            $("#submitMessage").hide();
            $("#recoveryTittle").show();
            $("#recoveryForm").show();
            
        });
        $("#submit").click(function(e){
            e.preventDefault();
            $("#login-tittle").hide();
            $("#loginForm").hide();
            $("#recoveryTittle").hide();
            $("#recoveryForm").hide();
            $("#submitMessage").show();
        });
 
    });
</script>
<script src="validation/loginValidation.js"></script>

</body>
</html>