<?php
require_once 'Usuario.php';

class Administrador extends Usuario {
        
    public function __construct(String $documento, String $nombre, String $apellido, String $fecha_nac, String $telefono, String $correo, String $username, String $password, String $permisos){
        parent::__construct($documento, $nombre, $apellido, $fecha_nac, $telefono, $correo, $username, $password, $permisos);
    }   
    
}

