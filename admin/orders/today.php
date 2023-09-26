<script src='../inc/XMLHttoRequest.js'> </script>
<script> pag_url="today.php" ;</script>


<div id='xml'>
<?php

include("../../config.php") ;

require_once BLA."inc/header.php" ;

?>



<form method="POST" >

<div class="container">
<table class="table table-hover table-dark mt-5 text-center">

    <tr>
      <th scope="col">ID</th>
      <th scope="col">Customer name</th>
      <th scope="col">Customer Number</th>
      <th scope="col">Customer Email</th>
      <th scope="col">Customer Notes</th>
      <th scope="col">Customer Service</th>
      <th scope="col">Customer City</th>
      <th scope="col">Order Time</th>
      <th scope="col">Action</th>
    </tr>
 
 <?php $date=getRows('orders');
  $x=1 ;
  
  date_default_timezone_set("Africa/Cairo") ;
  $EgDate= date("Y/m/d") ;


foreach($date as $row){
    $orderDate = date('Y/m/d', strtotime($row['order_at']));
    if($orderDate == $EgDate){
        
     
 
 ?>
    <tr>
      <th scope="row"><?php echo $x ;?></th>
      <td><?php echo $row['order_name'] ;?></td>
      <td><?php echo $row['order_mobile'] ;?></td>
      <td><?php echo $row['order_email'] ;?></td>
      <td><?php echo $row['order_notes'] ;?></td>
      <td><?php echo $row['order_serv_name'] ;?></td>
      <td><?php echo $row['order_city_name'] ;?></td>
      <td><?php echo $row['order_at'] ;?></td>

      <td>
    
     <a href="<?php echo BURLA.'orders/delet.php?id='.$row['order_id'] ."&&to=now"; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">DELETE</a>
     
      </td>
    </tr>
    
<?php $x++ ;}}
?>
</table>
</div>
<form>





<?php require BLA.'inc/footer.php' ; ?>

<?php

?>
</div>