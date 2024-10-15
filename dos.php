<?php
session_start();
// include, include_once, require, require_once
// include : incluir archivo si no existe warning, 
// include_once : solo una vez, necesita mas procesador y memoria,
// require : incliye y si no eciste para el programa
require __DIR__."/utils.php";

if(isset($_POST["btnGuardar"])){

  //Procesamos el form
  //1.Recogemos los datos y saneamos y limpiamos
  $email=limpiarCadenas($_POST["email"]);
  $password=limpiarCadenas($_POST["password"]);
  $provincia=limpiarCadenas($_POST["countries"]);
  $aficiones=(isset($_POST["aficiones"])) ? htmlspecialchars(trim($_POST["aficiones"])) : -1;
  //Validación (nombre al menos 3 caracteres, email válido alguna afición y alguna prov)
  $errores=false;
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

    $errores=true;
    $_SESSION["errEmail"]="El email NO es válido";
    
  }
  if(strlen($password)<5 || strlen($password)>15){

    $errores=true;
    $_SESSION["errPass"]="La contraseña tiene que tener entre 5 y 15 carácteres";

  }

  if(!in_array($provincia, $provincias)){

    $errores=true;
    $_SESSION["errProv"]="Debes elegir una provincia";

  }

  if($aficionesElegidas == -1){

    $errores=true;
    $_SESSION["errAfi"]="Debes elegir alguna afición";

  }else{

    foreach($aficioneselegidas as $item){

      if(!in_array($item, $aficiones)){

        $errores = true;
        $_SESSION["errAfi"] = "Afición erronea, intento de ataque";
        break;

      }

    }

  }

  if($errores){

    header("Location:dos.php");

  }else{

    echo "<br>Datos correctos<br>";
    echo "<br>Email: $email<br>";
    echo "<br>Password: $password<br>";
    echo "<br>Provincia: $provincia<br>";

    foreach($aficiones as $item){



    }
  }

}else{

?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CDN TAILWIND -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- CDN  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body bgcolor="#08C2FF">

  <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="w-96 mx-auto">
    <div class="mb-5">
      <label for="email" class="block mt-3 mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
      <input name="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
    </div>
    <div class="mb-5">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
      <input name="password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>
    <div class="mb-5  ">
      <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
      <select id="countries" name="provincia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>Elige una provincia</option>
        <?php
        foreach ($provincias as $key => $value) {
          echo "<option>$value</option> \n";
        }
        ?>
      </select>
    </div>

    <div class="flex mb-5">
      <?php
      foreach ($aficiones as $key => $value) {
        echo <<<TXT
            <div class="flex items-center me-4">
              <input name="aficiones[]" id="inline-checkbox-$key" type="checkbox" value="$value" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              <label for="inline-checkbox-$key" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">$value</label>
            </div>
          TXT;
      }

      ?>

    </div>

    <button name="btnGuardar" class="bg-blue-500 mb-5 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
      <i class="fa-solid fa-floppy-disk mr-2"></i>
      GUARDAR
    </button>
  </form>

</body>

<?php
  }
?>

</html>