
<?php 
include("../../config.php") ;
require_once BLA."inc/header.php" ;
?>

<form method="POST">

<div class="container">
<table class="table table-hover table-dark mt-5 text-center">

    <tr>
      <th scope="col">ID</th>
      <th scope="col">City Name</th>
      <th scope="col">Date And Time</th>
      <th scope="col">Action</th>
    </tr>
 
 <?php $date=getRows('cities')  ;
  $x=1 ;
 foreach($date as $row){

 
 ?>
    <tr>
      <th scope="row"><?php echo $x ;?></th>
      <td><?php echo $row['city_name'] ;?></td>
      <td><?php echo $row['city_at'] ;?></td>
      <td>
      <a href="<?php echo BURLA.'cities/edit.php?id='.$row['city_id']; ?>" class="btn btn-primary">Edit</a>
      <a href="<?php echo BURLA.'cities/delet.php?id='.$row['city_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">DELETE</a>
     
      </td>
    </tr>
    
<?php $x++ ;} ?>
</table>
</div>
<form>
<?php
require_once BLA."inc/footer.php" ;
?> 

