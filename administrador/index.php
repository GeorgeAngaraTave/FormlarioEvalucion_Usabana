<?php 
// include Database connection file 
    include "../include/conexionDB.php";

?>
 <div class="row">
                <div class="col-lg-12">
                    <div id="mensaje"></div>
                    <div class="panel panel-primary">
                        
                        <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Nuevo Alumno</button>
                                </div>
                            </div>
                        </div><br />
                            
                            <div class="records_content"></div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- Bootstrap Modals -->
            <!-- Modal - Add New Record/User -->
            <div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Nuevo Usuario</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="codigo">Código</label>
                                <input type="text" id="codigo" placeholder="Código" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Nombre</label>
                                <input type="text" id="nombre" placeholder="Nombre Usuario" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electronico</label>
                                <input type="text" id="email" placeholder="Correo Electrnico" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label for="email">Tipo de usuario</label>
                                <div class="btn-group open">
                                <select class="form-control" name="tipo" id="tipo" onChange="pagoOnChange(this)">
                                  <option value="N" >Seleccione</option>
                                  <option value="P" >Profesor</option>
                                  <option value="A">Alumno</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group" id="codigopro">
                                <label for="email">Código Profesor</label>
                                <input type="text" id="codigoprofesor" placeholder="Código proesor" class="form-control" value="0" />
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" onclick="addRecord()">crear</button>
                        </div>
                    </div>
                </div>
            </div>
             </div>
            <!-- // Modal -->

            <!-- Modal - Update User details -->
            <div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Update</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="update_codigo">Codigo</label>
                                <input type="text" id="update_codigo" placeholder="Código" class="form-control" value="" />
                            </div>

                            <div class="form-group">
                                <label for="update_nombre">Nombre</label>
                                <input type="text" id="update_nombre" placeholder="Nombre" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label for="update_email">Correo Electronico</label>
                                <input type="text" id="update_email" placeholder="Email Address" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="update_estado">estado</label>
                                <div class="btn-group">
                                <select class="form-control" name="update_estado" id="update_estado">
                                  <option value="N" >Seleccione</option>
                                  <option value="0" >En Proceso</option>
                                  <option value="1">Terminado</option>
                                </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                            <input type="hidden" id="hidden_user_id">
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Modal -->
       

        <script>
        $("#codigopro").hide();
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-75591362-1', 'auto');
            ga('send', 'pageview');

        </script>
    <!-- Bootstrap JS file -->
        <script type="text/javascript" src="administrador/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>




