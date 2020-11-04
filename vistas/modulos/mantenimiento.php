<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Informacion de Mtto de Maquinas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Informacion de Mtto de Maquinas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarInformacion">
          
          Agregar Informacion

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Tipo Mtto</th>
           <th>Num Maquina</th>
           <th>Modelo</th>
           <th>Serie</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php          

          $informacion = ControladorMantenimiento::ctrMostrarInformacion();
          
          foreach ($informacion as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["categoria"].'</td>
                    <td class="text-uppercase">'.$value["numMaquina"].'</td>
                    <td class="text-uppercase">'.$value["modelo"].'</td>
                    <td class="text-uppercase">'.$value["serie"].'</td>

                    <td>

                      <div class="btn-group">
                          <button class="btn btn-warning btnAgregarTareas" idInform="'.$value["id"].'" data-toggle="modal" data-target="#modalAgregarTarea"><i class="fa fa-plus"></i></button>
                         

                           <button class="btn btn-warning btnMostrarTarea" idInforme="'.$value["id"].'" ><i class="fa fa-plus"></i></button>                      
                          
                          <button class="btn btn-warning btnEditarInforme" idInforme="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarInformacion"><i class="fa fa-pencil"></i></button>

                          <button class="btn btn-danger btnEliminarInforme" idInforme="'.$value["id"].'"><i class="fa fa-times"></i></button>
                          
                          

                      </div>  

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR MAQUINA
======================================-->

<div id="modalAgregarInformacion" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Informacion</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

           <!--Entrada TipoMtto-->
              <div class="form-group">
              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaCategoria"  name="nuevaCategoria" required>
                  
                 

                  <option value="">Seleccione Tipo de Mtto</option>

                  <?php
                     $item = null;
                     $valor = null;
                     $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                     foreach ($categorias as $key => $value) {
                       echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                     }

                  ?>

                  
                </select>

              </div>

            </div>
             <!--Entrada Periodo-->
              <div class="form-group">
              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevoPeriodo"  name="nuevoPeriodo" required>
                  
                 

                  <option value="">Seleccione el Periodo de Frecuencia</option>

                  <?php
                     
                     $periodo = ControladorMantenimiento::ctrMostrarPeriodo();
                     foreach ($periodo as $key => $value) {
                       echo '<option value="'.$value["id"].'">'.$value["descripcion"].'</option>';
                     }

                  ?>

                  
                </select>

              </div>

            </div>

             <!--Entrada Maquina-->
              <div class="form-group">
              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevoNumMaq"  name="nuevoNumMaq" required>
                  
                 

                  <option value="">Seleccione Maquina</option>

                  <?php
                     $item = null;
                     $valor = null;
                     $maquinas = ControladorMaquinas::ctrMostrarMaquinas($item, $valor);
                     foreach ($maquinas as $key => $value) {
                       echo '<option value="'.$value["idMaquina"].'">'.$value["numMaquina"].'</option>';
                     }

                  ?>

                  
                </select>

              </div>

            </div>

             

            <!--Entrada Serie-->
             <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevaSerie" placeholder="Ingresar Numero de Serie" required>
              </div>
            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Informacion</button>

        </div>

        <?php

          $crearInformacion = new ControladorMantenimiento();
          $crearInformacion -> ctrIngresarInformacion();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR TAREA
======================================-->

<div id="modalAgregarTarea" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Tarea</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!--Entrada Serie-->
             <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevaTarea" placeholder="Descripcion de la tarea" required>
                <input type="hidden" id="idInform" name="idInform">
              </div>
            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Tarea</button>

        </div>

        <?php
          //var_dump($_POST["idInformacion"]);
          $crearInformacion = new ControladorMantenimiento();
          $crearInformacion -> ctrIngresarTarea();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL MOSTRAR TAREAS
======================================-->

<div id="modalMostrarTarea" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Tarea4</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="box-body">


           <!--Entrada Serie-->
             <div class="form-group"> 
              <div class="input-group">                
                
                   <input type="text" id="idInformacionTarea" name="idInformacionTarea"> 

                <!-- <input type="hidden" href="javascript:;" id="idInformacion" name="idInformacion">      
                <script>
                  var dato = $('#idInformacion').val();
                    $.ajax({
                       data: {"dato" : dato},
                       url: "index.php?ruta=mantenimiento",
                       type: "POST",
                     beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                        },
                        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                console.log("respuest2",response);
                                $("#resultado").html(response);
                        }

                    });
                 </script>         
 -->
              </div>
            </div>
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Tarea</th>
           <th>Estado</th>           

         </tr> 

        </thead>

        <tbody>

        <?php          

          $item = "idMtto";
          $val  = $_SESSION["nombre"];
          var_dump($val);
          // var_dump($orden);
          // var_dump($datos);
          // var_dump($idInformacion);
          //$tareas = ControladorMantenimiento::ctrMostrarTareas($item, $val);
          // var_dump(isset($request["dato"]));
          // if(isset($request["dato"])){
          //   $val  = $request["dato"];
          //   var_dump($val);

          //   $tareas = ControladorMantenimiento::ctrMostrarTareas($item, $val);
          //  var_dump($tareas);
          // }
          
          
          //$item = "";
          //$value  = "";

          
          // foreach ($informacion as $key => $value) {
           
          //   echo ' <tr>

          //           <td>'.($key+1).'</td>

          //           <td class="text-uppercase">'.$value["categoria"].'</td>
          //           <td class="text-uppercase">'.$value["numMaquina"].'</td>
          //           <td class="text-uppercase">'.$value["modelo"].'</td>
          //           <td class="text-uppercase">'.$value["serie"].'</td>

          //           <td>

          //             <div class="btn-group">
          //                 <button class="btn btn-warning btnAgregarTareas" idInformacion="'.$value["id"].'" data-toggle="modal" data-target="#modalAgregarTarea"><i class="fa fa-plus"></i></button>
                        
          //                 <button class="btn btn-warning btnMostrarTareas" idMaquina="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarMaquinas"><i class="fa  fa-list-alt"></i></button>
 
          //                 <button class="btn btn-warning btnEditarInforme" idMaquina="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarMaquinas"><i class="fa fa-pencil"></i></button>

          //                 <button class="btn btn-danger btnEliminarInforme" idMaquina="'.$value["id"].'"><i class="fa fa-times"></i></button>

          //             </div>  

          //           </td>

          //         </tr>';
          // }

        ?> 

        </tbody>

       </table>

      </div>

      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR INFORME
