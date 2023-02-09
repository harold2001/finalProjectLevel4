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
   <link href="css/alumno/alumno_perfil_editar.css" rel="stylesheet" />
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
            <!-- Container bordeado -->
            <div class="col-12 col-lg-10 col-xl-7" id="main-container-edit-info">
               <!-- Container con la inforamción -->
               <div class="col-12 p-4 col-lg-8 ps-lg-5 py-lg-4">
                  <!-- Segundo sub-container (form y datos) -->
                  <div>
                     <form method="post" action="registrar_alumno_tool.php" enctype="multipart/form-data">
                        <!-- Container-form imagen -->
                        <div class="mb-2 d-flex align-items-center">
                           <label for="photo_alumno" style="cursor:pointer; width:72 px" class="d-flex">
                              <div id="container-img-edit-info" class="d-flex align-items-center justify-content-center">
                                 <?php
                                 if (($userSession["photo_alumno"] !== "") && (substr($userSession["photo_alumno"], 0, 10) !== "data:image")) {
                                 ?>
                                    <img src="data:image/jpg;base64,<?php echo base64_encode(($userSession["photo_alumno"])); ?>" style="height: 100%;">
                                 <?php
                                 } else {
                                 ?>
                                    <img src="./assets/no-photo.svg" alt="No image" style="height: 80%;">
                                 <?php
                                 }
                                 ?>
                                 <div id="fondo" class=" d-flex justify-content-center align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-camera" viewBox="0 0 16 16">
                                       <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z" />
                                       <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                    </svg>
                                 </div>
                              </div>
                           </label>
                           <label for="photo_alumno" class="form-label label-data ps-3 m-0 d-flex align-items-center" id="label-change">CHANGE PHOTO</label>
                           <input type="file" class="" id="photo_alumno" name="photo_alumno" style="display: none;">
                        </div>
                        <!-- Label e input's con datos en string -->
                        <div class="mb-3">
                           <label for="name_alumno" class="form-label label-data">Name</label>
                           <input type="text" class="form-control" id="name_alumno" name="name_alumno" value="<?= $userSession["name_alumno"] ?>">
                        </div>

                        <div class="mb-3">
                           <label for="phone_alumno" class="form-label label-data">Phone</label>
                           <input type="number" class="form-control" id="phone_alumno" name="phone_alumno" value="<?= $userSession["phone_alumno"] ?>">
                        </div>
                        <div class="mb-3">
                           <label for="email_alumno" class="form-label label-data">Email</label>
                           <input type="email" class="form-control" id="email_alumno" name="email_alumno" value="<?= $userSession["email_alumno"] ?>">
                        </div>
                        <div class="mb-3">
                           <label for="password" class="form-label label-data">Password</label>
                           <input type="password" class="form-control" id="password" name="password" value="<?= $userSession["password"] ?>">
                        </div>
                        <div class="col-12 d-flex justify-content-end justify-content-lg-start">
                           <button type="submit" class="btn btn-primary col-4 col-lg-3 m-0">Save</button>
                        </div>
                     </form>
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