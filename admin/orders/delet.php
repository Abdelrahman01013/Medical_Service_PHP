<?php

include("../../config.php") ;

if(isset($_GET['id'])){
    delete('orders', 'order_id',$_GET['id']) ;
 
if(isset($_GET['to'])){
    header("location:".BURLA ."orders/today.php") ; 
}else{ 
    header("location:".BURLA ."orders/") ;
}

}
   
?>