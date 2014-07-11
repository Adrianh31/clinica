<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Consulta extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->data['seccion'] = 'paciente';
    }

    public function nuevaConsulta($idPaciente) {
        $this->data['custom_message'] = '';

        if ($this->form_validation->run('consulta') == false) {
            $this->data['custom_message'] = (validation_errors() ? '<div class="alert">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'ID_EMPLEADO' => 1,
                'ID_TIPO_CONSULTA' => set_value('APELLIDO'),
                'OBSERVACIONES' => set_value('FECHA_NACIMIENTO'),
                'ID_EMPLEADO' => 1,
                'FECHA_INICIO' => date('Y-m-d H:i:s'),
                'FECHA_FIN' => date('Y-m-d H:i:s')
            );

            if ($this->codegen_model->add('consulta', $data) == TRUE) {
                $this->session->set_flashdata('custom_message', '<div class="alert-success"><p>Paciente Guardado Exitosamente!!!</p></div>');
                redirect(current_url());
            } else {
                $this->data['custom_message'] = '<div class="alert"><p>An Error Occured.</p></div>';
            }
        }

        $this->data['contenido'] = 'paciente/expediente/verExpediente';
        $this->data['pestania'] = 'consulta';
        $this->load->view('template/template', $this->data);
    }

}
