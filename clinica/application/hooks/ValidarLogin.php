<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ValidarLogin {

    private $ci;

    public function __construct() {
        $this->ci = & get_instance();
        !$this->ci->load->library('session') ? $this->ci->load->library('session') : false;
        !$this->ci->load->helper('url') ? $this->ci->load->helper('url') : false;

        //-----------INFO USER -------------//
        $this->ci->roles = $this->ci->session->userdata('roles');
        $this->ci->idPersona = $this->ci->session->userdata('idPersona');
        $this->ci->idEspecialidad = $this->ci->session->userdata('idEspecialidad');
        //-----------INFO USER -------------//    
    }

    public function validar() {

        //------------Modulos Publicos ----------//
        $publicos[] = "login";
        $publicos[] = "servicios";
        //------------Modulos Publicos ----------//
        //------------Modulos Secretaria ----------//
        $secretaria[] = "cita";
        $secretaria[] = "pago";
        $secretaria[] = "panel";
        $secretaria[] = "paciente";
        $secretaria[] = "medicamento";
        //------------Modulos Secretaria ----------//
        //------------Modulos Medicos ----------//
        $medico[] = "cita";
        $medico[] = "consulta";
        $medico[] = "panel";
        $medico[] = "examen";
        $medico[] = "medicamento";
        //------------Modulos Medicos ----------//           


        $modulo = $this->ci->uri->segment(1); //get modulo
        $roles = $this->ci->roles; //get roles
        $acceso = FALSE;
        $moduloAcceso;



        foreach ($publicos as $mod) {
            if ($mod == $modulo) {
                $acceso = TRUE;
                $moduloAcceso = $mod . "1";
                break;
            }
        }



        if ($roles && $acceso == FALSE) {
            foreach ($roles as $rol) {
                if ($rol['ROL'] == 'Secretaria') {
                    foreach ($secretaria as $mod) {
                        if ($mod == $modulo) {
                            $acceso = TRUE;
                            $moduloAcceso = $mod . "2";
                            break;
                        }
                    }
                } elseif ($rol['ROL'] == 'Medico') {
                    foreach ($medico as $mod) {
                        if ($mod == $modulo) {
                            $acceso = TRUE;
                            $moduloAcceso = $mod . "3";
                            break;
                        }
                    }
                } elseif ($rol['ROL'] == 'Administrador') {
                    $acceso = TRUE;
                    $moduloAcceso = $mod . "4";
                    break;
                }
            }
        }

        if ($acceso == FALSE) {
            if ($this->ci->idPersona) {
                redirect(base_url('panel'));
            } else {
                redirect(base_url('login'));
            }
        }
    }

}

/*
/end hooks/ValidarLogin.php
*/