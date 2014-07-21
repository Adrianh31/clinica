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

    public function nuevaReceta($receta, $idConsulta) {
        $idReceta = 0;
        if ($receta['recetaIdMedicamentoText']) {
            $dataReceta = array("ID_CONSULTA" => $idConsulta);
            $this->db->insert('receta', $dataReceta);
            if ($this->db->affected_rows() == '1') {
                $idReceta = $this->db->insert_id();
                //guardar detalle receta
                $this->nuevaDetalleReceta($receta, $idReceta);
            } else {
                $idReceta = 0;
            }
        }
        return $idConsulta;
    }

    public function nuevaDetalleReceta($detalleReceta, $idReceta) {
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

}
