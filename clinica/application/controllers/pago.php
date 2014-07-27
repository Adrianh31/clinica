<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pago extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->data['seccion'] = 'pago';
        $this->load->model('pago_model');

        //-----------INFO USER -------------//
        $this->roles = $this->session->userdata('roles');
        $this->idPersona = $this->session->userdata('idPersona');
        $this->idEspecialidad = $this->session->userdata('idEspecialidad');
        //-----------INFO USER -------------//         
    }

    public function nuevoPago($idConsulta) {
        if (!$idConsulta) {
            redirect('pago/pagosPendientes');
        }

        $idConsulta = base64_decode($idConsulta);

        $this->data['custom_message'] = '';
        if ($this->form_validation->run('pago') == false) {
            $this->data['custom_message'] = (validation_errors() ? '<div class="alert">' . validation_errors() . '</div>' : false);
        } else {

            $pago = array(
                'ID_CONSULTA' => $idConsulta,
                'ID_EMPLEADO' => $this->idPersona,
                'PRECIO' => set_value('PRECIO'),
                'EXONERADO' => set_value('EXONERADO'),
                'OBSERVACIONES' => set_value('OBSERVACIONES'),
                'FECHA_PAGO' => date('Y-m-d H:i:s')
            );

            if ($this->pago_model->nuevoPago($pago) > 0) {
                $this->session->set_flashdata('custom_message', '<div class="alert alert-success"><p>Pago Creado Exitosamente!!!</p></div>');
                redirect('pago/pagosPendientes');
            } else {
                $this->data['custom_message'] = '<div class="alert"><p>An Error Occured.</p></div>';
            }
        }


        $this->data['idConsulta'] = $idConsulta;
        $this->data['contenido'] = 'pago/nuevoPago';
        $this->load->view('template/template', $this->data);
    }

    public function pagosPendientes() {
        $this->data['custom_message'] = '';
        $this->data['listaPagosPendientes'] = $this->pago_model->listaPagosPendientes();
        $this->data['contenido'] = 'pago/pagosPendientes';
        $this->load->view('template/template', $this->data);
    }

    public function verPagos() {
        $this->data['custom_message'] = '';
        $this->data['listaPagosRealizados'] = $this->pago_model->listaPagosRealizados();
        $this->data['contenido'] = 'pago/verPagos';
        $this->load->view('template/template', $this->data);
    }

}
