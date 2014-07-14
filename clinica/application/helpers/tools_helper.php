<?php

function validarRoles($roles, $tieneRol) {
    foreach ($roles as $rol) {
        if ($rol['ROL'] == $tieneRol) {
            return TRUE;
        }
    }
    return FALSE;
}
