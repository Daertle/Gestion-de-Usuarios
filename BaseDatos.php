<?php
class BaseDatos {
/********************************************************************************/
    private $servidor;      // En Xampp es "localhost"
    private $usuario;       // En Xampp es "root"
    private $password;      // En Xampp es ""
    private $base_datos;    // base datos en phpmyadmin
    private $conexion;      // Para las operaciones con MySQL
/********************************************************************************/	
    public function __construct() {
        $this->servidor = "localhost";
        $this->usuario = "root";
		$this->password = "";
		$this->base_datos = "luxurydriving";
		$this->conexion = $this->nueva("localhost","root","","luxurydriving");
    }
/*************************************************************************************************************************************************/	
    private function nueva($server,$user,$pass,$base) {
        try {
            $conectar = mysqli_connect($server,$user,$pass,$base);
	    } catch (Exception $ex) {
            die($ex->getMessage());
	    }
	    return $conectar;
    }	
/******************************************************************************************************************************************/

// Altas de Usuarios en Tablas   
    
    /**
     * 
     * 
     * @param type $usuario
     */
    public function ingresarAlumno($usuario) {
        $documento = $usuario->getDocumento();
        $nombre = $usuario->getNombre();
        $apellido = $usuario->getApellido();
        $fechaNac = $usuario->getFechaNac();
        $telefono = $usuario->getTelefono();
        $correo = $usuario->getCorreo();
        $username = $usuario->getUsername();
        $password = $usuario->getPassword();
        $estadoTeorico = $usuario->getEstadoTeorico();
        $permisos = $usuario->getPermisos();

        $insertar = "insert into alumno values('$documento','$nombre','$apellido','$fechaNac','$telefono','$correo','$username','$password','$estadoTeorico','$permisos')";
    	return mysqli_query($this->conexion, $insertar);
    }

    public function ingresarCategoriaAlumnos($usuario) {
 
        $documento = $usuario->getDocumento();
        $categoriaLibreta = $usuario->getCategoriaLibreta();
     
        for ($i=0; $i < count($usuario->getCategoriaLibreta()) ; $i++) { 
            $insertar = "insert into alumno_libreta values('$documento','$categoriaLibreta[$i]')";
            mysqli_query($this->conexion, $insertar);
        }
    }

    public function ingresarInstructor($usuario) {
        $documento = $usuario->getDocumento();
        $nombre = $usuario->getNombre();
        $apellido = $usuario->getApellido();
        $fechaNac = $usuario->getFechaNac();
        $telefono = $usuario->getTelefono();
        $correo = $usuario->getCorreo();
        $username = $usuario->getUsername();
        $password = $usuario->getPassword();
        $permisos = $usuario->getPermisos();
        
        $insertar = "insert into instructor values('$documento','$nombre','$apellido','$fechaNac','$telefono','$correo','$username','$password','$permisos')";
    	return mysqli_query($this->conexion, $insertar);
    }

    public function ingresarCategoriaInstructores($usuario) {
        $documento = $usuario->getDocumento();
        $categoriaClase = $usuario->getCategoriaClase();
     
        for ($i=0; $i < count($usuario->getCategoriaClase()) ; $i++) { 
            $insertar = "insert into instructor_categoria values('$documento','$categoriaClase[$i]')";
            mysqli_query($this->conexion, $insertar);
        }
    }

    public function ingresarHorariosInstructores($usuario) {
        $documento = $usuario->getDocumento();
        $horarios = $usuario->getHorarios();
     
        for ($i=0; $i < count($usuario->getHorarios()) ; $i++) { 
            $insertar = "insert into instructor_horarios values('$documento','$horarios[$i]')";
            mysqli_query($this->conexion, $insertar);
        }
    }

    public function ingresarAdministrador($usuario) {
        $documento = $usuario->getDocumento();
        $nombre = $usuario->getNombre();
        $apellido = $usuario->getApellido();
        $fechaNac = $usuario->getFechaNac();
        $telefono = $usuario->getTelefono();
        $correo = $usuario->getCorreo();
        $username = $usuario->getUsername();
        $password = $usuario->getPassword();
        $permisos = $usuario->getPermisos();

        $insertar = "insert into administrador values('$documento','$nombre','$apellido','$fechaNac','$telefono','$correo','$username','$password','$permisos')";
    	return mysqli_query($this->conexion, $insertar);
    }

// Bajas de Usuarios en Tablas

