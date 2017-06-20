<?php

include_once 'Conexion.php';
include_once 'Empleado.php';
include_once 'PersistenciaDAO.php';
class EmpleadoDAO implements PersistenciaDAO {

    private $conector;
    private $miEmpleadoAux;

    public function __construct() {
    }

    public function crear($objeto) {
        
        //Abre la conexion
        $this->conector = new Conexion();

        //Variable para el valor de la sentencia
        $result; 

        //Se prepara la sentencia
        $query = "INSERT INTO empleado (idSucursal, nombre, rfc, puesto, activo ) VALUES (
        '" . $objeto->getIdSucursal() . "',
        '" . $objeto->getNombre() . "',
        '" . $objeto->getRFC() . "',
        '" . $objeto->getPuesto() . "',
        1)";

        //Se ejecuta la sentencia sql
        $result = $this->conector->ejecutarNoQuery($query);

        //Cierra la conexion
        $this->conector->cerrarConexion();

        return $result;
    }


    public function buscarTodos() {
        //Abre la conexion
        $this->conector = new Conexion();

        $val; //Variable para saber si se pudo hacer el registro
        $result;
        $Empleados= array();
        //Se prepara la sentencia
        $query = "SELECT * FROM empleado WHERE activo = '1' ";
        
        //Se ejecuta la sentencia sql
        $result = $this->conector->ejecutarQuery($query);
        if ($result != false) {
            

            while ($obj = $result->fetch_object()) {
                $this->miEmpleadoAux = new Empleado();

                $this->miEmpleadoAux->setIdEmpleado($obj->idEmpleado);
                $this->miEmpleadoAux->setIdSucursal($obj->idSucursal);
                $this->miEmpleadoAux->setNombre($obj->nombre);
                $this->miEmpleadoAux->setRFC($obj->rfc);
                $this->miEmpleadoAux->setPuesto($obj->puesto);

                array_push($Empleados, $this->miEmpleadoAux); 
            }

            $result->close();
            $val = $Empleados;
        } else
            $val = false;
        //Cierra la conexion
        $this->conector->cerrarConexion();
        return $val;
    }

    public function buscarPorSucursalID( $sucursalID ) {
        //Abre la conexion
        $this->conector = new Conexion();

        $val; //Variable para saber si se pudo hacer el registro
        $result;
        $Empleados= array();
        //Se prepara la sentencia
        $query = "SELECT * FROM empleado WHERE activo = '1' AND  idSucursal = '".$sucursalID."';";
        
        //Se ejecuta la sentencia sql
        $result = $this->conector->ejecutarQuery($query);
        if ($result != false) {
            

            while ($obj = $result->fetch_object()) {
                $this->miEmpleadoAux = new Empleado();

                $this->miEmpleadoAux->setIdEmpleado($obj->idEmpleado);
                $this->miEmpleadoAux->setIdSucursal($obj->idSucursal);
                $this->miEmpleadoAux->setNombre($obj->nombre);
                $this->miEmpleadoAux->setRFC($obj->rfc);
                $this->miEmpleadoAux->setPuesto($obj->puesto);

                array_push($Empleados, $this->miEmpleadoAux); 
            }

            $result->close();
            $val = $Empleados;
        } else
            $val = false;
        //Cierra la conexion
        $this->conector->cerrarConexion();
        return $val;
    }

    public function eliminarPorID($objeto){}
    
    public function actualizarPorID($objeto){

        //Abre la conexion
        $this->conector = new Conexion();

        //Variable para el valor de la sentencia
        $result; 

        //Se prepara la sentencia
        $query = "UPDATE empleado 
        set nombre = '" . $objeto->getNombre() . "',
         idSucursal = '" . $objeto->getIdSucursal() . "',
         rfc = '" . $objeto->getRFC() . "',
         puesto = '" . $objeto->getPuesto() . "'
        WHERE idEmpleado = '". $objeto->getIdEmpleado() . "';";

        //Se ejecuta la sentencia sql
        $result = $this->conector->ejecutarNoQuery($query);

        //Cierra la conexion
        $this->conector->cerrarConexion();

        return $result;
    }

    public function buscarPorID($objeto){

        //Abre la conexion
        $this->conector = new Conexion();

        $val; //Variable para saber si se pudo hacer el registro
        $result;
        //Se prepara la sentencia
        $query = "SELECT * FROM empleado WHERE idEmpleado = '" . $objeto->getIdEmpleado() ."' AND activo = '1';";

        //Se ejecuta la sentencia sql
        $result = $this->conector->ejecutarQuery($query);
        if ($result != false) {
            $this->miEmpleadoAux = new Empleado();
             while ($obj = $result->fetch_object()) {

                $this->miEmpleadoAux->setIdEmpleado($obj->idEmpleado);
                $this->miEmpleadoAux->setIdSucursal($obj->idSucursal);
                $this->miEmpleadoAux->setNombre($obj->nombre);
                $this->miEmpleadoAux->setRFC($obj->rfc);
                $this->miEmpleadoAux->setPuesto($obj->puesto);
                
            }

            $result->close();
            $val =  $this->miEmpleadoAux;
        } else
            $val = false;
        //Cierra la conexion
        $this->conector->cerrarConexion();
        return $val;
    }
    
    
}

?>