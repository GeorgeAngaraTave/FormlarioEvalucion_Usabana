<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comentarios
 *
 * @author jorge
 */
class Comentarios {
    //put your code here
    
    private $camentario;
    
    function getCamentario() {
        return $this->camentario;
    }

    function setCamentario($camentario) {
        
        switch ($camentario) {
            case 1:
               
                $this->camentario = "<p class='text-justify'>Partiendo de la formulación de lo que es un proyecto educativo, dada por IBERTIC (sf, p.4), como <strong> “un conjunto de acciones planificadas que tiene por objetivo la transformación de las prácticas educativas a partir de la inclusión de TIC, en tanto se considera que la misma constituye una valiosa oportunidad de cambio y mejora de la educación”. </strong> Y tomando como punto de partida para el desarrollo de esta guía los aprendizajes desarrollados dentro del curso, así como la planificación, diseño e implemetación del proyecto educativo desarrollado en semestres anteriores, a continuación se indicarán una serie de procesos y elementos que se deben tener en cuenta a la hora de evaluar un proyecto educativo.</p>";
                $this->camentario .= "<p class='text-justify'>Tal y como se indica en el documento de IBERTIC (p. 9), para evaluar un proyecto educativo se deben tener en cuenta los siguientes aspectos:</p>";
                $this->camentario .= "<ul class='text-justify'>
                                        <li>Descripción del problema educativo que atiende el proyecto</li>
                                        <li>Justificación del componente o dimensión del proyecto educativo, objeto de evaluación.</li>
                                        <li>Descripción del componente o dimensión del proyecto educativo, objeto de evaluación.</li>
                                        <li>Definición de los objetivos de la evaluación: general y específicos.</li>
                                        <li>Elaboración del marco conceptual: descripción del modelo de evaluación seleccionado y justificación de la pertinencia para el objeto de evaluación.</li>
                                        <li>Construcción del diseño metodológico de la evaluación: Detalle de la metodología que se empleará para recolectar la información.
                                          <ul>
                                            <li>Elaboración de la Matriz de evaluación con indicadores.</li>
                                            <li>Definición de los instrumentos a utilizar en la evaluación.</li>
                                          </ul>
                                        </li>
                                        <li>Elaborar un cronograma de actividades.</li>
                                      </ul>
                                      ";
                $this->camentario .="<p class='text-justify'>De esta forma, lo primero que debe realizar es describir el problema educativo que atiende el proyecto y la realidad que va a evaluar. Para esto, se debe llenar el siguiente apartado:</p>";
               
                break;
            case 2:
                $this->camentario = "<p>A partir de la identificación de los aspectos que se van a evaluar en el proyecto educativo, es necesario definir los objetivos de la evaluación. </p>";
                $this->camentario .= "<p>Para esto, debe recordar que los objetivos son propuestas que orientan las acciones, estos pueden indicarse en forma de valorar, diagnosticar, determinar, revisar, etc. Tenga encuenta, antes de formular los objetivos que, la evaluación siempre tiene como fin aportar información para contribuir a la toma de decisiones, orientadas a la mejora del proyecto educativo (IBERTIC, sf).</p>";    
                $this->camentario .="<p>Particularmente, debido a que los proyectos educativos mediados por TIC suelen involucrar diferentes componentes de la institución educativa, es posible pensar en distintos objetivos dependiendo del escenario que se observe. Por ejemplo:</p>";
                $this->camentario .="<div class='panel-body'>
                                            <div class='table-responsive'>
                                                <table class='table table-bordered'>
                                                    <tbody>
                                                        <tr>
                                                            <th width = '30%'>En el aula.</th>
                                                            <td width = '70%'><p>El docente podría estar interesado en evaluar el desempeño del proyecto en relación a los procesos de aprendizaje, y también, la adquisición de ciertas competencias entre sus alumnos para aprender e interactuar en entornos digitales.</p></td>
                                                        </tr>
                                                        <tr>
                                                            <th width = '30%'>En la institución educativa.</th>
                                                            <td width = '70%'><p>El equipo de conducción podría evaluar las acciones de un proyecto de inclusión de TIC considerando, desde las condiciones de infraestructura, los distintos recursos técnicos y pedagógicos involucrados, el desempeño de los docentes, las prácticas en el aula y los resultados de aprendizaje de los alumnos.</p></td>
                                                        </tr>
                                                        <tr>
                                                            <th width = '30%'>En el desarrollo profesional docente.</th>
                                                            <td width = '70%'><p>El formador podría interesarse en evaluar el desempeño del proyecto en relación a los aprendizajes y del desarrollo de las competencias profesionales docentes. También la forma en que estas transforman la práctica educativa del mismo o tiene efecto en la enseñanza de los estudiantes.</p></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>";
                $this->camentario .="<p>Ahora, la siguiente parte del proceso será definir los objetivos de la evaluación. Para esto, tenga en cuenta:</p>";
                $this->camentario .="<p>Los objetivos generales sintetizan la finalidad absoluta de la evaluación, donde se incluyen todas las acciones y metas. Y responden a las preguntas qué, dónde, cuándo y para qué se realizará dicha evaluación.</p>";
                $this->camentario .="<p>Los objetivos específicos se desprenden del objetivo general, pero sin excederlo. Están relacionados directamente con la acción y pueden identificar fases del proceso de evaluación. Además, describen qué tareas o actividades se efectuarán para alcanzar la meta general del que derivan. (IBERTIC, sf, p.11)</p>";
                $this->camentario .="<p>Para ver algunos ejemplos de estos objetivos ya redactados, diríjase al documento de IBERTIC. Es importante recordar que los objetivos que se van a redactar en este momento no son los del proyecto, sino los de la evaluación del proyecto.</p>";
                break;
            case 3:
                $this->camentario = "<p>Una vez formulado los objetivos, se debe definir el proceso que se va a adoptar para realizar la evaluación. Este implica el tipo de datos a recolectar, los actores involucrados, las dimensiones y los indicadores necesarios para poder medirlo. </p>
                                    <p>Todos estos aspectos están claramente expuestos en el documento de IBERTIC, entre las páginas 12-19. </p>
                                    <p>Diligencie los siguientes apartados teniendo en cuenta el proceso que llevó a cabo en la implementación:: </p> 
                                    ";    

                break;
            case 4:
                $this->camentario ="";
                break;
            case 5:
                $this->camentario ="<p>Una vez se ha realizado la implementación del proyecto educativo, es hora de evaluar los resultados del mismo. Algunos autores denominan a este proceso como el momento de mayor soledad del evaluador, ya que debe revisar, analizar, interpretar, relacionar y generar conocimientos a partir de los datos recolectados en la fase de evaluación de la implementación. </p>
                                    <p>En este momento, el evaluador debe analizar en qué medida se alcanzaron los diferentes indicadores establecidos en el proyecto educativo pero, sobre todo, las razones por las cuales esto ocurrió. Se trata de poder encontrar en los datos elementos que ayuden a realizar ajustes al esquema que le permitan, no solo dar continuidad al mismo, sino también ajustar todos sus procesos internos. </p>
                                    <p>Para esto, lo primero que se debe hacer es formular el procedimiento que se seguirá para elaborar la estimación del proyecto educativo. Este proceso incluye las diferentes fases del proceso de evaluación y está directamente relacionado con el modelo de valoración seleccionado. Por lo tanto, antes de diseñarlo, el evaluador deberá tener claro el modelo a utilizar y, a partir de este, proponer el proceso a desarrollar. </p>

                                    <p>Para esto, se debe completar la siguiente tabla: </p>
                                    ";

                break;
            case 6:
                $this->camentario ="<p>A partir de la identificación del modelo de evaluación, el evaluador deberá definir los indicadores que va a analizar, así como los instrumentos que utilizará para tal fin. Para esto, debe retomar los indicadores diseñados en la fase anterior e identificar las herramientas con los que ya cuenta y cuáles de estas deben ser planteadas desde cero, tal y como se indica en la siguiente tabla: </p>";
                break;
            case 7;
                $this->camentario ="<p>Luego de realizar este ejercicio, es muy probable que se observe que algunos instrumentos aportan más de un solo indicador; esto ocurre porque en los proyectos educativos las acciones que se trazan generalmente involucran diferentes dimensiones del proceso pedagógico. Por tal razón, es prudente identificar aquellos indicadores que están relacionados o correlacionados, con el fin de tenerlos en cuenta a la hora de realizar el análisis de los datos y presentar el informe de evaluación del proyecto. </p>
                                    <p>No obstante, también es sensato establecer que solo el análisis de los datos será quien le diga al evaluador cuáles de los indicadores están relacionados entre sí. Se debe recordar, además, que estos son los supuestos iniciales o hipótesis sobre las que trabaja este profesional para poder realizar el análisis y un respectivo reporte final. </p>
                                    <p>A continuación, se deben señalar cuáles de los indicadores están relacionados: </p>
                                    ";
                break;
            case 8:
                $this->camentario = "<p>Lo siguiente que debe hacer el evaluador es decidir cuál será su muestra, pues al igual que sucede en una investigación, no se trata de integrar los datos recolectados de todas las personas involucradas dentro del proyecto educativo, sino de incorporar los de una muestra en particular. Para esto, se deben decidir cuáles son las pautas de selección que se tendrán en cuenta para determinar la muestra de la evaluación del proyecto educativo. Ahora, se deben indicar estos criterios: </p>";
                break;
            case 9:
                $this->camentario ="";
                break;
            case 10:
                $this->camentario = "";
                break;
            default:
                break;
        }
        return $this->camentario;
    }



    
}
