<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->view('login/login');
    }

    public function salir() {
        redirect('login');
    }
    
    
    public function ingresar(){
        redirect('paciente/nuevoPaciente');
    }
    

}
