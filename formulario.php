<?php

session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: index.php");
}

include "include/conexionDB.php";

$db = new conexionDB();


$result_fecha = $db->getSelectTabla(
                                array('TABLA' => 'RangoFecha', 
                                      'CAMPOS' =>array( 'count(id) AS Id', 'FechaInicio', 'FechaFin','CodCeacionForm')
                                    )
        );


foreach ($result_fecha as $value) {
    $result['FechaInicio'] =   $value['FechaInicio'];  
    $result['FechaFin'] =   $value['FechaFin'];
    $result['CodCeacionForm'] =   $value['CodCeacionForm'];
}   

$valida_echa = $db->getRangoFecha($result['FechaInicio'], $result['FechaFin']);

if($valida_echa == 1){ ?>
<div class="alert alert-warning">
<strong>Warning!</strong> Este formulario no esta activo
</div>
<?php
exit;
}

if($valida_echa == 2){ ?>
<div class="alert alert-success">
<strong>Warning!</strong> Este formulario se cerro 
</div>
<?php
exit;
}


$result = $db->getSelectTabla(
                                array('TABLA' => 'usuarios', 
                                      'CAMPOS' =>array( 'Codigo', 'Nombres','Codigo_profesor', 'Fomulario'),
                                      'CONDICION' =>array(  
                                      'WHERE'=> array('Codigo' => $_SESSION['user_session']))  
                                    )
        );
        
foreach ($result as $value) {
    $result['Codigo'] =   $value['Codigo'];  
    $result['Nombres'] =   $value['Nombres'];
    $result['Codigo_profesor'] =   $value['Codigo_profesor'];
    $result['Fomulario'] =   $value['Fomulario'];
}

if($result['Fomulario'] == 1){ ?>
    <div class="alert alert-info">
    <strong>Heads up!</strong> Termino su evalución Exitosamente!
    </div>
<?php
exit;
}


