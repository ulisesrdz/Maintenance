

 <div class="content-wrapper">
	<section class="content-header">
	      <h1>
	        Generador de Codigo QR
	        <small>Panel de Control</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
	        
	        <li class="active">Administrar Usuarios</li>
	      </ol>
    </section>

     <section class="content">

      <!-- Default box -->
      	<div class="box">
	        <div class="box-header with-border">
	          
	              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
	                
	                Imprimir Codigo
	              
	              </button>
	          
	         
	        </div>
	        <div class="box-body">
				<?php

					require_once 'extensiones/phpqrcode/qrlib.php';

					$dir = 'temp/';
					
					if( !file_exists($dir)){
						
						mkdir($dir);
					}
					else{

						$filename = $dir."test.png";

						$tamano = 15;
						$level = 'Q';
						$frameSize = 10;
						$contenido = 'Hola Mundo';

						QRcode::png($contenido, $filename, $level, $tamano, $frameSize);
						
						echo '<img src= "'.$filename.'">';		
						

					}
				?>
			</div>
	    </div>
	</section>

</div>
