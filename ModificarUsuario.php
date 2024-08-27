<?php
    require_once 'Controlador.php';
    require_once 'Alumno.php';
    require_once 'Instructor.php';
    require_once 'Administrador.php';
    $controla = new Controlador();

    $tipo = $_POST['txtOpcion'];
  
    $documento = $_POST['txtDocumento'];

    $dato = $_POST['txtDato'];

    $estTeorico = $_POST['txtEstadoTeorico'];
  
    $permisos = $_POST['txtPermisos'];

    $catA = $_POST['txtA'];
    $catB = $_POST['txtB'];
    $catC = $_POST['txtC'];

    $claseA = $_POST['txtClaseA'];
    $claseB = $_POST['txtClaseB'];
    $claseC = $_POST['txtClaseC'];

    $lunes = $_POST['txtLunes'];
    $martes = $_POST['txtMartes'];
    $miercoles = $_POST['txtMiercoles'];
    $jueves = $_POST['txtJueves'];
    $viernes = $_POST['txtViernes'];
    $sabado = $_POST['txtSabado'];

    $horarios = array();
    if ($lunes == "on") array_push($horarios, "Lunes");
    if ($martes == "on") array_push($horarios, "Martes");
    if ($miercoles == "on") array_push($horarios, "Miercoles");
    if ($jueves == "on") array_push($horarios, "Jueves");
    if ($viernes == "on") array_push($horarios, "Viernes");
    if ($sabado == "on") array_push($horarios, "Sabado");

    $categoriaClase = array();
    if ($claseA == "on") array_push($categoriaClase, "Clase A");
    if ($claseB == "on") array_push($categoriaClase, "Clase B");
    if ($claseC == "on") array_push($categoriaClase, "Clase C");

    $categoriaLibreta = array();
    if ($catA == "on") array_push($categoriaLibreta, "Libreta A");
    if ($catB == "on") array_push($categoriaLibreta, "Libreta B");
    if ($catC == "on") array_push($categoriaLibreta, "Libreta C");


    if ($dato == "permisos") {
        $nuevo = $permisos;        
    } elseif ($dato == "horarios") {
        $nuevo = $horarios;
    } elseif ($dato == "categoriaClase") {
        $nuevo = $categoriaClase;
    } elseif ($dato == "categoriaLibreta") {
        $nuevo = $categoriaLibreta;
    } else {
        $nuevo = $_POST['txtNuevo'];
    }
    

    if ($tipo == "alumno") {
        $controla->modificarAlumno($documento, $dato, $nuevo);
    } else if($tipo == "instructor") { 
        $controla->modificarInstructor($documento, $dato, $nuevo);
    } else if($tipo == "administrador") {
        $controla->modificarAdministrador($documento, $dato, $nuevo);
    }


    header('Location: vista.html.php');
?>