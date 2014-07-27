<?php

function validarRoles($roles, $tieneRol) {
    foreach ($roles as $rol) {
        if ($rol['ROL'] == $tieneRol) {
            return TRUE;
        }
    }
    return FALSE;
}
/*
function validarHorasCitas($horaInicio, $horaFin) {
    $resultado = false;
    $horaInicio = strtotime($horaInicio);
    $horaFin = strtotime($horaFin);
    $horaLimite = strtotime("15:30");
    $horaComienzo = strtotime("08:00");
    if ($horaInicio > $horaFin) {
        $resultado = false;
    } elseif (!$horaInicio) {
        $resultado = false;
    } elseif ($horaFin > $horaLimite) {
        
    }

    return $resultado;
}*/
