<?php
 session_start();

include "include/conexionDB.php";
$db = new conexionDB();
$fecha_Actual = date("Y-m-d H:i:s",time()-18000);
$result_Upd = $db->getUpdateTabla(array('TABLA'=>'session_log',
                              'CAMPOS' => array('FechaFin' => "'".$fecha_Actual."'"),
                              'CONDICION' => array(
                                  'WHERE' => array('id' => $_SESSION['id'] )
                              ) 
        ));


 unset($_SESSION['user_session']);
 
 if(session_destroy())
 {
     echo "OFF";
  header("Location: index.php");
 }
?>
