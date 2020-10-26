<?php

class ControladorMaquinas{

	static public function ctrCrearMaquina(){

		if(isset($_POST["nuevaNumMaquina"]))
		{
			if(preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevaNumMaquina"])){

				$tabla = "maquinas";

				$NumMaquina= $_POST["nuevaNumMaquina"];
				$DescMaquina= $_POST["nuevaDescMaquina"];

				$respuesta = ModeloMaquinas::mdlCrearMaquina($tabla, $NumMaquina,$DescMaquina);

				if($respuesta == "ok"){

						echo '<script>

							swal({

								type: "success",
								title: "La maquina se guardo correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								

							}).then((result)=>{

								if(result.value){
								
									window.location = "maquinas";

								}

							});
				

					</script>';
					}

			}
			else{

						echo '<script>

							swal({

								type: "error",
								title: "La maquina no puede ir Vacio o llevar caracteres especiales!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								closeOnConfirm: false

							}).then((result)=>{

								if(result.value){
								
									window.location = "maquinas";

								}

							});
				

					</script>';
				

				}

		}
	
	}


	static public function ctrMostrarMaquinas($item,$valor){

		$tabla = "maquinas";

		$respuesta = ModeloMaquinas::mdlMostrarMaquinas($tabla,$item,$valor);

		return $respuesta;

	}

}

