<?php
 session_start();
include "include/conexionDB.php";

if(isset($_POST['usercodigo'])){
    
$user_codigo = trim($_POST['usercodigo']);
$result = "";  
  try
  { 
  $db = new conexionDB();
  $result = $db->getSelectTabla(
                                array('TABLA' => 'usuarios', 
                                      'CAMPOS' =>array( 'Codigo', ' Nombres'),
                                      'CONDICION' =>array(  
                                      'WHERE'=> array('Codigo' => $user_codigo))  
                                    )
        );

    if(isset($result)){    
        foreach ($result as $value) {
           $result['Codigo'] =   $value['Codigo'];   
           $result['Nombres'] =   $value['Nombres']; 
          
        }
    
    }else{
        
        $result['Codigo'] = 0;
    }
    
   if($result['Codigo']== $user_codigo){
    
    echo "ok"; // log in
    //$_SESSION['usercodigo'] = $row['codigo'];
    $_SESSION['user_session'] = $result['Codigo'];
    $fecha_Actual =  date("Y-m-d H:i:s",time()-18000);
           $consulta =array('TABLA'=>'session_log', 
               'CAMPOS' => array( 'Id' => 'NULL',
                        'CodigoUsuario' => $result['Codigo'],
                        'Nombres' => "'".$result['Nombres']."'",
                        'FechaInicio' => "'".$fecha_Actual."'",
                        'FechaFin' =>  "'0000-00-00 00:00:00.000000'")

               );

  $insert = $db->getInsertTabla($consulta);

  $result = $db->getSelectTabla(
                                array('TABLA' => 'session_log', 
                                      'CAMPOS' =>array( 'Max(id) as id'),
                                      'CONDICION' =>array(  
                                      'WHERE'=> array('CodigoUsuario' => $result['Codigo']))  
                                    )
        );

  foreach ($result as $value) {
           $_SESSION['id'] =   $value['id'];   
          
        }

   }else{
    
    echo "codigo incorrecto"; // wrong details 
   }
   $db->cerrarConexion();
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 }




