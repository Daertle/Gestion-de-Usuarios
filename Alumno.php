<?php
require_once 'Usuario.php';

class Alumno extends Usuario {
    private string $estadoTeorico;
    private array $categoriaLibreta;
    private string $fechaIns;
    
    public function __construct(string $estadoTeorico, string $documento, string $nombre, string $apellido, string $fecha_nac, string $telefono, string $correo, string $username, string $password, String $permisos, string $fechaIns) {
        parent::__construct($documento, $nombre, $apellido, $fecha_nac, $telefono, $correo, $username, $password, $permisos);
        $this->fechaIns = $fechaIns;    
        $this->estadoTeorico = $estadoTeorico;
    }
    
    /* Getters */

    public function getEstadoTeorico() {
        return $this->estadoTeorico;
    }

    public function getCategoriaLibreta() {
        return $this->categoriaLibreta;
    }

    public function getFechaIns() {
        return $this->fechaIns;
    }

    /* Setters */

    public function setEstadoTeorico(string $et) {
        $this->estadoTeorico = $et;
    }

    public function setCategoriaLibreta(array $cl) {
        $this->categoriaLibreta = $cl;
    }

    public function setFechaIns(string $fi) {
        $this->fechaIns = $fi;
    }

    /* Funciones */

    public function __toString() {
        return "Documento: " . $this->getDocumento() . "<br>Nombre: " . $this->getNombre() . "<br>Apellido: " . $this->getApellido() . "<br>Fecha de Nacimiento: " . $this->getFechaNac() . "<br>Telefono: " . $this->getTelefono() . "<br>Correo: " . $this->getCorreo() . "<br>Username: " . $this->getUsername() . "<br>Password: " . $this->getPassword() . "<br>Permisos: " . $this->getPermisos() . "<br>Estado Teorico: " . $this->getEstadoTeorico();
    }
}