<?php

session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: index.php");
}

include "include/conexionDB.php";

$db = new conexionDB();


if(isset($_POST['datocodigo'])){
    $evaluar = $_POST['datocodigo'];
}else{
    $evaluar = "evaNo";
}


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

if($valida_echa == 1 && $evaluar != "cal"){ ?>
<div class="alert alert-warning">
<strong>Warning!</strong> Este formulario no esta activo
</div>
<?php
exit;
}

if($valida_echa == 2 && $evaluar != "cal"){ ?>
<div class="alert alert-warning">
<strong>Warning!</strong> Este formulario se cerro 
</div>
<?php
exit;
}

if(isset($_POST['codigocest'])){
    $codigoinfo = $_POST['codigocest'];
}else {
    $codigoinfo = $_SESSION['user_session'];
}


$result = $db->getSelectTabla(
                                array('TABLA' => 'usuarios', 
                                      'CAMPOS' =>array( 'Codigo', 'Nombres','Codigo_profesor', 'Fomulario'),
                                      'CONDICION' =>array(  
                                      'WHERE'=> array('Codigo' => $codigoinfo))  
                                    )
        );
        
foreach ($result as $value) {
    $result['Codigo'] =   $value['Codigo'];  
    $result['Nombres'] =   $value['Nombres'];
    $result['Codigo_profesor'] =   $value['Codigo_profesor'];
    $result['Fomulario'] =   $value['Fomulario'];
}

if($result['Fomulario'] != 0 && $evaluar != "cal" ){ ?>
    <div class="alert alert-info">
    <strong>Heads up!</strong> Termino su evalución Exitosamente!
    </div>
<?php
exit;
}


