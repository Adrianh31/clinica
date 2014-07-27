<div class="row">

    <div class="span12">            

        <div class="widget ">

            <div class="widget-header">
                <i class="icon-money"></i>
                <h3>Pagos Realizados</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">

                <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                        <h3>Historial de Pagos</h3>
                    </div>
                    <!-- /widget-header -->
                    <div class="widget-content">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th> Fecha Pago </th>
                                    <th> Nombre Medico</th>
                                    <th> Nombre Paciente</th>
                                    <th> Exonerado</th>
                                    <th> Precio</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if ($listaPagosRealizados) {
                                    foreach ($listaPagosRealizados as $pago) {
                                        ?>
                                        <tr>
                                            <td> <?php echo $pago['FECHA'] ?> </td>
                                            <td> <?php echo $pago['NOMBRE_MEDICO'] ?></td>
                                            <td> <?php echo $pago['NOMBRE_PACIENTE'] ?></td>
                                            <td> <?php echo $pago['EXONERADO'] ?></td>
                                            <td> <?php echo $pago['PRECIO'] ?></td>
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




