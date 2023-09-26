
<?php 
include("../../config.php") ;
require_once BLA."inc/header.php" ;

if(isset($_GET['id']) && is_numeric($_GET['id'])){
  $ID=$_GET['id'] ;  
  $row =mysqli_fetch_array(mysqli_query($con,"SELECT *FROM cities WHERE city_id=$ID")) ;
  if(!$row){header("location:".BURLA);}
}else{header("location:".BURLA);}

if(isset($_POST['submit'])){
$name=filter_var($_POST['name'],FILTER_SANITIZE_SPECIAL_CHARS) ;

if(mysqli_query($con,"UPDATE cities SET city_name='$name' WHERE city_id=$ID"))
{$msg="<h2>Edite Success </h2>"; header("refresh:2 ;url=".BURLA."cities") ;}
else{$msg="Error in edit" ;}
}


?>

<form action="" method="POST">
<div class="container w-50" style="margin-top:150px ">
<div class="alert alert-success text-center">
  <strong><?php if(isset($msg)){echo $msg ;}else{echo"Update City" ;}?></strong>
</div>
  
<div class="input-group mb-3" >
    
  <input type="text" class="form-control" placeholder="Enter City Name" aria-label="Recipient's username" aria-describedby="basic-addon2" name='name'
  value="<?php echo $row['city_name'] ?>">
  <div class="input-group-append">
    <button class="btn btn-outline-success" type="submit" name='submit'>Save</button>
  </div>
</div>

</div>   
</form>






<?php
require_once BLA."inc/footer.php" ;


?>