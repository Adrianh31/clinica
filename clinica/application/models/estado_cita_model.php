<?php

class Estado_cita_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function listaEstadosCita() {
        $estadoCita = $this->db->query("SELECT * FROM estado_cita")->result_array();
        return $estadoCita;
    }

}
