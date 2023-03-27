<?php
session_start();

if (isset($_POST) || $_POST !== "") {
   $rol_tool = $_POST["rol_tool"];
   $username = $_POST["username"];
   $password = $_POST["password"];

   include("./conexion.php");

   switch ($rol_tool) {
      case "admin":
         $code = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
         $result = $conexion->query($code);
         $row = mysqli_num_rows($result);

         if ($row == 1) {
            $_SESSION["array_login"] = $result->fetch_assoc();
            header("location: admin_home.php");
            // break;
         } else {
            $_SESSION["array_login"] = "no existe";
            header("location: ./login_admin.php");
         }

         break;
      case "maestro":
         $code = "SELECT * FROM `maestros` WHERE `username_maestro` = '$username' AND `password_maestro` = '$password'";
         $result = $conexion->query($code);
         $row = mysqli_num_rows($result);

         if ($row == 1) {
            $_SESSION["array_login"] = $result->fetch_assoc();
            header("location: maestro_home.php");
         } else {
            $_SESSION["array_login"] = "no existe";
            header("location: ./login_maestro.php");
         }

         break;
      case "alumno":
         $code = "SELECT * FROM alumnos WHERE `username` = '$username' AND `password` = '$password'";
         $result = $conexion->query($code);
         $row = mysqli_num_rows($result);

         if ($row == 1) {
            $_SESSION["array_login"] = $result->fetch_assoc();
            header("location: alumno_home.php");
         } else {
            $_SESSION["array_login"] = "no existe";
            header("location: ./login_alumno.php");;
         }

         break;
   }
}
