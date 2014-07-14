<?php

class Persona_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function nuevaPersona($persona) {

        $idPersona = 0;
        $data = array(
            "NOMBRE" => $persona['NOMBRE'],
            "APELLIDO" => $persona['APELLIDO'],
            "TELEFONO" => $persona['TELEFONO'],
            "CORREO_ELECTRONICO" => $persona['CORREO_ELECTRONICO'],
        );


        $this->db->insert("persona", $data);
        if ($this->db->affected_rows() == '1') {
            $idPersona = $this->db->insert_id();
        } else {
            $idPersona = 0;
        }

        return $idPersona;
    }

    public function editarPersona($persona, $idPersona) {

        $result = FALSE;
        $data = array(
            "NOMBRE" => $persona['NOMBRE'],
            "APELLIDO" => $persona['APELLIDO'],
            "TELEFONO" => $persona['TELEFONO'],
            "CORREO_ELECTRONICO" => $persona['CORREO_ELECTRONICO'],
        );

        $this->db->update("persona", $data, array("ID_PERSONA" => $idPersona));

        if ($this->db->affected_rows() >= 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }

        return $result;
    }

}
