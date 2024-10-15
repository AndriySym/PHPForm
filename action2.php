<?php

include("./utils.php");

// Recogemos los datos del form
$email = htmlspecialchars(trim($_POST['email'])); // quitamos los espacios en blanco
$password = trim($_POST['password']);
$provincia = $_POST['provincia'];
$aficiones_recogidas = (isset($_POST['aficiones'])) ? 
$_POST['aficiones'] 
: -1;

// Vamos a obligar a que el email sea un email valido
// el password tenga el menos 5 caracreres
// las provincias esten en el array de pronvincias
// las aficiones esten en ela rray de aficiones
// que al menos hayamos marcado una

$errores = [];

// VALIDAMOS PASSWORD
if (strlen($password) < 5) {
  $errores[] = "El campo Password debe tener 5 caracteres";
}

// VALIDAMOS EMAIL
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errores[] = "El campo email debe ser valido";
}

// VALIDAMOS AFICIONES
if ($aficiones_recogidas == -1) {
  $errores[] = "Elija  una aficion";
}

if (!in_array($provincia, $provincias)) {
    $errores[] = "Elije una provincia";
}
  
if (count($errores)) {
    echo "<h3>Errores</h3>";
    echo "<ol>";
    foreach ($errores as $key => $value) {
      echo "<li>$value</li>";
    }
    echo "</ol>";
}else{
    echo "<h3>Datos</h3>";
    echo "Email : $email";
    echo "<br>";
    echo "Contraseña : $password";
    echo "<br>";
    echo "Provincia : $provincia";
    echo "<br>";
    echo "Aficiones : ";
    echo "<br>";

    foreach ($aficiones_recogidas as $key => $value) {
      echo "$value";
    }
}
