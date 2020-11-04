/* =============================
         Editar Categoria
  ============================== */

  $(".btnEditarMaquina").click(function(){

  	var idMaquina= $(this).attr("idMaquina");

  	var datos = new FormData();
  	datos.append("idMaquina",idMaquina);
  	
  	$.ajax({
  		url:"ajax/maquinas.ajax.php",
		method: "POST", 
		data: 	datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			//console.log("respuesta",respuesta);

			$("#editarDescripcion").val(respuesta["descripcion"]);
			$("#editarNumMaquina").val(respuesta["numMaquina"]);
			$("#idMaquina").val(respuesta["idMaquina"]);
		}
  	})

  })


  /* =============================
         Eliminar Maquina
  ============================== */

 $(".btnEliminarMaquina").click(function(){

 	var idMaquina = $(this).attr("idMaquina");
//console.log("respuesta",idMaquina);
 	swal({
 		title: '¿Esta seguro de eliminar la maquina?',
 		text:  "¡Si no lo está, puede cancelar la accion", 
 		type: 'warning',
 		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar maquina!'
 	}).then((result)=>{

 		if(result.value){
 			window.location = "index.php?ruta=maquinas&idMaquina="+idMaquina;
 		}
 	})
 })

 /*=============================================
	=            Maquina Repetida            =
	=============================================*/
$("#nuevoNumMaquina").change(function(){ 

	$(".alert").remove();
	var maquina = $(this).val();
console.log("respuesta",datos);
	var datos = new FormData();
	datos.append("validaMaquina", maquina);

	$.ajax({

			url:"ajax/maquinas.ajax.php",
			method: "POST", 
			data: 	datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function(respuesta){

				/*console.log("respuesta",respuesta);*/

				if(respuesta){
					$("#nuevoNumMaquina").parent().after('<div class="alert alert-warning">La maquina ya Existe</div>');
					$("#nuevoNumMaquina").val("");
				}
				
		}

	})

})
