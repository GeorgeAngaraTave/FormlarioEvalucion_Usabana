<?php
/**
 * Description of conexionDB
 *
 * @author jorge Angarita
 */
require_once "config.php";

class conexionDB {
    //Variables gobales de eventos
    private $conexion; 
    private $total_consultas;
/**
 *  funtion conexionDB()
 * Abre la conexion a la base de datos
 */
    public function conexionDB(){ 
      if(!isset($this->conexion)){
        $this->conexion = mysqli_connect(HOST, USER, PASS, DBNAME);

        if (!$this->conexion) {
            die('Error de Conexión (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
          //  echo 'Éxito... ' . mysqli_get_host_info($this->conexion) . "\n";
      }
      
    }
 /**
 *  funtion cerrarConexion()
 *  Cierra la conexion a la base de datos
 */   
    public function cerrarConexion() {
        return mysqli_close($this->conexion);
    }
 /**
 *  funtion consultaTabla($consulta)
  * Variable $consulta es el SELECT, INSERT, UPDATE de consulta
 *  Cierra la conexion a la base de datos
 */     
    public function consultaTabla($consulta){         
      $this->total_consultas++; 
      $resultado = mysqli_query($this->conexion, $consulta);
      if(!$resultado){ 
        echo 'Error al hacer la consulta ('.mysqli_sqlstate($this->conexion).'):'.mysqli_error($this->conexion);
        exit;
      }
      return $resultado;
    }
    
     /**
     * Funtion getSelectTabla(array)
     * Variables:
     *  $consulta = array('TABLA' => array(), 'CAMPOS'=> array(), 'CONDICION' => array('WHERE'=> array(), 'ORDER BY'=> array(), 'GROUP BY'=> array()))
     */
    public function getSelectTabla($consulta = array('TABLA' => array(), 'CAMPOS'=> array(), 'CONDICION' => array('WHERE'=> array(), 'ORDER BY'=> array(), 'GROUP BY'=> array()))){   
        $row = "";
        foreach ($consulta as $key => $value) {
            switch ($key) {
                case 'TABLA':
                    break;
                case 'CAMPOS':
                    
                        if(count($consulta['TABLA']) > 1){
                            foreach ($consulta['TABLA'] as $value) {
                               
                                $tabla[] = $value;
                            }
                            $tabla = implode(',',$tabla);
                        }  else {
                            $tabla = $consulta['TABLA'];
                        }
                        
                        if(count($consulta['CAMPOS']) > 0){
                            foreach ($consulta['CAMPOS'] as $value) {
                                $campo[] = $value;
                            }
                            $campo = implode(',',$campo);
                        }
                        $condicon = "";
                        if(isset($consulta['CONDICION']['WHERE'])){
                            if(count($consulta['CONDICION']['WHERE']) > 0){
                                foreach ($consulta['CONDICION']['WHERE'] as $key => $value) {
                                    $campoCondicion[] = $key."=".$value;
                                }
                                $campoCondicion = implode(' AND ',$campoCondicion);
                                $condicon = " WHERE ".$campoCondicion;
                            }
                        }
                        
                        $consulta = "SELECT ".$campo." FROM ".$tabla.$condicon;
                        //print_r($consulta); exit;
                        $result = $this->consultaTabla($consulta);
                        while ($rowfila = mysqli_fetch_assoc($result)){
                            $row[]= $rowfila;
                        }
                        return $row;
                    break;

                default:
                    echo "Error en la estructura ".$key." la estructura correcta es  array('tabla' => array(), 'campos'=> array())";
                    exit;
                    break;
            }
        }
        
        
    }
    
    /**
     * Funtion getInsertTabla($array)
     * Variables:
     *  $consulta = array('tabla' => array(), 'campos'=> array())
     */
    public function getInsertTabla($consulta = array('TABLA' => array(), 'CAMPOS'=> array())){
        
        foreach ($consulta as $key => $value) {
            switch ($key) {
                case 'TABLA':
                    break;
                case 'CAMPOS':
                        if(count($consulta['TABLA']) > 1){
                            foreach ($consulta['TABLA'] as $value) {
                               
                                $tabla[] = $value;
                            }
                            $tabla = implode(',',$tabla);
                        }  else {
                            $tabla = $consulta['TABLA'];
                        }
                        
                        if(count($consulta['CAMPOS']) > 0){
                            foreach ($consulta['CAMPOS'] as $key => $value) {
                                $campo[] = $key;
                                $valor[] = $value;
                            }
                            $campo = implode(',',$campo);
                            $valor = implode(',',$valor);
                            
                          $consulta = "INSERT INTO ".$tabla." (".$campo.")VALUES (".$valor.")";

                            $this->consultaTabla($consulta);
                        }
                    break;

                default:
                    echo "Error en la estructura ".$key." la estructura correcta es  array('tabla' => array(), 'campos'=> array())";
                    exit;
                    break;
            }
        }
    }
    
    public function getUpdateTabla($consulta = array('TABLA' => array(), 'CAMPOS'=> array(), 'CONDICION' => array('WHERE'=> array(), 'ORDER BY'=> array(), 'GROUP BY'=> array()))){
        
        foreach ($consulta as $key => $value) {
            switch ($key) {
                case 'TABLA':
                    break;
                case 'CAMPOS':
                    break;
                case 'CONDICION':
                        if(count($consulta['TABLA']) > 1){
                            foreach ($consulta['TABLA'] as $value) {
                               
                                $tabla[] = $value;
                            }
                            $tabla = implode(',',$tabla);
                        }  else {
                            $tabla = $consulta['TABLA'];
                        }
                        
                        if(count($consulta['CAMPOS']) > 0){
                            foreach ($consulta['CAMPOS'] as $key => $value) {
                                $campo[] = $key."=".$value;
                            }
                            $campo = implode(',',$campo);
                        }
                        $condicon = "";
                        if(isset($consulta['CONDICION']['WHERE'])){
                            if(count($consulta['CONDICION']['WHERE']) > 0){
                                foreach ($consulta['CONDICION']['WHERE'] as $key => $value) {
                                    $campoCondicion[] = $key."=".$value;
                                }
                                $campoCondicion = implode(' AND ',$campoCondicion);
                                $condicon = " WHERE ".$campoCondicion;
                            }
                        }
                        
                        $consulta = "UPDATE ".$tabla." SET ".$campo.$condicon;
                       $this->consultaTabla($consulta);  
                    break;

                default:
                    echo "Error en la estructura ".$key." WWW la estructura correcta es  array('tabla' => array(), 'campos'=> array())";
                    exit;
                    break;
            }
        }
    }
   
    public function getUsuarioConsultas($codigo){
        $result = $this->getSelectTabla(
                array('TABLA' => 'usuarios',
                    'CAMPOS' => array('Codigo','Nombres','Email', 'Codigo_profesor', 'Fomulario', 'CorreoEnviado' ),
                    'CONDICION' => array(
                    'WHERE' => array('Codigo' => $codigo))
                )
        );
        
        return $result;
    }
    
    public function getFormularioConsultas($codigoformulario){
        $result = $this->getSelectTabla(
                                    array('TABLA' => 'formularios', 
                                          'CAMPOS' =>array( 
                                              '	CodigoCreacion',
                                              'Campo1', 
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
                                              'Campo53',
                                              'FechaCreacion',
                                              'CodigoComentario'
                                              ),
                                          'CONDICION' =>array(  
                                          'WHERE'=> array('Codigo' => $codigoformulario))  
                                        )
            );
        
        return $result;
    }
    
    public function getRangoFecha($f_inicio, $f_fin){
        
        $fecha_Actual =date("d-m-Y H:i:s"); 
        $fecha_Actual =strtotime($fecha_Actual); echo "<br />";
        $fecha1=strtotime($f_inicio);
        $fecha2=strtotime($f_fin);
        $valor = 3;
        
        if($fecha_Actual < $fecha1){
            $valor = 1;
        }
        
        if($fecha_Actual > $fecha2){
            $valor = 2;
        }
        
        return $valor;
    }
}

