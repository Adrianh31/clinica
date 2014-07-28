<?php

function sendEmail($from, $who, $to, $subject, $body) {
    $ci = & get_instance();

    $ci->load->library('email');
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.gmail.com';
    $config['smtp_port'] = '465';
    $config['smtp_timeout'] = '7';
    $config['smtp_user'] = 'clinicanazaretss@gmail.com';
    $config['smtp_pass'] = 'Nazareth1';
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $ci->email->initialize($config);
    $ci->email->from($from, $who);
    $ci->email->to($to);
    $ci->email->subject($subject);
    $ci->email->message($body);
    $ci->email->send();
    //echo $ci->email->print_debugger();
}

function sendValidarCita($cita, $to) {
    $ci = & get_instance();
    $from = "noreply@clinicanazaret.ue5.org";
    $who = $ci->config->item('name_company');
    $subject = 'Validar Cita';
    $data['cita'] = $cita;
    $data['enlaceValidarCita']=  base_url('servicios/validarCita/'.md5($cita->ID_EMAIL));
    $body = $ci->load->view('emails/validarCita', $data, TRUE);
    sendEmail($from, $who, $to, $subject, $body);
}

//noreply@clinicanazaret.website.org