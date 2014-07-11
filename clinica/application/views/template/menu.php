<div class="subnavbar">

    <div class="subnavbar-inner">

        <div class="container">

            <ul class="mainnav">    

                <li>
                    <a href="index.html">
                        <i class="icon-dashboard"></i>
                        <span>Panel</span>
                    </a>                        
                </li>


                <li class="dropdown <?php echo ($seccion=='paciente')?'active':'';?>">                 
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-user"></i>
                        <span>Pacientes</span>
                    </a>                         

                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('paciente/nuevoPaciente');?>">Nuevo Paciente</a></li>
                        <li><a href="<?php echo base_url('paciente/editarPaciente');?>/1">Buscar Paciente</a></li>
                    </ul>  
                </li>

                <li class="dropdown <?php echo ($seccion=='cita')?'active':'';?>">                   
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-calendar"></i>
                        <span>Citas</span>
                        <b class="caret"></b>
                    </a>    

                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('cita/nuevaCita')?>">Nueva Cita</a></li>
                        <li><a href="<?php echo base_url('cita/verAgenda')?>">Ver Agenda</a></li>
                    </ul>                   
                </li>

            </ul>

        </div> <!-- /container -->

    </div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->