<?php 
require("../../config.php") ;

require BLA.'inc/header.php' ;


?>


<form method="POST">

<div class="container">
<table class="table table-hover table-dark mt-5 text-center">

    <tr>
      <th scope="col">ID</th>
      <th scope="col"> Name</th>
      <th scope="col">Email</th>
      <th scope="col">type</th>
      <th scope="col">Date And Time</th>
      <th scope="col">Action</th>
    </tr>
 
 <?php $date=getRows('admins')  ;
  $x=1 ;
 foreach($date as $row){

 ?>
    <tr>
      <th scope="row"><?php echo $x ;?></th>
      <td><?php echo $row['admin_name'] ;?></td>
      <td><?php echo $row['admin_email'] ;?></td>
      <td><?php echo $row['admin_type'] ;?></td>
      <td><?php echo $row['admin_at'] ;?></td>
      <td>
      <a href="<?php echo BURLA.'admins/edit.php?id='.$row['admin_id']; ?>" class="btn btn-primary">Edit</a>
      <a href="<?php echo BURLA.'admins/delete.php?id='.$row['admin_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">DELETE</a>
     
      </td>
    </tr>
    
<?php $x++ ;}?>
</table>
</div>
<form>



<?php require BLA.'inc/footer.php' ; ?>