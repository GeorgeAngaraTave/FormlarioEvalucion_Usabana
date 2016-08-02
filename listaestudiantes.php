<?php
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: index.php");
}

include "include/conexionDB.php";

$db = new conexionDB();


if($_POST['evadato'] == 'E'){
    
    $tipo = "Evaluar";
    
    $result = $db->getSelectTabla(
                                array('TABLA' => 'usuarios', 
                                      'CAMPOS' =>array( 'Codigo', 'Nombres','Codigo_profesor', 'Fomulario'),
                                      'CONDICION' =>array(  
                                      'WHERE'=> array('Codigo_profesor' => $_SESSION['user_session'], 'Fomulario' => 1 ))  
                                    )
    );
    
}  else {
    $tipo = "Por Evaluar";
    
     $result = $db->getSelectTabla(
                                array('TABLA' => 'usuarios', 
                                      'CAMPOS' =>array( 'Codigo', 'Nombres','Codigo_profesor', 'Fomulario'),
                                      'CONDICION' =>array(  
                                      'WHERE'=> array('Codigo_profesor' => $_SESSION['user_session'], 'Fomulario' => 0 ))  
                                    )
    );
}

?>
 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Lista  <small>Alimnos</small>
                        </h1>
                    </div>
                </div>
<div class="row">
            <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo $tipo;?>
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <?php if($_POST['evadato'] == 'E'){?>
                                                <th>Accion</th>
                                                <?php }?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($result as $value) {
                                        ?>
                                            <tr>
                                                <td><?php echo $value['Codigo']; ?></td>
                                                <td><?php echo $value['Nombres']; ?></td>
                                                <?php if($_POST['evadato'] == 'E'){?>
                                                <td><a href="#" class="btn btn-success btn-sm">Evaluar</a></td>
                                                <?php }?>
                                            </tr>
                                        <?php  
                                        }
                                        ?>    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
    </div>
<!-- DATA TABLE SCRIPTS -->
    <script src="js/dataTables/jquery.dataTables.js"></script>
    <script src="js/dataTables/dataTables.bootstrap.js"></script>
         <script>
          
                $('#dataTables-example').dataTable();
           
    </script>
<?php
$db->cerrarConexion();
?>