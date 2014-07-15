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
                                    <td> <?php echo $cita['MOTIVO'] ?> </td>
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
</script>

