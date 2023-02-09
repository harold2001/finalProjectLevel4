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
   <title>Lista de alumnos</title>
   <!-- Favicon-->
   <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
   <!-- CSS -->
   <link href="css/admin/styles_admin_t.css" rel="stylesheet" />
   <link href="css/admin/button_admin_home.css" rel="stylesheet" />
   <link href="css/admin/admin_registrar.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>
   <div class="d-flex" id="wrapper">
      <!-- Sidebar-->
      <div class="border-end position-relative" id="sidebar-wrapper" style="background-color: #23488f;">
         <a href="maestro_home.php">
            <div class="sidebar-heading border-bottom d-flex justify-content-center py-2" style="height: 10vh;">
               <img src="./assets/logo.JPG" height="" class="rounded-3">
            </div>
         </a>
         <div class="list-group list-group-flus p-2">
            <div class="accordion-item">
               <div class="accordion-body">
                  <nav class="nav flex-column">
                     <a class="nav-link" href="maestro_mostrar_lista.php">Lista de alumnos</a>
                     <a class="nav-link" href="maestro_calificaciones.php">Ingresar calificaciones</a>
                     <a class="nav-link" href="maestro_comentarios.php">Ingresar comentarios</a>
                     <a class="nav-link" href="maestro_mostrar_todo.php">Ver datos completos de los alumnos</a>
                  </nav>
               </div>
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
               <h1 class="text-white">Maestro</h1>
            </div>
         </nav>
         <!-- Page content-->
         <div class="container-fluid d-flex justify-content-center align-items-center flex-column col-12" style="height: max-content; ">
            <h1 class="text-whit" style="color: #23488f;">Lista de alumnos</h1>

            <div class="col-12 col-lg-8" style="overflow: scroll;">
               <table class="table table-primar col-12">
                  <thead>
                     <tr>
                        <th class="">ID</th>
                        <th class="">Nombre completo</th>
                        <th class="">Usuario</th>
                        <th class="">Curso asignado</th>
                        <th class="text-center">Nota actual</th>
                        <th class="">Comentario</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     include("conexion.php");
                     $cursoAsignado = $userSession["curso_maestro"];
                     $code = "SELECT * FROM alumno_materia, cursos, alumnos WHERE alumno_materia.curso_id = '$cursoAsignado' AND alumno_materia.name_id = alumnos.id_alumno AND alumno_materia.curso_id = cursos.id_curso";
                     $result = $conexion->query($code);
                     while ($row = $result->fetch_assoc()) {
                     ?>
                        <tr>
                           <td class=""><?php echo $row["id_alumno"]; ?></td>
                           <td class=""><?php echo $row["name_alumno"]; ?></td>
                           <td class=""><?php echo $row["username"]; ?></td>
                           <td class=""><?php echo $row["curso_name_original"]; ?></td>
                           <td class=" text-center">
                              <?php
                              if ($row["calificacion"] == 0) {
                                 echo "No asignada";
                              } else {
                                 echo $row["calificacion"];
                              }
                              ?>
                           </td>
                           <td class=""><?php echo $row["comentario"]; ?></td>
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