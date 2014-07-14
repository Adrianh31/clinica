<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index() {

        $this->data['custom_message'] = '';
        if ($this->form_validation->run('login') == false) {
            $this->data['custom_message'] = (validation_errors() ? '<div class="alert">' . validation_errors() . '</div>' : false);
        } else {
            //validar login
            $usuario = $this->input->post('USUARIO');
            $password = $this->input->post('PASSWORD');
            if ($this->login_model->validarLoginEmpleado($usuario, $password) == TRUE) {
                redirect('panel/panel');
            } else {
                $this->data['custom_message'] = '<div class="alert alert-error"><p>Credenciales Incorrectas.</p></div>';
            }
        }

        $this->load->view('login/login', $this->data);
    }

    public function salir() {
        $this->session->sess_destroy();
        redirect('login');
    }

}
