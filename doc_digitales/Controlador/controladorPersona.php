<?php


	include_once '../Modelo/Persona.php';
	include_once '../Modelo/PersonaDAO.php';

    $opc = $_GET['opc'];

    switch ($opc) {
        case 0:
            registrarPersona();
            break;
        case 1:
            autentificar();
        break;
    }

function registrarPersona(){

    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $rfc = $_POST["rfc"];
    $nombreEmpresa = $_POST["nombreEmpresa"];
    $password = $_POST["password"];

    $auxPersona = new Persona();
    $auxPersona->setNombre($name);
    $auxPersona->setApellido($lastname);
    $auxPersona->setCorreo_Electronico($email);
    $auxPersona->setRFC($rfc);
    $auxPersona->setNombre_Empresa($nombreEmpresa);
    $auxPersona->setConstrasena($password);
    $auxPersona->setActivo(1);

    

    $miDAO = new PersonaDAO();

    if( $miDAO->crear($auxPersona) )
    	echo "Se agrego correctamente";
    else
    	echo "Ocurrio un error";

}

function autentificar(){

    $email = $_POST["email"];
    $password = $_POST["password"];

    $auxPersona = new Persona();
    $auxPersona->setCorreo_Electronico($email);
    $auxPersona->setConstrasena($password);


    $miDAO = new PersonaDAO();
    $resultado = $miDAO->buscarPorNombreUsuarioYContrasena($auxPersona);

    if( $resultado ){
        $myJSON = json_encode($resultado);

        echo $myJSON;
    }
    else
        echo false;
    
}








?>