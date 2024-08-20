<?php
require_once 'Usuario.php';

class Instructor extends Usuario {
        private array $horarios;
        private array $categoriaClase;
        
    public function __construct(String $documento, String $nombre, String $apellido, String $fecha_nac, String $telefono, String $correo, String $username, String $password){
        parent::__construct($documento, $nombre, $apellido, $fecha_nac, $telefono, $correo, $username, $password);
    }

    /* Getters */

    public function getHorarios() {
        return $this->horarios;
    }

    public function getCategoriaClase() {
        return $this->categoriaClase;
    }

    /* Setters */

    public function setHorarios(array $hor){
        $this->horarios = $hor;
    }

    public function setCategoriaClase(array $cc) {
        $this->categoriaClase = $cc;
    }

}