    public function eliminarAlumno($documento) {
        $eliminar = "delete from alumno where documentoAlumno = '$documento'";
        return mysqli_query($this->conexion, $eliminar);
    }

    public function eliminarInstructor($documento) {
        $eliminar = "delete from instructor where documentoInstructor = '$documento'";
        return mysqli_query($this->conexion, $eliminar);
    }

    public function eliminarAdministrador($documento) {
        $eliminar = "delete from administrador where documentoAdmin = '$documento'";
        return mysqli_query($this->conexion, $eliminar);
    }

    public function eliminarCategoriaAlumno($documento) {
        $eliminar = "delete from alumno_libreta where documentoAlumno = '$documento'";
        return mysqli_query($this->conexion, $eliminar);
    }

    public function eliminarCategoriaInstructor($documento) {
        $eliminar = "delete from instructor_categoria where documentoInstructor = '$documento'";
        return mysqli_query($this->conexion, $eliminar);
    }

    public function eliminarHorariosInstructor($documento) {
        $eliminar = "delete from instructor_horarios where documentoInstructor = '$documento'";
        return mysqli_query($this->conexion, $eliminar);
    }

// Modificaciones de Usuarios en Tablas

public function modificarAlumno($documento, $dato, $nuevo) {
    switch ($dato) {
        case 'nombre':
            $modificar = "update alumno set nombre = '$nuevo' where documentoAlumno = '$documento'";                    
            mysqli_query($this->conexion, $modificar);
        break;

        case 'apellido':
            $modificar = "update alumno set apellido = '$nuevo' where documentoAlumno = '$documento'";                    
            mysqli_query($this->conexion, $modificar);    
        break;

        case 'fechaNacimiento':
            $modificar = "update alumno set fechaNacimiento = '$nuevo' where documentoAlumno = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'telefono':
            $modificar = "update alumno set telefono = '$nuevo' where documentoAlumno = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'correo':
            $modificar = "update alumno set correo = '$nuevo' where documentoAlumno = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'username':
            $modificar = "update alumno set username = '$nuevo' where documentoAlumno = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'password':
            $modificar = "update alumno set password = '$nuevo' where documentoAlumno = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'permisos':
            $modificar = "update alumno set permisos = '$nuevo' where documentoAlumno = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'estadoTeorico':
            $modificar = "update alumno set estadoTeorico = '$nuevo' where documentoAlumno = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'categoriaLibreta':
            $this->eliminarCategoriaAlumno($documento);
            for ($i=0; $i < count($nuevo) ; $i++) {
                $modificar = "insert into alumno_libreta values('$documento','$nuevo[$i]')";
                mysqli_query($this->conexion, $modificar);
            }
        break;
    }
}

public function modificarInstructor($documento, $dato, $nuevo) {
    switch ($dato) {
        case 'nombre':
            $modificar = "update instructor set nombre = '$nuevo' where documentoInstructor = '$documento'";                    
            mysqli_query($this->conexion, $modificar);
        break;

        case 'apellido':
            $modificar = "update instructor set apellido = '$nuevo' where documentoInstructor = '$documento'";                    
            mysqli_query($this->conexion, $modificar);    
        break;

        case 'fechaNacimiento':
            $modificar = "update instructor set fechaNacimiento = '$nuevo' where documentoInstructor = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'telefono':
            $modificar = "update instructor set telefono = '$nuevo' where documentoInstructor = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'correo':
            $modificar = "update instructor set correo = '$nuevo' where documentoInstructor = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'username':
            $modificar = "update instructor set username = '$nuevo' where documentoInstructor = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'password':
            $modificar = "update instructor set password = '$nuevo' where documentoInstructor = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'permisos':
            $modificar = "update instructor set permisos = '$nuevo' where documentoInstructor = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;


        case 'categoriaClase':
            $this->eliminarCategoriaInstructor($documento);
            for ($i=0; $i < count($nuevo) ; $i++) {
                $modificar = "insert into instructor_categoria values('$documento','$nuevo[$i]')";
                mysqli_query($this->conexion, $modificar);
            }
            break;

        case 'horarios':
            $this->eliminarHorariosInstructor($documento);
            for ($i=0; $i < count($nuevo) ; $i++) {
                $modificar = "insert into instructor_horarios values('$documento','$nuevo[$i]')";
                mysqli_query($this->conexion, $modificar);
            }
        break;
    }
}

public function modificarAdministrador($documento, $dato, $nuevo) {
    switch ($dato) {
        case 'nombre':
            $modificar = "update administrador set nombre = '$nuevo' where documentoAdmin = '$documento'";                    
            mysqli_query($this->conexion, $modificar);
        break;

        case 'apellido':
            $modificar = "update administrador set apellido = '$nuevo' where documentoAdmin = '$documento'";                    
            mysqli_query($this->conexion, $modificar);    
        break;

        case 'fechaNacimiento':
            $modificar = "update administrador set fechaNacimiento = '$nuevo' where documentoAdmin = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'telefono':
            $modificar = "update administrador set telefono = '$nuevo' where documentoAdmin = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'correo':
            $modificar = "update administrador set correo = '$nuevo' where documentoAdmin = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'username':
            $modificar = "update administrador set username = '$nuevo' where documentoAdmin = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'password':
            $modificar = "update administrador set password = '$nuevo' where documentoAdmin = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;

        case 'permisos':
            $modificar = "update administrador set permisos = '$nuevo' where documentoAdmin = '$documento'";
            mysqli_query($this->conexion, $modificar);
        break;
    }
}


// LogIn

