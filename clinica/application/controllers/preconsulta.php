<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PreConsulta extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("pre_consulta_model");
    }

    public function asignarMedico() {
        $idCita = $this->input->post("idCita");
        $idEmpleado = $this->input->post("idEmpleado");
        $result=FALSE;
        if ($idCita && $idEmpleado) {
            $result=$this->pre_consulta_model->nuevaPreConsulta($idCita,$idEmpleado);
        } elseif ($idCita) {
            $result=$this->pre_consulta_model->eliminarPreconsulta($idCita);
        }
        
        return $result;
    }

}
