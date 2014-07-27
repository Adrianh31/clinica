<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Medicamento extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('medicamento_model');
        $this->load->model('receta_model');
        $this->data['seccion'] = 'medicamento';
    }

    public function recetasPendientes() {
        $this->data['custom_message'] = '';
        $this->data['listaRecetasPendienes'] = $this->receta_model->listaRecetasPendientes();
        $this->data['contenido'] = 'medicamento/recetasPendientes';
        $this->load->view('template/template', $this->data);
    }

    public function despacharReceta($idConsulta) {
        if (!$idConsulta) {
            redirect('medicamento/recetasPendientes');
        }
        $idConsulta = url_base64_decode($idConsulta);
        $recetaMedica = $this->receta_model->getRecetaPendiente($idConsulta);
        if (!$recetaMedica) {
            redirect('medicamento/recetasPendientes');
        }
        $this->data['custom_message'] = '';
        $this->data['recetaMedica'] = $recetaMedica['receta'];
        $this->data['recetaInfo'] = $recetaMedica['info'];
        $this->data['contenido'] = 'medicamento/despacharReceta';
        $this->load->view('template/template', $this->data);
    }

    public function actualizarInvetario() {
        $idReceta = $this->input->post('ID_RECETA');
        $idConsulta = $this->input->post('ID_CONSULTA');
        if ($idConsulta && $idReceta) {
            //actualizar inventario
            $resultado = $this->medicamento_model->actualizarInventario($idReceta);
            if ($resultado == TRUE) {
                //actualizar receta de pendiente a despachada
                $receta = array("ESTADO" => 1);
                $this->receta_model->editarReceta($receta, $idReceta);
                $this->session->set_flashdata('custom_message', '<div class="alert alert-success"><p>Receta Despachada Exitosamente!!!</p></div>');
            }
        }
        redirect('medicamento/recetasPendientes');
    }

    public function verMedicamentos() {
        $this->data['custom_message'] = '';
        $this->data['listaMedicamentos'] = $this->medicamento_model->listaMedicamentos();
        $this->data['contenido'] = 'medicamento/verMedicamentos';
        $this->load->view('template/template', $this->data);
    }

    public function cargarMedicamentos() {
        $this->data['custom_message'] = '';
        $this->data['contenido'] = 'medicamento/cargarMedicamentos';
        $this->load->view('template/template', $this->data);
    }

    public function nuevoMedicamento() {

        $this->data['custom_message'] = '';
        if ($this->form_validation->run('medicamento') == false) {
            $this->data['custom_message'] = (validation_errors() ? '<div class="alert">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'NOMBRE' => set_value('NOMBRE'),
                'CASA_FARMACEUTICA' => set_value('CASA_FARMACEUTICA'),
                'CODIGO' => set_value('CODIGO'),
                'DESCRIPCION' => set_value('DESCRIPCION'),
                'PRESENTACION' => set_value('PRESENTACION'),
                'CANTIDAD_ACTUAL' => set_value('CANTIDAD_ACTUAL')
            );

            if ($this->medicamento_model->nuevoMedicamento($data) > 0) {
                $this->session->set_flashdata('custom_message', '<div class="alert alert-success"><p>Medicamento Creado Exitosamente!!!</p></div>');
                redirect('medicamento/nuevoMedicamento');
            } else {
                $this->data['custom_message'] = '<div class="alert"><p>An Error Occured.</p></div>';
            }
        }

        $this->data['contenido'] = 'medicamento/nuevoMedicamento';
        $this->load->view('template/template', $this->data);
    }

    public function editarMedicamento($idMedicamento) {

        if (!$idMedicamento) {
            redirect('medicamento/verMedicamentos');
        }
        $idMedicamento = url_base64_decode($idMedicamento);

        $this->data['custom_message'] = '';
        if ($this->form_validation->run('medicamento') == false) {
            $this->data['custom_message'] = (validation_errors() ? '<div class="alert">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'NOMBRE' => set_value('NOMBRE'),
                'CASA_FARMACEUTICA' => set_value('CASA_FARMACEUTICA'),
                'CODIGO' => set_value('CODIGO'),
                'DESCRIPCION' => set_value('DESCRIPCION'),
                'PRESENTACION' => set_value('PRESENTACION'),
                'CANTIDAD_ACTUAL' => set_value('CANTIDAD_ACTUAL')
            );

            if ($this->medicamento_model->editarMedicamento($data, $idMedicamento) > 0) {
                $this->data['custom_message'] = '<div class="alert alert-success"><p>Medicamento Actualizado Exitosamente!!!</p></div>';
            } else {
                $this->data['custom_message'] = '<div class="alert"><p>An Error Occured.</p></div>';
            }
        }

        $medicamento = $this->medicamento_model->getMedicamento($idMedicamento);
        if (!$medicamento) {
            redirect('medicamento/verMedicamentos');
        }


        $this->data['idMedicamento'] = $idMedicamento;
        $this->data['medicamento'] = $medicamento;
        $this->data['contenido'] = 'medicamento/editarMedicamento';
        $this->load->view('template/template', $this->data);
    }

    public function buscarMedicamentos() {
        $filtro = $this->input->post('query');
        $listaMedicamentos = false;
        if ($filtro) {
            $listaMedicamentos = $this->medicamento_model->buscarMedicamento($filtro);
        }
        echo json_encode($listaMedicamentos);
    }

}
