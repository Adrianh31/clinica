
<div class="row">

    <div class="span12">            

        <div class="widget ">

            <div class="widget-header">
                <i class="icon-briefcase"></i>
                <h3>Ver Consulta</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">



                <div class="active">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tabNuevaConsulta" data-toggle="tab">Datos Consulta</a>
                        </li>
                    </ul>



                    <div class="tab-content">
                        <!------- PESTANIA CONSULTA --------------->
                        <div class="tab-pane active" id="tabNuevaConsulta">

                            <div class="span7">



                                <form action="#" method="post" class="form-horizontal">
                                    <fieldset>


                                        <div class="control-group">                                         
                                            <label class="control-label" for="OBSERVACIONES">Nombre Medico</label>
                                            <div class="controls">
                                                <input type="text" class="span4 disabled" id="username" value="<?php echo $consulta->NOMBRE_EMPLEADO ?>" disabled="">
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->		

                                        <?php if ($consulta->ID_ESPECIALIDAD == 2) { ?>

                                            <div class="control-group">                                         
                                                <div class="controls">
                                                    <img src="<?php echo base_url('assets/images/odontograma.jpg'); ?>"  width="50%" />
                                                </div> <!-- /controls -->               
                                            </div> <!-- /control-group -->




                                        <?php } else { ?>


                                            <div class="control-group">                                         
                                                <label class="control-label" for="TEMPERATURA">TEMPERATURA</label>
                                                <div class="controls">
                                                    <input id="APELLIDO" type="text" class="span4" name="TEMPERATURA" value="<?php echo $consulta->TEMPERATURA; ?>" disabled="" />
                                                </div> <!-- /controls -->               
                                            </div> <!-- /control-group -->



                                            <div class="control-group">                                         
                                                <label class="control-label" for="PESO">PESO</label>
                                                <div class="controls">
                                                    <input id="APELLIDO" type="text" class="span4" name="PESO" value="<?php echo $consulta->PESO; ?>" disabled="" />
                                                </div> <!-- /controls -->               
                                            </div> <!-- /control-group -->




                                            <div class="control-group">                                         
                                                <label class="control-label" for="PULSO">PULSO</label>
                                                <div class="controls">
                                                    <input id="APELLIDO" type="text" class="span4" name="PULSO" value="<?php echo $consulta->PULSO; ?>"  disabled=""/>
                                                </div> <!-- /controls -->               
                                            </div> <!-- /control-group -->



                                            <div class="control-group">                                         
                                                <label class="control-label" for="TALLA">TALLA</label>
                                                <div class="controls">
                                                    <input id="APELLIDO" type="text" class="span4" name="TALLA" value="<?php echo $consulta->TALLA; ?>" disabled="" />
                                                </div> <!-- /controls -->               
                                            </div> <!-- /control-group -->


                                            <div class="control-group">                                         
                                                <label class="control-label" for="TA">T.A.</label>
                                                <div class="controls">
                                                    <input id="APELLIDO" type="text" class="span4" name="TA" value="<?php echo $consulta->TA; ?>" disabled="" />
                                                </div> <!-- /controls -->               
                                            </div> <!-- /control-group -->

                                        <?php } ?>


                                        <div class="control-group">                                         
                                            <label class="control-label" for="OBSERVACIONES">Observaciones *</label>
                                            <div class="controls">
                                                <textarea class="form-control span7" rows="5" name="OBSERVACIONES" id="OBSERVACIONES" disabled=""><?php echo $consulta->OBSERVACIONES; ?></textarea>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->




                                        <div class="control-group">                                         
                                            <label class="control-label" for="DIAGNOSTICO">Diagnostico *</label>
                                            <div class="controls">
                                                <textarea class="form-control span7" rows="5" name="DIAGNOSTICO" id="DIAGNOTICO" disabled=""><?php echo $consulta->DIAGNOSTICO; ?></textarea>
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->



                                        <div class="container-fluid">
                                            <div class="widget widget-table action-table">
                                                <div class="widget-header"> <i class="icon-th-list"></i>
                                                    <h3>Crear Receta Medica</h3>
                                                </div>
                                                <!-- /widget-header -->
                                                <div class="widget-content">
                                                    <table class="table table-striped table-bordered" id="tablaRecetaMedica">
                                                        <thead>
                                                            <tr>
                                                                <th> Nombre Medicamento </th>
                                                                <th> Cantidad</th>
                                                                <th> Dosis</th>
                                                            </tr>

                                                        </thead>

                                                        <tbody>		  

                                                            <?php
                                                            if ($recetaMedica) {
                                                                foreach ($recetaMedica as $medicamento) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $medicamento['NOMBRE_MEDICAMENTO']; ?></td>
                                                                        <td><?php echo $medicamento['CANTIDAD']; ?></td>
                                                                        <td><?php echo $medicamento['DOSIS']; ?></td>
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
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if ($analisis) {
                                                                foreach ($analisis as $examen) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $examen['NOMBRE_EXAMEN']; ?></td>
                                                                        <td><?php echo $examen['DESCRIPCION']; ?></td>
                                                                        <td><?php echo $examen['FECHA_A_REALIZAR']; ?></td>
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




                    </div>
                </div> <!-- /widget-content -->
            </div> <!-- /widget -->
        </div> <!-- /span8 -->
    </div> <!-- /row -->
</div> <!-- /row -->











