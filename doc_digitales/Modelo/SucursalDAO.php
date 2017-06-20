<?php

include_once 'Conexion.php';
include_once 'Sucursal.php';
include_once 'PersistenciaDAO.php';
class SucursalDAO implements PersistenciaDAO {

    private $conector;
    private $miSucursalAux;

    public function __construct() {
    }

    public function crear($objeto) {
        
        //Abre la conexion
        $this->conector = new Conexion();

        //Variable para el valor de la sentencia
        $result; 

        //Se prepara la sentencia
        $query = "INSERT INTO sucursal (nombre, noCalle, colonia, num_exterior, num_interior, codigo_postal, ciudad, pais, no_empleados, activo) VALUES (
        '" . $objeto->getNombre() . "',
        '" . $objeto->getNo_Calle() . "',
        '" . $objeto->getColonia() . "',
        '" . $objeto->getNum_Ext() . "',
        '" . $objeto->getNum_Int() . "',
        '" . $objeto->getCodigo_Postal() . "',
        '" . $objeto->getCiudad() . "',
        '" . $objeto->getPais() . "',
        " . $objeto->getNo_Empleados() . ",
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
        $sucursales= array();
        //Se prepara la sentencia
        $query = "SELECT * FROM Sucursal WHERE activo = '1' ";
        
        //Se ejecuta la sentencia sql
        $result = $this->conector->ejecutarQuery($query);
        if ($result != false) {
            

            while ($obj = $result->fetch_object()) {
                $this->miSucursalAux = new Sucursal();

                $this->miSucursalAux->setIdSucursal($obj->idSucursal);
                $this->miSucursalAux->setNombre($obj->nombre);
                $this->miSucursalAux->setNo_Calle($obj->noCalle);
                $this->miSucursalAux->setColonia($obj->colonia);
                $this->miSucursalAux->setNum_Ext($obj->num_exterior);
                $this->miSucursalAux->setNum_Int($obj->num_interior);
                $this->miSucursalAux->setCodigo_Postal($obj->codigo_postal);
                $this->miSucursalAux->setCiudad($obj->ciudad);
                $this->miSucursalAux->setPais($obj->pais);
                $this->miSucursalAux->setNo_Empleados($obj->no_empleados);
                array_push($sucursales, $this->miSucursalAux); 
            }

            $result->close();
            $val = $sucursales;
        } else
            $val = false;
        //Cierra la conexion
        $this->conector->cerrarConexion();
        return $val;
    }

    public function eliminarPorID($objeto){}

    public function modificarNumeroDeEmpleados($idSucursal,$numero){

        $this->conector = new Conexion();

        //Variable para el valor de la sentencia
        $result;

        $query = "UPDATE sucursal SET no_empleados = no_empleados + '".$numero."' WHERE idSucursal = '" . $idSucursal . "';";

        //Se ejecuta la sentencia sql
        $result = $this->conector->ejecutarNoQuery($query);

        //Cierra la conexion
        $this->conector->cerrarConexion();

        return $result;

    }
    
    public function actualizarPorID($objeto){
        //Abre la conexion
        $this->conector = new Conexion();

        //Variable para el valor de la sentencia
        $result; 

        //Se prepara la sentencia
        $query = "UPDATE sucursal 
        set nombre = '" . $objeto->getNombre() . "',
         noCalle = '" . $objeto->getNo_Calle() . "',
         colonia = '" . $objeto->getColonia() . "',
         num_exterior = '" . $objeto->getNum_Ext() . "',
         num_interior = '" . $objeto->getNum_Int() . "',
         codigo_postal = '" . $objeto->getCodigo_Postal() . "',
         ciudad = '" . $objeto->getCiudad() . "',
         pais = '" . $objeto->getPais() . "',
         no_empleados = '". $objeto->getNo_Empleados() . "'
        WHERE idSucursal = '". $objeto->getIdSucursal() . "';";

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
        $query = "SELECT * FROM sucursal WHERE idSucursal = '" . $objeto->getIdSucursal() ."' AND activo = '1';";

        //Se ejecuta la sentencia sql
        $result = $this->conector->ejecutarQuery($query);
        if ($result != false) {
            $this->miSucursalAux = new Sucursal();
             while ($obj = $result->fetch_object()) {

                $this->miSucursalAux->setIdSucursal($obj->idSucursal);
                $this->miSucursalAux->setNombre($obj->nombre);
                $this->miSucursalAux->setNo_Calle($obj->noCalle);
                $this->miSucursalAux->setColonia($obj->colonia);
                $this->miSucursalAux->setNum_Ext($obj->num_exterior);
                $this->miSucursalAux->setNum_Int($obj->num_interior);
                $this->miSucursalAux->setCodigo_Postal($obj->codigo_postal);
                $this->miSucursalAux->setCiudad($obj->ciudad);
                $this->miSucursalAux->setPais($obj->pais);
                $this->miSucursalAux->setNo_Empleados($obj->no_empleados);
                
            }

            $result->close();
            $val =  $this->miSucursalAux;
        } else
            $val = false;
        //Cierra la conexion
        $this->conector->cerrarConexion();
        return $val;

    }
    
    
}

?>