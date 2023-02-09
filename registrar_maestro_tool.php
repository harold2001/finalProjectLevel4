<?php
session_start();
include("conexion.php");

if ((isset($_POST)) && ($_POST !== "")) {

   if (isset($_POST["id_alumno_materia"])) {
      $id_alumno = $_POST["id_alumno_materia"];

      switch ($_POST["funcion"]) {
         case "nota":
            if ((isset($_POST["calificacion"]))) {
               $calificacion = $_POST["calificacion"];

               switch (strlen($calificacion)) {
                  case (strlen($calificacion) > 2):
                     $_SESSION["resultado"] = "not enough 2";
                     header("location: maestro_calificaciones.php");
                     break;
                  case (strlen($calificacion) === 0):
                     $_SESSION["resultado"] = "not enough 0";
                     header("location: maestro_calificaciones.php");
                     break;
                  default:
                     $code = "UPDATE `alumno_materia` SET `calificacion` = '$calificacion' WHERE `id_alumno_materia` = '$id_alumno'";
                     $result = $conexion->query($code);
                     $_SESSION["resultado"] = "updated";
                     header("location: maestro_calificaciones.php");
                     break;
               }
            } else {
               $_SESSION["resultado"] = "no alumno";
               header("location: maestro_calificaciones.php");
            }
            break;
         case "comentario":
            if ((isset($_POST["comment_alumno"]))) {
               $comment = $_POST["comment_alumno"];

               $code = "UPDATE `alumno_materia` SET `comentario` = '$comment' WHERE `id_alumno_materia` = '$id_alumno'";
               $resultComment = $conexion->query($code);

               if ($resultComment) {
                  $_SESSION["resultado"] = "comment updated";
                  header("location: maestro_comentarios.php");
               }
            }
            break;
      }
   }
}
