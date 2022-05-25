<?php 
    include_once './controllers/EstudianteController.php';
    include_once './config/Conexion.php';

    $estudiante = new EstudianteController();
    if(!isset($_REQUEST['c'])){
        $estudiante->index();
    }else{
        $a = $_REQUEST['c'];
        call_user_func(array($estudiante,$a));
    }

?>