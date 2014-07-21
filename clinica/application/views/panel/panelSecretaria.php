<link href="<?php echo base_url('assets/css/pages/dashboard.css') ?>" rel="stylesheet">
<div class="row">


    <div class="span12">
        <!-- /widget -->
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Citas Pendientes para Hoy</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th> Fecha </th>
                            <th> Paciente </th>
                            <th> Hora Inicio</th>
                            <th> Hora Fin</th>
                            <th> Especialidad</th>
                            <th> Asignar Medico</th>
                            <th> Motivo</th>
                            <th>Estado Cita</th>
                            <th class="td-actions">Editar Cita</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        if ($listaCitas) {
                            foreach ($listaCitas as $cita) {
                                ?>
                                <tr>
                                    <td> <?php echo $cita['FECHA'] ?> </td>
                                    <td><a href="<?php echo base_url('paciente/editarPaciente/' . url_base64_encode($cita['ID_PACIENTE'])); ?>"> <?php echo $cita['NOMBRE_PACIENTE'] ?> </a> </td>
                                    <td> <?php echo $cita['HORA_INICIO'] ?> </td>
                                    <td> <?php echo $cita['HORA_FIN'] ?> </td>
                                    <td> <?php echo $cita['ESPECIALIDAD'] ?> </td>
                                    <td> 

                                        <?php
                                        if ($listaMedicos) {
                                            if ($cita['ID_ESTADO_CITA'] == 3 || $cita['ID_ESTADO_CITA'] == 4) {
                                                foreach ($listaMedicos as $medico) {
                                                    if ($medico['ID_EMPLEADO'] == $cita['ID_EMPLEADO']) {
                                                        echo $medico['NOMBRE_EMPLEADO'];
                                                    }
                                                }
                                            } elseif ($cita['ID_ESTADO_CITA'] == 5) {
                                                echo "-- Sin Asignar --";
                                            } else {
                                                ?>
                                                <select class="form-control span3 ID_EMPLEADO" name="ID_EMPLEADO" id="ID_EMPLEADO"  id-cita="<?php echo $cita['ID_CITA'] ?>">
                                                    <option value="">--Sin Asignar --</option>
                                                    <?php
                                                    foreach ($listaMedicos as $medico) {
                                                        if ($cita['ID_ESPECIALIDAD'] == $medico['ID_ESPECIALIDAD']) {
                                                            ?>
                                                            <option value="<?php echo $medico['ID_EMPLEADO'] ?>" <?php echo ($medico['ID_EMPLEADO'] == $cita['ID_EMPLEADO']) ? 'selected' : '' ?>>
                                                                <?php echo $medico['NOMBRE_EMPLEADO'] ?>
                                                            </option>                                                    
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>

                                    <td> <?php echo $cita['MOTIVO'] ?> </td>
                                    <td> <?php echo $cita['ESTADO'] ?> </td>
                                    <td class="td-actions"><a href=""  id-cita="<?php echo $cita['ID_CITA'] ?>"  class="editarCitar icon-pencil"/></td>
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
<!-- /row --> 
<form id="formEditarCita" method="post">

</form>
<script>
    $(".editarCitar").click(function(e) {
        e.preventDefault();
        var idCita = $(this).attr('id-cita');
        $("#formEditarCita").append('<input type="text" value="' + idCita + '" id="citaId" name="citaId">');
        $("#formEditarCita").attr("action", "<?php echo base_url('cita/establecerCita') ?>");
        $("#formEditarCita").submit();
    });


    $(".ID_EMPLEADO").change(function() {
        var idEmpleado = $(this).val();
        var idCita = $(this).attr("id-cita");
        $.ajax({
            data: {idEmpleado: idEmpleado, idCita: idCita},
            url: '<?php echo base_url('preconsulta/asignarMedico'); ?>',
            type: 'post',
            beforeSend: function() {
            },
            success: function(data) {
                if (idEmpleado) {
                    alert("Medico Asignado Correctamente");
                } else {
                    alert("Cita sin Medico Asignado");
                }
            },
            error: function(data) {
                alert("Error al Asignar el Medico");
            }
        });
    });

</script>

