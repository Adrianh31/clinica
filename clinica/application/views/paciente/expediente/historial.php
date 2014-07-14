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

