<?php 

require("../../config.php") ;

if(!isset($_SESSION['admin'])){
    header("location:".BURLA ."login.php") ;}


$id=$_GET['id'] ;
$del= delete('admins','admin_id',$id) ;
if(!$del){header("location:" .BURLA ."admins/all.php") ;}

?>