<?php
	class Empleado implements JsonSerializable{

		private $idEmpleado;
        private $idSucursal;
		private $nombre;
        Private $rfc;
        Private $puesto;
        Private $activo;

        public function __construct(){
    
        }

        //Getters

        function getIdEmpleado() {
            return $this->idEmpleado;
        }

        function getIdSucursal() {
            return $this->idSucursal;
        }

        function getNombre() {
            return $this->nombre;
        }

        function getRFC() {
            return $this->rfc;
        }

        function getPuesto() {
            return $this->puesto;
        }

        function getActivo() {
            return $this->activo;
        }

        //Setters

        function setIdEmpleado($id_empleado) {
            $this->idEmpleado = $id_empleado;
        }

        function setIdSucursal($id_sucursal) {
            $this->idSucursal = $id_sucursal;
        }

        function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        function setRFC($rfc) {
            $this->rfc = $rfc;
        }

        function setPuesto($puesto) {
            $this->puesto = $puesto;
        }

         function setActivo($activo) {
            $this->activo = $activo;
        }

        public function jsonSerialize()
        {
            $vars = get_object_vars($this);

            return $vars;
        }


	}
?>