<?php


class ControladorProductos{




		/*=============================
		Mostrar de Productos
		==============================*/
	static public function ctrMostrarProductos($item, $valor,$orden){
		$tabla= "productos";
		
		$respuesta = ModeloProductos::MdlMostrarProductos($tabla, $item, $valor, $orden);

		return $respuesta;
	}

	/*=============================
		Crear Productos
	=============================*/

	static public function ctrCrearProducto(){
		
		if(isset($_POST["nuevaDescripcion"])){
			
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
				preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&
				preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"]) &&
				preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"])){
				
					$tabla = "productos"; 

					/*$ruta = "vistas/img/productos/default/anonymous.png";*/
					/*=============================================
					=            Guardar Imagen            =
					=============================================*/
					$ruta = "";
					
					if (isset($_FILES["nuevaImagen"]["tmp_name"])){
						
						list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

						$nuevoAncho = 500;
						$nuevoAlto = 500;

						/*=============================================
						CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
						=============================================*/

						$directorio = "vistas/img/productos/".$_POST["nuevoCodigo"];

						mkdir($directorio, 0755);
						
						
						
						# code...

						if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaImagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}


					}
					

					$datos = array("id_Categoria" => $_POST["nuevaCategorias"],
					           	  "codigo" => $_POST["nuevoCodigo"],
					           	  "descripcion" => $_POST["nuevaDescripcion"],
					              "stock" => $_POST["nuevoStock"],
					              "precio_compra" => $_POST["nuevoPrecioCompra"],
					              "precio_venta" => $_POST["nuevoPrecioVenta"],					             
					              "imagen" => $ruta
					           );
					
					$respuesta = ModeloProductos::MdlIngresarProductos($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal({

								type: "success",
								title: "El Producto se guardo correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								

							}).then((result)=>{

								if(result.value){
								
									window.location = "productos";

								}

							});
				

							</script>';
					}
				}
				else{
					echo '<script>

							swal({

								type: "error",
								title: "El producto no puede ir Vacio o llevar caracteres especiales!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								

							}).then((result)=>{

								if(result.value){
								
									window.location = "prodcutos";

								}

							});
				

					</script>';
			}

		}

		
	}


/*=============================
		Editar Productos
	=============================*/

	static public function ctrEditarProducto(){
		
		if(isset($_POST["editarDescripcion"])){
			
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) &&
				preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&
				preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"]) &&
				preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"])){
				
					$tabla = "productos"; 

					/*$ruta = "vistas/img/productos/default/anonymous.png";*/
					/*=============================================
					=            Guardar Imagen            =
					=============================================*/
					$ruta = $_POST["imagenActual"];
					
					if (isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){
						
						list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

						$nuevoAncho = 500;
						$nuevoAlto = 500;

						/*=============================================
						CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
						=============================================*/

						$directorio = "vistas/img/productos/".$_POST["editarCodigo"];

					/*=============================================
						Preguntamos si existe otra iagen en la BD
					=============================================*/

						if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png"){

							unlink($_POST["imagenActual"]);

						}else{

							mkdir($directorio, 0755);	
					
					}
						
						
						
						
						# code...

						if($_FILES["editarImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarImagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}


					}
					

					$datos = array("id_Categoria" => $_POST["editarCategorias"],
					           	  "codigo" => $_POST["editarCodigo"],
					           	  "descripcion" => $_POST["editarDescripcion"],
					              "stock" => $_POST["editarStock"],
					              "precio_compra" => $_POST["editarPrecioCompra"],
					              "precio_venta" => $_POST["editarPrecioVenta"],					             
					              "imagen" => $ruta
					           );
					
					

					$respuesta = ModeloProductos::MdlEditarProductos($tabla, $datos);
					
					if($respuesta == "ok"){

						echo '<script>

							swal({

								type: "success",
								title: "El Producto se guardo correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								

							}).then((result)=>{

								if(result.value){
								
									window.location = "productos";

								}

							});
				

							</script>';
					}
				}
				else{
					echo '<script>

							swal({

								type: "error",
								title: "El producto no puede ir Vacio o llevar caracteres especiales!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								

							}).then((result)=>{

								if(result.value){
								
									window.location = "prodcutos";

								}

							});
				

					</script>';
			}

		}

		
	}


	  /*====================================
		Borrar PRoductos
	 =====================================*/
	 static public function ctrBorrarProducto(){

		if(isset($_GET["idProducto"])){

			$tabla ="productos";
			$datos = $_GET["idProducto"];

			if($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/anonymous.png"){

				unlink($_GET["imagen"]);
				rmdir('vistas/img/productos/'.$_GET["codigo"]);

			}

			$respuesta = ModeloProductos::mdlBorrarProducto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El producto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "productos";

								}
							})

				</script>';

			}		
		}


	}
 /*====================================
		Mostrar Suma Ventas
	 =====================================*/
	 static public function ctrMostrarSumaVentas(){

	 	$tabla = "productos";

	 	$respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);

	 	return $respuesta;
	 }

}

