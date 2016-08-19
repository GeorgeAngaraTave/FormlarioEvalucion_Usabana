<?php
	// include Database connection file 
	include "../../include/conexionDB.php";

	// Design initial table header 
	$data = '<div class="row">
                                <div class="col-lg-12">
                                     <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Lista de Alumnos

                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-exampl">
                                                    <thead>
                                                        <tr>
                                                            <th>Código</th>
                                                            <th>Nombre</th>
                                                            <th>Correo Electrónico</th>
                                                            <th>Profesor</th>
                                                            <th>Formulario</th>
                                                            <th>Acción</th>
                                                            <th>Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';
                                                   


	 $db = new conexionDB();
	 $result = "";
    $result = $db->getSelectTabla(
                                    array('TABLA' => 'usuarios', 
                                          'CAMPOS' =>array( 'id','Codigo', 'Nombres','Codigo_profesor', 'Fomulario','Email','CorreoEnviado'),
                                          'CONDICION' => array('WHERE'=> array('Codigo_profesor !' => 2 ))
                                        )
            );


    // if query results contains rows then featch those rows 
    if(isset($result))
    {
    	$number = 1;
    	foreach ($result as $key => $value)
    	{	
    		if($value['Fomulario'] != 0){
				$accion = "<div class='text-success'>En Proceso</div>";
            }else{
                $accion =  "<div class='text-primary'>Esperando</dir>";
    		}

            if($value['CorreoEnviado'] == 1){
                $accion = "<div class='text-danger'>Terminado</div>";
            }

            if($value['Codigo_profesor'] == 0){
                $value['Codigo_profesor'] = "<div class='text-warning'>Profesor</div>";
                $accion = "<div class='text-danger'>N/A</div>";
            }

    		$data .= '<tr>
				<td>'.$value['Codigo'].'</td>
				<td>'.$value['Nombres'].'</td>
                <td>'.$value['Email'].'</td>
				<td>'.$value['Codigo_profesor'].'</td>
				<td>'.$accion.'</td>
				<td>
					<button onclick="GetUserDetails('.$value['id'].')" class="btn btn-warning" >Actualizar</button>
				</td>
				<td>
					<button onclick="DeleteUser('.$value['id'].')" class="btn btn-danger">Eliminar</button>
				</td>
    		</tr>';
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

    $data .= ' </tbody>
                                                </table>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>';

    echo $data;
    $db->cerrarConexion();
    clearstatcache();
?>