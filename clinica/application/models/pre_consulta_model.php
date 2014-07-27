<?php

class Pre_consulta_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getPreConsulta() {
        
    }

    public function nuevaPreconsulta($idCita, $idEmpleado) {
        $data = array(
            'ID_CITA' => $idCita,
            'ID_EMPLEADO' => $idEmpleado
        );

        $this->db->insert("pre_consulta", $data);

        if ($this->db->affected_rows() == '1') {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
    }

    public function eliminarPreconsulta($idCita) {
        $this->db->query("DELETE FROM pre_consulta WHERE ID_CITA=?", array($idCita));
        return TRUE;
    }
    

}
