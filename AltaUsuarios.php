<?php
    require_once 'Controlador.php';
    require_once 'Alumno.php';
    require_once 'Instructor.php';
    require_once 'Administrador.php';
    $controla = new Controlador();

    $tipo = $_POST['txtOpcion'];
    
    $documento = $_POST['txtDocumento'];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $fechaNac = $_POST['txtFN'];
    $telefono = $_POST['txtTelefono'];
    $correo = $_POST['txtCorreo'];
    $username = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];    
    $permisos = $_POST['txtPermisos'];

    $fechaIns = $_POST['txtFI'];
    $estTeorico = $_POST['txtEstadoTeorico'];

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

    if ($tipo == "alumno") {
        $controla->altaAlumno($documento, $nombre, $apellido, $fechaNac, $telefono, $correo, $username, $password, $categoriaLibreta ,$estTeorico, $permisos, $fechaIns);
    } else if($tipo == "instructor") { 
        $controla->altaInstructor($horarios, $categoriaClase, $documento, $nombre, $apellido, $fechaNac, $telefono, $correo, $username, $password, $permisos,);
    } else if($tipo == "administrador") {
        $controla->altaAdministrador($documento, $nombre, $apellido, $fechaNac, $telefono, $correo, $username, $password, $permisos);
    }

    header('Location: vista.html.php');
?>