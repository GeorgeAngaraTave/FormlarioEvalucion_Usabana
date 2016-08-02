<?php
 session_start();
include "include/conexionDB.php";

if(isset($_POST['usercodigo'])){
    
$user_codigo = trim($_POST['usercodigo']);
  
  try
  { 
  $db = new conexionDB();
  $result = $db->getSelectTabla(
                                array('TABLA' => 'usuarios', 
                                      'CAMPOS' =>array( 'Codigo'),
                                      'CONDICION' =>array(  
                                      'WHERE'=> array('Codigo' => $user_codigo))  
                                    )
        );
  
    foreach ($result as $value) {
       $result['Codigo'] =   $value['Codigo'];   
    }
   if($result['Codigo']== $user_codigo){
    
    echo "ok"; // log in
    //$_SESSION['usercodigo'] = $row['codigo'];
    $_SESSION['user_session'] = $result['Codigo'];
   }else{
    
    echo "codigo incorrecto"; // wrong details 
   }
   $db->cerrarConexion();
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 }




