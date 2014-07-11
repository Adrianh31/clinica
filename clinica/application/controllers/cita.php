<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cita extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('codegen_model', '', TRUE);
        $this->load->model('cita_model');
        $this->data['seccion'] = 'cita';
    }

    public function nuevaCita() {
		$this->data['custom_message'] = '';	
        $this->data['contenido'] = 'cita/nuevaCita';
        $this->load->view('template/template', $this->data);
    }

    public function verAgenda() {
        $this->data['contenido'] = 'cita/verAgenda';
        $this->load->view('template/template', $this->data);
    }

    public function getCitas() {
        $citas = $this->cita_model->getCitasDAO();
        echo json_encode($citas);
    }

    public function actualizarCita() {

        $idCita = $this->input->post('id');
        $data = array(
            'FECHA_INICIO' => $this->input->post('start'),
            'FECHA_FIN' => $this->input->post('end')
        );

        if ($this->codegen_model->edit('cita', $data, 'ID_CITA', $idCita) == TRUE) {
            echo "Actualizada";
        } else {
            echo "Error";
        }
    }

}
