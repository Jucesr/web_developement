<?php

    include_once '../Modelo/Sucursal.php';
    include_once '../Modelo/SucursalDAO.php';

    $opc = $_GET['opc'];


    switch ($opc) {
    case 0:

        consultaGeneral();

    break;
    case 1:
        consultaPorID();

    break;
    case 2:

        registrarSucursal();

    break;
    case 3:

        actualizarSucursal();

    break;
    case 4:

        modificarNumeroDeEmpleados();

    break;

    }

  


function consultaGeneral(){
    $miDAO = new SucursalDAO();
    $resultado = $miDAO->buscarTodos();

    //$listaSucursales = '{"Sucursales":[';
    $listaSucursales = '[';
    $myJSON ='';
    if( $resultado ){
        $i = 0;
        $total = count($resultado);
        foreach ($resultado as $element) {

             $listaSucursales = $listaSucursales.
             '{"idSucursal":"'.$element->getIdSucursal().
             '","nombre":"'.$element->getNombre().
             '","noCalle":"'.$element->getNo_Calle().
             '","colonia":"'.$element->getColonia().
             '","num_exterior":"'.$element->getNum_Ext().
             '","num_interior":"'.$element->getNum_Int().
             '","codigo_postal":"'.$element->getCodigo_Postal().
             '","ciudad":"'.$element->getCiudad().
             '","pais":"'.$element->getPais().
             '","no_empleados":"'.$element->getNo_Empleados().
             '"}';

             //AGREGA UNA , A TODOS MENOS AL ULTIMO ELEMENTO
             if($i!=$total-1)
                $listaSucursales = $listaSucursales.',';
            $i = $i+1;

        $myJSON = $myJSON.json_encode($element);    
        }
        $listaSucursales = $listaSucursales.']';
        echo $listaSucursales;
    }
    else
    	echo "[]";
}

function consultaPorID(){

    $sucursalID = $_POST["sucursalID"];

    $auxSucursal = new Sucursal();
    $auxSucursal->setIdSucursal($sucursalID);


    $miDAO = new SucursalDAO();
    $resultado = $miDAO->buscarPorID($auxSucursal);
    if( $resultado ){
        $myJSON = json_encode($resultado);

        echo $myJSON;
    }
    else
        echo false;

}

function registrarSucursal(){

    $nombre = $_POST["nombre"];
    $calle = $_POST["calle"];
    $colonia = $_POST["colonia"];
    $numExt = $_POST["numExt"];
    $numInt = $_POST["numInt"];
    $cp = $_POST["cp"];
    $ciudad = $_POST["ciudad"];
    $pais = $_POST["pais"];


    $auxSucursal = new Sucursal();
    $auxSucursal->setNombre($nombre);
    $auxSucursal->setNo_Calle($calle);
    $auxSucursal->setColonia($colonia);
    $auxSucursal->setNum_Ext($numExt);
    $auxSucursal->setNum_Int($numInt);
    $auxSucursal->setCodigo_Postal($cp);
    $auxSucursal->setCiudad($ciudad);
    $auxSucursal->setPais($pais);
    $auxSucursal->setNo_Empleados(0);

    $miDAO = new SucursalDAO();

    if( $miDAO->crear($auxSucursal) )
        echo "Se agrego correctamente";
    else
        echo "Ocurrio un error";


}

function actualizarSucursal(){

    $sucursalID = $_POST["sucursalID"];
    $nombre = $_POST["nombre"];
    $calle = $_POST["calle"];
    $colonia = $_POST["colonia"];
    $numExt = $_POST["numExt"];
    $numInt = $_POST["numInt"];
    $cp = $_POST["cp"];
    $ciudad = $_POST["ciudad"];
    $pais = $_POST["pais"];
    $no_empleados = $_POST["no_empleados"];


    $auxSucursal = new Sucursal();
    $auxSucursal->setIdSucursal($sucursalID);
    $auxSucursal->setNombre($nombre);
    $auxSucursal->setNo_Calle($calle);
    $auxSucursal->setColonia($colonia);
    $auxSucursal->setNum_Ext($numExt);
    $auxSucursal->setNum_Int($numInt);
    $auxSucursal->setCodigo_Postal($cp);
    $auxSucursal->setCiudad($ciudad);
    $auxSucursal->setPais($pais);
    $auxSucursal->setNo_Empleados($no_empleados);

    $miDAO = new SucursalDAO();
    
    if( $miDAO->actualizarPorID($auxSucursal) )
        echo "Se actualizo correctamente correctamente";
    else
        echo "Ocurrio un error";

}

function modificarNumeroDeEmpleados(){

    $idSucursal = $_POST["sucursalID"];
    $numero = $_POST["numero"];

    $miDAO = new SucursalDAO();

    $miDAO->modificarNumeroDeEmpleados($idSucursal,$numero);
}

    



?>