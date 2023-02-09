<?php
include("conexion.php");
// error_reporting(0);
session_start();

if ((isset($_POST)) && ($_POST !== "")) {
   $id_cargo = $_POST["id_cargo"];

   if ($id_cargo == 2) {
      $rol = "maestro";

      if ((!isset($_POST["id_curso"])) || ($_POST["id_curso"] === "ninguno")) {
         $_SESSION["resultado"] = "falta curso";
         header("location: admin_registrar_$rol.php");
         die();
      } else {
         $name = $_POST["nombre_$rol"];
         $username = $_POST["username_$rol"];
         $password = $_POST["password"];
         $id_curso = $_POST["id_curso"];
      }

      if ($name && $username && $password && ($id_cargo == 2)) {
         $code = "INSERT INTO `maestros` (`name_maestro`, `username_maestro`, `password_maestro`, `id_cargo`, `curso_maestro`) VALUES ('$name', '$username', '$password', '$id_cargo', '$id_curso')";
         $result = $conexion->query($code);
         $_SESSION["resultado"] = $result;
         header("location: admin_registrar_$rol.php");
      }
   } else if ($id_cargo == 3) {
      $rol = "alumno";

      $name = $_POST["nombre_$rol"];
      $username = $_POST["username_$rol"];
      $password = $_POST["password"];

      if ($name && $username && $password && ($id_cargo == 3)) {
         $code = "INSERT INTO `alumnos` (`name_alumno`, `username`, `password`, `id_cargo`) VALUES ('$name', '$username', '$password', '$id_cargo')";
         $result = $conexion->query($code);
         $_SESSION["resultado"] = $result;
         header("location: admin_registrar_$rol.php");
      }
   }
}
