<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Ventas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Ventas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <a href="crear-ventas">
            
            <button class="btn btn-primary" >
              
              Agregar Ventas

            </button>

        </a>

        <button type="button" class="btn btn-default pull-right" id="daterange-btn">
          <span>
            <i class="fa fa-calender"></i> Rango de fecha
          </span>
          <i class="fa fa-caret-down"></i>
        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Cdigo Factura</th>
           <th>Cliente</th>
           <th>Vendedor</th>
           <th>Forma de Pago</th>
           <th>Neto</th>
           <th>Total</th> 
           <th>Fecha</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          <?php
              if(isset($_GET["fechaInicial"])){

                $fechaInicial=$_GET["fechaInicial"];
                $fechaFinal=$_GET["fechaFinal"];

              }else{

                $fechaInicial = null;
                $fechaFinal = null;

              }

              


              $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial,$fechaFinal);

              //var_dump($respuesta);

              foreach ($respuesta as $key => $value) {
                echo '<tr>

                      <td>'.($key+1).'</td>

                      <td>'.$value["codigo"].'</td>';

                      $itemCliente = "id";
                      $valorCliente = $value["id_cliente"];

                      $respuestaCliente = ControladorClientes::ctrMostrarCliente($itemCliente,$valorCliente);

                      echo '<td>'.$respuestaCliente["nombre"].'</td>';

                      $itemUsuario = "id";
                      $valorUsuario = $value["id_vendedor"];

                      $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                      echo '<td>'.$respuestaUsuario["nombre"].'</td>

                      <td>'.$value["metodo_pago"].'</td>

                      <td>'.number_format($value["neto"],2).'</td>

                      <td>'.number_format($value["total"],2).'</td>

                      <td>'.$value["fecha"].'</td>            

                      <td>

                        <div class="btn-group">
                            
                          <button class="btn btn-info btnImprimirFactura" codigoVenta="'.$value["codigo"].'"><i class="fa fa-print"></i></button>

                          <button class="btn btn-warning btnEditarVenta" idVenta="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                          <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-times"></i></button>

                        </div>  

                      </td>

                    </tr>';
              }
          ?>
          

          
        </tbody>

       </table>

<?php
  $eliminarVenta = new ControladorVentas();
  $eliminarVenta -> ctrEliminarVenta();
?>

      </div>

    </div>

  </section>

</div>