if($evaluar=="cal"){
   $result = $db->getSelectTabla(
                                    array('TABLA' => 'formularios', 
                                          'CAMPOS' =>array( 'Campo1', 
                                              'Campo2',
                                              'Campo3', 
                                              'Campo4', 
                                              'Campo5', 
                                              'Campo6', 
                                              'Tabla1', 
                                              'Tabla2',
                                              'Campo35',
                                              'Campo36',
                                              'Campo37',
                                              'Campo38',
                                              'Tabla3', 
                                              'Tabla4',
                                              'Campo52',
                                              'Campo53'
                                              ),
                                          'CONDICION' =>array(  
                                          'WHERE'=> array('Codigo' => $result['Fomulario']))  
                                        )
            );
     
            foreach ($result as $value) {
                $Campo2 = (isset($value['Campo2']))? $value['Campo2']: '' ;
                $Campo3 = (isset($value['Campo3']))? $value['Campo3']: '' ;
                $Campo4 = (isset($value['Campo4']))? $value['Campo4']: '' ;
                $Campo5 = (isset($value['Campo5']))? $value['Campo4']: '' ;
                $Campo6 =(isset($value['Campo6']))? $value['Campo6']: '' ;
                $objt = json_decode($value['Tabla1']);
                foreach ($objt as $objtvalue) {
                    $Campo7 = (isset($objtvalue->camp7))? $objtvalue->camp7: '' ;
                    $Campo8 = (isset($objtvalue->camp8))? $objtvalue->camp8: '' ;
                    $Campo9 = (isset($objtvalue->camp9))? $objtvalue->camp9: '' ;
                    $Campo10 = (isset($objtvalue->camp10))? $objtvalue->camp10: '' ;
                    $Campo11 = (isset($objtvalue->camp11))? $objtvalue->camp11: '' ;
                    $Campo12 = (isset($objtvalue->camp12))? $objtvalue->camp12: '' ;
                    $Campo13 = (isset($objtvalue->camp13))? $objtvalue->camp13: '' ;
                    $Campo14 = (isset($objtvalue->camp14))? $objtvalue->camp14: '' ;
                    $Campo15 = (isset($objtvalue->camp15))? $objtvalue->camp15: '' ;
                    $Campo16 = (isset($objtvalue->camp16))? $objtvalue->camp16: '' ;
                    $Campo17 = (isset($objtvalue->camp17))? $objtvalue->camp17: '' ;
                    $Campo18 = (isset($objtvalue->camp18))? $objtvalue->camp18: '' ;
                    $Campo19 = (isset($objtvalue->camp19))? $objtvalue->camp19: '' ;
                    $Campo20 = (isset($objtvalue->camp20))? $objtvalue->camp20: '' ;
                    $Campo21 = (isset($objtvalue->camp21))? $objtvalue->camp21: '' ;
                    $Campo22 = (isset($objtvalue->camp22))? $objtvalue->camp22: '' ;
                    $Campo23 = (isset($objtvalue->camp23))? $objtvalue->camp23: '' ;
                    $Campo24 = (isset($objtvalue->camp24))? $objtvalue->camp24: '' ;
                    $Campo25 = (isset($objtvalue->camp25))? $objtvalue->camp25: '' ;
                    $Campo26 = (isset($objtvalue->camp26))? $objtvalue->camp26: '' ;      
                }
                
                $objt1 = json_decode($value['Tabla2']);
                foreach ($objt1 as $objtvalue2) {
                    $Campo27 = (isset($objtvalue2->camp27))? $objtvalue2->camp27: '' ;
                    $Campo28 = (isset($objtvalue2->camp28))? $objtvalue2->camp28: '' ;
                    $Campo29 = (isset($objtvalue2->camp29))? $objtvalue2->camp29: '' ;
                    $Campo30 = (isset($objtvalue2->camp30))? $objtvalue2->camp30: '' ;
                    $Campo31 = (isset($objtvalue2->camp31))? $objtvalue2->camp31: '' ;
                    $Campo32 = (isset($objtvalue2->camp32))? $objtvalue2->camp32: '' ;
                    $Campo33 = (isset($objtvalue2->camp33))? $objtvalue2->camp33: '' ;
                    $Campo34 = (isset($objtvalue2->camp34))? $objtvalue2->camp34: '' ;
                }
                  
                $Campo35 = (isset($value['Campo35']))? $value['Campo35']: '' ;
                $Campo36 = (isset($value['Campo36']))? $value['Campo36']: '' ;
                $Campo37 = (isset($value['Campo37']))? $value['Campo37']: '' ;
                $Campo38 = (isset($value['Campo38']))? $value['Campo38']: '' ;
                  
                $objt2 = json_decode($value['Tabla3']);
                foreach ($objt2 as $objtvalue1) {
                    $Campo39 = (isset($objtvalue1->camp39))? $objtvalue1->camp39: '' ;
                    $Campo40 = (isset($objtvalue1->camp41))? $objtvalue1->camp40: '' ;
                    $Campo41 = (isset($objtvalue1->camp41))? $objtvalue1->camp41: '' ;
                    $Campo42 = (isset($objtvalue1->camp42))? $objtvalue1->camp42: '' ;
                    $Campo43 = (isset($objtvalue1->camp43))? $objtvalue1->camp43: '' ;
                    $Campo44 = (isset($objtvalue1->camp44))? $objtvalue1->camp44: '' ;
                    $Campo45 = (isset($objtvalue1->camp45))? $objtvalue1->camp45: '' ;
                    $Campo46 = (isset($objtvalue1->camp46))? $objtvalue1->camp46: '' ;
                    $Campo47 = (isset($objtvalue1->camp47))? $objtvalue1->camp47: '' ;
                }
               
             
                $objt3 = json_decode($value['Tabla4']);
                foreach ($objt3 as $objtvalue3) {
                    $Campo48 = (isset($objtvalue3->camp48))? $objtvalue3->camp48: '' ;
                    $Campo49 = (isset($objtvalue3->camp49))? $objtvalue3->camp49: '' ;
                    $Campo50 = (isset($objtvalue3->camp50))? $objtvalue3->camp50: '' ;
                    $Campo51 = (isset($objtvalue3->camp51))? $objtvalue3->camp51: '' ;
                }
                
                 
                $Campo52 = (isset($value['Campo52']))? $value['Campo52']: '' ;
            $Campo53 = (isset($value['Campo53']))? $value['Campo53']: '' ;
            }  
            

}



$db->cerrarConexion();
 clearstatcache();  
