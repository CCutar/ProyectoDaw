<?php

session_start();

include '../modelos/modelotraducciones.php';

if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
    
    if(isset($_POST['idioma'])){
        if (!$_POST['idioma'] == null){
        
        $idioma = $_POST['idioma'];

        $traducciones = Traducciones::mostrarTraduccionesPorIdioma($idioma);

        }else{
            
            $traducciones=Traducciones::mostrarTraducciones();

        }
}

}else{


    $traducciones=Traducciones::mostrarTraducciones();
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['traduccion_id'])){
    $idtraduccion = $_POST['traduccion_id'];
    $nuevatraduccion = $_POST['nueva_traduccion'];
    $nuevatraduccionclean = strip_tags($nuevatraduccion);
    if(empty($nuevatraduccion)){    
        $errortraducciones[$idtraduccion] = 'Este campo no puede estar vacío';
        
        $traducciones=Traducciones::mostrarTraducciones();

        
    }elseif(strcmp($nuevatraduccion, $nuevatraduccionclean)){
        $errortraducciones[$idtraduccion] = 'No se permiten etiquetas HTML en el campo';
        $traducciones=Traducciones::mostrarTraducciones();

    }else{
        $errortraducciones[$idtraduccion] = null;
        $instanciatraduccion = new Traducciones($idtraduccion,null,null,$nuevatraduccion);
        $instanciatraduccion->actualizarTraducciones();
        $traducciones=Traducciones::mostrarTraducciones();
    }
        
    

}

}

include '../vistas/vistatraducciones.php';



?>