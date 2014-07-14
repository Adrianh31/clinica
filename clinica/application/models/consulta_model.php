<?php

class Consulta_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function nuevaConsulta($cita) {
        $idConsulta;
        $this->db->insert('consulta', $cita);
        if ($this->db->affected_rows() == '1') {
            $idConsulta = $this->db->insert_id();
        } else {
            $idConsulta = 0;
        }
        return $idConsulta;
    }
    
    
    
    public function listaConsultas($idExpediente){
        $consultas=  $this->db->query("SELECT con.ID_CONSULTA,DATE_FORMAT(con.FECHA_INICIO, '%Y-%m-%d') AS FECHA,
                                              CONCAT(per.NOMBRE,' ',per.APELLIDO) AS NOMBRE_MEDICO,
                                              esp.NOMBRE AS ESPECIALIDAD
                                        FROM consulta AS con INNER JOIN empleado AS emp
                                        ON emp.ID_EMPLEADO=con.ID_EMPLEADO
                                        INNER JOIN persona AS per 
                                        ON per.ID_PERSONA=emp.ID_EMPLEADO
                                        INNER JOIN especialidad AS esp
                                        ON esp.ID_ESPECIALIDAD=emp.ID_EMPLEADO
                                        WHERE con.ID_EXPEDIENTE=?",array($idExpediente))->result_array();
        return $consultas;
    }

}
