<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Productos
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProductos">
                
                Agregar Productos
              
              </button>
          
         
        </div>
        <div class="box-body">
         
            <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
              
              <thead>
                
                <tr>
                  
                  <th style="width: 10px">#</th>
                  <th>Imagen</th>                 
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>Categoria</th>
                  <th>Stock</th>
                  <th>Precio de Compra</th>
                  <th>Precio de Venta</th>
                  <th>Agregado</th>
                  <th>Acciones</th>

                </tr>

              </thead>
   <!--
            <tbody>
                
             <?php

          $item = null;
          $valor = null;
          $orden = "id";

          $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

          foreach ($productos as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>';
                    if($value["imagen"] != ""){
                        echo '<td><img src="'.$value["imagen"].'" class="img-thumbnail" width="40px"></td>';
                        }
                        else{
                          echo '<td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                        }
                  echo '<td class="text-uppercase">'.$value["codigo"].'</td>
                        <td class="text-uppercase">'.$value["descripcion"].'</td>';
                        
                        $item = "id";
                        $valor = $value["id_Categoria"];
                        $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  echo '<td class="text-uppercase">'.$categorias["categoria"].'</td>
                        <td class="text-uppercase">'.$value["stock"].'</td>
                        <td class="text-uppercase">'.$value["precio_compra"].'</td>
                        <td class="text-uppercase">'.$value["precio_venta"].'</td>
                        <td class="text-uppercase">'.$value["fecha"].'</td>
                    <td>

                       <div class="btn-group">

                          <button class="btn btn-warning"><i class="fa fa-pencil"></i></button> 
                          <button class="btn btn-danger" ><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';

                   
          }

        ?>
                

              </tbody>-->

            </table>

          </div>
        </div>
        <!-- /.box-body -->
       
       
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!--=====================================
          Agregar Producto Ventana  Modal
======================================-->

 <!--=====================================
            Agregar Productos 
  ======================================-->

<div id="modalAgregarProductos" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

<!--Formulario-->
<form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
                  CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Producto</h4>
        </div>

        <!--=====================================
                  CUERPO DEL MODAL
        ======================================-->


         <!-- Entrada Codigo-->
        <div class="modal-body">
          <div class="box-body">
            <!-- Categoria-->
              <div class="form-group">
              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaCategorias"  name="nuevaCategorias" required>
                  
                 

                  <option value="">Seleccione Categoria</option>

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

            <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-code"></i></span>



                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Escriba el nuevo codigo"  readonly required>
              </div>
            </div>

            <!-- Entrada Descripcion-->

            <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Escriba la descripcion" required>
              </div>
            </div>
          
            
            
            <!-- Entrada Stock-->

            <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>
              

              </div>
            </div>

             <!-- Entrada Precio Compra-->

            <div class="form-group row"> 
              <div class="col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                  <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" min="0"  step="any" placeholder="Precio Compra" required>
                

                </div>
            
              </div>
            <!-- Entrada Precio Venta-->

              <div class="col-xs-12 col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                  <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0"  step="any" placeholder="Precio Venta" required>
              
                </div>
                <br>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label>
                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar porcentaje
                      </label>
                    </div>
                </div>
                <!--/*=====  Entrada Procentaje  ======*/-->
                <div class="col-xs-6" style="padding: 0">
                  <div class="input-group">
                    <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                  </div>
                </div>
              </div>
            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="nuevaImagen">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              
              <input type="hidden" name="imagenActual" id="imagenActual">
            
            </div>

          </div>

        </div>

       <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Producto</button>

        </div>

    </form>
    <?php

      $crearProducto = new ControladorProductos();
      $crearProducto -> ctrCrearProducto();

  ?>
    </div>
  </div>
</div>

<!--=====================================
            Editar Productos 
  ======================================-->
<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg"  name="editarCategoria" readonly required>
                  
                  <option id="editarCategoria"></option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>

              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>

              </div>

            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" step="any" min="0" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" readonly required>

                  </div>
                
                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

                  <div class="col-xs-6">
                    
                    <div class="form-group">
                      
                      <label>
                        
                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar procentaje
                      </label>

                    </div>

                  </div>

                  <!-- ENTRADA PARA PORCENTAJE -->

                  <div class="col-xs-6" style="padding:0">
                    
                    <div class="input-group">
                      
                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                    </div>

                  </div>

                </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="editarImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="imagenActual" id="imagenActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

       <?php

          $editarProducto = new ControladorProductos();
          $editarProducto -> ctrEditarProducto();

      ?>

    </div>

  </div>

</div>



<?php

      $borrarProducto = new ControladorProductos();
      $borrarProducto -> ctrBorrarProducto();

  ?>

