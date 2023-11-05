// Función para validar y mostrar una imagen cargada por el usuario
function ValidarImagen(input) {
    // Obtener el archivo seleccionado por el usuario
    var uploadFile = input.files[0];

    // Obtener el tamaño del archivo en bytes
    var sizeInBytes = uploadFile.size;

    // Convertir el tamaño del archivo a kilobytes
    var sizeInKilobytes = sizeInBytes / 1024;

    // Verificar si el tamaño supera el límite permitido (500 KB en este caso)
    if (sizeInKilobytes > 500) {
        // Mostrar una alerta al usuario
        alert('El tamaño supera el límite permitido');

        // Vaciar el campo de entrada de archivo
        input.value = '';

        // Salir de la función
        return;
    }

    // Crear un nuevo objeto de imagen en JavaScript
    var img = new Image();

    // Definir una función que se ejecutará cuando la imagen se haya cargado completamente
    img.onload = function() {
        // Verificar si las dimensiones de la imagen están fuera del rango especificado
        if (this.width < 300 || this.width > 600 || this.height < 300 || this.height > 600) {
            // Mostrar una alerta al usuario indicando las dimensiones requeridas
            alert("La imagen debe estar en un rango cercano a 413px por 531px");

            // Vaciar el campo de entrada de archivo
            input.value = '';
        } else {
            // Mostrar la imagen cargada estableciendo su fuente
            document.getElementById("imagenMostrada").src = URL.createObjectURL(uploadFile);
        }
    };

    // Cargar la imagen utilizando la URL generada para el archivo cargado
    img.src = URL.createObjectURL(uploadFile);
}
