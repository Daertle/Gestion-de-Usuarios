<?php
require_once 'Usuario.php';

class Alumno extends Usuario {
    private string $estadoTeorico;
    private array $categoriaLibreta;
        
    public function __construct(string $estadoTeorico, string $documento, string $nombre, string $apellido, string $fecha_nac, string $telefono, string $correo, string $username, string $password, String $permisos){
        parent::__construct($documento, $nombre, $apellido, $fecha_nac, $telefono, $correo, $username, $password, $permisos);
            
        $this->estadoTeorico = $estadoTeorico;
    }
    
    /* Getters */

    public function getEstadoTeorico() {
        return $this->estadoTeorico;
    }

    public function getCategoriaLibreta() {
        return $this->categoriaLibreta;
    }

    /* Setters */

    public function setEstadoTeorico(string $et) {
        $this->estadoTeorico = $et;
    }

    public function setCategoriaLibreta(array $cl) {
        $this->categoriaLibreta = $cl;
    }

    /* Funciones */
}

