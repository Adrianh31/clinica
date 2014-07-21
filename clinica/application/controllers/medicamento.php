<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Medicamento extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('medicamento_model');
        $this->data['seccion'] = 'medicamento';
    }

    public function despacharReceta() {
        $this->data['custom_message'] = '';
        $this->data['contenido'] = 'medicamento/despacharReceta';
        $this->load->view('template/template', $this->data);
    }

    public function verMedicamentos() {
        $this->data['custom_message'] = '';
        $this->data['contenido'] = 'medicamento/verMedicamentos';
        $this->load->view('template/template', $this->data);
    }

    public function cargarMedicamentos() {
        $this->data['custom_message'] = '';
        $this->data['contenido'] = 'medicamento/cargarMedicamentos';
        $this->load->view('template/template', $this->data);
    }

    public function buscarMedicamentos() {
        $filtro = $this->input->post('query');
        $listaMedicamentos = false;
        if ($filtro) {
            $listaMedicamentos = $this->medicamento_model->buscarMedicamento($filtro);        
        }
        echo json_encode($listaMedicamentos);
       
    }

}
