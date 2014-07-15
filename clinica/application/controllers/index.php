<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index() {
        $this->data['contenido'] = 'index';
        $this->load->view('template/publico/template', $this->data);
    }

}
