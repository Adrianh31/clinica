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
                            <th> Motivo</th>
                            <th> Estado Cita</th>
                            <th class="td-actions">Iniciar Cita</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($listaCitas) {
                            foreach ($listaCitas as $cita) {
                                ?>
                                <tr>
                                    <td> <?php echo $cita['FECHA'] ?> </td>
                                    <td><a href="<?php echo base_url('paciente/editarPaciente/' . url_base64_encode($cita['ID_PACIENTE'])) ?>"> <?php echo $cita['NOMBRE_PACIENTE'] ?> </a> </td>
                                    <td> <?php echo $cita['HORA_INICIO'] ?> </td>
                                    <td> <?php echo $cita['HORA_FIN'] ?> </td>
                                    <td> <?php echo $cita['ESPECIALIDAD'] ?> </td>
                                    <td> <?php echo $cita['MOTIVO'] ?> </td>
                                    <td> <?php echo $cita['ESTADO_CITA'] ?> </td>
                                    <td class="td-actions">
                                        <?php if ($cita['ID_ESTADO_CITA'] == 3) { ?>
                                        <a href="<?php echo base_url('consulta/NuevaConsulta/'.url_base64_encode($cita['ID_PACIENTE']));  ?>" >
                                                ir a la consulta
                                            </a> 
                                        <?php } else { ?>
                                            <a href="javascript:void(0)" class="btn btn-small btn-success iniciarConsulta" id-cita="<?php echo $cita['ID_CITA']; ?>" consulta="<?php echo url_base64_encode($cita['ID_PACIENTE']); ?>" >
                                                <i class="btn-icon-only icon-ok"> </i>
                                            </a>                                            
                                        <?php } ?>

                                    </td>
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

<form id="formCrearConsulta" method="post">

</form>
<script>
    $(".iniciarConsulta").click(function(e) {
        e.preventDefault();
        var idCita = $(this).attr('id-cita');
        var consulta = $(this).attr('consulta');
        var element = $(this);
        var url = "<?php echo base_url('consulta/NuevaConsulta/') ?>" + "/" + consulta;
        if (confirm('Esta seguro de Iniciar la Consulta?')) {
            element.remove();
            $.ajax({
                data: {idCita: idCita, estado: 3},
                url: '<?php echo base_url('cita/cambiarEstadoCita'); ?>',
                type: 'post',
                beforeSend: function() {
                },
                success: function(data) {
                    window.location.href = url;
                },
                error: function(data) {
                    alert("Error al Iniciar la Consulta");
                }
            });
        }
    });
</script>


