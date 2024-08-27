<?php
    require_once 'Controlador.php';
    require_once 'Alumno.php';
    require_once 'Instructor.php';
    require_once 'Administrador.php';
    $controla = new Controlador();

    $username = $_POST['txtUsername'];
    $contrasena = $_POST['txtPassword'];
    
        $controla->logIn($username, $contrasena);
    

    header('Location: vista.html.php');
?>