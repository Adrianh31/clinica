<div class="row">

    <div class="span12">            

        <div class="widget ">

            <div class="widget-header">
                <i class="icon-calendar"></i>
                <h3>Nuevo Medicamento</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">

                <div class="active">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="#formcontrols" data-toggle="tab">Datos del Medicamento</a>
                        </li>
                    </ul>

                    <br>

                    <div class="tab-content">
                        <div class="tab-pane active" id="formcontrols">

                            <?php
                            echo $custom_message;
                            echo $this->session->flashdata('custom_message');
                            ?>

                            <form action="<?php echo base_url('medicamento/nuevoMedicamento') ?>" method="post" class="form-horizontal">
                                <fieldset>


                                    <div class="control-group">                                         
                                        <label class="control-label" for="NOMBRE">Nombre* </label>
                                        <div class="controls">
                                            <input class="span3 disabled" size="16" type="text" value="<?php echo set_value('NOMBRE') ?>" name="NOMBRE" id="NOMBRE" >	
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->    

                                    <div class="control-group">                                         
                                        <label class="control-label" for="CASA_FARMACEUTICA">Casa Farmaceutica* </label>
                                        <div class="controls">
                                            <input class="span3 disabled" size="16" type="text" value="<?php echo set_value('CASA_FARMACEUTICA') ?>" name="CASA_FARMACEUTICA" id="CASA_FARMACEUTICA" >	
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->    


                                    <div class="control-group">                                         
                                        <label class="control-label" for="CODIGO">Codigo*</label>
                                        <div class="controls">
                                            <input class="span3 disabled" size="16" type="text" value="<?php echo set_value('CODIGO') ?>" name="CODIGO" id="CODIGO" >	
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->    

                                    <div class="control-group">                                         
                                        <label class="control-label" for="PRESENTACION">Presentacion *</label>
                                        <div class="controls">
                                            <input class="span3 disabled" size="16" type="text" value="<?php echo set_value('PRESENTACION') ?>" name="PRESENTACION" id="PRESENTACION" >	
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group --> 


                                    <div class="control-group">                                         
                                        <label class="control-label" for="DESCRIPCION">Descripcion </label>
                                        <div class="controls">
                                            <input class="span3 disabled" size="16" type="text" value="<?php echo set_value('DESCRIPCION') ?>" name="DESCRIPCION" id="DESCRIPCION" >	
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->    



                                    <div class="control-group">                                         
                                        <label class="control-label" for="CANTIDAD_ACTUAL">Cantidad Actual (Unidades) *</label>
                                        <div class="controls">
                                            <input class="span3 disabled" size="16" type="text" value="<?php echo set_value('CANTIDAD_ACTUAL') ?>" name="CANTIDAD_ACTUAL" id="CANTIDAD_ACTUAL" >	
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->                                        

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Guardar Medicamento</button> 
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







