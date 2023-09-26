<?php
include("../../config.php") ;

if($_GET['id'] && is_numeric($_GET['id'])){
    
$fun=delete('cities','city_id',$_GET['id']) ;
header("location:".BURLA."cities") ;

}

?>