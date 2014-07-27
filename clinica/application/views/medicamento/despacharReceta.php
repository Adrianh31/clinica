<div class="row">

    <div class="span12">            

        <div class="widget ">

            <div class="widget-header">
                <i class="icon-calendar"></i>
                <h3>Despachar Receta</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">

                <div class="active">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="#formcontrols" data-toggle="tab">Datos de la Receta</a>
                        </li>
                    </ul>

                    <br>

                    <div class="tab-content">
                        <div class="tab-pane active" id="formcontrols">

                            <?php
                            echo $custom_message;
                            echo $this->session->flashdata('custom_message');
                            ?>


                            <form action="<?php echo base_url('medicamento/actualizarInvetario');?>" method="post" class="form-horizontal">
                                <fieldset>

                                    <?php 
                                    echo form_hidden('ID_RECETA', $recetaInfo->ID_RECETA);
                                    echo form_hidden('ID_CONSULTA', $recetaInfo->ID_CONSULTA);
                                    ?>                                    
                                    
                                    <div class="control-group">                                         
                                        <label class="control-label">Fecha Consulta</label>
                                        <div class="controls">
                                            <input type="text" class="span4 disabled" value="<?php echo $recetaInfo->FECHA ?>" disabled="">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->

                                    <div class="control-group">                                         
                                        <label class="control-label">Nombre Medico</label>
                                        <div class="controls">
                                            <input type="text" class="span4 disabled" value="<?php echo $recetaInfo->NOMBRE_MEDICO ?>" disabled="">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->	

                                    <div class="control-group">                                         
                                        <label class="control-label">Nombre Paciente</label>
                                        <div class="controls">
                                            <input type="text" class="span4 disabled" value="<?php echo $recetaInfo->NOMBRE_PACIENTE ?>" disabled="">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->	


                                    <div class="widget widget-table action-table">
                                        <div class="widget-header"> <i class="icon-th-list"></i>
                                            <h3>Detalle de la Receta</h3>
                                        </div>
                                        <!-- /widget-header -->
                                        <div class="widget-content">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th> Nombre Medicamento </th>
                                                        <th> Cantidad</th>
                                                        <th> Dosis</th>
                                                        <th> Existencias</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($recetaMedica) {
                                                        foreach ($recetaMedica as $medicamento) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $medicamento['NOMBRE_MEDICAMENTO']; ?></td>
                                                                <td><?php echo $medicamento['CANTIDAD']; ?></td>
                                                                <td><?php echo $medicamento['DOSIS']; ?></td>
                                                                 <td><?php echo $medicamento['CANTIDAD_ACTUAL']; ?></td>
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


                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Despachar Medicamentos</button> 
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







