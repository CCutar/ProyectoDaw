<?php

session_start();

include '../modelos/modelocms.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['cms_id'])){
    $idcms = $_POST['cms_id'];
    $nuevocms = $_POST['nuevo_cms'];
    $instanciacms = new Cms($idcms,null,$nuevocms);
    $instanciacms->actualizarCms();
}

}

$cms = Cms::mostrarCMS();



//include 'vistatraducciones.php';

include '../vistas/vistacms.php';


?>

