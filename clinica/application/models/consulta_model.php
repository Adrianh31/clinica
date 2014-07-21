<?php

class Consulta_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getConsulta($idConsulta){
        
        $consulta=  $this->db->query("SELECT con.*,exp.ID_PACIENTE, 
                                             CONCAT(per.NOMBRE,' ',per.APELLIDO) AS NOMBRE_EMPLEADO,
                                             emp.ID_ESPECIALIDAD
                                      FROM consulta AS con
                                      INNER JOIN persona AS per
                                      ON con.ID_EMPLEADO=per.ID_PERSONA
                                      INNER JOIN expediente AS exp
                                      ON exp.ID_EXPEDIENTE=con.ID_EXPEDIENTE
                                      INNER JOIN empleado AS emp
                                      ON per.ID_PERSONA=emp.ID_EMPLEADO
                                      WHERE ID_CONSULTA=?",array($idConsulta))->row();
        return $consulta;
    }
    
    
    
    public function nuevaConsulta($consulta) {
        $idConsulta;
        $this->db->insert('consulta', $consulta);
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
