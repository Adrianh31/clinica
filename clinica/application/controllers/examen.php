<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Examen extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('examen_model');
        $this->data['seccion'] = 'examen';
    }

    public function buscarExamenes() {
        $filtro = $this->input->post('query');
        $listaExamenes = false;
        if ($filtro) {
            $listaExamenes = $this->examen_model->buscarExamen($filtro);
        }
        echo json_encode($listaExamenes);
    }

}
