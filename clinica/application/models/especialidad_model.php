<?php

class Especialidad_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function listaEspecialidades() {
        $especialidades = $this->db->query("SELECT * FROM especialidad")->result_array();
        return $especialidades;
    }



}
