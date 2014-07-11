<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Historial extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->data['seccion'] = 'paciente';
    }


	public function index($idExpediente){
       $this->data['contenido'] = 'paciente/expediente/verExpediente';
       $this->data['pestania'] = 'historial';
       $this->load->view('template/template', $this->data);	
	}

    public function verHistorial($idExpediente) {
       $this->data['contenido'] = 'paciente/expediente/verExpediente';
       $this->data['pestania'] = 'historial';
       $this->load->view('template/template', $this->data);
    }


    

}
