<?php
	interface PersistenciaDAO{
	
            public function crear($objeto) ;
            public function eliminarPorID($objeto) ;
            public function buscarPorID($objeto) ;
            public function actualizarPorID($objeto) ;
            public function buscarTodos() ;
               
	}
?>