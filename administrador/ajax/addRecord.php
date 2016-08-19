<?php
	if(isset($_POST['codigo']) && isset($_POST['nombre']) && isset($_POST['email']))
	{
		// include Database connection file 
		include "../../include/conexionDB.php";
		$db = new conexionDB();

		// get values 
	 	$codigo = $_POST['codigo'];
		$nombre = $_POST['nombre'];
		$tipo = $_POST['tipo'];
		$email = $_POST['email'];
		$codigoprofesor = $_POST['codigoprofesor'];

		if($tipo == "P"){
			$CP = '3';
			$F = '0';
			$CE = '0';
		}

		if($tipo == "A"){
			$CP = $codigoprofesor;
			$F = '0';
			$CE = '0';
		}


	$consulta =array('TABLA'=>'usuarios', 
					     'CAMPOS' => array(	'Id' => 'NULL',
					     					'Codigo' => $codigo,
					     					'Nombres' => "'".$nombre."'",
					     					'Email' =>	"'".$email."'",
					     					'Codigo_profesor' => $CP,
					     					'Fomulario' => $F,
					     					'CorreoEnviado' => $CE)

					     );

	$insert = $db->getInsertTabla($consulta);
	
	    echo "1 Record Added!";
	}

$db->cerrarConexion();
clearstatcache();
?>