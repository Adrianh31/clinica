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
            'label' => 'FECHA NACIMIENTO',
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
            'field' => 'OCUPACION',
            'label' => 'OCUPACION',
            'rules' => 'trim|xss_clean'
        ),
        array(
            'field' => 'NOMBRE_PADRE',
            'label' => 'NOMBRE PADRE',
            'rules' => 'trim|xss_clean'
        ),
        array(
            'field' => 'RELIGION_PERTENECE',
            'label' => 'RELIGION',
            'rules' => 'trim|xss_clean'
        ),
        array(
            'field' => 'TELEFONO',
            'label' => 'TELEFONO',
            'rules' => 'trim|min_length[8]|xss_clean'
        ),
        array(
            'field' => 'CORREO_ELECTRONICO',
            'label' => 'CORREO ELECTRONICO',
            'rules' => 'trim|valid_email|xss_clean'
        ))
    , 'consulta' => array(array(
            'field' => 'OBSERVACIONES',
            'label' => 'OBSERVACIONES',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'DIAGNOSTICO',
            'label' => 'DIAGNOSTICO',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'TEMPERATURA',
            'label' => 'TEMPERATURA',
            'rules' => 'trim|xss_clean'
        ),
        array(
            'field' => 'PESO',
            'label' => 'PESO',
            'rules' => 'trim|xss_clean'
        ),
        array(
            'field' => 'PULSO',
            'label' => 'PULSO',
            'rules' => 'trim|xss_clean'
        ),
        array(
            'field' => 'TALLA',
            'label' => 'TALLA',
            'rules' => 'trim|xss_clean'
        ),
        array(
            'field' => 'TA',
            'label' => 'TA',
            'rules' => 'trim|xss_clean'
        )
    )
    , 'citaPublica' => array(array(
            'field' => 'CORREO_ELECTRONICO',
            'label' => 'CORREO ELECTRONICO',
            'rules' => 'required|trim|xss_clean|valid_email'
        ),
        array(
            'field' => 'ID_ESPECIALIDAD',
            'label' => 'ESPECIALIDAD',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'FECHA',
            'label' => 'FECHA',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'HORA_INICIO',
            'label' => 'HORA INICIO',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'HORA_FIN',
            'label' => 'HORA FIN',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'MOTIVO',
            'label' => 'MOTIVO',
            'rules' => 'required|trim|xss_clean'
        )),
    
     'cita' => array(array(
            'field' => 'ID_PACIENTE',
            'label' => 'PACIENTE',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'ID_ESPECIALIDAD',
            'label' => 'ESPECIALIDAD',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'FECHA',
            'label' => 'FECHA',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'HORA_INICIO',
            'label' => 'HORA INICIO',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'HORA_FIN',
            'label' => 'HORA FIN',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'MOTIVO',
            'label' => 'MOTIVO',
            'rules' => 'required|trim|xss_clean'
        )),
    'login' => array(array(
            'field' => 'USUARIO',
            'label' => 'USUARIO',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'PASSWORD',
            'label' => 'PASSWORD',
            'rules' => 'required|trim|xss_clean'
        ))
);
?>