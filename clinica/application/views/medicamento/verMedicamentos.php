<div class="row">

    <div class="span12">            

        <div class="widget ">

            <div class="widget-header">
                <i class="icon-briefcase"></i>
                <h3>Lista de Medicametos</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">

                <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                        <h3>Medicamentos Registrados</h3>
                    </div>
                    <!-- /widget-header -->
                    <div class="widget-content">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th> Nombre Medicamento </th>
                                    <th> Casa Farmaceutica</th>
                                    <th> Presentacion</th>
                                    <th> Existencias</th>
                                    <th class="td-actions">Editar Medicamento</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if ($listaMedicamentos) {
                                    foreach ($listaMedicamentos as $medicamento) {
                                        ?>
                                        <tr>
                                    <td> <?php echo $medicamento['NOMBRE'];?> </td>
                                            <td> <?php echo $medicamento['CASA_FARMACEUTICA'];?></td>
                                            <td> <?php echo $medicamento['PRESENTACION'];?></td>
                                            <td> <?php echo $medicamento['CANTIDAD_ACTUAL'];?></td>
                                            <td class="td-actions">
                                                <a href="<?php echo base_url('medicamento/editarMedicamento/'.  url_base64_encode($medicamento['ID_MEDICAMENTO']))?>" class="btn btn-small btn-success">
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




