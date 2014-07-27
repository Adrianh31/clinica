<?php

class Medicamento_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getMedicamento($idMedicamento) {
        $listaMedicamentos = $this->db->query("SELECT * 
                                               FROM medicamento 
                                               WHERE ID_MEDICAMENTO=?", array($idMedicamento))->row();
        return $listaMedicamentos;
    }

    public function listaMedicamentos() {
        $listaMedicamentos = $this->db->query("SELECT * FROM medicamento")->result_array();
        return $listaMedicamentos;
    }

    public function buscarMedicamento($filtro) {
        $listaMedicamentos = $this->db->query("SELECT ID_MEDICAMENTO,NOMBRE,CANTIDAD_ACTUAL FROM medicamento WHERE NOMBRE LIKE '%" . $this->db->escape_like_str($filtro) . "%' LIMIT 20")->result_array();
        $medicamentos;
        if ($listaMedicamentos) {
            foreach ($listaMedicamentos as $medicamento) {
                $medicamentoData = array("idMedicamento" => $medicamento['ID_MEDICAMENTO'], "cantdad" => $medicamento['CANTIDAD_ACTUAL']);
                $medicamentos[] = array('value' => $medicamento['NOMBRE'],
                    'data' => $medicamento['ID_MEDICAMENTO'],
                    'cantidad' => $medicamento['CANTIDAD_ACTUAL']);
            }
        }
        $lista = array("suggestions" => $medicamentos);
        return $lista;
    }

    public function actualizarInventario($idReceta) {
        $result;
        //actualizar inventario
        $this->db->query("UPDATE medicamento AS med
                         INNER JOIN detalle_receta AS dre
                         ON med.ID_MEDICAMENTO=dre.ID_MEDICAMENTO
                         SET med.CANTIDAD_ACTUAL=
                              CASE WHEN (med.CANTIDAD_ACTUAL-dre.CANTIDAD)<0 THEN 0
                                   ELSE med.CANTIDAD_ACTUAL-dre.CANTIDAD
                              END
                          WHERE dre.ID_RECETA=?", $idReceta);

        if ($this->db->affected_rows() >= 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }

    public function editarMedicamento($medicamento, $idMedicamento) {
        $result;
        $this->db->update("medicamento", $medicamento, array("ID_MEDICAMENTO" => $idMedicamento));
        if ($this->db->affected_rows() >= 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }

    public function nuevoMedicamento($medicamento) {
        $idMedicamento;
        $this->db->insert('medicamento', $medicamento);
        if ($this->db->affected_rows() == '1') {
            $idMedicamento = $this->db->insert_id();
        } else {
            $idMedicamento = 0;
        }
        return $idMedicamento;
    }

}
