<?php

class Analisis_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getAnalisis($idConsulta) {
        $analisis = $this->db->query("SELECT da.*, 
                                             exa.NOMBRE AS NOMBRE_EXAMEN
                                    FROM analisis AS an
                                    INNER JOIN detalle_analisis AS da
                                    ON da.ID_ANALISIS=an.ID_ANALISIS
                                    INNER JOIN examen AS exa
                                    ON exa.ID_EXAMEN=dA.ID_EXAMEN 
                                    WHERE an.ID_CONSULTA=?", array($idConsulta))->result_array();
        return $analisis;
    }

    public function nuevoAnalisis($analisis, $idConsulta) {
        $idAnalisis = 0;
        if ($analisis['examenIdExamenText']) {
            $dataAnalisis = array("ID_CONSULTA" => $idConsulta);
            $this->db->insert('analisis', $dataAnalisis);
            if ($this->db->affected_rows() == '1') {
                $idAnalisis = $this->db->insert_id();
                //guardar detalle receta
                $this->nuevoDetalleAnalisis($analisis, $idAnalisis);
            } else {
                $idAnalisis = 0;
            }
        }
        return $idConsulta;
    }

    public function nuevoDetalleAnalisis($detalleAnalisis, $idAnalisis) {
        if ($detalleAnalisis['examenIdExamenText']) {
            $total = count($detalleAnalisis['examenIdExamenText']);
            for ($r = 0; $r < $total; $r++) {
                $dataAnalisis = array("ID_ANALISIS" => $idAnalisis,
                    "ID_EXAMEN" => $detalleAnalisis['examenIdExamenText'][$r],
                    "DESCRIPCION" => $detalleAnalisis['examenDescripcionExamenText'][$r],
                    "FECHA_A_REALIZAR" => $detalleAnalisis['examenFechaExamenText'][$r]);
                $this->db->insert('detalle_analisis', $dataAnalisis);
                $dataAnalisis = array();
            }
        }
    }

}
