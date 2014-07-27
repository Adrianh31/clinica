<div class="row">

    <div class="span12">            

        <div class="widget ">

            <div class="widget-header">
                <i class="icon-calendar"></i>
                <h3>Nueva Cita</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">

                <div class="active">
                    <ul class="nav nav-tabs">
                        <li class="<?php echo ($pestania == 'tabRegistrado') ? 'active' : '' ?>">
                            <a href="#tabPacienteRegistrado" data-toggle="tab">Paciente Registrado</a>
                        </li>
                        <li class="<?php echo ($pestania == 'tabNuevo') ? 'active' : '' ?>">
                            <a href="#tabPacienteNuevo" data-toggle="tab">Eres un Nuevo Paciente?</a>
                        </li>                        

                    </ul>

                    <br>

                    <div class="tab-content">
                        <div class="tab-pane <?php echo ($pestania == 'tabRegistrado') ? 'active' : '' ?>" id="tabPacienteRegistrado">

                            <?php
                            echo $custom_message;
                            echo $this->session->flashdata('custom_message');
                            ?>

                            <form action="<?php echo base_url('servicios/nuevaCita') ?>" method="post" class="form-horizontal">
                                <fieldset>

                                    <div class="control-group">                                         
                                        <label class="control-label" for="start">Correo Electronico *</label>
                                        <div class="controls">
                                            <input class="span6" size="16" type="text" value="<?php echo set_value('CORREO_ELECTRONICO'); ?>" name="CORREO_ELECTRONICO" id="CORREO_ELECTRONICO">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->


                                    <div class="control-group">                                         
                                        <label class="control-label" for="start">Especialidad *</label>
                                        <div class="controls">

                                            <select class="form-control span6 especialidad1" name="ID_ESPECIALIDAD" id="ID_ESPECIALIDAD">
                                                <option value="">--Seleccionar --</option>
                                                <?php
                                                if ($listaEspecialidades) {
                                                    foreach ($listaEspecialidades as $especialidad) {
                                                        ?>
                                                        <option value="<?php echo $especialidad['ID_ESPECIALIDAD'] ?>" <?php echo ($especialidad['ID_ESPECIALIDAD'] == set_value('ID_ESPECIALIDAD')) ? 'selected' : '' ?>>
                                                            <?php echo $especialidad['NOMBRE'] ?>
                                                        </option>    
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>					

                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->                


                                    <div class="control-group">                                         
                                        <label class="control-label" for="start">Medico *</label>
                                        <div class="controls">

                                            <select class="form-control span6 medico1" name="ID_EMPLEADO" id="ID_EMPLEADO">
                                                <option value="">--Seleccionar --</option>
                                            </select>					

                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->                                     


                                    <div class="control-group">                                         
                                        <label class="control-label" for="FECHA">Fecha *</label>
                                        <div class="controls">
                                            <input class="span3 disabled datetime" size="16" type="text" value="<?php echo set_value('FECHA', $citaDia); ?>" name="FECHA" id="FECHA" readonly="readonly">	
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->    

                                    <div class="control-group">                                         
                                        <label class="control-label" for="HORA_INICIO">Hora Inicio *</label>
                                        <div class="controls">
                                            <input type="text" class="timepicker span3" value="<?php echo set_value('HORA_INICIO', $citaHora); ?>" name="HORA_INICIO" id="HORA_INICIO" readonly="readonly" data-default-time="false">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->         


                                    <div class="control-group">                                         
                                        <label class="control-label" for="HORA_FIN">Hora Fin *</label>
                                        <div class="controls">
                                            <input type="text" class="timepicker span3" value="<?php echo set_value('HORA_FIN'); ?>" name="HORA_FIN" id="HORA_INICIO" readonly="readonly" data-default-time="false">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->                


                                    <div class="control-group">                                         
                                        <label class="control-label" for="MOTIVO">Motivo *</label>
                                        <div class="controls">
                                            <input type="text" class="span6" name="MOTIVO" id="MOTIVO" value="<?php echo set_value('MOTTIVO'); ?>"/>
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->				

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Crear Cita</button> 
                                        <a href="#" class="btn">Cancelar</a>
                                    </div> <!-- /form-actions -->


                                </fieldset>

                            </form>

                        </div>


                        <div class="tab-pane <?php echo ($pestania == 'tabNuevo') ? 'active' : '' ?>" id="tabPacienteNuevo">

                            <?php
                            echo $custom_message;
                            echo $this->session->flashdata('custom_message');
                            ?>

                            <form action="<?php echo base_url('servicios/nuevoPaciente') ?>" method="post" class="form-horizontal">
                                <fieldset>


                                    <span class="span6" style="color: #19bc9c;">Datos Personales</span><br/><br/>

                                    <div class="control-group">                                         
                                        <label class="control-label" for="NOMBRE">Nombre *</label>
                                        <div class="controls">
                                            <input id="NOMBRE" type="text" class="span6" name="NOMBRE" value="<?php echo set_value('NOMBRE'); ?>"  />

                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->


                                    <div class="control-group">                                         
                                        <label class="control-label" for="APELLIDO">Apellido *</label>
                                        <div class="controls">
                                            <input id="APELLIDO" type="text" class="span6" name="APELLIDO" value="<?php echo set_value('APELLIDO'); ?>"  />

                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->

                                    <div class="control-group">                                         
                                        <label class="control-label" for="FECHA_NACIMIENTO">Fecha de Nacimiento *</label>
                                        <div class="controls">
                                            <input id="FECHA_NACIMIENTO" type="text" name="FECHA_NACIMIENTO" class="span6 fechaNacimiento" value="<?php echo set_value('FECHA_NACIMIENTO'); ?>"  />
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->


                                    <div class="control-group">                                         
                                        <label class="control-label">Sexo *</label>
                                        <div class="controls">
                                            <label class="radio inline">
                                                <input type="radio"  name="SEXO" value="Masculino">  Masculino
                                            </label>

                                            <label class="radio inline">
                                                <input type="radio" name="SEXO" value="Femenino"> Femenino
                                            </label>
                                        </div>    <!-- /controls -->          
                                    </div> <!-- /control-group -->

                                    <div class="control-group">                                         
                                        <label class="control-label" for="CORREO_ELECTRONICO">Correo Electronico * </label>
                                        <div class="controls">
                                            <input id="CORREO_ELECTRONICO" type="text" class="span6" name="CORREO_ELECTRONICO" value="<?php echo set_value('CORREO_ELECTRONICO'); ?>"  />
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->                                                    

                                    <span class="span6" style="color: #19bc9c;">Datos de la Cita</span><br/><br/>

                                    <div class="control-group">                                         
                                        <label class="control-label" for="start">Especialidad *</label>
                                        <div class="controls">
                                            <select class="form-control span6 especialidad2" name="ID_ESPECIALIDAD" id="ID_ESPECIALIDAD">
                                                <option value="">--Seleccionar --</option>
                                                <?php
                                                if ($listaEspecialidades) {
                                                    foreach ($listaEspecialidades as $especialidad) {
                                                        ?>
                                                        <option value="<?php echo $especialidad['ID_ESPECIALIDAD'] ?>" <?php echo ($especialidad['ID_ESPECIALIDAD'] == set_value('ID_ESPECIALIDAD')) ? 'selected' : '' ?>>
                                                            <?php echo $especialidad['NOMBRE'] ?>
                                                        </option>    
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>					
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->                


                                    <div class="control-group">                                         
                                        <label class="control-label" for="start">Medico *</label>
                                        <div class="controls">
                                            <select class="form-control span6 medico2" name="ID_EMPLEADO" id="ID_EMPLEADO">
                                                <option value="">--Seleccionar --</option>
                                            </select>					
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->                                      


                                    <div class="control-group">                                         
                                        <label class="control-label" for="FECHA">Fecha *</label>
                                        <div class="controls">
                                            <input class="span3 disabled datetime" size="16" type="text" value="<?php echo set_value('FECHA', $citaDia); ?>" name="FECHA" id="FECHA" readonly="readonly">	
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->    

                                    <div class="control-group">                                         
                                        <label class="control-label" for="HORA_INICIO">Hora Inicio *</label>
                                        <div class="controls">
                                            <input type="text" class="timepicker span3" value="<?php echo set_value('HORA_INICIO', $citaHora); ?>" name="HORA_INICIO" id="HORA_INICIO" readonly="readonly" data-default-time="false">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->         


                                    <div class="control-group">                                         
                                        <label class="control-label" for="HORA_FIN">Hora Fin *</label>
                                        <div class="controls">
                                            <input type="text" class="timepicker span3" value="<?php echo set_value('HORA_FIN'); ?>" name="HORA_FIN" id="HORA_INICIO" readonly="readonly" data-default-time="false">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->                


                                    <div class="control-group">                                         
                                        <label class="control-label" for="MOTIVO">Motivo *</label>
                                        <div class="controls">
                                            <input type="text" class="span6" name="MOTIVO" id="MOTIVO" value="<?php echo set_value('MOTTIVO'); ?>"/>
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->		

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Crear Cita</button> 
                                        <a href="#" class="btn">Cancelar</a>
                                    </div> <!-- /form-actions -->


                                </fieldset>

                            </form>
                        </div>


                    </div>

                </div>

            </div> <!-- /widget-content -->

        </div> <!-- /widget -->

    </div> <!-- /span8 -->

</div> <!-- /row -->



<script>

    function listaEmpleados(destino, idEspecialidad) {
        $.ajax({
            data: {idEspecialidad: idEspecialidad},
            url: '<?php echo base_url('servicios/listaMedicos'); ?>',
            type: 'post',
            dataType: 'json',
            beforeSend: function() {
            },
            success: function(data) {
                $("." + destino).html("");
                $.each(data, function(i, item) {
                    $("." + destino).append("<option value='" + item.ID_EMPLEADO + "'>" + item.NOMBRE_EMPLEADO + "</option>")
                })
            },
            error: function(data) {
                alert("Error, intentelo de nuevo");
            }
        });
    }

    $(".especialidad1").change(function() {
        var idEspecialidad = $(this).val();
        listaEmpleados("medico1", idEspecialidad);
    });
    $(".especialidad2").change(function() {
        var idEspecialidad = $(this).val();
        listaEmpleados("medico2", idEspecialidad);
    });
</script>




