<?php
echo $custom_message;
echo $this->session->flashdata('custom_message');
?>


<div class="controls" style="margin-bottom: 20px;">
													 <!-- Button to trigger modal -->
                                                    <a href="#myModal" role="button" class="btn" data-toggle="modal">Crear Receta Medica</a>
													
													 <!-- Button to trigger modal -->
                                                    <a href="#myModal" role="button" class="btn" data-toggle="modal">Crear Examen Medico</a>
													
													
                                                     
                                                    <!-- Modal -->
                                                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h3 id="myModalLabel">Nueva Receta Medica</h3>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p></p>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                        <button class="btn btn-primary">Guardar Receta</button>
                                                      </div>
                                                    </div>
												</div>


<form action="<?php echo base_url('consulta/editarPaciente/')?>" method="post" class="form-horizontal">
    <fieldset>
        
		
        <div class="control-group">                                         
            <label class="control-label" for="OBSERVACIONES">Nombre Medico</label>
            <div class="controls">
                <input type="text" class="span6 disabled" id="username" value="Doctor 1" disabled="">
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->		
		
		
        <div class="control-group">                                         
            <label class="control-label" for="ID_TIPO_CONSULTA">Nombre Paciente</label>
            <div class="controls">
                <input type="text" class="span6 disabled" id="username" value="Paciente 1" disabled="">
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->

		
        <div class="control-group">                                         
            <label class="control-label" for="OBSERVACIONES">Observaciones</label>
            <div class="controls">
               <textarea class="form-control span6" rows="3" ></textarea>
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->




        <div class="control-group">                                         
            <label class="control-label" for="OBSERVACIONES">Diagnostico</label>
            <div class="controls">
               <textarea class="form-control span6" rows="3" ></textarea>
            </div> <!-- /controls -->               
        </div> <!-- /control-group -->
		
		
		<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Receta Medica</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Nombre Medicamento </th>
                    <th> Cantidad</th>
					<th> Dosis</th>
                    <th class="td-actions">Accciones </th>
                  </tr>
                </thead>
                <tbody>			  

                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
		
		

		
		<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Examenes Medicos</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Nombre Examen </th>
                    <th> Descripcion</th>
					<th> Fecha </th>
                    <th class="td-actions">Accciones </th>
                  </tr>
                </thead>
                <tbody>			  

                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>		
		
		
		
		

                                       <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Guardar Consulta</button> 
                                        <a href="#" class="btn">Cancelar</a>
                                    </div> <!-- /form-actions -->

    </fieldset>

</form>



		  
		  
		  
		  
		  

