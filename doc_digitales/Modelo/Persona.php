<?php
	class Persona implements JsonSerializable{

		private $idPersona;
		private $nombre;
        Private $apellido;
        Private $correo_electronico;
        Private $rfc;
        Private $nombre_empresa;
        Private $contrasena;
        Private $activo;

        public function __construct(){
    
        }

        //Getters

        function getIdPersona() {
            return $this->idPersona;
        }

        function getNombre() {
            return $this->nombre;
        }

        function getApellido() {
            return $this->apellido;
        }

        function getCorreo_Electronico() {
            return $this->correo_electronico;
        }

        function getRFC() {
            return $this->rfc;
        }

        function getNombre_Empresa() {
            return $this->nombre_empresa;
        }

        function getContrasena() {
            return $this->contrasena;
        }


        function getActivo() {
            return $this->activo;
        }

        //Setters

        function setIdPersona($id_persona) {
            $this->idPersona = $id_persona;
        }

        function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        function setApellido($apellido) {
            $this->apellido = $apellido;
        }

        function setCorreo_Electronico($correo_electronico) {
            $this->correo_electronico = $correo_electronico;
        }

        function setRFC($rfc) {
            $this->rfc = $rfc;
        }

        function setNombre_Empresa($nombre_empresa) {
            $this->nombre_empresa = $nombre_empresa;
        }

        function setConstrasena($contrasena) {
            $this->contrasena = $contrasena;
        }


         function setActivo($activo) {
            $this->activo = $activo;
        }

        function toString(){

            return $idPersona . $nombre . $apellido . $correo_electronico . $rfc . $nombre_empresa . $contrasena . $activo;
        }

        public function jsonSerialize()
        {
            $vars = get_object_vars($this);

            return $vars;
        }


	}
?>