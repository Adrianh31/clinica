<div class="row">

    <div class="span12">            

        <div class="widget ">

            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Buscar Pacientes</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">



                <div class="active">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="#formcontrols" data-toggle="tab">Busqueda por Nombre del Paciente</a>
                        </li>
                    </ul>

                    <br>

                    <div class="tab-content">
                        <div class="tab-pane active" id="formcontrols">

                            <form action="<?php echo base_url('paciente/buscarPaciente') ?>" method="post" class="form-horizontal">
                                <fieldset>

                                    <div class="control-group">                                         
                                        <label class="control-label" for="NOMBRE">Nombre : </label>
                                        <div class="controls">
                                            <div class="input-append">
                                                <input class="span6 m-wrap" id="buscar" name="buscar" type="text">
                                                <input type="submit" class="btn" value="Buscar">
                                            </div>

                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->
                                </fieldset>

                            </form>



                            <?php
                            echo $custom_message;
                            ?>

                            <div class="widget widget-table action-table">
                                <div class="widget-header"> <i class="icon-th-list"></i>
                                    <h3>Resultados de la Busqueda</h3>
                                </div>


                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th> Nombre </th>
                                                <th> Telefono</th>
                                                <th> Correo Electronico</th>
                                                <th> Fecha ultima Consulta</th>
                                                <th> Proxima Cita</th>
                                                <th class="td-actions">Ver Expediente</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            if ($pacientes) {
                                                foreach ($pacientes as $paciente) {
                                                    ?>
                                                    <tr>
                                                        <td> <?php echo $paciente['NOMBRE'].' '.$paciente['APELLIDO'] ?> </td>
                                                        <td> <?php echo $paciente['TELEFONO'] ?></td>
                                                        <td> <?php echo $paciente['CORREO_ELECTRONICO'] ?></td>
                                                        <td> -- </td>
                                                        <td> --</td>
                                                        <td class="td-actions"><a href="<?php echo base_url('paciente/editarPaciente/'.url_base64_encode($paciente['ID_PERSONA'])) ?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a></td>
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

                    </div>

                </div>

            </div> <!-- /widget-content -->

        </div> <!-- /widget -->

    </div> <!-- /span8 -->

</div> <!-- /row -->