<?php

class Cita_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function getCitasDAO(){
        
        $citas=$this->db->query("SELECT c.ID_CITA AS id, CONCAT(p.NOMBRE,' ', p.APELLIDO,' (',MOTIVO,')') AS title,
                                        c.FECHA_INICIO AS start, 
                                        c.FECHA_FIN AS end,
                                        'false' AS allDay
                                 FROM cita AS c INNER JOIN paciente AS p
                                 ON c.ID_PACIENTE=p.ID_PACIENTE")->result_array();
        return $citas;
    }

}
