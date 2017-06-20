<?php

include_once 'Conexion.php';
include_once 'Persona.php';
include_once 'PersistenciaDAO.php';
class PersonaDAO implements PersistenciaDAO {

    private $conector;
    private $miPersonaAux;

    public function __construct() {
    }

    public function crear($objeto) {
        
        //Abre la conexion
        $this->conector = new Conexion();

        $miPersonaAux = new Persona();

        //Variable para el valor de la sentencia
        $result; 

        //Se prepara la sentencia
        $query = "INSERT INTO persona (nombre, apellido, correo_electronico, rfc, nombre_empresa, contrasena, activo) VALUES (
        '" . $objeto->getNombre() . "',
        '" . $objeto->getApellido() . "',
        '" . $objeto->getCorreo_Electronico() . "',
        '" . $objeto->getRFC() . "',
        '" . $objeto->getNombre_Empresa() . "',
        '" . $objeto->getContrasena() . "',
        1)";

        //Se ejecuta la sentencia sql
        $result = $this->conector->ejecutarNoQuery($query);

        //Cierra la conexion
        $this->conector->cerrarConexion();
        return $result;
    }

    public function buscarPorID($objeto) {
        
    }

    public function buscarPorNombreUsuarioYContrasena($objeto) {
        //Abre la conexion
        $this->conector = new Conexion();

        $val; //Variable para saber si se pudo hacer el registro
        $result;
        //Se prepara la sentencia
        $query = "SELECT * FROM persona WHERE correo_electronico = '" . $objeto->getCorreo_Electronico() . "' AND contrasena = '" . $objeto->getContrasena() . "' AND activo = '1'";
        
        //Se ejecuta la sentencia sql
        $result = $this->conector->ejecutarQuery($query);
        if ($result != false) {
            $this->miPersonaAux = new Persona();

            while ($obj = $result->fetch_object()) {
                $this->miPersonaAux->setIdPersona($obj->idPersona);
                $this->miPersonaAux->setNombre($obj->nombre);
                $this->miPersonaAux->setApellido($obj->apellido);
                $this->miPersonaAux->setCorreo_Electronico($obj->correo_electronico);
                $this->miPersonaAux->setRFC($obj->rfc);
                $this->miPersonaAux->setNombre_Empresa($obj->nombre_empresa);
                $this->miPersonaAux->setConstrasena($obj->contrasena);
                $this->miPersonaAux->setActivo($obj->activo);
            }

            $result->close();
            $val = $this->miPersonaAux;
        } else
            $val = false;
        //Cierra la conexion
        $this->conector->cerrarConexion();
        return $val;
    }

    public function eliminarPorID($objeto){}
    
    public function actualizarPorID($objeto){}
    
    public function buscarTodos(){}
    
   
    
}

?>