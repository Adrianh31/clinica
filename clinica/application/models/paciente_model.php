<?php

class Paciente_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    public function getPaciente($idPaciente) {
        $paciente=$this->db->query('SELECT * FROM paciente')->row();
        return $paciente;
    }

}
