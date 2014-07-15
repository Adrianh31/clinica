<?php

class Cita_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getCita($idCita) {
        $cita = $this->db->query("SELECT ID_PACIENTE,ID_ESPECIALIDAD,
                                         MOTIVO,ID_CITA,
                                         DATE_FORMAT(FECHA_INICIO,'%Y-%m-%d') AS FECHA,
                                         DATE_FORMAT(FECHA_INICIO,'%H:%i:%s') AS HORA_INICIO,
                                         DATE_FORMAT(FECHA_FIN,'%H:%i:%s') AS HORA_FIN
                                  FROM cita 
                                  WHERE ID_CITA=?", array($idCita)
                )->row();
        return $cita;
    }

    public function listaCitas($filter) {


        if ($filter == "hoy") {
            $citas = $this->db->query("SELECT c.ID_CITA, CONCAT(per.NOMBRE,' ', per.APELLIDO) AS NOMBRE_PACIENTE,
                                              pac.ID_PACIENTE,
                                              c.MOTIVO,
                                              es.NOMBRE AS ESPECIALIDAD,
                                              DATE_FORMAT(c.FECHA_INICIO,'%Y-%m-%d')AS FECHA, 
                                              DATE_FORMAT(c.FECHA_INICIO,'%H:%i-%s') AS HORA_INICIO,
                                              DATE_FORMAT(c.FECHA_FIN,'%H:%i-%s') AS HORA_FIN
                                       FROM cita AS c INNER JOIN paciente AS pac 
                                       ON c.ID_PACIENTE=pac.ID_PACIENTE
                                       INNER JOIN persona AS per 
                                       ON pac.ID_PACIENTE=per.ID_PERSONA
                                       INNER JOIN especialidad AS es 
                                       ON es.ID_ESPECIALIDAD=c.ID_ESPECIALIDAD
                                       WHERE c.ESTADO=0 
                                       AND DATE_FORMAT(c.FECHA_INICIO,'%Y-%m-%d')=CURDATE()
                                       ORDER BY c.FECHA_INICIO ASC
                                    ")->result_array();
        } elseif ($filter == "publicas") {

            $citas = $this->db->query("SELECT c.ID_CITA AS id, 'Ocupado' AS title,
                                        c.FECHA_INICIO AS start, 
                                        c.FECHA_FIN AS end,
                                        'false' AS allDay
                                 FROM cita AS c INNER JOIN paciente AS pac 
                                 ON c.ID_PACIENTE=pac.ID_PACIENTE
                                 INNER JOIN persona AS per 
                                 ON pac.ID_PACIENTE=per.ID_PERSONA
                                 INNER JOIN especialidad AS es 
                                 ON es.ID_ESPECIALIDAD=c.ID_ESPECIALIDAD
                                 WHERE c.ESTADO=0 
                                 ")->result_array();
        } else {


            $citas = $this->db->query("SELECT c.ID_CITA AS id, CONCAT(per.NOMBRE,' ', per.APELLIDO,' (',es.NOMBRE,')') AS title,
                                        c.FECHA_INICIO AS start, 
                                        c.FECHA_FIN AS end,
                                        'false' AS allDay
                                 FROM cita AS c INNER JOIN paciente AS pac 
                                 ON c.ID_PACIENTE=pac.ID_PACIENTE
                                 INNER JOIN persona AS per 
                                 ON pac.ID_PACIENTE=per.ID_PERSONA
                                 INNER JOIN especialidad AS es 
                                 ON es.ID_ESPECIALIDAD=c.ID_ESPECIALIDAD
                                 WHERE c.ESTADO=0 
                                 ")->result_array();
        }
        return $citas;
    }

    public function listaCitasEspecialidad($filtro, $idEspecialidad) {
        if ($filtro == "hoy") {
            $citas = $this->db->query("SELECT c.ID_CITA, CONCAT(per.NOMBRE,' ', per.APELLIDO) AS NOMBRE_PACIENTE,
                                              pac.ID_PACIENTE,
                                              c.MOTIVO,
                                              es.NOMBRE AS ESPECIALIDAD,
                                              DATE_FORMAT(c.FECHA_INICIO,'%Y-%m-%d')AS FECHA, 
                                              DATE_FORMAT(c.FECHA_INICIO,'%H:%i-%s') AS HORA_INICIO,
                                              DATE_FORMAT(c.FECHA_FIN,'%H:%i-%s') AS HORA_FIN
                                       FROM cita AS c INNER JOIN paciente AS pac 
                                       ON c.ID_PACIENTE=pac.ID_PACIENTE
                                       INNER JOIN persona AS per 
                                       ON pac.ID_PACIENTE=per.ID_PERSONA
                                       INNER JOIN especialidad AS es 
                                       ON es.ID_ESPECIALIDAD=c.ID_ESPECIALIDAD
                                       WHERE c.ESTADO=0 
                                       AND DATE_FORMAT(c.FECHA_INICIO,'%Y-%m-%d')=CURDATE()
                                       AND c.ID_ESPECIALIDAD=?
                                       ORDER BY c.FECHA_INICIO ASC
                                    ", array($idEspecialidad))->result_array();
        } else {
            
        }

        return $citas;
    }

    public function nuevaCita($cita) {
        $idCita;
        $this->db->insert('cita', $cita);
        if ($this->db->affected_rows() == '1') {
            $idCita = $this->db->insert_id();
        } else {
            $idCita = 0;
        }
        return $idCita;
    }

    public function editarCita($cita, $idCita) {
        $result;
        $this->db->update("cita", $cita, array("ID_CITA" => $idCita));
        if ($this->db->affected_rows() >= 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }

}
