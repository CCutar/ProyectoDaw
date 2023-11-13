    function validateForm() {
        // Restablece los mensajes de error
        document.getElementById("alertmail").innerText = "";
        document.getElementById("alertPass").innerText = "";

        var email = document.getElementById("email").value;
        var pass = document.getElementById("pass").value;

        // Agrega las condiciones de validación según tus necesidades
        if (email === "") {
            document.getElementById("alertmail").innerText = "Por favor, ingrese su dirección de correo electrónico.";
            return false; // Evita que el formulario se envíe si hay errores
        }

        if (pass === "") {
            document.getElementById("alertPass").innerText = "Por favor, ingrese su contraseña.";
            return false; // Evita que el formulario se envíe si hay errores
        }

        // Otras validaciones y lógica de formulario
        return true; // Permite que el formulario se envíe si no hay errores
    }
