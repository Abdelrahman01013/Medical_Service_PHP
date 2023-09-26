<script src='inc/XMLHttoRequest.js'> </script>
<script> pag_url="index.php" </script>

<div id='xml'>
<?php 
include("../config.php") ;

require_once BLA."inc/header.php"  ;

date_default_timezone_set("Africa/Cairo") ;
$EgDate= date("Y-m-d") ;


$query = "SELECT COUNT(*) as total_rows FROM orders WHERE DATE(order_at) = '$EgDate'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$today_orders = $row['total_rows'];



$count_orders= getCountRow('orders') ;
$count_cities= getCountRow('cities') ;
$count_service= getCountRow('services') ;




;?>

<h1 class='p-3 text-center'
 style="color: rgba(255,255,255,.3);
background: #1a1a1a;
text-shadow: 0 0 15px rgba(255,255,255,.5), 0 0 10px rgba(255,255,255,.5);" 

>Welcom Admain: <?php echo $_SESSION['admin']['name'] ; ?> </h1>  
<br>
<div class="row m-5">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body bg-dark text-light">
        <h5 class="card-title">All Cities</h5>
        <p class="card-text">View all cities and regions we support</p>
        <p><button class='btn btn-success'>Count Cities : <?php echo $count_cities ?> </buttom> </p> 
        <a href="<?php echo BURLA ."cities" ?>" class="btn btn-primary">Go To Cities</a>
        
       
      </div>
   
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card bg-dark text-light">
      <div class="card-body">
        <h5 class="card-title">All services</h5>
        <p class="card-text">See all the services we offer</p>
        <p><button class='btn btn-success'>Count Services : <?php echo $count_service ?> </buttom> </p> 
        <a href="<?php echo BURLA ."services" ?>" class="btn btn-primary">Go To Services</a>
      </div>
    </div>
  </div>
</div>

<br>
<div class="row m-5">
  <div class="col-sm-6">
    <div class="card bg-dark text-light">
      <div class="card-body">
        <h5 class="card-title">All Orders</h5>
        <p class="card-text">View all customer requests</p>
        <p><button class='btn btn-success'>Count Orders : <?php echo $count_orders ?> </buttom> </p> 
        <a href="<?php echo BURLA ."orders" ?>" class="btn btn-primary">Go customer Request</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card bg-dark text-light">
      <div class="card-body">
        <h5 class="card-title">All Request Today</h5>
        <p class="card-text">View all customer requests in The day</p>
        <p><button class='btn btn-success'>Request Today : <?php echo $today_orders?> </buttom> </p> 
        <a href="<?php echo BURLA ."orders/today.php" ?>" class="btn btn-primary">Go To Request Today</a>
      </div>
    </div>
  </div>
</div>

    
<?php
require_once BLA."inc/footer.php" ;
?>
</div>
