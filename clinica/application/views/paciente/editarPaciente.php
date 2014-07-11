<?php
echo $custom_message;
echo $this->session->flashdata('custom_message');
?>

<form action="<?php echo base_url('paciente/editarPaciente/'.$result->ID_PACIENTE)?>" method="post" class="form-horizontal">
    <fieldset>
        
        <?php echo form_hidden('ID_PACIENTE',$result->ID_PACIENTE) ?>

        <div class="control-group">                                         
            <label class="control-label" for="NOMBRE">Nombre *</label>
            <div class="controls">
                <input id="NOMBRE" type="text" class="span6" name="NOMBRE" value="<?php echo $result->NOMBRE ?>"  />

            </div> <!-- /controls -->               
        </div> <!-- /control-group -->


        <div class="control-group">                                         
            <label class="control-label" for="APELLIDO">Apellido *</label>
            <div class="controls">
                <input id="APELLIDO" type="text" class="span6" name="APELLIDO" value="<?php echo $result->APELLIDO ?>"  />

            </div> <!-- /controls -->               
        </div> <!-- /control-group -->

        <div class="control-group">                                         
            <label class="control-label" for="FECHA_NACIMIENTO">Fecha de Nacimiento *</label>
            <div class="controls">
                <input id="FECHA_NACIMIENTO" type="text" name="FECHA_NACIMIENTO" class="span6" value="<?php echo $result->FECHA_NACIMIENTO ?>"  />

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
                <input id="DIRECCION" type="text" class="span6" name="DIRECCION" value="<?php echo $result->DIRECCION ?>"  />

            </div> <!-- /controls -->               
        </div> <!-- /control-group -->                





        <div class="control-group">                                         
            <label class="control-label" for="NOMBRE_PADRE">Nombre Padre/Madre </label>
            <div class="controls">
                <input id="NOMBRE_PADRE" type="text" class="span6" name="NOMBRE_PADRE" value="<?php echo $result->NOMBRE_PADRE ?>"  />

            </div> <!-- /controls -->               
        </div> <!-- /control-group -->                




        <div class="control-group">                                         
            <label class="control-label" for="RELIGION_PERTENECE">Religion Pertenece </label>
            <div class="controls">
                <input id="RELIGION_PERTENECE" type="text" class="span6" name="RELIGION_PERTENECE" value="<?php echo $result->RELIGION_PERTENECE; ?>"  />
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->                





        <div class="control-group">                                         
            <label class="control-label" for="TELEFONO_FIJO">Telefono Fijo </label>
            <div class="controls">
                <input id="TELEFONO_FIJO" type="text" class="span6" name="TELEFONO_FIJO" value="<?php echo $result->TELEFONO_FIJO; ?>"  />
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->                





        <div class="control-group">                                         
            <label class="control-label" for="TELEFONO_FIJO">Telefono Movil </label>
            <div class="controls">
                <input id="TELEFONO_MOVIL" type="text" class="span6" name="TELEFONO_MOVIL" value="<?php echo $result->TELEFONO_MOVIL; ?>"  />
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->                                                    





        <div class="control-group">                                         
            <label class="control-label" for="CORREO_ELECTRONICO">Correo Electronico </label>
            <div class="controls">
                <input id="CORREO_ELECTRONICO" type="text" class="span6" name="CORREO_ELECTRONICO" value="<?php echo $result->CORREO_ELECTRONICO; ?>"  />
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->                                                    



        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Actualizar Paciente</button> 
            <a href="#" class="btn">Cancelar</a>
        </div> <!-- /form-actions -->


    </fieldset>

</form>