<?php
include "../../include/conexionDB.php";
// include Database connection file
$db = new conexionDB();

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
   

    // Updaste User details
    $result_Upd = $db->getUpdateTabla(array('TABLA'=>'usuarios',
                              'CAMPOS' => array('Codigo' => $codigo,
                                                'Nombres' => "'".$nombre."'",
                                                'Email' => "'".$email."'",
                                                'CorreoEnviado'=> $estado),
                              'CONDICION' => array(
                                  'WHERE' => array('id' => $_POST['id'])
                              ) 
    ));
}

$db->cerrarConexion();
clearstatcache();