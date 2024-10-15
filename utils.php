<?php

$provincias = [
  'Almeria',
  'Cadiz',
  'Cordoba',
  'Granada',
  'Malaga',
  'Sevilla',
  'Huelva',
  'Jaen',
];

$aficiones = [
  'Ciclismo',
  'Cine',
  'Lectura',
  'Otra'
];

function limpiarCadenas (String $nombre): String{

  return htmlspecialchars(trim($nombre));

}

function pintarErrores (String $nombreVarSesion){

  if(isset($_SESSION [$nombreVarSesion])){

    echo "<p class='text-red-500 italic mt-4 text-sm'>{$_SESSION['errEmail']}</p>";
    unset($_SESSION[$nombreVariableSession]);

  }

}