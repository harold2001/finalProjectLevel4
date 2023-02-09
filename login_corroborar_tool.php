<?php
session_start();

if (isset($_POST) || $_POST !== "") {
   $rol_tool = $_POST["rol_tool"];
   $username = $_POST["username"];
   $password = $_POST["password"];

   include("conexion.php");

   switch ($rol_tool) {
      case "admin":
         $code = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
         $result = $conexion->query($code);
         $row = $result->fetch_assoc();

         if ($row) {
            $_SESSION["array_login"] = $row;
         } else {
            $_SESSION["array_login"] = "no existe";
         }

         header("location: login_admin.php");
         break;
      case "maestro":
         $code = "SELECT * FROM `maestros` WHERE `username_maestro` = '$username' AND `password_maestro` = '$password'";
         $result = $conexion->query($code);
         $row = $result->fetch_assoc();

         if ($row) {
            $_SESSION["array_login"] = $row;
         } else {
            $_SESSION["array_login"] = "no existe";
         }

         header("location: login_maestro.php");
         break;
      case "alumno":
         $code = "SELECT * FROM alumnos WHERE `username` = '$username' AND `password` = '$password'";
         $result = $conexion->query($code);
         $row = $result->fetch_assoc();

         if ($row) {
            $_SESSION["array_login"] = $row;
         } else {
            $_SESSION["array_login"] = "no existe";
         }

         header("location: login_alumno.php");;
         break;
   }
}
