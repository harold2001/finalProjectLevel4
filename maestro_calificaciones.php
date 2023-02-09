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
            <div class="card col-lg-">
               <h4 class="title">Ingresar calificaciones</h4>
               <form method="post" action="registrar_maestro_tool.php">
                  <div class="field">
                     <select name="id_alumno_materia" id="id_alumno_materia" class="form-select input-field" required>
                        <option value="ninguno" selected disabled class="input-field">Selecciona un alumno</option>
                        <?php
                        include("conexion.php");
                        $cursoAsignado = $userSession["curso_maestro"];
                        $code = "SELECT * FROM alumno_materia, alumnos WHERE alumno_materia.curso_id = '$cursoAsignado' AND alumno_materia.name_id = alumnos.id_alumno";
                        $result = $conexion->query($code);

                        while ($row = $result->fetch_assoc()) {
                        ?>
                           <option value="<?= $row["id_alumno_materia"] ?>" class="text-dark"><?= $row["name_alumno"] ?></option>
                        <?php
                        }
                        ?>
                     </select>
                  </div>
                  <div class="field">
                     <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-123" viewBox="0 0 16 16">
                        <path d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z" />
                     </svg>
                     <input autocomplete="off" id="calificacion" placeholder="Calificación" class="input-field" name="calificacion" type="number" required maxlength="2">
                  </div>
                  <input type="text" value="nota" hidden name="funcion">

                  <button class="btn" type="submit">Registrar calificación</button>
               </form>
               <?php
               // error_reporting(0);
               if (isset($_SESSION["resultado"])) {
                  switch ($_SESSION["resultado"]) {
                     case "not enough 2":
                        echo "<p class='text-white m-0'>Usted ingresó más de 2 caracteres en la nota</p>";
                        unset($_SESSION["resultado"]);
                        break;
                     case "not enough 0":
                        echo "<p class='text-white m-0'>Usted ingresó más de 2 caracteres en la nota</p>";
                        unset($_SESSION["resultado"]);
                        break;
                     case "no alumno":
                        echo "<p class='text-white m-0'>Seleccione un alumno, por favor.</p>";
                        unset($_SESSION["resultado"]);
                        break;
                     case "updated":
                        echo "<p class='text-white m-0'>Nota registrada con éxito</p>";
                        unset($_SESSION["resultado"]);
                        break;
                  }
               } else {
                  echo "<p class='text-white m-0'>Ingrese una nota con 2 caracteres como máximo</p>";
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