<?php
	class Sucursal implements JsonSerializable{

		private $idSucursal;
		private $nombre;
        Private $no_calle;
        Private $colonia;
        Private $num_ext;
        Private $num_int;
        Private $codigo_postal;
        Private $ciudad;
        Private $pais;
        Private $no_empleados;
        Private $activo;

        public function __construct(){
    
        }

        //Getters

        function getIdSucursal() {
            return $this->idSucursal;
        }

        function getNombre() {
            return $this->nombre;
        }

        function getNo_Calle() {
            return $this->no_calle;
        }

        function getColonia() {
            return $this->colonia;
        }

        function getNum_Ext() {
            return $this->num_ext;
        }

        function getNum_Int() {
            return $this->num_int;
        }

        function getCodigo_Postal() {
            return $this->codigo_postal;
        }

        function getCiudad() {
            return $this->ciudad;
        }

        function getPais() {
            return $this->pais;
        }

        function getNo_Empleados() {
            return $this->no_empleados;
        }

        function getActivo() {
            return $this->activo;
        }

        //Setters

        function setIdSucursal($id_sucursal) {
            $this->idSucursal = $id_sucursal;
        }

        function setNombre($nombre) {
            $this->nombre = $nombre;
        }

       function setNo_Calle($no_calle) {
            $this->no_calle = $no_calle;
        }

        function setColonia($colonia) {
            $this->colonia = $colonia;
        }

        function setNum_Ext($num_ext) {
             $this->num_ext = $num_ext;
        }

        function setNum_Int($num_int) {
             $this->num_int = $num_int;
        }

        function setCodigo_Postal($codigo_postal) {
             $this->codigo_postal = $codigo_postal;
        }

        function setCiudad($ciudad) {
             $this->ciudad = $ciudad;
        }

        function setPais($pais) {
             $this->pais = $pais;
        }

        function setNo_Empleados($no_empleados) {
             $this->no_empleados = $no_empleados;
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