?>

                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div id="mensaje"></div>
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
                                        <div class="col-md-12 col-sm-12 ">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Descripción de la realidad que se va a evaluar:
                                                </div>
                                                <div class="panel-body">
                                                    <textarea class="form-control" rows="3" name="camp1" id="comentario1" disabled="disabled">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</textarea>
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
                                                            <td width = "70%"><input class="form-control" name="camp2" id="camp2" value="<?php echo (isset($Campo2))? $Campo2: '' ;?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <th width = "30%">Objetivos específicos.</th>
                                                            <td width = "70%"><input class="form-control" name="camp3" id="camp3" value="<?php echo (isset($Campo3))? $Campo3: '' ;?>"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 comentario">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    Comentario:
                                                </div>
                                                <div class="panel-body">
                                                    <textarea class="form-control comentariotext" rows="3" name="comentario2" id="comentario2"><?php echo (isset($Coment1))? $Coment1: '' ;?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody class="thead-inverse">
                                                        <tr>
                                                            <th width = "30%">Información recolectada con instrumentos cualitativos.</th>
                                                            <td width = "70%"><textarea class="form-control" rows="3" name="camp4" id="camp4" ><?php echo (isset($Campo4))? $Campo4: '' ;?></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <th width = "30%">Información recolectada con instrumentos cuantitativos.</th>
                                                            <td width = "70%"><textarea class="form-control" rows="3" name="camp5" id="camp5" ><?php echo (isset($Campo5))? $Campo5: '' ;?></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <th width = "30%">Actores involucrados</th>
                                                            <td width = "70%"><textarea class="form-control" rows="3" name="camp6" id="camp6"  ><?php echo (isset($Campo6))? $Campo6: '' ;?></textarea></td>
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
                                                            <th ><input class="form-control" name="camp7" id="camp7" value="<?php echo (isset($Campo7))? $Campo7: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp8" id="camp8" value="<?php echo (isset($Campo8))? $Campo8: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp9" id="camp9" value="<?php echo (isset($Campo9))? $Campo9: '' ;?>" ></th>
                                                            <th ><input class="form-control" name="camp10" id="camp10" value="<?php echo (isset($Campo10))? $Campo10: '' ;?>"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp11" id="camp11" value="<?php echo (isset($Campo11))? $Campo11: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp12" id="camp12" value="<?php echo (isset($Campo12))? $Campo12: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp13" id="camp13" value="<?php echo (isset($Campo13))? $Campo13: '' ;?>" ></th>
                                                            <th ><input class="form-control" name="camp14" id="camp14" value="<?php echo (isset($Campo14))? $Campo14: '' ;?>"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp15" id="camp15" value="<?php echo (isset($Campo15))? $Campo16: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp16" id="camp16" value="<?php echo (isset($Campo16))? $Campo16: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp17" id="camp17" value="<?php echo (isset($Campo17))? $Campo17: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp18" id="camp18" value="<?php echo (isset($Campo18))? $Campo18: '' ;?>"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp19" id="camp19" value="<?php echo (isset($Campo19))? $Campo19: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp20" id="camp20" value="<?php echo (isset($Campo20))? $Campo20: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp21" id="camp21" value="<?php echo (isset($Campo21))? $Campo22: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp22" id="camp22" value="<?php echo (isset($Campo22))? $Campo22: '' ;?>"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp23" id="camp23" value="<?php echo (isset($Campo23))? $Campo23: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp24" id="camp24" value="<?php echo (isset($Campo24))? $Campo24: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp25" id="camp25" value="<?php echo (isset($Campo25))? $Campo25: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp26" id="camp26" value="<?php echo (isset($Campo26))? $Campo26: '' ;?>" ></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 comentario">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    Comentario:
                                                </div>
                                                <div class="panel-body">
                                                    <textarea class="form-control comentariotext " rows="3" name="comentario3" id="comentario3"><?php echo (isset($Coment2))? $Coment2: '' ;?></textarea>
                                                </div>
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
                                                            <th ><input class="form-control" name="camp27" id="camp27" value="<?php echo (isset($Campo27))? $Campo27: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp28" id="camp28" value="<?php echo (isset($Campo28))? $Campo28: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp29" id="camp29" value="<?php echo (isset($Campo29))? $Campo29: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp30" id="camp30" value="<?php echo (isset($Campo30))? $Campo30: '' ;?>"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp31" id="camp31" value="<?php echo (isset($Campo31))? $Campo31: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp32" id="camp32" value="<?php echo (isset($Campo32))? $Campo32: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp33" id="camp33" value="<?php echo (isset($Campo33))? $Campo33: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp34" id="camp34" value="<?php echo (isset($Campo34))? $Campo34: '' ;?>"></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> 
                                        <div class="col-md-12 col-sm-12 comentario">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    Comentario:
                                                </div>
                                                <div class="panel-body">
                                                    <textarea class="form-control comentariotext" rows="3" name="comentario4" id="comtario4"><?php echo (isset($Coment3))? $Coment3: '' ;?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody class="thead-inverse">
                                                        <tr>
                                                            <th width = "30%">Modelo de evaluación seleccionado.</th>
                                                            <td width = "70%"><textarea class="form-control" rows="3" name="camp35" id="camp35"><?php echo (isset($Campo35))? $Campo35: '' ;?></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <th width = "30%">Razones por las cuales se seleccionó el modelo.</th>
                                                            <td width = "70%"><textarea class="form-control" rows="3" name="camp36" id="camp36"><?php echo (isset($Campo36))? $Campo36: '' ;?></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <th width = "30%">Procedimiento formulado por el modelo.</th>
                                                            <td width = "70%"><textarea class="form-control" rows="3" name="camp37" id="camp37"><?php echo (isset($Campo37))? $Campo37: '' ;?></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <th width = "30%">Proceso a desarrollar por el evaluador.</th>
                                                            <td width = "70%"><textarea class="form-control" rows="3" name="camp38" id="camp38"><?php echo (isset($Campo38))? $Campo38: '' ;?></textarea></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> 
                                        <div class="col-md-12 col-sm-12 comentario">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    Comentario:
                                                </div>
                                                <div class="panel-body">
                                                    <textarea class="form-control comentariotext" rows="3" name="comentario5" id="comentario5"><?php echo (isset($Coment4))? $Coment4: '' ;?></textarea>
                                                </div>
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
                                                            <th ><input class="form-control" name="camp39" id="camp39" value="<?php echo (isset($Campo39))? $Campo39: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp40" id="camp40" value="<?php echo (isset($Campo40))? $Campo40: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp41" id="camp41" value="<?php echo (isset($Campo41))? $Campo41: '' ;?>"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp42" id="camp42" value="<?php echo (isset($Campo42))? $Campo42: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp43" id="camp43" value="<?php echo (isset($Campo43))? $Campo43: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp44" id="camp44" value="<?php echo (isset($Campo44))? $Campo44: '' ;?>"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp45" id="camp45" value="<?php echo (isset($Campo45))? $Campo45: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp46" id="camp46" value="<?php echo (isset($Campo46))? $Campo45: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp47" id="camp47" value="<?php echo (isset($Campo47))? $Campo47: '' ;?>"></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 comentario">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    Comentario:
                                                </div>
                                                <div class="panel-body">
                                                    <textarea class="form-control comentariotext" rows="3" name="comentario6" id="comentario6"><?php echo (isset($Coment5))? $Coment5: '' ;?></textarea>
                                                </div>
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
                                                            <th ><input class="form-control" name="camp48" id="camp48" value="<?php echo (isset($Campo48))? $Campo48: '' ;?>"></th>
                                                            <th ><input class="form-control" name="camp49" id="camp49" value="<?php echo (isset($Campo49))? $Campo49: '' ;?>"></th>
                                                        </tr>
                                                        <tr>
                                                            <th ><input class="form-control" name="camp50" id="camp50" value="<?php echo (isset($Campo50))? $Campo50: '' ;?>"></th>
                                                            <th ><input class="form-control"name="camp51" id="camp51" value="<?php echo (isset($Campo51))? $Campo51: '' ;?>"></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 comentario">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    Comentario:
                                                </div>
                                                <div class="panel-body">
                                                    <textarea class="form-control comentariotext" rows="3" name="comentario7" id="comentario7"><?php echo (isset($Coment6))? $Coment6: '' ;?></textarea>
                                                </div>>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <div class="form-group">
                                                <label>Criterios para la selección de la muestra a evaluar.</label>
                                                <textarea class="form-control" rows="3" name="camp52" id="camp52"><?php echo (isset($Campo52))? $Campo52: '' ;?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 comentario">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    Comentario:
                                                </div>
                                                <div class="panel-body">
                                                    <textarea class="form-control comentariotext" rows="3" name="comentario8" id="comenterio8"><?php echo (isset($Coment7))? $Coment7: '' ;?></textarea>
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
                                                            <th ><input class="form-control" name="camp53" id="camp53" value="<?php echo (isset($Campo53))? $Campo53: '' ;?>"></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 comentario">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    Comentario:
                                                </div>
                                                <div class="panel-body">
                                                    <textarea class="form-control comentariotext" rows="3" name="comentario9" id="comntrio9"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nota">
                                            <div class="panel-body comentario"  >
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" >
                                                        <tbody class="thead-inverse" >
                                                            <tr>
                                                                <th >Nota.</th>
                                                            </tr>
                                                            <tr>
                                                                <td ><input class="form-control comentariotext" name="calificacion" id="calificacion"><?php echo (isset($calificacion))? $calificacion: '' ;?>
                                                                    
                                                                </td>   
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> 
                     <!-- End  Kitchen Sink -->
                                        <input type="hidden"  id="codigoinfoest" name="codigoinfoest" value ="<?php echo $codigoinfo; ?>" >
                                        <button type="button" class="btn btn-success bottoncomentario" id="enviarcomentario">Guardar Cambios</button>
                                        <button type="button" class="btn btn-primary bottonform" id="enviarcorreo">Enviar al Tutor</button>
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
