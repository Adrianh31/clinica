<?php

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function validarLoginEmpleado($usuario, $password) {
        $valido = FALSE;

        //buscar si existe el usuario
        $buscarUsuario = $this->db->query("SELECT u.ID_PERSONA
                                           FROM usuario AS u
                                           WHERE u.USUARIO=? 
                                           AND u.PASSWORD=MD5(?)
                                           AND u.ESTADO=1", array($usuario, $password))->row();
       // print_r($this->db->last_query());

        if ($buscarUsuario) {



            //obtener info basica del empleado
            $infoEmpleado = $this->db->query("SELECT CONCAT(per.NOMBRE,' ',per.APELLIDO) AS NOMBRE_EMPLEADO
                                              FROM persona AS per
                                              INNER JOIN empleado AS em
                                              ON em.ID_EMPLEADO=per.ID_PERSONA
                                              WHERE per.ID_PERSONA=?", array($buscarUsuario->ID_PERSONA))->row();

            //obtener roles del usuario.
            $infoRoles = $this->db->query("SELECT r.NOMBRE AS ROL 
                                            FROM detalle_rol AS dr
                                            INNER JOIN rol AS r
                                            ON dr.ID_ROL=r.ID_ROL
                                            WHERE dr.ID_EMPLEADO=?", array($buscarUsuario->ID_PERSONA))->result_array();


            //obtener especialidad medico si aplica
            $especialidad = '';
            $nombreEspecialidad = '';
            $infoEspecialidad = $this->db->query("SELECT es.ID_ESPECIALIDAD, es.NOMBRE
                                                  FROM especialidad AS es
                                                  INNER JOIN empleado AS em
                                                  ON es.ID_ESPECIALIDAD=em.ID_ESPECIALIDAD
                                                  WHERE em.ID_EMPLEADO=?", array($buscarUsuario->ID_PERSONA)
                    )->row();
            if ($infoEspecialidad) {
                $especialidad = $infoEspecialidad->ID_ESPECIALIDAD;
                $nombreEspecialidad = $infoEspecialidad->NOMBRE;
            }

            if ($infoEmpleado && $infoRoles) {
                $sesionData = array(
                    'idPersona' => $buscarUsuario->ID_PERSONA,
                    'nombrePersona' => $infoEmpleado->NOMBRE_EMPLEADO,
                    'roles' => $infoRoles,
                    'idEspecialidad' => $especialidad,
                    'nombreEspecialidad' => $nombreEspecialidad
                );
                $this->session->set_userdata($sesionData);
                $valido = TRUE;
            } else {
                $valido = FALSE;
            }
        } else {
            $valido = FALSE;
        }

        return $valido;
    }

}
