<?php
session_start();
error_reporting(0);
$userSession = $_SESSION["array_login"];

if ((!isset($userSession)) || ($userSession === "")) {
   include("no_account.php");
   die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <title>Lista total de maestros</title>
   <!-- Favicon-->
   <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
   <!-- CSS -->
   <link href="css/admin/styles_admin_t.css" rel="stylesheet" />
   <link href="css/admin/button_admin_home.css" rel="stylesheet" />
   <link href="css/admin/admin_home.css" rel="stylesheet" />
   <link href="css/admin/admin_registrar.css" rel="stylesheet" />
</head>

<body>
   <div class="d-flex" id="wrapper">
      <!-- Sidebar-->
      <div class="border-end position-relative" id="sidebar-wrapper" style="background-color: #23488f;">
         <a href="admin_home.php">
            <div class="sidebar-heading border-bottom d-flex justify-content-center py-2" style="height: 10vh;">
               <img src="./assets/logo.JPG" height="" class="rounded-3">
            </div>
         </a>
         <div class="list-group list-group-flus p-2">
            <div class="accordion" id="accordionPanelsStayOpenExample">
               <!-- Primer elemento del acordeón -->
               <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                     <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Maestros
                     </button>
                  </h2>
                  <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                     <div class="accordion-body">
                        <nav class="nav flex-column">
                           <a class="nav-link" href="admin_registrar_maestro.php">Registrar nuevos maestros</a>
                           <a class="nav-link" href="admin_mostrar_maestros.php">Ver los maestros registrados</a>
                        </nav>
                     </div>
                  </div>
               </div>
               <!-- Segundo elemento del acordeón -->
               <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Alumnos
                     </button>
                  </h2>
                  <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                     <div class="accordion-body">
                        <nav class="nav flex-column">
                           <a class="nav-link" href="admin_registrar_alumno.php">Registrar nuevos alumnos</a>
                           <a class="nav-link" href="admin_mostrar_alumnos.php">Ver los alumnos registrados con notas</a>
                        </nav>
                     </div>
                  </div>
               </div>
               <!-- Fin segundo elemento -->
            </div>
         </div>
         <div class="list-group list-group-flus p-2 position-absolute bottom-0">
            <a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>
         </div>
      </div>
      <!-- Page content wrapper-->
      <div id="page-content-wrapper">
         <!-- Top navigation-->
         <nav class="navbar navbar-expand-lg navbar-light border-bottom px-lg-3" style="background-color: #23488f; height: 10vh">
            <div class="container-fluid justify-content-lg-between ">
               <button class="continue-application" id="sidebarToggle">
                  <div>
                     <div class="pencil"></div>
                     <div class="folder">
                        <div class="top">
                           <svg viewBox="0 0 24 27">
                              <path d="M1,0 L23,0 C23.5522847,-1.01453063e-16 24,0.44771525 24,1 L24,8.17157288 C24,8.70200585 23.7892863,9.21071368 23.4142136,9.58578644 L20.5857864,12.4142136 C20.2107137,12.7892863 20,13.2979941 20,13.8284271 L20,26 C20,26.5522847 19.5522847,27 19,27 L1,27 C0.44771525,27 6.76353751e-17,26.5522847 0,26 L0,1 C-6.76353751e-17,0.44771525 0.44771525,1.01453063e-16 1,0 Z"></path>
                           </svg>
                        </div>
                        <div class="paper"></div>
                     </div>
                  </div>
                  Más opciones
               </button>
               <h1 class="text-white">Admin</h1>
            </div>
         </nav>
         <!-- Page content-->
         <div class="container-fluid d-flex justify-content-center align-items-center flex-column col-12">
            <h1 class="text-whit" style="color: #23488f;">Lista total de maestros</h1>

            <div class="">
               <table class="table table-primary">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Nombre completo</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Curso asignado</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     include("conexion.php");
                     $codeMaestros = "SELECT * FROM maestros, cursos WHERE `id_cargo` = 2 AND maestros.curso_maestro = cursos.id_curso";
                     $resultMaestros = $conexion->query($codeMaestros);

                     
                     while (($rowMaestros = $resultMaestros->fetch_assoc())) {
                     ?>
                        <tr>
                           <td><?php echo $rowMaestros["id_maestro"]; ?></td>
                           <td><?php echo $rowMaestros["name_maestro"]; ?></td>
                           <td><?php echo $rowMaestros["username_maestro"]; ?></td>
                           <td><?php echo $rowMaestros["password_maestro"]; ?></td>
                           <td><?php echo $rowMaestros["curso_name_original"]; ?></td>
                        </tr>
                     <?php
                     }
                     ?>
                  </tbody>
               </table>
               
            </div>
         </div>
      </div>
   </div>

   <!-- Core theme JS-->
   <script src="js/scripts.js"></script>
</body>

</html>