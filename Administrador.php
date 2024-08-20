<?php
require_once 'Usuario.php';

class Administrador extends Usuario {
        private String $permisos;
        
    public function __construct(String $permisos, String $documento, String $nombre, String $apellido, String $fecha_nac, String $telefono, String $correo, String $username, String $password){
        parent::__construct($documento, $nombre, $apellido, $fecha_nac, $telefono, $correo, $username, $password);
        $this->permisos = $permisos;
    }
    
    /* Getters */

    public function getPermisos() {
        return $this->permisos;
    }
    
    /* Setters */

    public function setPermisos(String $per) {
        $this->permisos = $per;
    }

    
    /* Funciones */

}

