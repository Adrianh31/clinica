<?php

class Medicamento_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function listaMedicamentos() {
        $listaMedicamentos = $this->db->query("SELECT * FROM medicamento")->result_array();
        return $listaMedicamentos;
    }

    public function buscarMedicamento($filtro) {
        $listaMedicamentos = $this->db->query("SELECT ID_MEDICAMENTO,NOMBRE,CANTIDAD_ACTUAL FROM medicamento WHERE NOMBRE LIKE '%" . $this->db->escape_like_str($filtro) . "%' LIMIT 20")->result_array();
        $medicamentos;
        if ($listaMedicamentos) {
            foreach ($listaMedicamentos as $medicamento) {
                $medicamentoData = array("idMedicamento" => $medicamento['ID_MEDICAMENTO'], "cantdad" => $medicamento['CANTIDAD_ACTUAL']);
                $medicamentos[] = array('value' => $medicamento['NOMBRE'],
                    'data' => $medicamento['ID_MEDICAMENTO'],
                    'cantidad' => $medicamento['CANTIDAD_ACTUAL']);
            }
        }
        $lista = array("suggestions" => $medicamentos);
        return $lista;
    }

}
