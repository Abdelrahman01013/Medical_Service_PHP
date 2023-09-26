<?php include("../../config.php") ;
$id=$_GET['id'] ;

if(isset($_GET['id']) && is_numeric($id)){
    

    $det=delete('services','serv_id',$_GET['id']) ;
    if(!$det){header("location:" .BURLA ."services/index.php");}
    
}else{header("location:" .BURLA ."services/index.php");}



?>