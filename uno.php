<?php
    if(isset ($_POST["btnEnviar"])){

        //echo "Formulario enviado";
        $email = htmlspecialchars(trim($_POST["email"]));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

          $_SESSION["errEmail"]="Error debes introducir un email válido";
          header("Location:{$_SERVER["PHP_SELF"]}");

        }else{

          echo "El email es: " . $email;

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

<body class="bg-purple-100">

  <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="w-96 mx-auto">
    <div class="mb-5">
      <label for="email" class="block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
      <input name="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
      <?php
      if(isset($_SESSION["errEmail"])){
        echo "<p class='text-red-500 italic mt-4 text-sm'>{$_SESSION['errEmail']}</p>";
        unset ($_SESSION["errEmail"]);
      }
      ?>
    </div>
    <button name="btnEnviar" class="bg-blue-500 mb-5 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
      <i class="fa-solid fa-floppy-disk mr-2"></i>
      GUARDAR
    </button>
  </form>

</body>

</html>

<?php

    }

?>