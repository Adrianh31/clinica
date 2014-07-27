<?php

class Empleado_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function listaEmpleados($tipoEmpleado) {
        $listaEmpleados;

        if ($tipoEmpleado == "Todos") {
//            $listaEmpleados = $this->db->query("SELECT * FROM estado_cita")->result_array();
        } elseif ($tipoEmpleado == "Medicos") {
            $listaEmpleados = $this->db->query("SELECT emp.ID_EMPLEADO,
                                                       CONCAT(per.NOMBRE,' ',per.APELLIDO) AS NOMBRE_EMPLEADO,  
                                                       per.TELEFONO, per.CORREO_ELECTRONICO,
                                                       emp.TITULO,
                                                       esp.NOMBRE AS ESPECIALIDAD,esp.ID_ESPECIALIDAD,
                                                       esp.NJM
                                                FROM empleado AS emp INNER JOIN persona AS per
                                                ON emp.ID_EMPLEADO=per.ID_PERSONA
                                                INNER JOIN especialidad AS esp 
                                                ON esp.ID_ESPECIALIDAD=emp.ID_ESPECIALIDAD")->result_array();
        }
        return $listaEmpleados;
    }

    public function listaMedicosEspecialidad($idEspecialidad) {
        $listaEmpleados = $this->db->query("SELECT emp.ID_EMPLEADO,
                                                   CONCAT(per.NOMBRE,' ',per.APELLIDO) AS NOMBRE_EMPLEADO
                                                FROM empleado AS emp INNER JOIN persona AS per
                                                ON emp.ID_EMPLEADO=per.ID_PERSONA
                                                WHERE emp.ID_ESPECIALIDAD=?",array($idEspecialidad))->result_array();
        return $listaEmpleados;
        
    }

}
