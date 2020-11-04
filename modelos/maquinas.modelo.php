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

	 		$stmt = Conexion::conectar()->prepare("SELECT idMaquina, numMaquina, descripcion, modelo FROM $tabla WHERE $item = :$item");

	 		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

	 		$stmt -> execute();

	 		return $stmt ->fetch();
	 	}
	 	else{
	 		$stmt = Conexion::conectar()->prepare("SELECT idMaquina, numMaquina, descripcion, modelo FROM $tabla");

	 		$stmt -> execute();

	 		return $stmt -> fetchALL();
	 	}

	 	$stmt -> close();
	 	$stmt = null;
	 }

	 static public function mdlEditarMaquinas($tabla, $datos){

	 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion, numMaquina = :numMaquina WHERE idMaquina = :id");

		$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":numMaquina", $datos["numMaquina"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		
			
		if( $stmt -> execute() ){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	 }

	  /*====================================
		Borrar Categoria
	 =====================================*/
	 static public function ctrBorrarMaquinas($tabla, $datos){
	 	
	 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idMaquina = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

	 	if( $stmt -> execute() ){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	 }
}

?>