<div class="row">

    <div class="span12">            

        <div class="widget ">
            
            <?php
            echo $custom_message;
            echo $this->session->flashdata('custom_message');
            ?>

            <div class="widget-header">
                <i class="icon-briefcase"></i>
                <h3>Recetas Pendientes</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">

                <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                        <h3>Recetas por Despachar</h3>
                    </div>
                    <!-- /widget-header -->
                    <div class="widget-content">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th> Fecha Consulta </th>
                                    <th> Nombre Medico</th>
                                    <th> Nombre Paciente</th>
                                    <th class="td-actions">Ver Receta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($listaRecetasPendienes) {
                                    foreach ($listaRecetasPendienes as $receta) {
                                        ?>
                                        <tr>
                                            <td> <?php echo $receta['FECHA'] ?> </td>
                                            <td> <?php echo $receta['NOMBRE_MEDICO'] ?></td>
                                            <td> <?php echo $receta['NOMBRE_PACIENTE'] ?></td>
                                            <td class="td-actions">
                                                <a href="<?php echo base_url('medicamento/despacharReceta/' . url_base64_encode($receta['ID_CONSULTA'])) ?>" class="btn btn-small btn-success">
                                                    <i class="btn-icon-only icon-ok"> </i>
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





            </div> <!-- /widget-content -->

        </div> <!-- /widget -->

    </div> <!-- /span8 -->

</div> <!-- /row -->




