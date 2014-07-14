<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pago extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->data['seccion'] = 'pago';
    }

    public function pagosPendientes() {
        $this->data['custom_message'] = '';
        $this->data['contenido'] = 'pago/pagosPendientes';
        $this->load->view('template/template', $this->data);
    }

    public function verPagos() {
        $this->data['custom_message'] = '';
        $this->data['contenido'] = 'pago/verPagos';
        $this->load->view('template/template', $this->data);
    }

}
