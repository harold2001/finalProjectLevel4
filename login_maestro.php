<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="./css/login/login_common.css">
   <title>Login</title>
</head>

<body>
<div class="vh-100 d-flex flex-column justify-content-center align-items-center text-white">
      <div class="col-12 col-lg-8 d-flex justify-content-center align-items-center rounded-3 p-5 p-md-3 p-lg-4 flex-column flex-md-row position-relative" id="main-container-login-main">
         <div class='col-12 col-lg-8 position-absolute' style="top: -55px; left:0;">
            <a href='login_main.php' id="button-back">
               <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
                  <path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path>
               </svg>
               <span>Back</span>
            </a>
         </div>
         <div class="sub-container-login-main col-12 col-md-6 d-flex justify-content-center align-items-center pe-md-3 pe-lg-4">
            <img src="./assets/logo.JPG" alt="University Image" class="rounded-3" style="width: 100%;">
         </div>
         <div class="sub-container-login-main col-12 col-md-6 d-flex justify-content-center align-items-center flex-column ps-md-3 ps-lg-4">
            <div class="login-box col-12 p-4">
               <p class="fs-2 text-center">Maestro</p>
               <form method="post" action="login_corroborar_tool.php">
                  <div class="user-box">
                     <input required name="username" type="text">
                     <label>Nombre de usuario</label>
                  </div>
                  <div class="user-box">
                     <input required name="password" type="password">
                     <label>Contraseña</label>
                  </div>
                  <input type="text" hidden name="rol_tool" value="maestro">
                  <div class="col-12 d-flex justify-content-center">
                     <button class="btn text-center" type="submit">
                        Ingresar
                        <span></span>
                     </button>
                  </div>

                  <?php

                  session_start();

                  if (isset($_SESSION["array_login"])) {
                     $row = $_SESSION["array_login"];

                     if ((isset($row["id_cargo"])) && ($row["id_cargo"] == 2)) {

                        header("location: maestro_home.php");
                     } else if ($row === "no existe") {
                        echo "
                        <p class='text-center mt-1' style='font-size: 14px'>Esta cuenta no es de maestro. ¿Deseas ir a otra opción de ingreso?</p>
                        <div class='d-flex justify-content-center col-12 gap-3'>
                        <a href='login_alumno.php' class='btn btn-option'>Alumno</a>
                        <a href='login_admin.php' class='btn btn-option'>Admin</a>
                        </div>
                        ";
                        unset($_SESSION["array_login"]);
                     }
                  }
                  ?>
               </form>
            </div>
         </div>
      </div>
   </div>
</body>

</html>