<?php

function validarRoles($roles, $tieneRol) {
    foreach ($roles as $rol) {
        if ($rol['ROL'] == $tieneRol) {
            return TRUE;
        }
    }
    return FALSE;
}

function validarHorasCitas($horaInicio, $horaFin) {
    $resultado = true;
    $horaInicio = strtotime($horaInicio);
    $horaFin = strtotime($horaFin);
    $horaLimite = strtotime("15:30");
    $horaComienzo = strtotime("08:00");
    if ($horaInicio > $horaFin) {
        $resultado = false;
    } elseif ($horaInicio == 1406440800) {
        $resultado = false;
    } elseif ($horaFin == 1406440800) {
        $resultado = false;
    } elseif ($horaFin == $horaInicio) {
        $resultado = false;
    } elseif ((($horaComienzo - $horaLimite) / 60) > 30) {
        $resultado = false;
    }

    return $resultado;
}
