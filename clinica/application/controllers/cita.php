<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cita extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('codegen_model', '', TRUE);
        $this->load->model('cita_model');
        $this->load->model('especialidad_model');
        $this->load->model('paciente_model');
        $this->data['seccion'] = 'cita';
    }

    public function nuevaCita() {
        $this->data['custom_message'] = '';
        if ($this->form_validation->run('cita') == false) {
            $this->data['custom_message'] = (validation_errors() ? '<div class="alert">' . validation_errors() . '</div>' : false);
        } else {

            $fechaInicio = set_value('FECHA') . ' ' . set_value('HORA_INICIO');
            $fechaFin = set_value('FECHA') . ' ' . set_value('HORA_FIN');

            $cita = array(
                'ID_PACIENTE' => set_value('ID_PACIENTE'),
                'ID_ESPECIALIDAD' => set_value('ID_ESPECIALIDAD'),
                'FECHA_INICIO' => $fechaInicio,
                'FECHA_FIN' => $fechaFin,
                'MOTIVO' => set_value('MOTIVO')
            );

            if ($this->cita_model->nuevaCita($cita) == TRUE) {
                $this->session->set_flashdata('custom_message', '<div class="alert alert-success"><p>Cita Creada Exitosamente!!!</p></div>');
                redirect(current_url());
            } else {
                $this->data['custom_message'] = '<div class="alert"><p>An Error Occured.</p></div>';
            }
        }

        $citaDia = $this->session->flashdata('citaDia');
        $citaHora = $this->session->flashdata('citaHora');

        $this->data['citaDia'] = $citaDia;
        $this->data['citaHora'] = $citaHora;
        $this->data['listaEspecialidades'] = $this->especialidad_model->listaEspecialidades();
        $this->data['listaPacientes'] = $this->paciente_model->listaPacientes();
        $this->data['contenido'] = 'cita/nuevaCita';
        $this->load->view('template/template', $this->data);
    }

    public function editarCita() {

        $this->data['custom_message'] = '';
        $idCita = $this->session->flashdata('citaId');

        if ($this->form_validation->run('cita') == false) {
            $this->data['custom_message'] = (validation_errors() ? '<div class="alert">' . validation_errors() . '</div>' : false);
        } else {
            $idCita = $this->input->post('ID_CITA');
            $fechaInicio = $this->input->post('FECHA') . ' ' . $this->input->post('HORA_INICIO');
            $fechaFin = $this->input->post('FECHA') . ' ' . $this->input->post('HORA_FIN');

            $cita = array(
                'ID_PACIENTE' => $this->input->post('ID_PACIENTE'),
                'ID_ESPECIALIDAD' => $this->input->post('ID_ESPECIALIDAD'),
                'FECHA_INICIO' => $fechaInicio,
                'FECHA_FIN' => $fechaFin,
                'MOTIVO' => $this->input->post('MOTIVO')
            );

            if ($this->cita_model->editarCita($cita, $idCita) == TRUE) {
                $this->session->set_flashdata('custom_message', '<div class="alert alert-success"><p>Cita Actualizada Correctamente!!!</p></div>');
                $this->session->set_flashdata('citaId', $idCita);
                redirect(current_url());
            } else {
                $this->data['custom_message'] = '<div class="alert"><p>An Error Occured.</p></div>';
            }
        }

        $this->session->set_flashdata('citaId', $idCita);

        if (!$idCita) {
            redirect('cita/verAgenda');
        }

        $this->data['listaEspecialidades'] = $this->especialidad_model->listaEspecialidades();
        $this->data['listaPacientes'] = $this->paciente_model->listaPacientes();
        $this->data['cita'] = $this->cita_model->getCita($idCita);
        $this->data['contenido'] = 'cita/editarCita';
        $this->load->view('template/template', $this->data);
    }

    public function cancelarCita() {
        $idCita = $this->input->post('ID_CITA');
        if ($idCita) {
            $cita = array("ESTADO" => 2);
            $this->cita_model->editarCita($cita, $idCita);
        }
        redirect('cita/verAgenda');
    }

    public function establecerCita() {
        $citaDia = $this->input->post("citaDia");
        $citaHora = $this->input->post("citaHora");
        $citaId = $this->input->post("citaId");
        if ($citaDia && $citaHora) {
            $this->session->set_flashdata('citaDia', $citaDia);
            $this->session->set_flashdata('citaHora', $citaHora);
            redirect('cita/nuevaCita');
        } elseif ($citaId) {
            $this->session->set_flashdata('citaId', $citaId);
            redirect('cita/editarCita');
        } else {
            redirect('cita/verAgenda');
        }
    }

    public function verAgenda() {
        $this->data['contenido'] = 'cita/verAgenda';
        $this->load->view('template/template', $this->data);
    }

    public function listaCitas() {
        $citas = $this->cita_model->listaCitas(null);
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