    public function logueo($username, $password) {
    
        $consulta = "select * from alumno where username = '$username' and password = '$password'";
        $resultado = mysqli_query($this->conexion, $consulta);
        $arreglo = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        if (count($arreglo) == 0) {
            $consulta = "select * from instructor where username = '$username' and password = '$password'";
            $resultado = mysqli_query($this->conexion, $consulta);
            $arreglo = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
            if (count($arreglo) == 0) {
                $consulta = "select * from administrador where username = '$username' and password = '$password'";
                $resultado = mysqli_query($this->conexion, $consulta);
                $arreglo = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
                if (count($arreglo) == 0) {
                    return null;
                } else {
                    return $arreglo;
                }
            } else {
                return $arreglo;
            }
        } else {
            return $arreglo;
        }
    }
     


/********************************************************************************/
    public function seleccionarAlumnos() {
    	$resultadoAlumnos = mysqli_query($this->conexion, "select * from alumno");
    	$arreglo = mysqli_fetch_all($resultadoAlumnos,MYSQLI_ASSOC);
    	return $arreglo;
    }

    public function seleccionarCategorias() {
    	$resultadoCategorias = mysqli_query($this->conexion, "select * from alumno_libreta");
    	$arreglo = mysqli_fetch_all($resultadoCategorias,MYSQLI_ASSOC);
    	return $arreglo;
    }

    public function seleccionarInstructores() {
    	$resultadoInstructores = mysqli_query($this->conexion, "select * from instructor");
    	$arreglo = mysqli_fetch_all($resultadoInstructores,MYSQLI_ASSOC);
    	return $arreglo;
    }

    public function seleccionarCategoriaClase() {
    	$resultadoCategoriaClase = mysqli_query($this->conexion, "select * from instructor_categoria");
    	$arreglo = mysqli_fetch_all($resultadoCategoriaClase,MYSQLI_ASSOC);
    	return $arreglo;
    }

    public function seleccionarHorarios() {
    	$resultadoHorarios = mysqli_query($this->conexion, "select * from instructor_horarios");
    	$arreglo = mysqli_fetch_all($resultadoHorarios,MYSQLI_ASSOC);
    	return $arreglo;
    }

    public function seleccionarAdministradores() {
    	$resultadoAdministrador = mysqli_query($this->conexion, "select * from administrador");
    	$arreglo = mysqli_fetch_all($resultadoAdministrador,MYSQLI_ASSOC);
    	return $arreglo;
    }

    	
/********************************************************************************/
}