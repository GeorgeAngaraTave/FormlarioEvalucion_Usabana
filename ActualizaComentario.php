<?php

//Iniciamos sesion
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: index.php");
}

include "include/conexionDB.php";


// Inicialia DB
$db = new conexionDB();

$codigocom = mt_rand();
$fecha_Actual = date("d-m-Y H:i:s");

$result = $db->getSelectTabla(
            array('TABLA' => 'usuarios',
                'CAMPOS' => array('Codigo', 'Fomulario'),
                'CONDICION' => array(
                'WHERE' => array('Codigo' => $_POST['codigoinfoest']))
            )
    );

foreach ($result as $value) {
  $CodFomulario= $value['Fomulario'];
}

$result_Upd = $db->getUpdateTabla(array('TABLA'=>'formularios',
                              'CAMPOS' => array('CodigoComentario' => $codigocom),
                              'CONDICION' => array(
                                  'WHERE' => array('Codigo' => $CodFomulario)
                              ) 
));


    $consulta = array('TABLA' => 'comentariosformularios',
        'CAMPOS' => array(
        'Id' => 'NULL',
         'Codigo' => $codigocom,
         'comentario2' => "'".$_POST['comentario2']."'",
         'comentario3' => "'".$_POST['comentario3']."'",
         'comentario4' => "'".$_POST['comentario4']."'",
         'comentario5' => "'".$_POST['comentario5']."'",
         'comentario6' => "'".$_POST['comentario6']."'",
         'comentario7' => "'".$_POST['comentario7']."'",
         'comentario8' => "'".$_POST['comentario8']."'",
         'comentario9' => "'".$_POST['comentario9']."'",  
         'FechaCreacion' => "'".$fecha_Actual."'" ,
         'CodigoProfesor' => $_SESSION['user_session'],
         'CodigoAlumno' => $codigocom,   
         'Calificacion' => $_POST['calificacion'] 
            
    ));

    $db->getInsertTabla($consulta);
$db->cerrarConexion();
clearstatcache();
?>
<!-- Mensaje Alerta-->
<div class="alert alert-success">
    <strong>Well done!</strong> Se Guardo Exitosamente
</div>





