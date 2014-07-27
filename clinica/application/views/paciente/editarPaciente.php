<?php
echo $custom_message;
echo $this->session->flashdata('custom_message');
$idPaciente = url_base64_encode($paciente->ID_PACIENTE);
?>

<form action="<?php echo base_url('paciente/editarPaciente/' . $idPaciente) ?>" method="post" class="form-horizontal">
    <fieldset>

        <?php echo form_hidden('ID_PACIENTE', $idPaciente); ?>

        <div class="control-group">                                         
            <label class="control-label" for="NOMBRE">Nombre *</label>
            <div class="controls">
                <input id="NOMBRE" type="text" class="span6" name="NOMBRE" value="<?php echo $paciente->NOMBRE ?>"  />

            </div> <!-- /controls -->               
        </div> <!-- /control-group -->


        <div class="control-group">                                         
            <label class="control-label" for="APELLIDO">Apellido *</label>
            <div class="controls">
                <input id="APELLIDO" type="text" class="span6" name="APELLIDO" value="<?php echo $paciente->APELLIDO ?>"  />
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->


        <div class="control-group">                                         
            <label class="control-label" for="FECHA_NACIMIENTO">Fecha de Nacimiento *</label>
            <div class="controls">
                <input id="FECHA_NACIMIENTO" type="text" name="FECHA_NACIMIENTO" class="span6 fechaNacimiento" value="<?php echo $paciente->FECHA_NACIMIENTO ?>" readonly="readonly"  />
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->





        <div class="control-group">                                         
            <label class="control-label">Sexo *</label>
            <div class="controls">
                <label class="radio inline">
                    <input type="radio"  name="SEXO" value="Masculino"  <?php echo ($paciente->SEXO == 'Masculino') ? 'checked' : '' ?> >  Masculino
                </label>

                <label class="radio inline">
                    <input type="radio" name="SEXO" value="Femenino"  <?php echo ($paciente->SEXO == 'Femenino') ? 'checked' : '' ?>> Femenino
                </label>
            </div>    <!-- /controls -->          
        </div> <!-- /control-group -->



        <div class="control-group">                                         
            <label class="control-label" for="DIRECCION">Direccion *</label>
            <div class="controls">
                <input id="DIRECCION" type="text" class="span6" name="DIRECCION" value="<?php echo $paciente->DIRECCION ?>"  />
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->                

        <div class="control-group">                                         
            <label class="control-label" for="OCUPACION">Ocupacion </label>
            <div class="controls">
                <input id="DIRECCION" type="text" class="span6" name="OCUPACION" value="<?php echo $paciente->OCUPACION ?>"  />
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->                



        <div class="control-group">                                         
            <label class="control-label" for="NOMBRE_PADRE">Nombre Padre/Madre </label>
            <div class="controls">
                <input id="NOMBRE_PADRE" type="text" class="span6" name="NOMBRE_PADRE" value="<?php echo $paciente->NOMBRE_PADRE ?>"  />

            </div> <!-- /controls -->               
        </div> <!-- /control-group -->                




        <div class="control-group">                                         
            <label class="control-label" for="RELIGION_PERTENECE">Religion Pertenece </label>
            <div class="controls">
                <input id="RELIGION_PERTENECE" type="text" class="span6" name="RELIGION_PERTENECE" value="<?php echo $paciente->RELIGION_PERTENECE; ?>"  />
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->                


        <div class="control-group">                                         
            <label class="control-label" for="TELEFONO_FIJO">Telefono</label>
            <div class="controls">
                <input id="TELEFONO_FIJO" type="text" class="span6" name="TELEFONO" value="<?php echo $paciente->TELEFONO; ?>"  />
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->                


        <div class="control-group">                                         
            <label class="control-label" for="CORREO_ELECTRONICO">Correo Electronico </label>
            <div class="controls">
                <input id="CORREO_ELECTRONICO" type="text" class="span6" name="CORREO_ELECTRONICO" value="<?php echo $paciente->CORREO_ELECTRONICO; ?>"  />
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->                                                    



        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Actualizar Paciente</button> 
            <a href="#" class="btn">Cancelar</a>

            <?php if (validarRoles($this->session->userdata('roles'), 'Medico') == TRUE) { ?>
            <a href="<?php echo base_url('consulta/nuevaConsulta/'.$idPaciente)?>" class="btn btn-success" style=" float: right;">Crear Nueva Consulta</a>
            <?php }
            ?>

        </div> <!-- /form-actions -->


    </fieldset>

</form>