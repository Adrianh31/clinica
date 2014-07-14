<?php
$idPaciente = url_base64_encode($idPaciente);
?>
<div class="row">

    <div class="span12">            

        <div class="widget ">

            <div class="widget-header">
                <i class="icon-briefcase"></i>
                <h3>Nueva Consulta</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">



                <div class="active">
                    <ul class="nav nav-tabs">

                        <li class="active">
                            <a href="#tabNuevaConsulta" data-toggle="tab">Nueva Consulta</a>
                        </li>

                        <li>
                            <a href="#tabHistorialClinico" data-toggle="tab">Historial Clinico</a>
                        </li>

                    </ul>



                    <div class="tab-content">
                        <!------- PESTANIA CONSULTA --------------->
                        <div class="tab-pane active" id="tabNuevaConsulta">

                            <div class="span7">

                                <?php
                                echo $custom_message;
                                echo $this->session->flashdata('custom_message');
                                ?>


                                <div class="controls" style="margin-bottom: 20px;">
                                    <!-- Button to trigger modal -->
                                    <!--  <a href="#myModal" role="button" class="btn" data-toggle="modal">Crear Receta Medica</a>-->

                                    <!-- Button to trigger modal -->
                                    <!--<a href="#myModal" role="button" class="btn" data-toggle="modal">Crear Examen Medico</a>-->



                                    <!-- Modal -->
                                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 id="myModalLabel">Nueva Receta Medica</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                            <button class="btn btn-primary">Guardar Receta</button>
                                        </div>
                                    </div>
                                </div>


                                <form action="<?php echo base_url('consulta/nuevaConsulta/' . $idPaciente) ?>" method="post" class="form-horizontal">
                                    <fieldset>


                                        <div class="control-group">                                         
                                            <label class="control-label" for="OBSERVACIONES">Nombre Medico</label>
                                            <div class="controls">
                                                <input type="text" class="span4 disabled" id="username" value="<?php echo $this->session->userdata('nombrePersona'); ?>" disabled="">
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->		

                                        <div class="control-group">                                         
                                            <label class="control-label" for="TEMPERATURA">TEMPERATURA</label>
                                            <div class="controls">
                                                <input id="APELLIDO" type="text" class="span4" name="TEMPERATURA" value="<?php echo set_value('TEMPERATURA'); ?>"  />
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->



                                        <div class="control-group">                                         
                                            <label class="control-label" for="PESO">PESO</label>
                                            <div class="controls">
                                                <input id="APELLIDO" type="text" class="span4" name="PESO" value="<?php echo set_value('PESO'); ?>"  />
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->




                                        <div class="control-group">                                         
                                            <label class="control-label" for="PULSO">PULSO</label>
                                            <div class="controls">
                                                <input id="APELLIDO" type="text" class="span4" name="PULSO" value="<?php echo set_value('PULSO'); ?>"  />
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->



                                        <div class="control-group">                                         
                                            <label class="control-label" for="TALLA">TALLA</label>
                                            <div class="controls">
                                                <input id="APELLIDO" type="text" class="span4" name="TALLA" value="<?php echo set_value('TALLA'); ?>"  />
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->


                                        <div class="control-group">                                         
                                            <label class="control-label" for="TA">T.A.</label>
                                            <div class="controls">
                                                <input id="APELLIDO" type="text" class="span4" name="TA" value="<?php echo set_value('TA'); ?>"  />
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->



                                        <div class="control-group">                                         
                                            <label class="control-label" for="OBSERVACIONES">Observaciones *</label>
                                            <div class="controls">
                                                <textarea class="form-control span7" rows="3" name="OBSERVACIONES" id="OBSERVACIONES" ><?php echo set_value('OBSERVACIONES'); ?></textarea>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->




                                        <div class="control-group">                                         
                                            <label class="control-label" for="DIAGNOSTICO">Diagnostico *</label>
                                            <div class="controls">
                                                <textarea class="form-control span7" rows="3" name="DIAGNOSTICO" id="DIAGNOTICO" ><?php echo set_value('DIAGNOSTICO'); ?></textarea>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->



                                        <div class="container-fluid">
                                            <div class="widget widget-table action-table">
                                                <div class="widget-header"> <i class="icon-th-list"></i>
                                                    <h3>Receta Medica</h3>
                                                </div>
                                                <!-- /widget-header -->
                                                <div class="widget-content">
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th> Nombre Medicamento </th>
                                                                <th> Cantidad</th>
                                                                <th> Dosis</th>
                                                                <th class="td-actions">Accciones </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>			  

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /widget-content --> 
                                            </div>
                                        </div>




                                        <div class="container-fluid">
                                            <div class="widget widget-table action-table">
                                                <div class="widget-header"> <i class="icon-th-list"></i>
                                                    <h3>Examenes Medicos</h3>
                                                </div>
                                                <!-- /widget-header -->
                                                <div class="widget-content">
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th> Nombre Examen </th>
                                                                <th> Descripcion</th>
                                                                <th> Fecha </th>
                                                                <th class="td-actions">Accciones </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>			  

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /widget-content --> 
                                            </div>
                                        </div>





                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">Guardar Consulta</button> 
                                            <a href="#" class="btn">Cancelar</a>
                                        </div> <!-- /form-actions -->

                                    </fieldset>

                                </form>
                            </div>

                            <div class="span4">

                                <!-- /widget -->
                                <div class="widget widget-table action-table">
                                    <div class="widget-header"> <i class="icon-user"></i>
                                        <h3>Informacion del Paciente</h3>
                                    </div>
                                    <!-- /widget-header -->
                                    <div class="widget-content">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Campo </th>
                                                    <th> Valor </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>Nombre</td>
                                                    <td><?php echo $paciente->NOMBRE_PACIENTE ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Edad</td>
                                                    <td><?php echo $paciente->FECHA_NACIMIENTO ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Direccion</td>
                                                    <td><?php echo $paciente->DIRECCION ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Telefono</td>
                                                    <td><?php echo $paciente->TELEFONO ?></td>
                                                </tr>


                                                <tr>
                                                    <td>Religion</td>
                                                    <td><?php echo $paciente->RELIGION_PERTENECE ?></td>
                                                </tr>                                                

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /widget-content --> 
                                </div>                                 




                            </div>
                        </div>
                        <!------------- PESTANIA CONSULTA ------------>



                        <!------- PESTANIA HIST0RIAL --------------->
                        <div class="tab-pane" id="tabHistorialClinico">


                            <div class="widget widget-table action-table">
                                <div class="widget-header"> <i class="icon-th-list"></i>
                                    <h3>Consultas del Paciente</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th> Fecha Consulta </th>
                                                <th> Nombre Medico</th>
                                                <th> Especialidad</th>
                                                <th class="td-actions">Ver Historial </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($listaConsultas) {
                                                foreach ($listaConsultas as $consulta) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $consulta['FECHA']; ?> </td>
                                                        <td><?php echo $consulta['NOMBRE_MEDICO']; ?></td>
                                                        <td><?php echo $consulta['ESPECIALIDAD']; ?></td>
                                                        <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a></td>
                                                    </tr>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /widget-content --> 
                            </div>
                        </div>
                        <!------- PESTANIA HIST0RIAL --------------->                        


                    </div>
                </div> <!-- /widget-content -->
            </div> <!-- /widget -->
        </div> <!-- /span8 -->
    </div> <!-- /row -->
</div> <!-- /row -->











