<?php


	include_once '../Modelo/Empleado.php';
	include_once '../Modelo/EmpleadoDAO.php';

    $opc = $_GET['opc'];

    switch ($opc) {
        case 0:
            registrarEmpleado();
            break;
        case 1:
            consultaGeneral();
        break;
        case 2:
            actualizarEmpleado();
        break;
        case 3:
            consultaPorID();
        break;
    }

function registrarEmpleado(){

    $sucursalID = $_POST["sucursalID"];
    $nombre = $_POST["nombre"];
    $rfc = $_POST["rfc"];
    $puesto = $_POST["puesto"];


    $auxEmpleado = new Empleado();
    $auxEmpleado->setIdSucursal($sucursalID);
    $auxEmpleado->setNombre($nombre);
    $auxEmpleado->setRFC($rfc);
    $auxEmpleado->setPuesto($puesto);

    $miDAO = new EmpleadoDAO();

    if( $miDAO->crear($auxEmpleado) )
    	echo "Se agrego correctamente";
    else
    	echo "Ocurrio un error";
}

function actualizarEmpleado(){

    $empleadoID = $_POST["empleadoID"];
    $sucursalID = $_POST["sucursalID"];
    $nombre = $_POST["nombre"];
    $rfc = $_POST["rfc"];
    $puesto = $_POST["puesto"];


    $auxEmpleado = new Empleado();
    $auxEmpleado->setIdEmpleado($empleadoID);
    $auxEmpleado->setIdSucursal($sucursalID);
    $auxEmpleado->setNombre($nombre);
    $auxEmpleado->setRFC($rfc);
    $auxEmpleado->setPuesto($puesto);

    $miDAO = new EmpleadoDAO();

    if( $miDAO->actualizarPorID($auxEmpleado) )
        echo "Se modifico correctamente";
    else
        echo "Ocurrio un error";

}

function consultaGeneral(){

    $sucursalID = $_POST["sucursalID"];
    
    $miDAO = new EmpleadoDAO();
    $resultado = $miDAO->buscarPorSucursalID($sucursalID);

    //$listaEmpleados = '{"Empleados":[';
    $listaEmpleados = '[';
    $myJSON ='';
    if( $resultado ){
        $i = 0;
        $total = count($resultado);
        foreach ($resultado as $element) {
             $listaEmpleados = $listaEmpleados.
             '{"idEmpleado":"'.$element->getIdEmpleado().
             '","idSucursal":"'.$element->getIdSucursal().
             '","nombre":"'.$element->getNombre().
             '","rfc":"'.$element->getRFC().
             '","puesto":"'.$element->getPuesto().
             '"}';

             //AGREGA UNA , A TODOS MENOS AL ULTIMO ELEMENTO
             if($i!=$total-1)
                $listaEmpleados = $listaEmpleados.',';
            $i = $i+1;

        $myJSON = $myJSON.json_encode($element);    
        }
        $listaEmpleados = $listaEmpleados.']';
        echo $listaEmpleados;
    }
    else
        echo "[]";

}

function consultaPorID(){

    $empleadoID = $_POST["empleadoID"];

    $auxEmpleado = new Empleado();
    $auxEmpleado->setIdEmpleado($empleadoID);


    $miDAO = new EmpleadoDAO();
    $resultado = $miDAO->buscarPorID($auxEmpleado);
    if( $resultado ){
        $myJSON = json_encode($resultado);

        echo $myJSON;
    }
    else
        echo false;

}

?>