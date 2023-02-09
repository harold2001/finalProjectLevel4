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
   <!-- Core theme CSS (includes Bootstrap)-->
   <link href="css/admin/styles_admin_t.css" rel="stylesheet" />
   <link href="css/admin/button_admin_home.css" rel="stylesheet" />
   <link href="css/admin/admin_registrar.css" rel="stylesheet" />
   <link href="css/alumno/alumno_perfil_mostrar.css" rel="stylesheet" />
</head>

<body>
   <div class="d-flex" id="wrapper">
      <!-- Sidebar-->
      <div class="border-end position-relative" id="sidebar-wrapper" style="background-color: #23488f;">
         <a href="alumno_home.php">
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
                        Notas y cursos
                     </button>
                  </h2>
                  <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                     <div class="accordion-body">
                        <nav class="nav flex-column">
                           <a class="nav-link" href="alumno_mostrar_notas.php">Ver mis notas</a>
                           <a class="nav-link" href="alumno_mostrar_cursos.php">Ver mis cursos</a>
                        </nav>
                     </div>
                  </div>
               </div>
               <!-- Segundo elemento del acordeón -->
               <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Perfil
                     </button>
                  </h2>
                  <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                     <div class="accordion-body">
                        <nav class="nav flex-column">
                           <a class="nav-link" href="alumno_perfil_mostrar.php">Ver perfil</a>
                           <a class="nav-link" href="alumno_perfil_editar.php">Editar mi perfil</a>
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
         <!-- Nav Bar -->
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
               <p class="text-white fs-1 m-0"><?= $_SESSION["array_login"]["name_alumno"] ?></p>
            </div>
         </nav>
         <!-- Page content -->
         <div class="container-fluid d-flex justify-content-center align-items-center flex-column col-12" style="height: 90vh;">
            <div class="col-md-8 col-lg-8 col-xl-7">

               <!-- Container bordeado -->
               <div class="col-12 mb-3" id="container-profile">
                  <!-- Primer sub-container -->
                  <div class="d-flex justify-content-center align-items-center px-4 py-md-3 gap-5">
                     <p class="m-0" id="p-profile-personal-info">Mi perfil</p>
                  </div>

                  <!-- Segundo sub-container (título y datos) -->
                  <div id="main-container-datos-profile">
                     <div class="container-datos-profile col-12 d-flex">
                        <div class="col-6 d-flex align-items-center">
                           <span class="span-title-personal-info">Foto</span>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-end justify-content-md-start gap-lg-3">
                           <?php
                           if (($userSession["photo_alumno"] !== "") && (substr($userSession["photo_alumno"], 0, 10) !== "data:image")) {
                           ?>
                              <img src="data:image/jpg;base64,<?php echo base64_encode(($userSession["photo_alumno"])); ?>" height="55">
                           <?php
                           } else {
                           ?>
                              <img src="./assets/no-photo.svg" alt="No image" height="50">
                              <span class="span-data-personal-info fst-italic text-danger">No hay imagen guardada</span>
                           <?php
                           }
                           ?>
                        </div>
                     </div>

                     <div class="container-datos-profile col-12 d-flex">
                        <div class="col-6 d-flex align-items-end">
                           <span class="span-title-personal-info">Nombre completo</span>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-end justify-content-md-start">
                           <?php
                           if ($userSession["name_alumno"] !== "") {
                           ?>
                              <span class="span-data-personal-info"><?= $userSession["name_alumno"] ?></span>
                           <?php
                           } else {
                           ?>
                              <span class="span-data-personal-info fst-italic text-danger">Lo sentimos, ocurrió un error</span>
                           <?php
                           }
                           ?>
                        </div>
                     </div>

                     <div class=" container-datos-profile col-12 d-flex">
                        <div class="col-6 d-flex align-items-center">
                           <span class="span-title-personal-info">Teléfono</span>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-end justify-content-md-start">
                           <?php
                           if ($userSession["phone_alumno"] != 0) {
                           ?>
                              <span class="span-data-personal-info"><?= $userSession["phone_alumno"] ?></span>
                           <?php
                           } else {
                           ?>
                              <span class="span-data-personal-info fst-italic text-danger">Registra tu número telefónico</span>
                           <?php
                           }
                           ?>
                        </div>
                     </div>

                     <div class="container-datos-profile col-12 d-flex">
                        <div class="col-6 d-flex align-items-center">
                           <span class="span-title-personal-info">Email</span>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-end justify-content-md-start">
                           <?php
                           if ($userSession["email_alumno"] !== "") {
                           ?>
                              <span class="span-data-personal-info"><?= $userSession["email_alumno"] ?></span>
                           <?php
                           } else {
                           ?>
                              <span class="span-data-personal-info fst-italic text-danger">Registra tu correo electrónico</span>
                           <?php
                           }
                           ?>
                        </div>
                     </div>

                     <div class="container-datos-profile col-12 d-flex">
                        <div class="col-6 d-flex align-items-center">
                           <span class="span-title-personal-info">Contraseña</span>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-end justify-content-md-start span-data-personal-info">
                           <?php
                           if ($userSession["password"] !== "") {
                           ?>
                              <span>
                                 <?php
                                 $contraseña = $userSession["password"];
                                 $numCaracteres = strlen($contraseña);

                                 for ($i = 0; $i < $numCaracteres; $i++) {
                                    echo "*";
                                 }
                                 ?>
                              </span>
                           <?php
                           }
                           ?>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>
         <!-- Page content -->
      </div>
   </div>

   <!-- Core theme JS-->
   <script src="js/scripts.js"></script>
</body>

</html>