$db->cerrarConexion();
?>

                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3>Formulación de la evaluación de un proyecto educativo mediado por TIC.</h3>
                            <br/>
                        </div>
                        <br/>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" id="formulario">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                
                                                <div class="form-group">
                                                    <label>Descripción de la realidad que se va a evaluar:</label>
                                                    <textarea class="form-control" rows="3" name="camp1" id="camp1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!--   Kitchen Sink -->
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th width = "30%">Objetivo general.</th>
                                                            <td width = "70%"><input class="form-control" name="camp2" id="camp2"></td>
                                                        </tr>
                                                        <tr>
                                                            <th width = "30%">Objetivos específicos.</th>
                                                            <td width = "70%"><input class="form-control" name="camp3" id="camp3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody class="thead-inverse">
                                                        <tr>
                                                            <th width = "30%">Información recolectada con instrumentos cualitativos.</th>
                                                            <td width = "70%"><textarea class="form-control" rows="3" name="camp4" id="camp4"></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <th width = "30%">Información recolectada con instrumentos cuantitativos.</th>
                                                            <td width = "70%"><textarea class="form-control" rows="3" name="camp5" id="camp5"></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <th width = "30%">Actores involucrados</th>
                                                            <td width = "70%"><textarea class="form-control" rows="3" name="camp5" id="camp6"></textarea></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-bordered">
                                                    <tbody class="thead-default">
                                                        <tr>
                                                            <th >Dimensión.</th>
                                                            <th >Variable o subdimensión.</th>
                                                            <th >Actor.</th>
                                                            <th >Indicador.</th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp7" id="camp7"></th>
                                                            <th ><input class="form-control" name="camp8" id="camp8"></th>
                                                            <th ><input class="form-control" name="camp9" id="camp9"></th>
                                                            <th ><input class="form-control" name="camp10" id="camp10"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp11" id="camp11"></th>
                                                            <th ><input class="form-control" name="camp12" id="camp12"></th>
                                                            <th ><input class="form-control" name="camp13" id="camp13"></th>
                                                            <th ><input class="form-control" name="camp14" id="camp14"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp15" id="camp15"></th>
                                                            <th ><input class="form-control" name="camp16" id="camp16"></th>
                                                            <th ><input class="form-control" name="camp17" id="camp17"></th>
                                                            <th ><input class="form-control" name="camp18" id="camp18"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp19" id="camp19"></th>
                                                            <th ><input class="form-control" name="camp20" id="camp20"></th>
                                                            <th ><input class="form-control" name="camp21" id="camp21"></th>
                                                            <th ><input class="form-control"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp22" id="camp22"></th>
                                                            <th ><input class="form-control" name="camp23" id="camp23"></th>
                                                            <th ><input class="form-control" name="camp24" id="camp24"></th>
                                                            <th ><input class="form-control" name="camp25" id="camp25"></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                         <div class="panel-body">
                                            <div class="table-responsive">
                                                
                                                <table class="table table-bordered">
                                                    <tbody class="thead-default">
                                                        <tr>
                                                            <th >Indicador.</th>
                                                            <th >Instrumento.</th>
                                                            <th >Actor que suministra la información.</th>
                                                            <th >Momentos en los que se debe aplicar el instrumento.</th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp26" id="camp26"></th>
                                                            <th ><input class="form-control" name="camp27" id="camp27"></th>
                                                            <th ><input class="form-control" name="camp28" id="camp28"></th>
                                                            <th ><input class="form-control" name="camp29" id="camp29"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp30" id="camp30"></th>
                                                            <th ><input class="form-control" name="camp31" id="camp31"></th>
                                                            <th ><input class="form-control" name="camp32" id="camp32"></th>
                                                            <th ><input class="form-control" name="camp33" id="camp33"></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> 
                                        
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody class="thead-inverse">
                                                        <tr>
                                                            <th width = "30%">Modelo de evaluación seleccionado.</th>
                                                            <td width = "70%"><textarea class="form-control" rows="3" name="camp34" id="camp34"></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <th width = "30%">Razones por las cuales se seleccionó el modelo.</th>
                                                            <td width = "70%"><textarea class="form-control" rows="3" name="camp35" id="camp35"></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <th width = "30%">Procedimiento formulado por el modelo.</th>
                                                            <td width = "70%"><textarea class="form-control" rows="3" name="camp36" id="camp36"></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <th width = "30%">Proceso a desarrollar por el evaluador.</th>
                                                            <td width = "70%"><textarea class="form-control" rows="3" name="camp37" id="camp37"></textarea></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> 
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                
                                                <table class="table table-bordered">
                                                    <tbody class="thead-default">
                                                        <tr>
                                                            <th >Indicador.</th>
                                                            <th >Instrumentos que aportan información.</th>
                                                            <th >¿Existe?</th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp38" id="camp38"></th>
                                                            <th ><input class="form-control" name="camp39" id="camp39"></th>
                                                            <th ><input class="form-control" name="camp40" id="camp40"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp41" id="camp41"></th>
                                                            <th ><input class="form-control" name="camp42" id="camp42"></th>
                                                            <th ><input class="form-control" name="camp43" id="camp43"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp44" id="camp44"></th>
                                                            <th ><input class="form-control" name="camp45" id="camp45"></th>
                                                            <th ><input class="form-control"></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                
                                                <table class="table table-bordered">
                                                    <tbody class="thead-default">
                                                        <tr>
                                                            <th >Indicadores relacionados.</th>
                                                            <th >Nivel de relación.</th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp46" id="camp46"></th>
                                                            <th ><input class="form-control" name="camp47" id="camp47"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp48" id="camp48"></th>
                                                            <th ><input class="form-control"name="camp49" id="camp49"></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <div class="form-group">
                                                <label>Criterios para la selección de la muestra a evaluar.</label>
                                                <textarea class="form-control" rows="3" name="camp50" id="camp50"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                         
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                
                                                <table class="table table-bordered">
                                                    <tbody class="thead-default">
                                                        <tr>
                                                            <th >Técnica de análisis de datos..</th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp51" id="camp51"></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                     <!-- End  Kitchen Sink -->
                                        <button type="button" class="btn btn-success" id="enviarform">Guardar</button>
                                        <button type="reset" class="btn btn-primary">Enviar al Tutor</button>
                                    </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                 
                    <!-- The JavaScript -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script src="js/scripts.js" type="text/javascript"></script>  
