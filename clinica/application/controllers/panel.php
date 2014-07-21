<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Panel extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('cita_model');
        $this->load->model('empleado_model');
        $this->data['seccion'] = 'panel';

        //-----------INFO USER -------------//
        $this->roles = $this->session->userdata('roles');
        $this->idPersona = $this->session->userdata('idPersona');
        $this->idEspecialidad = $this->session->userdata('idEspecialidad');
        //-----------INFO USER -------------//
    }

    public function index() {
        $this->data['custom_message'] = '';
        //validar Rol
        if (validarRoles($this->roles, 'Medico') == TRUE) {
            $this->data['listaCitas'] = $this->cita_model->listaCitasMedico("hoy", $this->idPersona);
            $this->data['contenido'] = 'panel/panelMedico';
        } else {
            $this->data['listaMedicos'] = $this->empleado_model->listaEmpleados("Medicos");
            $this->data['listaCitas'] = $this->cita_model->listaCitas("hoy");
            $this->data['contenido'] = 'panel/panelSecretaria';
        }

        $this->load->view('template/template', $this->data);
    }

}
