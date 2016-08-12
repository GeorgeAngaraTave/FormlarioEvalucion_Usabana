<?php
    session_start();

    if(!isset($_SESSION['user_session']))
    {
     header("Location: index.php");
    }

    include "include/conexionDB.php";

    $db = new conexionDB();
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


    if($result['Codigo_profesor']==0){
        $variable = "Profesor";
    }  else {
        $result['Fomulario'];
        $variable = "Alumno";
    }


    $db->cerrarConexion();
clearstatcache();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulación de la evaluación de un proyecto educativo mediado por TIC.</title>
    <!-- Bootstrap Styles-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="css/stylehome.css" rel="stylesheet" />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">U. Sabana</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-fw"></i> <h3>¡Hola! <?php echo  $variable."/a"; ?></h3>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><?php echo  $result['Nombres']; ?>
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $variable; ?></a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#" id="cerrar"><i class="fa fa-sign-out fa-fw"></i> Cerrar Session</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Formulario<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level nav-tabs nav-pills nav-stacked ">
                    <?php if($result['Codigo_profesor']==0){ ?>    
                    
                            <li>
                                <a href="#" id="linkeva" >Evaluar</a>
                                <input type="hidden" value="E" id='evadato'/>
                            </li>
                            <li>
                                <a href="#" id="linkpe">Por Evaluar</a>
                                <input type="hidden" value="PE" id='evadatope'/>
                            </li>
                    <?php
                    }else{
                    ?>
                            <li>
                                <a href="#" id="linkevaluar" >Evaluación</a>
                            </li>
                      
                    <?php
                    }
                    ?>
                      </ul>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div id="contenido">
                    
                    
                    <div class="jumbotron">
                        <h1>Bienvenidos</h1>
                        <p>Esta es la plataforma de formularis</p>
                        <p>
                        </p>
                    </div>
                    
                </div>
                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="js/morris/raphael-2.1.0.min.js"></script>
    <script src="js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="js/custom-scripts.js"></script>
    <script src="js/scripts.js" type="text/javascript"></script>
 