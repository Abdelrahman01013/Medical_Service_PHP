<?php
include("../config.php") ;

if(isset($_SESSION['admin'])){
    session_destroy() ;
    header("location:".BURLA ."login.php") ;
}else{header("location:".BURLA ."login.php") ;}


?>