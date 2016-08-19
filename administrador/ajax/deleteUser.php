<?php

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    
	include "../../include/conexionDB.php";
	// include Database connection file
	$db = new conexionDB();


    // get user id
    $user_id = $_POST['id'];

    // delete User

    $query = "DELETE FROM usuarios WHERE id =".$user_id;
  	$db->consultaTabla($query);
  	$db->cerrarConexion();
	clearstatcache();
}
?>