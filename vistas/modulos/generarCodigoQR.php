<?php

	require '../../extensiones/phpqrcode/qrlib.php';

	$dir = 'temp/';

	if( !file_exists($dir)){
		
		mkdir($dir);
	}
	else{

		$filename = $dir."test.png"

		$tamano =10;
		$level = 'M';
		$frameSize = 3;
		$contenido = 'Hola Mundo';

		QRcode::png($contenido, $filename, $level, $tamano, $frameSize);

		echo '<img src= "'.$filename.'">';

	}
?>