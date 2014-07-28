<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Servicios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('cita_model');
        $this->load->model('especialidad_model');
        $this->load->model('paciente_model');
        $this->load->model('empleado_model');
    }

    public function validarCita($idCita) {
        if ($idCita) {
            $resultado = $this->cita_model->validarCita($idCita);
            if ($resultado) {
                $this->session->set_flashdata('custom_message', '<div class="alert alert-success"><p>Cita Validada Exitosamene!!!</p></div>');
            }
        }
        redirect('servicios/agenda');
    }

    public function agenda() {
        $this->data['custom_message'] = '';
        $this->data['contenido'] = 'cita/verAgendaPublica';
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
                    'ID_EMPLEADO' => set_value('ID_EMPLEADO'),
                    'FECHA_INICIO' => $fechaInicio,
                    'FECHA_FIN' => $fechaFin,
                    'MOTIVO' => set_value('MOTIVO'),
                    'ID_ESTADO_CITA' => 1
                );


                //----------------- Validar Cita -------------------------//
                $citaValida = TRUE;
                $medicoOcupado = $this->cita_model->esMedicoOcupado(set_value('ID_EMPLEADO'), $fechaInicio, 0);
                if ($medicoOcupado == TRUE) {
                    $citaValida = FALSE;
                    $this->data['custom_message'] = '<div class="alert alert-error"><p>Medico no Disponible para este Horario</p></div>';
                }

                if (validarHorasCitas(set_value('HORA_INICIO'), set_value('HORA_FIN')) == FALSE) {
                    $citaValida = FALSE;
                    $this->data['custom_message'] = '<div class="alert alert-error"><p>Error Hora Inicio - Hora Fin , verifique</p></div>';
                }
                //----------------- Validar Cita ---------------------------//                             
                //----------------- Guardar Cita -------------------------//
                if ($citaValida == TRUE) {
                    $idCita = $this->cita_model->nuevaCita($cita);
                    if ($idCita > 0) {
                        $this->session->set_flashdata('custom_message', '<div class="alert alert-success"><p>Cita Creada Exitosamente!!! Favor confirmar Cita con el link enviado a su Correo Electronico</p></div>');
                        //send email
                        $this->load->helper('send_email');
                        sendValidarCita($this->cita_model->getCita($idCita), set_value('CORREO_ELECTRONICO'));
                        redirect('servicios/agenda');
                    } else {
                        $this->data['custom_message'] = '<div class="alert"><p>An Error Occured.</p></div>';
                    }
                }
                //----------------- Guardar Cita -------------------------//
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

                //----------------- Validar Cita -------------------------//
                $citaValida = TRUE;
                $medicoOcupado = $this->cita_model->esMedicoOcupado($this->input->post('ID_EMPLEADO'), $fechaInicio, 0);
                if ($medicoOcupado == TRUE) {
                    $citaValida = FALSE;
                    $this->data['custom_message'] = '<div class="alert alert-error"><p>Medico no Disponible para este Horario</p></div>';
                }

                if (validarHorasCitas(set_value('HORA_INICIO'), set_value('HORA_FIN')) == FALSE) {
                    $citaValida = FALSE;
                    $this->data['custom_message'] = '<div class="alert alert-error"><p>Error Hora Inicio - Hora Fin , verifique</p></div>';
                }
                //----------------- Validar Cita ---------------------------//    


                if ($citaValida == TRUE) {
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
                            'ID_EMPLEADO' => $this->input->post('ID_EMPLEADO'),
                            'FECHA_INICIO' => $fechaInicio,
                            'FECHA_FIN' => $fechaFin,
                            'MOTIVO' => set_value('MOTIVO'),
                            'ID_ESTADO_CITA' => 1
                        );


                        $idCita = $this->cita_model->nuevaCita($cita);
                        if ($idCita > 0) {
                            $this->session->set_flashdata('custom_message', '<div class="alert alert-success"><p>Paciente Guardado Exitosamente!!! Favor confirmar Cita con el link enviado a su Correo Electronico</p></div>');
                            //send email
                            $this->load->helper('send_email');
                            sendValidarCita($this->cita_model->getCita($idCita), set_value('CORREO_ELECTRONICO'));
                            redirect('servicios/agenda');
                        }
                    } else {
                        $this->data['custom_message'] = '<div class="alert"><p>An Error Occured.</p></div>';
                    }
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

    public function listaMedicos() {
        $idEspecialidad = $this->input->post('idEspecialidad');
        if ($idEspecialidad) {
            $listaMedicos = $this->empleado_model->listaMedicosEspecialidad($idEspecialidad);
            echo json_encode($listaMedicos);
        }
    }

}
