
<?php 
include("../../config.php") ;
require_once BLA."inc/header.php" ;

if(isset($_GET['id']) && is_numeric($_GET['id'])){
  $ID=$_GET['id'] ;  
  $row =mysqli_fetch_array(mysqli_query($con,"SELECT *FROM services WHERE serv_id=$ID")) ;
  if(!$row){header("location:".BURLA);}
}else{header("location:".BURLA);}

if(isset($_POST['submit'])){
$name=filter_var($_POST['name'],FILTER_SANITIZE_SPECIAL_CHARS) ;

if(mysqli_query($con,"UPDATE services SET serv_name='$name' WHERE serv_id=$ID"))
{$msg="<h2>Edite Success </h2>"; header("refresh:2 ;url=".BURLA."services") ;}
else{$msg="Error in edit" ;}
}


?>

<form action="" method="POST">
<div class="container w-50" style="margin-top:150px ">
<div class="alert alert-success text-center">
  <strong><?php if(isset($msg)){echo $msg ;}else{echo"Update Service" ;}?></strong>
</div>
  
<div class="input-group mb-3" >
    
  <input type="text" class="form-control" placeholder="Enter New Service" aria-label="Recipient's username" aria-describedby="basic-addon2" name='name'
  value="<?php echo $row['serv_name'] ?>">
  <div class="input-group-append">
    <button class="btn btn-outline-success" type="submit" name='submit'>Save</button>
  </div>
</div>

</div>   
</form>






<?php
require_once BLA."inc/footer.php" ;


?>