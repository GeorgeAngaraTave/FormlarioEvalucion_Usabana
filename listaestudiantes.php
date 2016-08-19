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
                                      'CAMPOS' =>array( 'Codigo', 'Nombres','Codigo_profesor', 'Fomulario', 'CorreoEnviado'),
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
                                      'CAMPOS' =>array( 'Codigo', 'Nombres','Codigo_profesor', 'Fomulario', 'CorreoEnviado'),
                                      'CONDICION' =>array(  
                                      'WHERE'=> array('Codigo_profesor' => $_SESSION['user_session'], 'CorreoEnviado' => 0 ))  
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
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $cont = 0;
                                        
                                        if($result){
                                            foreach ($result as $value){
                                                ?>
                                                <tr>
                                                <?php
                                                if($value['CorreoEnviado'] ==1){
                                                    
                                                    $infUsuario = $db->getFormularioConsultas($value['Fomulario']);
                                                   
                                                }else{
                                                    $infUsuario = 0;
                                                }
                                            ?> 
                                                    <?php if($_POST['evadato'] == 'PE'){ ?>
                                                        <td><?php echo $value['Codigo']; ?></td>
                                                        <td><?php echo $value['Nombres']; ?></td>
                                                        <td><?php if($value['Fomulario'] != 0){
                                                        echo "<div class='text-success'>En Proceso</div>";
                                                        }else{
                                                            echo "<div class='text-primary'>Esperando</dir>";
                                                        }

                                                         ?></td>
                                                     <?php }?>
                                                    <?php if($_POST['evadato'] == 'E'){ ?>
                                                    
                                                        <?php 
                                                        if($infUsuario > 0){
                                                            foreach ($infUsuario as $valueinfo) {
                                                                if($valueinfo['CodigoComentario']>1){
                                            
                                                         ?>
                                                                <td><?php echo $value['Codigo']; ?></td>
                                                                <td><?php echo $value['Nombres']; ?></td>
                                                                <td>
                                                                <a href="#" class="btn btn-primary btn-sm vercarm" id="calificar<?php echo $cont;?>" name="<?php echo $cont;?>">Ver</a>
                                                                <input type="hidden" class="form-control codigocalim" name="codigocali" id="codigocali<?php echo $cont;?>" value="cal">
                                                                <input type="hidden" class="form-control codigocESTm" name="codigocEST[<?php echo $cont;?>]" id="codigocEST<?php echo $cont;?>" value="<?php echo $value['Codigo']; ?>">    
                                                                </td>
                                                        <?php 
                                                                }else{
                                                        ?>
                                                            <td><?php echo $value['Codigo']; ?></td>
                                                             <td><?php echo $value['Nombres']; ?></td>
                                                            <td><a href="#" class="btn btn-success btn-sm calificarm" id="calificar<?php echo $cont;?>" name="<?php echo $cont;?>">Evaluar</a>
                                                                <input type="hidden" class="form-control codigocalim" name="codigocali" id="codigocali<?php echo $cont;?>" value="cal">
                                                                 <input type="hidden" class="form-control codigocESTm" name="codigocEST[<?php echo $cont;?>]" id="codigocEST<?php echo $cont;?>" value="<?php echo $value['Codigo']; ?>">
                                                            </td>
                                                        <?php
                                                                }
                                                            }
                                                         }
                                                        ?>
                                                        
                                                    
                                                    <?php $cont++; 
                                                }?>
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