<div class="row">

    <div class="span12">            

        <div class="widget ">

            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Editar Paciente</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">



                <div class="active">
                    <ul class="nav nav-tabs">
                        <li class="<?php echo ($pestania == 'paciente') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url('paciente/editarPaciente/1') ?>">Datos del Paciente</a>
                        </li>
                        <li class="<?php echo ($pestania == 'historial') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url('historial/verHistorial/1') ?>">Evolucion Paciente</a>
                        </li>                        
                        <li class="<?php echo ($pestania == 'consulta') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url('consulta/nuevaConsulta/1') ?>">Nueva Consulta</a>
                        </li>
                    </ul>

                    <br>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tabactive">
                            <?php
                            if ($pestania == 'paciente') {
                                $this->load->view('paciente/editarPaciente');
                            } elseif ($pestania == 'historial') {
                                $this->load->view('paciente/expediente/historial');
                            } elseif ($pestania == 'consulta') {
                                $this->load->view('paciente/expediente/consulta');
                            }
                            ?>
                        </div>                        
                    </div>
                </div> <!-- /widget-content -->
            </div> <!-- /widget -->
        </div> <!-- /span8 -->
    </div> <!-- /row -->
	    </div> <!-- /row -->