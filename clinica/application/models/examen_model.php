<?php

class Examen_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function buscarExamen($filtro) {
        $listaExamenes = $this->db->query("SELECT ID_EXAMEN,NOMBRE FROM examen WHERE NOMBRE LIKE '%" . $this->db->escape_like_str($filtro) . "%' LIMIT 20")->result_array();
        $examenes;
        if ($listaExamenes) {
            foreach ($listaExamenes as $examen) {
                $examenes[] = array('value' => $examen['NOMBRE'],
                                        'data' => $examen['ID_EXAMEN']);
            }
        }
        $lista = array("suggestions" => $examenes);
        return $lista;
    }

}
