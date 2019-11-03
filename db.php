<?php



$server = "localhost";
$user = "root";
$password = "";
$database = "mydb";
$port = "3306";

$conexion =  new mysqli($server,$user,$password,$database,$port);

if($conexion -> connect_error){

    die($conexion -> connect_error);
}


function NoQuery($sqlstr, &$conexion = null){

    if(!$conexion)global $conexion;

    $result = $conexion->query($sqlstr);

    return $conexion -> affected_rows;
}

function ObtenerRegistros($sqlstr, &$conexion = null){

    if(!$conexion)global $conexion;

    $result = $conexion->query($sqlstr);

    $resultArray = array();

    foreach($result as $registro){

        $resultArray[] = $registro;
    }

    return $resultArray;
}


function ConvertirUTF8($array){

      array_walk_recursive($array,function(&$item,$key){


        if(!mb_detect_encoding($item,'utf-8', true)){

            $item = utf8_encode($item);
        }

      });
      return $array;


      

}



?>