<?php

class Expediente_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function nuevoExpediente($idPaciente) {
        $expediente = array(
            "ID_PACIENTE" => $idPaciente,
            "FECHA_CREACION" => date('Y-m-d H:i:s')
        );

        $this->db->insert('expediente', $expediente);
        return true;
    }

}
