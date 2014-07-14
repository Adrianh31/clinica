<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Historial extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->data['seccion'] = 'paciente';
        $this->load->model('consulta_model');
        $this->load->model('paciente_model');
    }

    public function index($idPaciente) {
        $this->data['idPaciente'] = url_base64_decode($idPaciente);
        $this->data['contenido'] = 'paciente/expediente/verExpediente';
        $this->data['pestania'] = 'historial';
        $this->load->view('template/template', $this->data);
    }

    public function verHistorial($idPaciente) {
        $idPaciente = url_base64_decode($idPaciente);
        $this->data['idPaciente'] = $idPaciente;
        $paciente = $this->paciente_model->getPaciente($idPaciente);
        if (!$paciente) {
            redirect('paciente/NuevoPaciente');
        }
        $this->data['listaConsultas'] = $this->consulta_model->listaConsultas($paciente->ID_EXPEDIENTE);
        $this->data['contenido'] = 'paciente/expediente/verExpediente';
        $this->data['pestania'] = 'historial';
        $this->load->view('template/template', $this->data);
    }

}
