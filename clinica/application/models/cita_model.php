<?php

class Cita_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getCita($idCita) {
        $cita = $this->db->query("SELECT c.ID_PACIENTE,emp.ID_ESPECIALIDAD, c.ID_EMPLEADO,
                                         c.MOTIVO,c.ID_CITA,ec.ID_ESTADO_CITA,
                                         CONCAT(per.NOMBRE,' ',per.APELLIDO) AS NOMBRE_PACIENTE,
                                         DATE_FORMAT(c.FECHA_INICIO,'%Y-%m-%d') AS FECHA,
                                         DATE_FORMAT(c.FECHA_INICIO,'%H:%i:%s') AS HORA_INICIO,
                                         DATE_FORMAT(c.FECHA_FIN,'%H:%i:%s') AS HORA_FIN
                                  FROM cita AS c INNER JOIN estado_cita AS ec
                                  ON c.ID_ESTADO_CITA=ec.ID_ESTADO_CITA
                                  INNER JOIN empleado AS emp
                                  ON emp.ID_EMPLEADO=c.ID_EMPLEADO
                                  INNER JOIN persona AS per
                                  ON per.ID_PERSONA=c.ID_PACIENTE
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
                                              emp.ID_EMPLEADO,
                                              CONCAT(per2.NOMBRE,' ', per2.APELLIDO) AS NOMBRE_MEDICO,
                                              DATE_FORMAT(c.FECHA_INICIO,'%Y-%m-%d')AS FECHA, 
                                              DATE_FORMAT(c.FECHA_INICIO,'%H:%i-%s') AS HORA_INICIO,
                                              DATE_FORMAT(c.FECHA_FIN,'%H:%i-%s') AS HORA_FIN
                                       FROM cita AS c INNER JOIN paciente AS pac 
                                       ON c.ID_PACIENTE=pac.ID_PACIENTE
                                       INNER JOIN persona AS per 
                                       ON pac.ID_PACIENTE=per.ID_PERSONA
                                       INNER JOIN empleado AS emp
                                       ON emp.ID_EMPLEADO=c.ID_EMPLEADO
                                       INNER JOIN especialidad AS es
                                       ON es.ID_ESPECIALIDAD=emp.ID_ESPECIALIDAD
                                       INNER JOIN estado_cita AS ec
                                       ON  ec.ID_ESTADO_CITA=c.ID_ESTADO_CITA
                                       INNER JOIN persona AS per2
                                       ON per2.ID_PERSONA=emp.ID_EMPLEADO
                                       WHERE DATE_FORMAT(c.FECHA_INICIO,'%Y-%m-%d')=?
                                       ORDER BY c.FECHA_INICIO ASC
                                    ", array($fechaHoy))->result_array();
        } elseif ($filter == "publicas") {

            //get count medicos
            $totalMedicos = $this->db->query("SELECT COUNT(ID_EMPLEADO)AS total 
                                              FROM empleado 
                                              WHERE ID_ESPECIALIDAD IS NOT NULL")->row();
            $totalMedicos = $totalMedicos->total;

            $citas = $this->db->query("SELECT c.ID_CITA AS id, 'Ocupado' AS title,
                                              COUNT(c.ID_CITA) AS total,
                                        c.FECHA_INICIO AS start, 
                                        c.FECHA_FIN AS end,
                                        'false' AS allDay
                                 FROM cita AS c
                                 WHERE c.ID_ESTADO_CITA IN (1,2)
                                 GROUP BY FECHA_INICIO
                                 HAVING total>=?
                                 ", array($totalMedicos))->result_array();
        } else {


            $citas = $this->db->query("SELECT c.ID_CITA AS id, CONCAT(per.NOMBRE,' ', per.APELLIDO,' (',es.NOMBRE,')') AS title,
                                        c.FECHA_INICIO AS start, 
                                        c.FECHA_FIN AS end,
                                        'false' AS allDay,
                                        CASE 
                                        WHEN c.ID_ESTADO_CITA=1 
                                            THEN '#ff7f74'
                                            ELSE '#00ba8b'
                                        END AS color 
                                 FROM cita AS c INNER JOIN paciente AS pac 
                                 ON c.ID_PACIENTE=pac.ID_PACIENTE
                                 INNER JOIN persona AS per 
                                 ON pac.ID_PACIENTE=per.ID_PERSONA
                                 INNER JOIN empleado AS emp
                                 ON emp.ID_EMPLEADO=c.ID_EMPLEADO
                                 INNER JOIN especialidad AS es 
                                 ON es.ID_ESPECIALIDAD=emp.ID_EMPLEADO
                                 WHERE c.ID_ESTADO_CITA IN (1,2)
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
                                       INNER JOIN empleado AS emp
                                       ON emp.ID_EMPLEADO=c.ID_EMPLEADO
                                       INNER JOIN especialidad AS es 
                                       ON es.ID_ESPECIALIDAD=emp.ID_ESPECIALIDAD
                                       INNER JOIN estado_cita AS ec
                                       ON ec.ID_ESTADO_CITA=c.ID_ESTADO_CITA
                                       WHERE c.ID_ESTADO_CITA=2 
                                       AND DATE_FORMAT(c.FECHA_INICIO,'%Y-%m-%d')=?
                                       AND emp.ID_EMPLEADO=?
                                       AND c.ID_ESTADO_CITA=2
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

    //------------------------ VALIDACIONES CITAS ------------------------------------//

    public function esDiaOcupado($idMedico, $fechaInicio) {
        $resultado = false;
        //contar medicos espcialidad
        //contar medicos disponibles para la hora
        $this->db->query("SELECT * FROM
                          (SELECT COUNT(ID_EMPLEADO) FROM empleado WHERE ID_ESPECIALIDAD=?) AS totalMedicos
                          (SELECT COUNT(ID_CITA) 
                           FROM cita INNER JOIN empleado AS emp
                           ON emp.ID_EMPLEADO=c.ID_EMPLEADO
                           WHERE emp.ID_ESPCIALIDAD=?) AS totalCitas");
        return $resultado;
    }

    public function esMedicoOcupado($idMedico, $fechaInicio, $idCita) {
        $ocupado = false;
        if ($idCita) {
            $cantidad = $this->db->query("SELECT COUNT(ID_EMPLEADO)AS total 
                                          FROM cita 
                                          WHERE ID_EMPLEADO=? 
                                          AND DATE_FORMAT(FECHA_INICIO,'%Y-%m-%d %H:%i:%s')=?
                                          AND ID_CITA!=? 
                                          AND ID_ESTADO_CITA IN(1,2)", array($idMedico, $fechaInicio, $idCita))->row();
        } else {
            $cantidad = $this->db->query("SELECT COUNT(ID_EMPLEADO) AS total
                                          FROM cita 
                                          WHERE ID_EMPLEADO=? 
                                          AND DATE_FORMAT(FECHA_INICIO,'%Y-%m-%d %H:%i')=?
                                          AND ID_ESTADO_CITA IN(1,2)", array($idMedico, $fechaInicio))->row();
        }

        if ($cantidad->total >= 1) {
            $ocupado = true;
        }
        return $ocupado;
    }

    public function validarCita($idCita) {
        $this->db->query("UPDATE cita SET ID_ESTADO_CITA=2 WHERE MD5(ID_CITA)=?", array($idCita));
        return true;
    }

    //------------------------ VALIDACIONES CITAS ------------------------------------//
}
