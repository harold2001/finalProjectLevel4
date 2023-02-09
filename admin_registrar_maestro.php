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
   <title>Registrar maestro</title>
   <!-- Favicon-->
   <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
   <!-- CSS-->
   <link href="css/admin/button_admin_home.css" rel="stylesheet" />
   <link href="css/admin/styles_admin_t.css" rel="stylesheet" />
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
         <div class="container-fluid d-flex justify-content-center align-items-center flex-column col-12" style="height: 90vh;">
            <div class="card" style="width: 350px;">
               <h4 class="title">Datos del nuevo maestro</h4>
               <!-- INICIO FORM -->
               <form method="post" action="registrar_admin_tool.php">
                  <div class="field">
                     <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                     </svg>
                     <input autocomplete="off" id="nombre_maestro" placeholder="Nombre completo" class="input-field" name="nombre_maestro" type="text" required>
                  </div>
                  <div class="field">
                     <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                     </svg>
                     <input autocomplete="off" id="username_maestro" placeholder="Nombre de usuario" class="input-field" name="username_maestro" type="text" required>
                  </div>
                  <div class="field">
                     <svg class="input-icon" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                        <path d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z"></path>
                     </svg>
                     <input autocomplete="off" id="password" placeholder="Contraseña" class="input-field" name="password" type="password" required>
                  </div>
                  <div class="field">
                     <select name="id_curso" id="id_curso" class="form-select input-field" required>
                        <option value="ninguno" selected disabled class="input-field">Curso a asignar:</option>
                        <?php
                        include("conexion.php");
                        $code = "SELECT * FROM `cursos`";
                        $result = $conexion->query($code);

                        while ($row = $result->fetch_assoc()) {
                        ?>
                           <option value="<?= $row["id_curso"] ?>" class="text-dark"><?= $row["curso_name_original"] ?></option>
                        <?php
                        }
                        ?>
                     </select>
                  </div>
                  <input type="text" name="id_cargo" hidden value="2">
                  <button class="btn" type="submit">Registrar maestro</button>
                  <?php
                  // error_reporting(0);
                  if (isset($_SESSION["resultado"])) {
                     if ($_SESSION["resultado"] === "falta curso") {
                        echo "<p class='text-white m-0'>Escoja una de las opciones en los cursos, por favor.</p>";
                        unset($_SESSION["resultado"]);
                     } else {
                        echo "<p class='text-white m-0'>Maestro registrado con éxito</p>";
                        unset($_SESSION["resultado"]);
                     }
                  }
                  ?>
               </form>
               <!-- FIN FORM -->
            </div>
         </div>
      </div>
   </div>

   <!-- Core theme JS-->
   <script src="js/scripts.js"></script>
</body>

</html>