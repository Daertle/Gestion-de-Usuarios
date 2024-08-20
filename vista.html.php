<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    require_once 'Controlador.php';
    $controla = new Controlador();
    $controla->traerTablaAlumnos();
    $controla->traerTablaAdministradores();
    $controla->traerTablaInstructores();
    $controla->traerTablaCategorias();
    $controla->traerTablaCategoriaClase();
    $controla->traerTablaHorarios();    
?>    

</body>
</html>


