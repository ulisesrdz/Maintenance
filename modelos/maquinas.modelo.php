<?php

require_once "conexion.php";

class ModeloMaquinas{

	 static public function mdlCrearMaquina($tabla, $numMaquina, $descMaquina){
	 	
	 	
	 	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (numMaquina,descripcion) VALUES (:numMaquina, :descripcion) ");

		$stmt -> bindParam(":numMaquina", $numMaquina, PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $descMaquina, PDO::PARAM_STR);
		
		
			
		if( $stmt -> execute() ){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	 }



	  static public function mdlMostrarMaquinas($tabla, $item , $valor){

	 	if($item != null){

	 		$stmt = Conexion::conectar()->prepare("SELECT idMaquina, numMaquina, descripcion FROM $tabla WHERE $item = :$item");

	 		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

	 		$stmt -> execute();

	 		return $stmt ->fetch();
	 	}
	 	else{
	 		$stmt = Conexion::conectar()->prepare("SELECT idMaquina, numMaquina, descripcion FROM $tabla");

	 		$stmt -> execute();

	 		return $stmt -> fetchALL();
	 	}

	 	$stmt -> close();
	 	$stmt = null;
	 }
}

?>