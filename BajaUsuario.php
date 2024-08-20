<?php
    require_once 'Controlador.php';
    require_once 'Alumno.php';
    require_once 'Instructor.php';
    require_once 'Administrador.php';
    $controla = new Controlador();

    $tipo = $_POST['txtOpcion'];
    
    $documento = $_POST['txtDocumento'];

    if ($tipo == "alumno") {
        $controla->BajaAlumno($documento);
    } elseif ($tipo == "instructor") {
        $controla->BajaInstructor($documento);
    } elseif ($tipo == "administrador") {
        $controla->BajaAdministrador($documento);
    }

    header('Location: vista.html.php');
?>