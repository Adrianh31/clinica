<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Servicios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('cita_model');
        $this->load->model('especialidad_model');
        $this->load->model('paciente_model');
    }

    public function agenda() {
        $this->data['custom_message'] = '';
        $this->data['contenido'] = 'cita/VerAgendaPublica';
        $this->load->view('template/publico/template', $this->data);
    }

    public function listaCitasPublicas() {
        $citas = $this->cita_model->listaCitas('publicas');
        echo json_encode($citas);
    }

    public function nuevaCita() {
        $this->data['custom_message'] = '';
        if ($this->form_validation->run('citaPublica') == false) {
            $this->data['custom_message'] = (validation_errors() ? '<div class="alert">' . validation_errors() . '</div>' : false);
        } else {

            $fechaInicio = set_value('FECHA') . ' ' . set_value('HORA_INICIO');
            $fechaFin = set_value('FECHA') . ' ' . set_value('HORA_FIN');

            //buscar correo electronico
            $correoElectronico = $this->paciente_model->buscarCorreo(set_value('CORREO_ELECTRONICO'));
            if ($correoElectronico) {
                $idPaciente = $correoElectronico->ID_PACIENTE;

                $cita = array(
                    'ID_PACIENTE' => $idPaciente,
                    'ID_ESPECIALIDAD' => set_value('ID_ESPECIALIDAD'),
                    'FECHA_INICIO' => $fechaInicio,
                    'FECHA_FIN' => $fechaFin,
                    'MOTIVO' => set_value('MOTIVO'),
                    'ID_ESTADO_CITA' => 1
                );

                if ($this->cita_model->nuevaCita($cita) == TRUE) {
                    $this->session->set_flashdata('custom_message', '<div class="alert alert-success"><p>Cita Creada Exitosamente!!!</p></div>');
                    redirect('servicios/agenda');
                } else {
                    $this->data['custom_message'] = '<div class="alert"><p>An Error Occured.</p></div>';
                }
            } else {
                $this->data['custom_message'] = '<div class="alert alert-error"><p>El Correo Ingresado no Existe</p></div>';
            }
        }

        $citaDia = $this->session->flashdata('citaDia');
        $citaHora = $this->session->flashdata('citaHora');
        $this->data['pestania'] = "tabRegistrado";
        $this->data['citaDia'] = $citaDia;
        $this->data['citaHora'] = $citaHora;
        $this->data['listaEspecialidades'] = $this->especialidad_model->listaEspecialidades();
        $this->data['contenido'] = 'cita/nuevaCitaPublica';
        $this->load->view('template/publico/template', $this->data);
    }

    public function nuevoPaciente() {

        $this->data['custom_message'] = '';
        if ($this->form_validation->run('pacientePublico') == false) {
            $this->data['custom_message'] = (validation_errors() ? '<div class="alert">' . validation_errors() . '</div>' : false);
        } else {

            $fechaInicio = set_value('FECHA') . ' ' . set_value('HORA_INICIO');
            $fechaFin = set_value('FECHA') . ' ' . set_value('HORA_FIN');

            //buscar correo electronico
            $correoElectronico = $this->paciente_model->buscarCorreo(set_value('CORREO_ELECTRONICO'));
            if (!$correoElectronico) {

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

                    $idPaciente = $this->paciente_model->buscarCorreo(set_value('CORREO_ELECTRONICO'));
                    $cita = array(
                        'ID_PACIENTE' => $idPaciente->ID_PACIENTE,
                        'ID_ESPECIALIDAD' => set_value('ID_ESPECIALIDAD'),
                        'FECHA_INICIO' => $fechaInicio,
                        'FECHA_FIN' => $fechaFin,
                        'MOTIVO' => set_value('MOTIVO'),
                        'ID_ESTADO_CITA' => 1
                    );

                    if ($this->cita_model->nuevaCita($cita) == TRUE) {
                        $this->session->set_flashdata('custom_message', '<div class="alert alert-success"><p>Paciente Guardado Exitosamente!!!</p></div>');
                        redirect('servicios/agenda');
                    }
                } else {
                    $this->data['custom_message'] = '<div class="alert"><p>An Error Occured.</p></div>';
                }
            } else {
                $this->data['custom_message'] = '<div class="alert alert-error"><p>El Correo Ingresado ya Existe</p></div>';
            }
        }

        $citaDia = $this->session->flashdata('citaDia');
        $citaHora = $this->session->flashdata('citaHora');
        $this->data['pestania'] = "tabNuevo";
        $this->data['citaDia'] = $citaDia;
        $this->data['citaHora'] = $citaHora;
        $this->data['listaEspecialidades'] = $this->especialidad_model->listaEspecialidades();
        $this->data['contenido'] = 'cita/nuevaCitaPublica';
        $this->load->view('template/publico/template', $this->data);
    }

    public function establecerCita() {
        $citaDia = $this->input->post("citaDia");
        $citaHora = $this->input->post("citaHora");
        if ($citaDia && $citaHora) {
            $this->session->set_flashdata('citaDia', $citaDia);
            $this->session->set_flashdata('citaHora', $citaHora);
            redirect('servicios/nuevaCita');
        } else {
            redirect('servicios/agenda');
        }
    }

}
