<?php

class Pago_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function pagosPendientes() {
        
       $pagos=  $this->db->query("SELECT ");
       return $pagos;
   
    }



}
