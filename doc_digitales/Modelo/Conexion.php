<?php
	class Conexion{
                private $serverName = "localhost"; //Nombre del servidor
                private $username = "root";
                private $password = "";
                private $dataBase = "doc_digitales";
                private $con ; //Variable para establecer una conexion
	
                

		public function __construct(){
                        //Establece la conexion
                        $this->con = new mysqli($this->serverName, $this->username, $this->password, $this->dataBase);
                        if (mysqli_connect_errno()) {
                        printf("Falló la conexión: %s\n", mysqli_connect_error());
                        }
			
		}
                
                public function getConexion() {
                    return $this->con;
                }
                //Funcion para cerrar la conexion
                public function cerrarConexion() {
                    $this->con->close();
                    
                }
                //Funcion para hacer una consulta que no regrese registros
                public function ejecutarNoQuery($query) {
                    $stmt = $this->con->query( $query);
                    if( $stmt === false ) {
                    return false;
                    }else
                        return true;
                }
                //Funcion para hacer una consulta que si regrese registros
                public function ejecutarQuery($query) {
                    $stmt = $this->con->query( $query);
                    if( $stmt === false || $stmt->num_rows==0 ) {
                    return false;
                    }else
                        return $stmt ;
                }


	}
?>