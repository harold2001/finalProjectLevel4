<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="./css/login/login_main.css">
   <title>Login</title>
</head>

<body>
   <div class="vh-100 d-flex flex-column justify-content-center align-items-center text-white">
      <div class="col-12 col-lg-8 d-flex justify-content-center align-items-center rounded-3 p-5 p-md-3 p-lg-4 flex-column flex-md-row" id="main-container-login-main">

         <div class="sub-container-login-main col-12 col-md-6 d-flex justify-content-center align-items-center flex-column pe-md-3 pe-lg-4">
            <div class="login-box col-12 p-4">
               <p class="fs-2 text-center">¡Bienvenid@!</p>
               <p class="text-center">¿Eres alumno o maestro?</p>
               <div class="col-12 d-flex justify-content-center align-items-center gap-3">
                  <button class="" type="button" data-bs-toggle="collapse" data-bs-target="#maestroOptions" aria-expanded="false" aria-controls="collapseExample">
                     Maestro
                  </button>
                  <a href="login_alumno.php">Alumno</a>
               </div>
               <div class="collapse" id="maestroOptions">
                  <div class="mt-4">
                     <a class="" href="login_maestro.php">Maestro</a>
                     <a class="" href="login_admin.php">Admin</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="sub-container-login-main col-12 col-md-6 d-flex justify-content-center align-items-center ps-md-3 ps-lg-4">
            <img src="./assets/logo.JPG" alt="University Image" class="rounded-3" style="width: 100%;">
         </div>
      </div>
   </div>
</body>

</html>