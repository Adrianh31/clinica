<div class="row">

    <div class="span12">            

        <div class="widget ">

            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Nuevo Paciente</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">



                <div class="active">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="#formcontrols" data-toggle="tab">Datos del Paciente</a>
                        </li>
                    </ul>

                    <br>

                    <div class="tab-content">
                        <div class="tab-pane active" id="formcontrols">



                            <?php
                            echo $custom_message;
                            echo $this->session->flashdata('custom_message');
                            ?>

                            <form action="" method="post" class="form-horizontal">
                                <fieldset>

                                    <div class="control-group">                                         
                                        <label class="control-label" for="NOMBRE">Nombre *</label>
                                        <div class="controls">
                                            <input id="NOMBRE" type="text" class="span6" name="NOMBRE" value="<?php echo set_value('NOMBRE'); ?>"  />

                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->


                                    <div class="control-group">                                         
                                        <label class="control-label" for="APELLIDO">Apellido *</label>
                                        <div class="controls">
                                            <input id="APELLIDO" type="text" class="span6" name="APELLIDO" value="<?php echo set_value('APELLIDO'); ?>"  />

                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->

                                    <div class="control-group">                                         
                                        <label class="control-label" for="FECHA_NACIMIENTO">Fecha de Nacimiento *</label>
                                        <div class="controls">
                                            <input id="FECHA_NACIMIENTO" type="text" name="FECHA_NACIMIENTO" class="span6 fechaNacimiento" value="<?php echo set_value('FECHA_NACIMIENTO'); ?>" readonly="readonly" />

                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->





                                    <div class="control-group">                                         
                                        <label class="control-label">Sexo *</label>
                                        <div class="controls">
                                            <label class="radio inline">
                                                <input type="radio"  name="SEXO" value="Masculino">  Masculino
                                            </label>

                                            <label class="radio inline">
                                                <input type="radio" name="SEXO" value="Femenino"> Femenino
                                            </label>
                                        </div>    <!-- /controls -->          
                                    </div> <!-- /control-group -->



                                    <div class="control-group">                                         
                                        <label class="control-label" for="DIRECCION">Direccion *</label>
                                        <div class="controls">
                                            <input id="DIRECCION" type="text" class="span6" name="DIRECCION" value="<?php echo set_value('DIRECCION'); ?>"  />
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->                


                                    <div class="control-group">                                         
                                        <label class="control-label" for="OCUPACION">Ocupacion </label>
                                        <div class="controls">
                                            <input id="DIRECCION" type="text" class="span6" name="OCUPACION" value="<?php echo set_value('OCUPACION'); ?>"  />
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->                                                    




                                    <div class="control-group">                                         
                                        <label class="control-label" for="NOMBRE_PADRE">Nombre Padre/Madre </label>
                                        <div class="controls">
                                            <input id="NOMBRE_PADRE" type="text" class="span6" name="NOMBRE_PADRE" value="<?php echo set_value('NOMBRE_PADRE'); ?>"  />
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->                




                                    <div class="control-group">                                         
                                        <label class="control-label" for="RELIGION_PERTENECE">Religion Pertenece </label>
                                        <div class="controls">
                                            <input id="RELIGION_PERTENECE" type="text" class="span6" name="RELIGION_PERTENECE" value="<?php echo set_value('RELIGION_PERTENECE'); ?>"  />
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->                





                                    <div class="control-group">                                         
                                        <label class="control-label" for="TELEFONO">Telefono </label>
                                        <div class="controls">
                                            <input id="TELEFONO_FIJO" type="text" class="span6" name="TELEFONO" value="<?php echo set_value('TELEFONO_FIJO'); ?>"  />
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->                



                                    <div class="control-group">                                         
                                        <label class="control-label" for="CORREO_ELECTRONICO">Correo Electronico </label>
                                        <div class="controls">
                                            <input id="CORREO_ELECTRONICO" type="text" class="span6" name="CORREO_ELECTRONICO" value="<?php echo set_value('CORREO_ELECTRONICO'); ?>"  />
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->                                                    



                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Guardar Paciente</button> 
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