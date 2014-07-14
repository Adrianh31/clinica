<?php

class Paciente_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('persona_model');
        $this->load->model('expediente_model');
    }

    public function getPaciente($idPaciente) {

        $paciente;

        if ($idPaciente) {
            $paciente = $this->db->query("SELECT *,CONCAT(per.NOMBRE,' ',per.APELLIDO) AS NOMBRE_PACIENTE 
                                          FROM persona AS per 
                                          INNER JOIN paciente AS pac 
                                          ON per.ID_PERSONA=pac.ID_PACIENTE
                                          INNER JOIN expediente AS ex
                                          ON ex.ID_PACIENTE=pac.ID_PACIENTE
                                          WHERE pac.ID_PACIENTE=?", array($idPaciente)
                                        )->row();
        }


        return $paciente;
    }

    public function nuevoPaciente($paciente) {

        $idPersona = $this->persona_model->nuevaPersona($paciente);
        $result = FALSE;

        if ($idPersona > 0) {
            $data = array(
                'ID_PACIENTE' => $idPersona,
                'OCUPACION' => $paciente['OCUPACION'],
                'FECHA_NACIMIENTO' => $paciente['FECHA_NACIMIENTO'],
                'SEXO' => $paciente['SEXO'],
                'DIRECCION' => $paciente['DIRECCION'],
                'NOMBRE_PADRE' => $paciente['NOMBRE_PADRE'],
                'RELIGION_PERTENECE' => $paciente['RELIGION_PERTENECE']
            );

            $this->db->insert("paciente", $data);

            if ($this->db->affected_rows() == '1') {
                $this->expediente_model->nuevoExpediente($idPersona);
                $result = TRUE;
            } else {
                $result = FALSE;
            }
            return $result;
        }
    }

    public function editarPaciente($paciente, $idPaciente) {
        $idPersona = $this->persona_model->editarPersona($paciente, $idPaciente);

        if ($idPersona == TRUE) {
            $data = array(
                //'ID_PACIENTE' => $idPersona,
                'OCUPACION' => $paciente['OCUPACION'],
                'FECHA_NACIMIENTO' => $paciente['FECHA_NACIMIENTO'],
                'SEXO' => $paciente['SEXO'],
                'DIRECCION' => $paciente['DIRECCION'],
                'NOMBRE_PADRE' => $paciente['NOMBRE_PADRE'],
                'RELIGION_PERTENECE' => $paciente['RELIGION_PERTENECE']
            );

            $this->db->update("paciente", $data, array("ID_PACIENTE" => $idPaciente));

            if ($this->db->affected_rows() >= 0) {
                $result = TRUE;
            } else {
                $result = FALSE;
            }
            return $result;
        }
    }

    public function buscarPaciente($filtro) {

        $pacientes = $this->db->query("SELECT * 
                          FROM paciente AS pac INNER JOIN persona AS per
                          ON pac.ID_PACIENTE=per.ID_PERSONA
                          WHERE CONCAT(per.NOMBRE,' ',per.APELLIDO) LIKE '%" . $this->db->escape_like_str($filtro) . "%'"
                )->result_array();

        return $pacientes;
    }

    public function listaPacientes() {
        $pacientes = $this->db->query("SELECT pac.ID_PACIENTE, CONCAT(per.NOMBRE,' ',per.APELLIDO) AS NOMBRE_PACIENTE
                                       FROM paciente AS pac INNER JOIN persona AS per
                                       ON pac.ID_PACIENTE=per.ID_PERSONA
                                       ")->result_array();
        return $pacientes;
    }

}
