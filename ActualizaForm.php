<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    session_start();
    include "include/conexionDB.php";
/**
 * Description of ActualizaForm
 *
 * @author jorge
 */
    $db = new conexionDB();

    $codigo = mt_rand();
    $result = $db->getSelectTabla(
            array('TABLA' => 'usuarios',
                'CAMPOS' => array('Codigo', 'Fomulario'),
                'CONDICION' => array(
                'WHERE' => array('Codigo' => $_SESSION['user_session']))
            )
    );

    foreach ($result as $value) {
        $result['Codigo'] = $value['Codigo'];
        $result['Fomulario'] = $value['Fomulario'];
    }

    $enviarcorreo = "";
    if(isset($_POST['datocorreo'])){
        $enviarcorreo = $_POST['datocorreo'];
    }
 
    if($value['Fomulario']==0 && $enviarcorreo == "enviarcorreo"){
        $jsondata['success'] = true;
        $jsondata['message'] = '<div class="alert alert-danger">
        <strong>Oh snap!</strong> No puede enviar correo al tutor sin guardar 
    </div>';
    echo json_encode($jsondata);
exit;    
    }
    $rmd =1;
    
    if($value['Fomulario']!=0 && $enviarcorreo == "enviarcorreo"){
            $result_Upd = $db->getUpdateTabla(array('TABLA'=>'usuarios',
                              'CAMPOS' => array('Fomulario' => $codigo),
                              'CONDICION' => array(
                                  'WHERE' => array('CorreoEnviado' => 1)
                              ) 
        ));

        $db->cerrarConexion();
        
         $jsondata['success'] = false;
        $jsondata['message'] = '<div class="alert alert-success">
            <strong>Well done!</strong> Proceso de evaluación terminado.
        </div>
        ';
         echo json_encode($jsondata);
     
    exit;   
    }

    $fecha_Actual = date("Y-m-d H:i:s");
    $result_fecha = $db->getSelectTabla(
    array('TABLA' => 'rangofecha',
     'CAMPOS' => array( 'count(id) AS Id', 'CodCeacionForm')
    )
    );


    foreach ($result_fecha as $value) {

    $result['CodCeacionForm'] = $value['CodCeacionForm'];
    }

    $codigoUser = $_SESSION['user_session'];
    $codigoForm = $result['CodCeacionForm'];
    
    //print_r($_POST['camp1']);
    //exit;
    
        $result_Upd = $db->getUpdateTabla(array('TABLA'=>'usuarios',
                              'CAMPOS' => array('Fomulario' => $codigo),
                              'CONDICION' => array(
                                  'WHERE' => array('Codigo' => $_SESSION['user_session'])
                              ) 
        ));


    $consulta = array('TABLA' => 'formularios',
        'CAMPOS' => array(
        'Id' => 'NULL',
         'Codigo' => $codigo,
         'CodigoCreacion' => $result['CodCeacionForm'],
         'Campo1' => "'".$_POST['camp1']."'",
         'Campo2' => "'".$_POST['camp2']."'",
         'Campo3' => "'".$_POST['camp3']."'",
         'Campo4' => "'".$_POST['camp4']."'",
         'Campo5' => "'".$_POST['camp5']."'",
         'Campo6' => "'".$_POST['camp6']."'",
         'Tabla1' => "'".json_encode(array( "info" =>array('camp7'=>$_POST['camp7'],'camp8'=> $_POST['camp8'],'camp9'=> $_POST['camp9'],'camp10'=>$_POST['camp10'],
             'camp11' => $_POST['camp11'], 'camp12' => $_POST['camp12'], 'camp13' => $_POST['camp13'], 'camp14' => $_POST['camp14'],
             'camp15' => $_POST['camp15'], 'camp16' => $_POST['camp16'], 'camp17' =>$_POST['camp17'], 'camp18' =>$_POST['camp18'],
             'camp19' => $_POST['camp19'], 'camp20' =>$_POST['camp20'], 'camp21' =>$_POST['camp21'], 'camp22' => $_POST['camp22'],
             'camp23' => $_POST['camp23'], 'camp24' =>$_POST['camp24'], 'camp25' =>$_POST['camp25'], 'camp26' =>$_POST['camp26'],
             'camp30' => $_POST['camp30'], 'camp31' =>$_POST['camp31'], 'camp32' =>$_POST['camp32'], 'camp33' =>$_POST['camp33'],
             'camp34' => $_POST['camp34'], 'camp53' =>$_POST['camp53'], 'camp54' =>$_POST['camp54'], 'camp55' =>$_POST['camp55'],'camp56' =>$_POST['camp56'], 'camp57' =>$_POST['camp57']
         )))."'",
         'Campo35' => "'".$_POST['camp35']."'",
         'Campo36' => "'".$_POST['camp36']."'",
         'Campo37' => "'".$_POST['camp37']."'",
         'Campo38' => "'".$_POST['camp38']."'",
         'Tabla3' => "'".json_encode(array('fila1' => array('camp39'=>$_POST['camp39'], 'camp40'=>$_POST['camp40'], 'camp41'=>$_POST['camp41'],
                'camp42'=> $_POST['camp42'], 'camp43'=>$_POST['camp43'], 'camp44'=>$_POST['camp44'],
                'camp45'=>$_POST['camp45'], 'camp46'=>$_POST['camp46'], 'camp47'=>$_POST['camp47'],
                'camp27'=>$_POST['camp27'], 'camp28'=>$_POST['camp28'], 'camp29'=>$_POST['camp29']
             ))
         )."'",
         'Tabla4' => "'".json_encode(array('fila1' => array('camp48'=>$_POST['camp48'], 'camp49'=>$_POST['camp49'],
             'camp50'=>$_POST['camp50'], 'camp51'=>$_POST['camp51']))
         )."'",
         'Campo52' => "'".$_POST['camp52']."'",
         'CodigoComentario' => 0,
         'FechaCreacion' => "'".$fecha_Actual."'"
    ));

    $db->getInsertTabla($consulta);

clearstatcache();
?>
<!-- Mensaje Alerta-->
<div class="alert alert-success">
    <strong>Well done!</strong> Se Guardo Exitosamente, enviar al tutor para terminar proceso
</div>

