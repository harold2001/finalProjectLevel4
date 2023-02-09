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
   <title>Ingresar calificaciones</title>
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
         <div class="container-fluid d-flex justify-content-center align-items-center flex-column col-12" style="height: 90vh;">
            <h4 class="fs-1" style="color: #23488f">Ingresar comentarios</h4>
            <div class="card" style=" width: 400px">
               <form method="post" action="registrar_maestro_tool.php">
                  <div class="field">
                     <select name="id_alumno_materia" id="id_alumno_materia" class="form-select input-field" required>
                        <option value="ninguno" selected disabled class="input-field">Selecciona un alumno</option>
                        <?php
                        include("conexion.php");
                        $cursoAsignado = $userSession["curso_maestro"];
                        $code = "SELECT * FROM alumno_materia, alumnos WHERE alumno_materia.curso_id = $cursoAsignado AND alumno_materia.name_id = alumnos.id_alumno ";
                        $result = $conexion->query($code);

                        while ($row = $result->fetch_assoc()) {
                        ?>
                           <option value="<?= $row["id_alumno_materia"] ?>" class="text-dark"><?= $row["name_alumno"] ?></option>
                        <?php
                        }
                        ?>
                     </select>
                  </div>
                  <div class="field" style="align-items: flex-start;">
                     <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text-fill" viewBox="0 0 16 16">
                        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z" />
                     </svg>
                     <textarea name="comment_alumno" id="comment" class="input-field" cols="30" rows="8" placeholder="Escribe aquí"></textarea>
                  </div>
                  <input type="text" value="comentario" hidden name="funcion">

                  <button class="btn" type="submit">Agregar comentario</button>
               </form>
               <?php
               // error_reporting(0);
               if (isset($_SESSION["resultado"])) {
                  switch ($_SESSION["resultado"]) {
                     case "comment updated":
                        echo "<p class='text-white m-0'>Comentario registrado con éxito</p>";
                        unset($_SESSION["resultado"]);
                        break;
                     default:
                        echo "Esperando comentario...";
                  }
               } else {
                  echo "<p class='text-white m-0'>Esperando comentario...</p>";
               }
               ?>
            </div>
         </div>
      </div>
   </div>
   <!-- Core theme JS-->
   <script src="js/scripts.js"></script>
</body>

</html>