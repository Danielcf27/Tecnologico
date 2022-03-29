<?php

session_start();
function estalogeado()
{

    return isset($_SESSION['usuario_id']) ? true : false;
}

function redirigir($locacion)
{

    header('Location:  ' . $locacion);
}
