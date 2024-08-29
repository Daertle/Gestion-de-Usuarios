<?php
    require_once 'Usuario.php';
    require_once 'Instructor.php';
    require_once 'Administrador.php';
    require_once 'Alumno.php';
    require_once 'BaseDatos.php';
    
    class Controlador{
    
        private $base;
    
        public function __construct(){
            $this->base = new BaseDatos();
        }               

        /* Casos de uso */


        /* Alta Usuarios */

        public function altaAlumno(string $documento, string $nombre, string $apellido, string $fecha_nac, string $telefono, string $correo, string $username, string $password, array $categoriaLibreta, string $estadoTeorico, string $permisos, string $fechaIns){
            $alumno = new Alumno($estadoTeorico, $documento, $nombre, $apellido, $fecha_nac, $telefono, $correo, $username, $password, $permisos, $fechaIns);
            echo('<pre>');
            echo($alumno);
            echo('</pre>');
            $this->base->ingresarAlumno($alumno);
            $alumno -> setCategoriaLibreta($categoriaLibreta);
            $this->base->ingresarCategoriaAlumnos($alumno);
        }
        
        public function altaInstructor(array $horarios, array $categoriaClase, String $documento, String $nombre, String $apellido, String $fecha_nac, String $telefono, String $correo, String $username, String $password, string $permisos){
            $instructor = new Instructor($documento, $nombre, $apellido, $fecha_nac, $telefono, $correo, $username, $password, $permisos);
            $this->base->ingresarInstructor($instructor);
            $instructor -> setCategoriaClase($categoriaClase);
            $this->base->ingresarCategoriaInstructores($instructor);
            $instructor -> setHorarios($horarios);
            $this->base->ingresarHorariosInstructores($instructor);
        }

        public function altaAdministrador(String $documento, String $nombre, String $apellido, String $fecha_nac, String $telefono, String $correo, String $username, String $password, String $permisos){
            $administrador = new Administrador($documento, $nombre, $apellido, $fecha_nac, $telefono, $correo, $username, $password, $permisos);
            $this->base->ingresarAdministrador($administrador);
        }

        /* Baja Usuarios */

        public function bajaAlumno(String $documento){
            $this->base->eliminarCategoriaAlumno($documento);
            $this->base->eliminarAlumno($documento);
        }

        public function bajaInstructor(String $documento){
            $this->base->eliminarCategoriaInstructor($documento);
            $this->base->eliminarHorariosInstructor($documento);
            $this->base->eliminarInstructor($documento);
        }

        public function bajaAdministrador(String $documento){
            $this->base->eliminarAdministrador($documento);
        }

        /* Modificar Usuarios */

        public function modificarAlumno($documento, $dato, $nuevo){
            $this->base->modificarAlumno($documento, $dato, $nuevo);
        }

        public function modificarInstructor($documento, $dato, $nuevo){
            $this->base->modificarInstructor($documento, $dato, $nuevo);
        }

        public function modificarAdministrador($documento, $dato, $nuevo){
            $this->base->modificarAdministrador($documento, $dato, $nuevo);
        }

        /* LogIn */

        public function logIn(String $username, String $password){
            $usuario = $this->base->comprobarUsuario($username, $password);
            return $usuario;
        }
        
        /* Traer Tabla */

        public function traerTablaAlumnos() {
            echo('<pre>');
            echo('Alumnos');
            print_r($this->base->seleccionarAlumnos());
            echo('</pre>');
        }
        
        public function traerTablaInstructores() {
            echo('<pre>');
            echo('Instructores');
            print_r($this->base->seleccionarInstructores());
            echo('</pre>');
        }
        
        public function traerTablaAdministradores() {
            echo('<pre>');
            echo('Administradores');
            print_r($this->base->seleccionarAdministradores());
            echo('</pre>');
        }

        public function traerTablaCategorias() {
            echo('<pre>');
            echo('Categoria - Alumno');
            print_r($this->base->seleccionarCategorias());
            echo('</pre>');
        }
    
        public function traerTablaCategoriaClase() {
            echo('<pre>');
            echo('Categoria - Instructor');
            print_r($this->base->seleccionarCategoriaClase());
            echo('</pre>');
        }
    
        public function traerTablaHorarios() {
            echo('<pre>');
            echo('Horarios - Instructor');
            print_r($this->base->seleccionarHorarios());
            echo('</pre>');
        }
    }
?>  