======================================-->
<div id="modalEditarInformacion" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Informacion</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

           <!--Entrada TipoMtto-->
              <div class="form-group">
              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="hidden" id="editarIdInformacion" name="editarIdInformacion"> 
                <select class="form-control input-lg" id="editarCategoria"  name="editarCategoria" required>                 

                  <option value="">Seleccione Tipo de Mtto</option>

                  <?php
                     $item = null;
                     $valor = null;
                     $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                     foreach ($categorias as $key => $value) {
                       echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                     }

                     

                  ?>
                  
                </select>

              </div>

            </div>
             <!--Entrada Periodo-->
              <div class="form-group">
              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="editarPeriodo"  name="editarPeriodo" required>
                  
                 

                  <option value="">Seleccione el Periodo de Frecuencia</option>

                  <?php
                     
                     $periodo = ControladorMantenimiento::ctrMostrarPeriodo();
                     foreach ($periodo as $key => $value) {
                       echo '<option value="'.$value["id"].'">'.$value["descripcion"].'</option>';
                     }

                  ?>

                  
                </select>

              </div>

            </div>

             <!--Entrada Maquina-->
              <div class="form-group">
              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="editarNumMaq"  name="editarNumMaq" required>
                  
                 

                  <option value="">Seleccione Maquina</option>

                  <?php
                     $item = null;
                     $valor = null;
                     $maquinas = ControladorMaquinas::ctrMostrarMaquinas($item, $valor);
                     foreach ($maquinas as $key => $value) {
                       echo '<option value="'.$value["idMaquina"].'">'.$value["numMaquina"].'</option>';
                     }


                  ?>

                  
                </select>

              </div>

            </div>

             

            <!--Entrada Serie-->
             <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="editarSerie" name="editarSerie" placeholder="Ingresar Numero de Serie" required>


              </div>
            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Informacion</button>

        </div>

        <?php

          $editarInformacion = new ControladorMantenimiento();
          $editarInformacion -> ctrEditarInforme();

        ?>

      </form>

    </div>

  </div>

</div>


<?php

      $borrarInforme = new ControladorMantenimiento();
      $borrarInforme -> ctrBorrarInforme();

?>
