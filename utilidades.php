<?php

require_once("db.php");


function TodosLosEstudiantes(){

       $query = "select*from estudiante";

       $respuesta = ObtenerRegistros($query);

       return  ConvertirUTF8 ($respuesta);

}

function EstudiantePorID($id){

    $query = "select*from estudiante where  id_estudiante = $id";

    $respuesta = ObtenerRegistros($query);

    return  ConvertirUTF8 ($respuesta);

}

function CrearEstudiante($array){

    $id_estudiante = $array[0]['id_estudiante'];
    $nombre_estudiante = $array[0]['nombre_estudiante'];
    $sexo_estudiante = $array[0]['sexo_estudiante'];
    $numero_contacto = $array[0]['numero_contacto'];
    $correo_electronico = $array[0]['correo_electronico'];
    $curso = $array[0]['curso'];

    $query = "insert into estudiante (id_estudiante, nombre_estudiante, sexo_estudiante, numero_contacto, correo_electronico, curso)values('$id_estudiante', '$nombre_estudiante', '$sexo_estudiante', '$numero_contacto', '$correo_electronico ', ' $curso')";

    NoQuery($query);

    return true;

}

?>