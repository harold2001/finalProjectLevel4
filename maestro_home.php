<?php
session_start();
error_reporting(0);
$userSession = $_SESSION["array_login"];

if ((!isset($userSession)) || ($userSession === "")) {
   include("no_account.php");
   die();
} else {
   include("conexion.php");
   $username  = $_SESSION["array_login"]["username_maestro"];
   $name = $_SESSION["array_login"]["name_maestro"];
   $code = "SELECT * FROM `maestros` WHERE `username_maestro` = '$username' AND `name_maestro` = '$name'";
   $result = $conexion->query($code);
   $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <title>Panel de maestro</title>
   <!-- Favicon-->
   <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
   <!-- CSS -->
   <link href="css/admin/styles_admin_t.css" rel="stylesheet" />
   <link href="css/admin/admin_home.css" rel="stylesheet" />
</head>

<body>
   <div class="d-flex" id="wrapper">

      <!-- Page content wrapper-->
      <div id="page-content-wrapper">
         <!-- Top navigation-->
         <nav class="navbar navbar-expand-lg navbar-light border-bottom px-lg-3" style="background-color: #23488f; height: 10vh">
            <div class="container-fluid justify-content-lg-between ">
               <h1 class="text-white">Maestro</h1>
               <div class="list-group list-group-flus">
                  <a href="cerrar_sesion.php" id="btn-cerrar"">Cerrar sesión</a>
               </div>
            </div>
         </nav>
         <!-- Page content-->
         <div class=" container-fluid d-flex justify-content-center align-items-center flex-column" style="height: 90vh;">
                     <h1 class="">Bienvenido <?php echo $row["name_maestro"]; ?></h1>
                     <p>¿Qué deseas hacer hoy?</p>
                     <div class="d-flex flex-wrap gap-4 justify-content-center align-items-center col-lg-7 col-xl-12">
                        <a href="maestro_mostrar_lista.php" class="text-decoration-none text-dark">
                           <div class="card">
                              <img src="./assets/datos.svg" class="col-11" alt="Maestro">
                              <div>
                                 <h5 class="card-title">Lista de alumnos</h5>
                              </div>
                           </div>
                        </a>

                        <a href="maestro_calificaciones.php" class="text-decoration-none text-dark">
                           <div class="card">
                              <img src="./assets/grades.svg" class="col-11" alt="Maestro">
                              <div>
                                 <h5 class="card-title">Ingresar calificaciones</h5>
                              </div>
                           </div>
                        </a>

                        <a href="maestro_comentarios.php" class="text-decoration-none text-dark">
                           <div class="card">
                              <img src="./assets/comments.svg" class="col-11" alt="Maestro">
                              <div>
                                 <h5 class="card-title">Ingresar comentarios</h5>
                              </div>
                           </div>
                        </a>

                        <a href="maestro_mostrar_todo.php" class="text-decoration-none text-dark">
                           <div class="card">
                              <img src="./assets/data.svg" class="col-11" alt="Maestro">
                              <div>
                                 <h5 class="card-title">Ver datos de los alumnos</h5>
                              </div>
                           </div>
                        </a>
                     </div>
               </div>
            </div>
      </div>
      <!-- Bootstrap core JS-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Core theme JS-->
      <script src="js/scripts.js"></script>
</body>

</html>