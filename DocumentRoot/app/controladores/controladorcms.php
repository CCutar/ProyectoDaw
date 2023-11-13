<?php

session_start();

include '../modelos/modelocms.php';


$errorcms= [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['cms_id'])){
        $idcms = $_POST['cms_id'];
        $nuevocms = $_POST['nuevo_cms'];
        $nuevocmsclean = strip_tags($nuevocms);
        if(empty($nuevocms)) {
            $errorcms[$idcms] = 'Este campo no puede estar vacío';
        }elseif(strcmp($nuevocms, $nuevocmsclean) !== 0) {
            $errorcms[$idcms] = 'No se permiten etiquetas HTML en el campo';
        } else {
            $errorcms[$idcms] = null;
            $instanciacms = new Cms($idcms,null,$nuevocms);
            $instanciacms->actualizarCms();
        }       

    }   
}else{
    

}


$cms = Cms::mostrarCMS();



//include 'vistatraducciones.php';

include '../vistas/vistacms.php';


?>

