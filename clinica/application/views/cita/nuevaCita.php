<div class="row">

    <div class="span12">            

        <div class="widget ">

            <div class="widget-header">
                <i class="icon-calendar"></i>
                <h3>Nueva Cita</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">



                <div class="active">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="#formcontrols" data-toggle="tab">Datos de la Cita</a>
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
                    <label class="control-label" for="start">Paciente</label>
                    <div class="controls">
                        <input type="text" class="span6" name="ID_PACIENTE" id="ID_PACIENTE" />
                    </div> <!-- /controls -->               
                </div> <!-- /control-group -->

				
                <div class="control-group">                                         
                    <label class="control-label" for="start">Especialidad</label>
                    <div class="controls">
					
<select class="form-control span6" name="ID_ESPECIALIDAD" id="ID_ESPECIALIDAD">
  <option>General</option>
  <option>Odontologico</option>
</select>					
				
                    </div> <!-- /controls -->               
                </div> <!-- /control-group -->                


				
							
		
                <div class="control-group">                                         
                    <label class="control-label" for="FECHA_INICIO">Fecha Inicio</label>
                    <div class="controls">
					

  <div id="datetimepicker1" class="input-append date">
    <input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
  </div>
  <input id="test" type="text" />

<script type="text/javascript">

  $(function() {
    $('#test').datetimepicker({
      //language: 'pt-BR'
    });
  });
</script>
					
					
</div>					
					
                    </div> <!-- /controls -->               
                </div> <!-- /control-group -->

                <div class="control-group">                                         
                    <label class="control-label" for="FECHA_FIN">Fecha Fin</label>
                    <div class="controls">
				<div class="input-append date" id="dp3" data-date="2014-07-11" data-date-format="yyyy-mm-dd">
  <input class="span3" size="16" type="text" value="2014-07-11" name="FECHA_FIN" id="FECHA_FIN">
  <span class="add-on"><i class="icon-th"></i></span>
</div>	
                    </div> <!-- /controls -->               
                </div> <!-- /control-group -->                


                <div class="control-group">                                         
                    <label class="control-label" for="MOTIVO">Motivo</label>
                    <div class="controls">
                        <input type="text" class="span6" name="MOTIVO" id="MOTIVO"/>
                    </div> <!-- /controls -->               
                </div> <!-- /control-group -->				
			
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Crear Cita</button> 
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


		