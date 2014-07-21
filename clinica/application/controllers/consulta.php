<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Consulta extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('consulta_model');
        $this->load->model('paciente_model');
        $this->load->model('receta_model');
        $this->data['seccion'] = 'paciente';

        //-----------INFO USER -------------//
        $this->roles = $this->session->userdata('roles');
        $this->idPersona = $this->session->userdata('idPersona');
        $this->idEspecialidad = $this->session->userdata('idEspecialidad');
        //-----------INFO USER -------------//        
    }

    public function nuevaConsulta($idPaciente) {

        if (!$idPaciente) {
            redirect('paciente/nuevoPaciente');
        } else {
            $idPaciente = url_base64_decode($idPaciente);
            $paciente = $this->paciente_model->getPaciente($idPaciente);
            if (!$paciente) {
                redirect('paciente/nuevoPaciente');
            }
        }

        $this->data['custom_message'] = '';
        if ($this->form_validation->run('consulta') == false) {
            $this->data['custom_message'] = (validation_errors() ? '<div class="alert">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'ID_EMPLEADO' => $this->idPersona,
                'ID_EXPEDIENTE' => $paciente->ID_EXPEDIENTE,
                'OBSERVACIONES' => set_value('OBSERVACIONES'),
                'DIAGNOSTICO' => set_value('DIAGNOSTICO'),
                'FECHA_INICIO' => date("Y-m-d H:i:s"),
                'FECHA_FIN' => date("Y-m-d H:i:s"),
                'TEMPERATURA' => set_value('TEMPERATURA'),
                'PESO' => set_value('PESO'),
                'PULSO' => set_value('PULSO'),
                'TALLA' => set_value('TALLA'),
                'TA' => set_value('TA'),
                'ESTADO' => 1,
            );

            $idConsulta = $this->consulta_model->nuevaConsulta($data);
            if ($idConsulta > 0) {
                $this->session->set_flashdata('custom_message', '<div class="alert alert-success"><p>Consulta Creada Exitosamente!!!</p></div>');
                //guardar receta medica
                $this->receta_model->nuevaReceta($this->input->post(), $idConsulta);
                redirect(current_url());
            } else {
                $this->data['custom_message'] = '<div class="alert"><p>An Error Occured.</p></div>';
            }
        }

        $this->data['paciente'] = $paciente;
        $this->data['idPaciente'] = $idPaciente;
        $this->data['listaConsultas'] = $this->consulta_model->listaConsultas($paciente->ID_EXPEDIENTE);
        $this->data['contenido'] = 'consulta/nuevaConsulta';
        $this->data['pestania'] = 'consulta';
        $this->load->view('template/template', $this->data);
    }

    public function verConsulta($idConsulta) {
        $idConsulta = url_base64_decode($idConsulta);
        $consulta = $this->consulta_model->getConsulta($idConsulta);
        if ($consulta) {
            $this->data['paciente'] = $this->paciente_model->getPaciente($consulta->ID_PACIENTE);
            $this->data['consulta'] =$consulta;
            $this->data['recetaMedica']=$this->receta_model->getReceta($idConsulta);
            $this->data['contenido'] = 'consulta/verConsulta';
            $this->data['pestania'] = 'consulta';
            $this->load->view('template/template', $this->data);
        } else {
          //  redirect('panel');
        }
    }

}
