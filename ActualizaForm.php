<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "include/conexionDB.php";
/**
 * Description of ActualizaForm
 *
 * @author jorge
 */

$db = new conexionDB();


$result_fecha = $db->getSelectTabla(
                                array('TABLA' => 'RangoFecha', 
                                      'CAMPOS' =>array( 'count(id) AS Id', 'CodCeacionForm')
                                    )
        );


foreach ($result_fecha as $value) {
    
    $result['CodCeacionForm'] =   $value['CodCeacionForm'];
}   

$codigoUser = $_SESSION['user_session'];
$codigoForm = $result['CodCeacionForm'];


$consulta = array('TABLA' => 'formularios', 
                  'CAMPOS'=> array(
                      'Id' => 'NULL', 
                      'Campo1' => ''));



//              print_r($_POST['dato']);
//print_r($consulta);
exit;
//$db->getInsertTabla($consulta);
exit;
// $consulta = array('TABLA' => array(), 'CAMPOS'=> array())



