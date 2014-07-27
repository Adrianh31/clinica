<div class="row">

    <div class="span12">            

        <div class="widget ">

            <div class="widget-header">
                <i class="icon-calendar"></i>
                <h3>Nuevo Pago</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">

                <div class="active">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="#formcontrols" data-toggle="tab">Datos del nuevo Pago</a>
                        </li>
                    </ul>

                    <br>

                    <div class="tab-content">
                        <div class="tab-pane active" id="formcontrols">

                            <?php
                            echo $custom_message;
                            echo $this->session->flashdata('custom_message');
                            ?>

                            <form action="<?php echo base_url('pago/nuevoPago/' . url_base64_encode($idConsulta)) ?>" method="post" class="form-horizontal">
                                <fieldset>

                                    <?php echo form_hidden('ID_CONSULTA', $idConsulta); ?>

                                    <div class="control-group">                                         
                                        <label class="control-label" for="FECHA">Paciente </label>
                                        <div class="controls">
                                            <input class="span3 disabled" size="16" type="text" value="<?php //echo $pago->NOMBRE_PACIENTE;   ?>" name="NOMBRE_PACIENTE" id="NOMBRE_PACIENTE" readonly="readonly">	
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->    

                                    <div class="control-group">                                         
                                        <label class="control-label" for="PRECIO">Precio Consulta *</label>
                                        <div class="controls">
                                            <input type="text" class="span3" value="<?php echo set_value('PRECIO'); ?>" name="PRECIO" id="PRECIO">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->         


                                    <div class="control-group">                                         
                                        <label class="control-label">Exonerado *</label>
                                        <div class="controls">
                                            <label class="radio inline">
                                                <input type="radio"  name="EXONERADO" value="1">  Exento de Pago
                                            </label>

                                            <label class="radio inline">
                                                <input type="radio" name="EXONERADO" value="0"> NO Exonerado
                                            </label>
                                        </div>    <!-- /controls -->          
                                    </div> <!-- /control-group -->               


                                    <div class="control-group">                                         
                                        <label class="control-label" for="OBSERVACIONES">Observaciones </label>
                                        <div class="controls">
                                            <input type="text" class="span6" name="OBSERVACIONES" id="OBSERVACIONES" value="<?php echo set_value('OBSERVACIONES'); ?>"/>
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->				

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Crear Pago</button> 
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







