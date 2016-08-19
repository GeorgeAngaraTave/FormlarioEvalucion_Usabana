<?php
// include Database connection file
include "../../include/conexionDB.php";

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // get User ID
    $user_id = $_POST['id'];

    // Get User Details

     $db = new conexionDB();
     $result = "";
    $result = $db->getSelectTabla(
                                    array('TABLA' => 'usuarios', 
                                          'CAMPOS' =>array( 'id','Codigo', 'Nombres', 'Email', 'Codigo_profesor', 'Fomulario','CorreoEnviado'),
                                           'CONDICION' => array('WHERE'=> array('id' => $user_id ))
                                        )
            );
    
   
    $response = array();
    if(count($result) > 0) {
        
            $response = $result;
        
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}

$db->cerrarConexion();
clearstatcache();