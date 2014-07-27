<?php

class Receta_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getReceta($idConsulta) {
        $receta = $this->db->query("SELECT dr.*,med.NOMBRE AS NOMBRE_MEDICAMENTO
                                    FROM receta AS re
                                    INNER JOIN detalle_receta AS dr
                                    ON dr.ID_RECETA=re.ID_RECETA
                                    INNER JOIN medicamento AS med
                                    ON med.ID_MEDICAMENTO=dr.ID_MEDICAMENTO 
                                    WHERE re.ID_CONSULTA=?", array($idConsulta))->result_array();
        return $receta;
    }

    public function getRecetaPendiente($idConsulta) {
        $receta = $this->db->query("SELECT dr.*,med.NOMBRE AS NOMBRE_MEDICAMENTO, 
                                           med.CANTIDAD_ACTUAL
                                    FROM receta AS re
                                    INNER JOIN detalle_receta AS dr
                                    ON dr.ID_RECETA=re.ID_RECETA
                                    INNER JOIN medicamento AS med
                                    ON med.ID_MEDICAMENTO=dr.ID_MEDICAMENTO 
                                    WHERE re.ID_CONSULTA=? AND estado=0", array($idConsulta))->result_array();
        
        $info= $this->db->query("SELECT rec.ID_RECETA, con.ID_CONSULTA,
                                        DATE_FORMAT(con.FECHA_INICIO,'%Y-%m-%d') AS FECHA,
                                        CONCAT(per1.NOMBRE,' ',per1.APELLIDO) AS NOMBRE_MEDICO,
                                        CONCAT(per2.NOMBRE,' ',per2.APELLIDO) AS NOMBRE_PACIENTE
                                 FROM consulta AS con 
                                 INNER JOIN receta AS rec
                                 ON rec.ID_CONSULTA=con.ID_CONSULTA
                                 INNER JOIN empleado AS emp 
                                 ON con.ID_EMPLEADO= emp.ID_EMPLEADO
                                 INNER JOIN persona AS per1
                                 ON per1.ID_PERSONA=emp.ID_EMPLEADO
                                 INNER JOIN expediente AS exp
                                 ON exp.ID_EXPEDIENTE=con.ID_EXPEDIENTE
                                 INNER JOIN paciente AS pac 
                                 ON pac.ID_PACIENTE=exp.ID_PACIENTE
                                 INNER JOIN persona AS per2
                                 ON per2.ID_PERSONA=pac.ID_PACIENTE
                                 WHERE con.ID_CONSULTA=?",array($idConsulta))->row();
        $data=array('receta'=>$receta,'info'=>$info);
        return $data;
    }

    public function listaRecetasDespachadas() {
        $receta = $this->db->query("SELECT dr.*,med.NOMBRE AS NOMBRE_MEDICAMENTO
                                    FROM receta AS re
                                    INNER JOIN detalle_receta AS dr
                                    ON dr.ID_RECETA=re.ID_RECETA
                                    INNER JOIN medicamento AS med
                                    ON med.ID_MEDICAMENTO=dr.ID_MEDICAMENTO 
                                    WHERE re.ID_CONSULTA=?", array($idConsulta))->result_array();
        return $receta;
    }

    public function listaRecetasPendientes() {
        $receta = $this->db->query("SELECT con.ID_CONSULTA,DATE_FORMAT(con.FECHA_INICIO,'%Y-%m-%d') AS FECHA,
                                           CONCAT(per1.NOMBRE,' ',per1.APELLIDO) AS NOMBRE_MEDICO,
                                           CONCAT(per2.NOMBRE,' ',per2.APELLIDO) AS NOMBRE_PACIENTE
                                    FROM receta AS re 
                                    INNER JOIN consulta AS con
                                    ON re.ID_CONSULTA=con.ID_CONSULTA
                                    INNER JOIN pago AS pag
                                    ON pag.ID_CONSULTA=re.ID_CONSULTA
                                    INNER JOIN empleado AS emp
                                    ON emp.ID_EMPLEADO=con.ID_EMPLEADO
                                    INNER JOIN persona AS per1
                                    ON emp.ID_EMPLEADO=per1.ID_PERSONA
                                    INNER JOIN expediente AS exp 
                                    ON exp.ID_EXPEDIENTE=con.ID_EXPEDIENTE
                                    INNER JOIN paciente AS pac
                                    ON pac.ID_PACIENTE=exp.ID_PACIENTE
                                    INNER JOIN persona AS per2
                                    ON per2.ID_PERSONA=pac.ID_PACIENTE                                                                     
                                    WHERE re.ESTADO=0
                                    ORDER BY con.FECHA_INICIO ASC
                                    ")->result_array();
        return $receta;
    }

    public function nuevaReceta($receta, $idConsulta) {
        $idReceta = 0;
        if ($receta['recetaIdMedicamentoText']) {
            $dataReceta = array("ID_CONSULTA" => $idConsulta);
            $this->db->insert('receta', $dataReceta);
            if ($this->db->affected_rows() == '1') {
                $idReceta = $this->db->insert_id();
                //guardar detalle receta
                $this->nuevoDetalleReceta($receta, $idReceta);
            } else {
                $idReceta = 0;
            }
        }
        return $idConsulta;
    }

    public function nuevoDetalleReceta($detalleReceta, $idReceta) {
        if ($detalleReceta['recetaIdMedicamentoText']) {

            $total = count($detalleReceta['recetaIdMedicamentoText']);
            for ($r = 0; $r < $total; $r++) {
                $dataReceta = array("ID_RECETA" => $idReceta,
                    "ID_MEDICAMENTO" => $detalleReceta['recetaIdMedicamentoText'][$r],
                    "CANTIDAD" => $detalleReceta['recetaCantidadMedicamentoText'][$r],
                    "DOSIS" => $detalleReceta['recetaDosisMedicamentoText'][$r]);
                $this->db->insert('detalle_receta', $dataReceta);
                $dataReceta = array();
            }
        }
    }
    
    public function editarReceta($receta, $idReceta) {
        $result;
        $this->db->update("receta", $receta, array("ID_RECETA" => $idReceta));
        if ($this->db->affected_rows() >= 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }    
    

}
