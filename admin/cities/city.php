
<?php 
include("../../config.php") ;

require_once BLA."inc/header.php" ;

if(isset($_POST['submit'])){
  $name=filter_var($_POST['name'],FILTER_SANITIZE_SPECIAL_CHARS) ;
  if(empty($name)){
    $error="<p class='text-danger'>" ."PLZ Enter City Name" ."</p>";}
  elseif(trim(strlen($name))<3){
    $error="<p class='text-danger'>" ."PLZ The name must be greater than three characters" ."</p>";
  }
  else{
  $insert="INSERT INTO cities(city_name) VALUE('$name')" ;
  mysqli_query($con,$insert) ;
  $error="<h2>successfully</h2>" ;
  header("refresh:1 ;url=".BURLA ."cities/index.php") ;
  }
}?>


<form action="" method="POST">
<div class="container w-50" style="margin-top:150px ">
<div class="alert alert-success text-center">
  <strong><?php if(isset($error)){echo $error ;}else{echo"Enter City Name" ;}?></strong>
</div>
  
<div class="input-group mb-3" >
    
  <input type="text" class="form-control" placeholder="Enter City Name" aria-label="Recipient's username" aria-describedby="basic-addon2" name='name'>
  <div class="input-group-append">
    <button class="btn btn-outline-success" type="submit" name='submit'>Save</button>
  </div>
</div>

</div>   
</form>
<?php
require_once BLA."inc/footer.php"
?> 

