<?php
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: index.php");
}

include "include/conexionDB.php";

$db = new conexionDB();
$infUsuario = "";
$result = "";

if($_POST['evadato'] == 'E'){
    
    $tipo = "Evaluar";
    
    $result = $db->getSelectTabla(
                                array('TABLA' => 'usuarios', 
                                      'CAMPOS' =>array( 'Codigo', 'Nombres','Codigo_profesor', 'Fomulario'),
                                      'CONDICION' =>array(  
                                      'WHERE'=> array('Codigo_profesor' => $_SESSION['user_session'], 'Fomulario !=0 AND Fomulario !' => 3 ))  
                                    )
    );
    
    if(!isset($result)){
        $result = FALSE;
    }
    
}  else {
    $tipo = "Por Evaluar";
    
     $result = $db->getSelectTabla(
                                array('TABLA' => 'usuarios', 
                                      'CAMPOS' =>array( 'Codigo', 'Nombres','Codigo_profesor', 'Fomulario'),
                                      'CONDICION' =>array(  
                                      'WHERE'=> array('Codigo_profesor' => $_SESSION['user_session'], 'Fomulario' => 0 ))  
                                    )
    );
   
     if(!isset($result)){
        $result = FALSE;
    }
}

?>

 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Lista  <small>Alumnos</small>
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
                                        $cont = 0;
                                        
                                        if($result){
                                        foreach ($result as $value) {
                                            if(isset($value['Fomulario'])){
                                            $infUsuario = $db->getFormularioConsultas($value['Fomulario']);
                                            }
                                        ?>
                                            <tr>
                                                <td><?php echo $value['Codigo']; ?></td>
                                                <td><?php echo $value['Nombres']; ?></td>
                                                <?php if($_POST['evadato'] == 'E'){?>
                                                <td>
                                                    <?php 
                                                    if(isset($infUsuario)){
                                                        foreach ($infUsuario as $valueinfo) {
                                                            if($valueinfo['CodigoComentario']>1){
                                                     ?>
                                                            <a href="#" class="btn btn-primary btn-sm vercarm" id="calificar<?php echo $cont;?>" name="<?php echo $cont;?>">Ver</a>
                                                    <?php 
                                                            }else{
                                                    ?>
                                                        <a href="#" class="btn btn-success btn-sm calificarm" id="calificar<?php echo $cont;?>" name="<?php echo $cont;?>">Evaluar</a>
                                                    <?php
                                                            }
                                                        }
                                                     }
                                                    ?>
                                                    <input type="hidden" class="form-control codigocalim" name="codigocali" id="codigocali<?php echo $cont;?>" value="cal">
                                                    <input type="hidden" class="form-control codigocESTm" name="codigocEST[<?php echo $cont;?>]" id="codigocEST<?php echo $cont;?>" value="<?php echo $value['Codigo']; ?>">
                                                </td>
                                                <?php $cont++; }?>
                                            </tr>
                                        <?php  
                                        }
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
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
         <!-- The JavaScript -->
		<script src="js/scripts.js" type="text/javascript"></script>  
<?php

$db->cerrarConexion();
clearstatcache();
?>