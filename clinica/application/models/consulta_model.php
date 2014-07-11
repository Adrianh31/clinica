<?php

class Consulta_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    public function getTiposConsulta() {
        $tiposConsulta=$this->db->query('SELECT ID_TIPO_CONSULTA,NOMBRE FROM tipo_consulta')->result_array();
        return $tiposConsulta;
    }

}
