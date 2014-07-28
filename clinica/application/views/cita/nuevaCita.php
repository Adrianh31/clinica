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
                        <li>
                            <a href="#formcontrols" data-toggle="tab">Datos de la Cita</a>
                        </li>
                    </ul>

                    <br>

                    <div class="tab-content">
                        <div class="tab-pane active" id="formcontrols">

                            <?php
                            echo $custom_message;
                            echo $this->session->flashdata('custom_message');
                            ?>

                            <form action="<?php echo base_url('cita/nuevaCita') ?>" method="post" class="form-horizontal">
                                <fieldset>

                                    <div class="control-group">                                         
                                        <label class="control-label" for="nombrePaciente">Paciente *</label>                                    
                                        <div class="controls">
                                            <input type="text" class="span6" name="nombrePaciente" id="nombrePaciente" value="<?php echo set_value('nombrePaciente') ?>"/>
                                            <input type="hidden" name="ID_PACIENTE" id="ID_PACIENTE" value="<?php echo set_value('ID_PACIENTE') ?>"/>
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->


                                    <div class="control-group">                                         
                                        <label class="control-label" for="start">Especialidad *</label>
                                        <div class="controls">

                                            <select class="form-control span6" name="ID_ESPECIALIDAD" id="ID_ESPECIALIDAD">
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
                                            <input class="span3 disabled datetimeCita" size="16" type="text" value="<?php echo set_value('FECHA', $citaDia); ?>" name="FECHA" id="FECHA" readonly="readonly">	
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
                                            <input type="text" class="span6" name="MOTIVO" id="MOTIVO"/>
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

    $('#nombrePaciente').autocomplete({
        serviceUrl: '<?php echo base_url('paciente/buscarPacienteAuto') ?>',
        minChars: 1,
        type: 'post',
        dataType: 'json',
        onSelect: function(examen) {
            $("#ID_PACIENTE").val(examen.data);
        },
        onInvalidateSelection: function() {
        //alert("asd");    
        $("#ID_PACIENTE").val("");
        $("#nombrePaciente").val("");
        },
        triggerSelectOnValidInput:true,
        showNoSuggestionNotice: true,
        noSuggestionNotice: 'Sin resultados',
    });


    function listaEmpleados(destino, idEspecialidad) {
        $.ajax({
            data: {idEspecialidad: idEspecialidad},
            url: '<?php echo base_url('servicios/listaMedicos'); ?>',
            type: 'post',
            dataType: 'json',
            beforeSend: function() {
            },
            success: function(data) {
                $("#" + destino).html("");
                $.each(data, function(i, item) {
                    $("#" + destino).append("<option value='" + item.ID_EMPLEADO + "'>" + item.NOMBRE_EMPLEADO + "</option>")
                })
            },
            error: function(data) {
                alert("Error, intentelo de nuevo");
            }
        });
    }

    $("#ID_ESPECIALIDAD").change(function() {
        var idEspecialidad = $(this).val();
        if (idEspecialidad) {
            listaEmpleados("ID_EMPLEADO", idEspecialidad);
        }
    });
    $("#ID_ESPECIALIDAD").change();

</script>








