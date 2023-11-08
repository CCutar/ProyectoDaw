<?php

session_start();

include 'modelotraducciones.php';

if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
    
    if(isset($_POST['idioma'])){
        if (!$_POST['idioma'] == null){
        
        $idioma = $_POST['idioma'];

        $traducciones = Traducciones::mostrarTraduccionesPorIdioma($idioma);
        echo "Estamos ejecutando mostrarTraduccionesIdioma";

        }else{
            
            $traducciones=Traducciones::mostrarTraducciones();
            echo "Estamos ejecutando mostrarTraducciones";

        }
}

}else{


    $traducciones=Traducciones::mostrarTraducciones();
    echo "Estamos ejecutando mostrarTraducciones";
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['traduccion_id'])){
    $idtraduccion = $_POST['traduccion_id'];
    $nuevatraduccion = $_POST['nueva_traduccion'];
    echo $idtraduccion;
    $instanciatraduccion = new Traducciones($idtraduccion,null,null,$nuevatraduccion);
    print_r($instanciatraduccion);
    $instanciatraduccion->actualizarTraducciones();
    $traducciones=Traducciones::mostrarTraducciones();

}

}

include 'traducciones.php';



?>