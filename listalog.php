<?php 
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: index.php");
}

include "include/conexionDB.php";

$db = new conexionDB();

$result = "";

$result = $db->getSelectTabla(
                            array('TABLA' => 'session_log', 
                                    'CAMPOS' =>array( 'CodigoUsuario', 'Nombres','FechaInicio', 'FechaFin'),
                                      
                                    )
    );
    

?>

<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Log  <small>Usuarios</small>
                        </h1>
                    </div>
                </div>
<div class="row">
            <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Código Usuario</th>
                                                <th>Nombre</th>
                                                <th>Inicio Sesión</th>
                                                <th>Cierre Sesión</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        
                                        if($result){
                                            foreach ($result as $value){
                                                ?>
                                                <tr>
                                                <td><?php echo $value['CodigoUsuario']; ?></td>
                                                <td><?php echo $value['Nombres']; ?></td>
                                                <td><?php echo $value['FechaInicio']; ?></td>
                                                <td><?php echo $value['FechaFin']; ?></td>

                                                <td><?php if($value['FechaFin'] == 0){

                                                    echo "<div class='text-success'>Activo</div>";
                                                }else{

                                                    echo "<div class='text-danger'>Inactivo</div>";
                                                } ?></td>
                                                </tr>
                                                <?php }
                                          }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
    </div>
<!-- DATA TABLE SCRIPTS -->
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
         <!-- The JavaScript -->
		<script src="js/scripts.js" type="text/javascript"></script>  
<?php

$db->cerrarConexion();
clearstatcache();
?>