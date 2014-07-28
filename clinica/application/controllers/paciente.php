<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paciente extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('consulta_model');
        $this->load->model('paciente_model');
        $this->data['seccion'] = 'paciente';
    }

    public function nuevoPaciente() {
        $this->data['custom_message'] = '';

        if ($this->form_validation->run('paciente') == false) {
            $this->data['custom_message'] = (validation_errors() ? '<div class="alert">' . validation_errors() . '</div>' : false);
        } else {
            $paciente = array(
                'NOMBRE' => set_value('NOMBRE'),
                'APELLIDO' => set_value('APELLIDO'),
                'FECHA_NACIMIENTO' => set_value('FECHA_NACIMIENTO'),
                'SEXO' => set_value('SEXO'),
                'DIRECCION' => set_value('DIRECCION'),
                'OCUPACION' => set_value('OCUPACION'),
                'NOMBRE_PADRE' => set_value('NOMBRE_PADRE'),
                'RELIGION_PERTENECE' => set_value('RELIGION_PERTENECE'),
                'TELEFONO' => set_value('TELEFONO'),
                'CORREO_ELECTRONICO' => set_value('CORREO_ELECTRONICO')
            );

            if ($this->paciente_model->nuevoPaciente($paciente) == TRUE) {
                $this->session->set_flashdata('custom_message', '<div class="alert alert-success"><p>Paciente Guardado Exitosamente!!!</p></div>');
                redirect(current_url());
            } else {
                $this->data['custom_message'] = '<div class="alert"><p>An Error Occured.</p></div>';
            }
        }

        $this->data['contenido'] = 'paciente/nuevoPaciente';
        $this->load->view('template/template', $this->data);
    }

    public function editarPaciente($idPaciente) {

        if (!$idPaciente) {
            redirect('paciente/nuevoPaciente');
        } else {
            $idPaciente = url_base64_decode($idPaciente);
        }

        $this->data['custom_message'] = '';

        if ($this->form_validation->run('paciente') == false) {
            $this->data['custom_message'] = (validation_errors() ? '<div class="alert">' . validation_errors() . '</div>' : false);
        } else {
            $paciente = array(
                'NOMBRE' => $this->input->post('NOMBRE'),
                'APELLIDO' => $this->input->post('APELLIDO'),
                'FECHA_NACIMIENTO' => $this->input->post('FECHA_NACIMIENTO'),
                'SEXO' => $this->input->post('SEXO'),
                'DIRECCION' => $this->input->post('DIRECCION'),
                'NOMBRE_PADRE' => $this->input->post('NOMBRE_PADRE'),
                'RELIGION_PERTENECE' => $this->input->post('RELIGION_PERTENECE'),
                'TELEFONO' => $this->input->post('TELEFONO'),
                'OCUPACION' => $this->input->post('OCUPACION'),
                'CORREO_ELECTRONICO' => $this->input->post('CORREO_ELECTRONICO')
            );

            if ($this->paciente_model->editarPaciente($paciente, $idPaciente) == TRUE) {
                $this->session->set_flashdata('custom_message', '<div class="alert alert-success"><p>Paciente Actulizado Exitosamente!!!</p></div>');
                redirect(current_url());
            } else {
                $this->data['custom_message'] = '<div class="alert"><p>An Error Occured.</p></div>';
            }
        }

        $this->data['contenido'] = 'paciente/expediente/verExpediente';
        $this->data['pestania'] = 'paciente';
        $this->data['idPaciente'] = $idPaciente;
        $this->data['paciente'] = $this->paciente_model->getPaciente($idPaciente);
        $this->load->view('template/template', $this->data);
    }

    public function verExpediente($idPaciente) {
        $this->data['custom_message'] = '';
        $this->data['result'] = $this->codegen_model->get('paciente', 'ID_PACIENTE,NOMBRE,APELLIDO,FECHA_NACIMIENTO,SEXO,DIRECCION,NOMBRE_PADRE,RELIGION_PERTENECE,TELEFONO_FIJO,TELEFONO_MOVIL,CORREO_ELECTRONICO', 'ID_PACIENTE = ' . $this->uri->segment(3), 1, 0, true);
        $this->data['tiposConsulta'] = $this->consulta_model->getTiposConsulta();

        $this->data['contenido'] = 'paciente/expediente/verExpediente';

        /*
          echo "<pre>";
          print_r($this->data);
          echo "</pre>"; */

        $this->load->view('template/template', $this->data);
    }

    public function buscarPaciente() {
        $this->data['custom_message'] = '';
        $this->data['pacientes'] = '';
        $buscar = $this->input->post('buscar');
        if ($buscar) {
            $pacientes = $this->paciente_model->buscarPaciente($buscar);
            if ($pacientes) {
                $this->data['pacientes'] = $pacientes;
                $this->data['custom_message'] = '<div class="alert alert-success">Resultado para la Busqueda ' . $buscar . '</div>';
            } else {
                $this->data['custom_message'] = '<div class="alert">No hay resultados para la Busqueda ' . $buscar . '</div>';
            }
        } else {
            
        }
        $this->data['contenido'] = 'paciente/buscarPaciente';
        $this->load->view('template/template', $this->data);
    }

    public function buscarPacienteAuto() {
        $filtro = $this->input->post('query');
        $listaPacientes = false;
        if ($filtro) {
            $listaPacientes = $this->paciente_model->buscarPacienteAuto($filtro);
        }
        echo json_encode($listaPacientes);
    }

}
