<link href="<?php echo base_url('assets/css/pages/dashboard.css') ?>" rel="stylesheet">
<div class="row">


    <div class="span8">

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
                            <th class="td-actions">Iniciar</th>
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
                                    <td class="td-actions">
                                        <a href="<?php echo base_url('consulta/NuevaConsulta/'.url_base64_encode($cita['ID_PACIENTE'])); ?>" class="btn btn-small btn-success iniciarConsulta">
                                            <i class="btn-icon-only icon-ok" id-cita="<?php echo $cita['ID_CITA']; ?>" consulta="<?php echo url_base64_encode($cita['ID_PACIENTE']); ?>" > </i>
                                        </a>
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
    <!-- /span6 -->
    <div class="span4">
        <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
                <h3>Enlaces Directos</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="shortcuts"> 
                    <a href="<?php echo base_url('cita/verAgenda') ?>" class="shortcut">
                        <i class="shortcut-icon icon-calendar"></i>
                        <span class="shortcut-label">Ver <br/> Agenda</span> 
                    </a>

                    <a href="<?php echo base_url('paciente/buscarPaciente') ?>" class="shortcut">
                        <i class="shortcut-icon icon-user"></i>
                        <span class="shortcut-label">Buscar Paciente</span> 
                    </a>

                </div>
                <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
        </div>

    </div>
    <!-- /span6 --> 
</div>
<!-- /row --> 

<form id="formCrearConsulta" method="post">

</form>
<script>
   /* $(".iniciarConsulta").click(function(e) {
        e.preventDefault();
        var idCita = $(this).attr('id-cita');
        var consulta= $(this).attr('consulta');
        var element = $(this);
        if (confirm('Esta seguro de Iniciar la Consulta?')) {
            element.remove();
            var url="<?php echo base_url('consulta/NuevaConsulta/') ?>"+"/"+consulta;
            $("#formCrearConsulta").append('<input type="text" value="' + idCita + '" id="idCita" name="idCita">');
            $("#formCrearConsulta").attr("action", url);
            $("#formCrearConsulta").submit();
        }
    });*/
</script>


