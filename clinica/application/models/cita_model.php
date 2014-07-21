<?php

class Cita_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getCita($idCita) {
        $cita = $this->db->query("SELECT c.ID_PACIENTE,c.ID_ESPECIALIDAD,
                                         c.MOTIVO,c.ID_CITA,ec.ID_ESTADO_CITA,
                                         DATE_FORMAT(c.FECHA_INICIO,'%Y-%m-%d') AS FECHA,
                                         DATE_FORMAT(c.FECHA_INICIO,'%H:%i:%s') AS HORA_INICIO,
                                         DATE_FORMAT(c.FECHA_FIN,'%H:%i:%s') AS HORA_FIN
                                  FROM cita AS c INNER JOIN estado_cita AS ec
                                  ON c.ID_ESTADO_CITA=ec.ID_ESTADO_CITA
                                  WHERE c.ID_CITA=?", array($idCita)
                )->row();
        return $cita;
    }

    public function listaCitas($filter) {


        if ($filter == "hoy") {
            $fechaHoy = date('Y-m-d');
            $citas = $this->db->query("SELECT c.ID_CITA, CONCAT(per.NOMBRE,' ', per.APELLIDO) AS NOMBRE_PACIENTE,
                                              pac.ID_PACIENTE,
                                              c.MOTIVO,
                                              ec.ESTADO,ec.ID_ESTADO_CITA,
                                              es.NOMBRE AS ESPECIALIDAD, es.ID_ESPECIALIDAD,
                                              pc.ID_EMPLEADO,
                                              DATE_FORMAT(c.FECHA_INICIO,'%Y-%m-%d')AS FECHA, 
                                              DATE_FORMAT(c.FECHA_INICIO,'%H:%i-%s') AS HORA_INICIO,
                                              DATE_FORMAT(c.FECHA_FIN,'%H:%i-%s') AS HORA_FIN
                                       FROM cita AS c INNER JOIN paciente AS pac 
                                       ON c.ID_PACIENTE=pac.ID_PACIENTE
                                       INNER JOIN persona AS per 
                                       ON pac.ID_PACIENTE=per.ID_PERSONA
                                       INNER JOIN especialidad AS es 
                                       ON es.ID_ESPECIALIDAD=c.ID_ESPECIALIDAD
                                       INNER JOIN ESTADO_CITA AS ec
                                       ON  ec.ID_ESTADO_CITA=c.ID_ESTADO_CITA
                                       LEFT JOIN pre_consulta AS pc
                                       ON pc.ID_CITA=c.ID_CITA
                                       WHERE DATE_FORMAT(c.FECHA_INICIO,'%Y-%m-%d')=?
                                       ORDER BY c.FECHA_INICIO ASC
                                    ", array($fechaHoy))->result_array();
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
                                 WHERE c.ID_ESTADO_CITA=2 
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
                                 WHERE c.ID_ESTADO_CITA=2 
                                 ")->result_array();
        }
        return $citas;
    }

    public function listaCitasMedico($filtro, $idMedico) {
        $listaCitasMedico;
        if ($filtro == "hoy") {
            $fechaHoy = date("Y-m-d");
            $listaCitasMedico = $this->db->query("SELECT c.ID_CITA, CONCAT(per.NOMBRE,' ', per.APELLIDO) AS NOMBRE_PACIENTE,
                                              pac.ID_PACIENTE,
                                              c.MOTIVO,ec.ESTADO AS ESTADO_CITA,ec.ID_ESTADO_CITA,
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
                                       INNER JOIN pre_consulta AS prc
                                       ON prc.ID_CITA=c.ID_CITA
                                       INNER JOIN estado_cita AS ec
                                       ON ec.ID_ESTADO_CITA=c.ID_ESTADO_CITA
                                       WHERE (c.ID_ESTADO_CITA=2 OR c.ID_ESTADO_CITA=3) 
                                       AND DATE_FORMAT(c.FECHA_INICIO,'%Y-%m-%d')=?
                                       AND prc.ID_EMPLEADO=?
                                       ORDER BY c.FECHA_INICIO ASC", array($fechaHoy, $idMedico))->result_array();
        } else {
            
        }
        return $listaCitasMedico;
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
                                       WHERE c.ID_ESTADO_CITA=2 
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
