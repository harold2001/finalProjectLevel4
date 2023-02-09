<?php
session_start();
$idAlumnoActual = $_SESSION["array_login"]["id_alumno"];

if ((isset($_POST)) && ($_POST !== "")) {
   $name = $_POST["name_alumno"];
   $phone = $_POST["phone_alumno"];
   $email = $_POST["email_alumno"];
   $password = $_POST["password"];
   $photo = $_FILES["photo_alumno"]["tmp_name"];

   if ($name && $phone && $email && $password) {
      include("conexion.php");

      if ($photo !== "") {
         $photoData = addslashes(file_get_contents($photo));
         $code = "UPDATE `alumnos` SET `photo_alumno` = '$photoData' , `name_alumno` = '$name' , `phone_alumno` = '$phone' , `email_alumno` = '$email' , `password` = '$password' WHERE `id_alumno` = '$idAlumnoActual'";
         $result = $conexion->query($code);
      } else {
         $code = "UPDATE `alumnos` SET `name_alumno` = '$name' , `phone_alumno` = '$phone' , `email_alumno` = '$email' , `password` = '$password' WHERE `id_alumno` = '$idAlumnoActual'";
         $result = $conexion->query($code);
      }

      if ($result) {
         $newCode = "SELECT * FROM `alumnos` WHERE alumnos.id_alumno = '$idAlumnoActual'";
         $newData = $conexion->query($newCode);
         $newDataRow = $newData->fetch_assoc();

         $_SESSION["array_login"] = $newDataRow;
         header("location: alumno_perfil_mostrar.php");
      }
   }
}
