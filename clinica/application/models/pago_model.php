<?php

class Pago_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function nuevoPago($pago) {
        $idPago;
        $this->db->insert('pago', $pago);
        if ($this->db->affected_rows() == '1') {
            $idPago = $this->db->insert_id();
        } else {
            $idPago = 0;
        }
        return $idPago;
    }

    public function listaPagosPendientes() {

        $fechaHoy = date("Y-m-d");
        $pagos = $this->db->query("SELECT con.ID_CONSULTA,
                                         DATE_FORMAT(con.FECHA_INICIO,'%Y-%m-%d') AS FECHA,
                                         CONCAT(per.NOMBRE,' ',per.APELLIDO) AS NOMBRE_PACIENTE,
                                         CONCAT(per2.NOMBRE,' ',per2.APELLIDO) AS NOMBRE_MEDICO
                                   FROM consulta as con
                                   INNER JOIN expediente AS ex
                                   ON ex.ID_EXPEDIENTE=con.ID_EXPEDIENTE
                                   INNER JOIN paciente AS pac
                                   ON pac.ID_PACIENTE=ex.ID_PACIENTE
                                   INNER JOIN persona AS per
                                   ON per.ID_PERSONA=pac.ID_PACIENTE
                                   INNER JOIN persona AS per2
                                   ON con.ID_EMPLEADO=per2.ID_PERSONA
                                   WHERE DATE_FORMAT(FECHA_INICIO,'%Y-%m-%d')=?
                                   AND ID_CONSULTA NOT IN (SELECT ID_CONSULTA FROM pago  WHERE DATE_FORMAT(FECHA_INICIO,'%Y-%m-%d')=?)
                                   ", array($fechaHoy, $fechaHoy))->result_array();
        return $pagos;
    }

    public function listaPagosRealizados() {

        $pagos = $this->db->query("SELECT pag.ID_PAGO,
                                         CASE WHEN pag.EXONERADO=0 THEN 'No Exonerado'
                                              ELSE 'Exonerado' 
                                              END AS EXONERADO,
                                         pag.OBSERVACIONES,
                                         pag.PRECIO,
                                         DATE_FORMAT(pag.FECHA_PAGO,'%Y-%m-%d') AS FECHA,
                                         CONCAT(per.NOMBRE,' ',per.APELLIDO) AS NOMBRE_PACIENTE,
                                         CONCAT(per2.NOMBRE,' ',per2.APELLIDO) AS NOMBRE_MEDICO
                                   FROM pago AS pag
                                   INNER JOIN consulta AS con 
                                   ON con.ID_CONSULTA=pag.ID_CONSULTA
                                   INNER JOIN expediente AS ex
                                   ON ex.ID_EXPEDIENTE=con.ID_EXPEDIENTE
                                   INNER JOIN paciente AS pac
                                   ON pac.ID_PACIENTE=ex.ID_PACIENTE
                                   INNER JOIN persona AS per
                                   ON per.ID_PERSONA=pac.ID_PACIENTE
                                   INNER JOIN persona AS per2
                                   ON con.ID_EMPLEADO=per2.ID_PERSONA
                                   ")->result_array();
        return $pagos;
    }

}
