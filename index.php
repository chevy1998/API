<?php

require_once('utilidades.php');

if(isset($_GET['url'])){

    $var = $_GET['url'];

if($_SERVER['REQUEST_METHOD']=='GET'){

 

  $numero = intval(preg_replace('/[^0-9]+/','',$var),10);

  
 

  switch($var){

    case "estudiante";

          $resp = TodosLosEstudiantes();
          print_r(json_encode($resp));
          http_response_code(200);

    break;

    case "estudiante/$numero";

    $resp = EstudiantePorID($numero);
    print_r(json_encode($resp)); 
    http_response_code(200);

    break;



    default;
  }

    
}else if($_SERVER['REQUEST_METHOD']=='POST'){


    $postBody = file_get_contents("php://input");
    $convertir = json_decode($postBody,true);
    if(json_last_error()==0){


        
  switch($var){

    case "estudiante";

          CrearEstudiante($convertir);
          
          http_response_code(200);

    break;

    default;
  }

    }else{

        http_response_code(400);

    }


}else{

    http_response_code(405);
}


}else{?>

    <link rel="stylesheet" href="public/estilos.css" type="text/css">

    <div class='container'>
    <h1>Metadata</h1>
    <div class='divbody'>

    <p>Estudiante</p>

    <code>
    
    POST /estudiante

    </code>

    <code>
    
    GET /estudiante

    <br/>

    GET /estudiante/$id

    </code>
    
    </div>



<?php





}



?>