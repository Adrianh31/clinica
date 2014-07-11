<?php

$config = array(
    'paciente' => array(array(
            'field' => 'NOMBRE',
            'label' => 'NOMBRE',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'APELLIDO',
            'label' => 'APELLIDO',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'FECHA_NACIMIENTO',
            'label' => 'FECHA_NACIMIENTO',
            'rules' => 'required|trim|date_valid|xss_clean'
        ),
        array(
            'field' => 'SEXO',
            'label' => 'SEXO',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'DIRECCION',
            'label' => 'DIRECCION',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'NOMBRE_PADRE',
            'label' => 'NOMBRE_PADRE',
            'rules' => 'trim|xss_clean'
        ),
        array(
            'field' => 'RELIGION_PERTENECE',
            'label' => 'RELIGION_PERTENECE',
            'rules' => 'trim|xss_clean'
        ),
        array(
            'field' => 'TELEFONO_FIJO',
            'label' => 'TELEFONO_FIJO',
            'rules' => 'trim|min_length[8]|xss_clean'
        ),
        array(
            'field' => 'TELEFONO_MOVIL',
            'label' => 'TELEFONO_MOVIL',
            'rules' => 'trim|min_length[8]|xss_clean'
        ),
        array(
            'field' => 'CORREO_ELECTRONICO',
            'label' => 'CORREO_ELECTRONICO',
            'rules' => 'trim|valid_email|is_unique[paciente.CORREO_ELECTRONICO]|xss_clean'
        ))
    , 'consulta' => array(array(
            'field' => 'ID_TIPO_CONSULTA',
            'label' => 'ID_TIPO_CONSULTA',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'OBSERVACIONES',
            'label' => 'OBSERVACIONES',
            'rules' => 'required|trim|xss_clean'
        ))
);
?>