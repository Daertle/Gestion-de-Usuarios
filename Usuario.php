<?php
class Usuario {
    private String $documento;
    private String $nombre;
    private String $apellido;
    private String $fecha_nac;
    private String $telefono;
    private String $correo;
    private String $username;
    private String $password;
    private String $permisos;    

    public function __construct(String $documento, String $nombre, String $apellido, String $fecha_nac, String $telefono, String $correo, String $username, String $password, String $permisos){

        $this->documento = $documento;
        $this->nombre = $nombre;
        $this->apellido = $apellido;    
        $this->fecha_nac = $fecha_nac;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->username = $username;
        $this->password = $password;  
        $this->permisos = $permisos;
    }

/* Getters */

    public function getDocumento() {
        return $this->documento;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getFechaNac() {
        return $this->fecha_nac;
    }
    
    public function getTelefono() {
        return $this->telefono;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getPermisos(){
        return $this->permisos;
    }


/* Setters */

    public function setDocumento(String $doc) {
        $this->documento = $doc;
    }

    public function setNombre(String $nom) {
        $this->nombre = $nom;
    }

    public function setApellido(String $ape) {
        $this->apellido = $ape;
    }

    public function setFechaNac(String $fc) {
        $this->fecha_nac = $fc;
    }
    
    public function setTelefono(String $tel) {
        $this->telefono = $tel;
    }

    public function setCorreo(String $cor){
        $this->correo = $cor;
    }

    public function setUsername(String $usr) {
        $this->username = $usr;
    }

    public function setPassword(String $pwd) {
        $this->password = $pwd;
    }

    public function setPermisos(String $perm) {
        $this->permisos = $perm;
    }

    /* To String */

    public function __toString(){
        return ($this->documento.",".$this->nombre.",".$this->apellido.",".$this->fecha_nac.",".$this->telefono.",".$this->correo.",".$this->username.",".$this->password);
    }
}
    