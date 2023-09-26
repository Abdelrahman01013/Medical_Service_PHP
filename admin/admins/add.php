<?php 
require("../../config.php") ;

require BLA.'inc/header.php' ;
?>


<?php 

if(isset($_POST['submit'])){
    $name=filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password=filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
    $selector=$_POST['select'] ;
   

    $error=[] ;
    if(empty($name)){
        $error[]="Enter Name" ;
    }elseif(strlen($name)>100){$error[]= "The name must not exceed 100 characters" ;}

  if(empty($email)){$error[]="Enter Email" ;}
  elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){$error[]="The Email Is Not Valid" ;}
  else {
    $pass_hash=password_hash($password,PASSWORD_DEFAULT);}
  

  //email
  if(empty($password)){$error[]="Enter Password" ;}

  $search="SELECT admin_email FROM admins WHERE admin_email='$email'" ;

    $qsearch= mysqli_query($con,$search) ;
   
    $date =mysqli_num_rows($qsearch) ;

 if($date){$error[]="This Email Already Exists" ;}


if(empty($error)){
$insert ="INSERT INTO admins( admin_name, admin_email, admin_pass ,admin_type) 
VALUES ('$name' ,'$email' ,'$pass_hash','$selector')" ;

mysqli_query($con,$insert) ;

$done="<h2>Added Success</h2>" ;

header("refresh:1;url=".BURLA ."admins/all.php") ;

}


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="draw2.svg"
          class="img-fluid" alt="Phone image">
      </div>
     
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form method="POST">
        

        <div class="alert alert-success text-center" role="alert">
        <?php if(isset($done)){echo $done ;}else{echo "Add Email" ;} ?>
</div>
        
      
          <!-- name input -->
          <div class="form-outline mb-4">
            <input type="text" id="form1Example13" class="form-control form-control-lg" name='name'/>
            <label class="form-label" for="form1Example13">Name</label>
          </div>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form1Example13" class="form-control form-control-lg" name='email'/>
            <label class="form-label" for="form1Example13">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="form1Example23" class="form-control form-control-lg" name='password'/>
            <label class="form-label" for="form1Example23">Password</label>
          </div>

          <!-- Selector -->
          <select class="form-select" aria-label="Default select example" name='select'>
        
        <option value="admin">Admin</option>
        <option value="super_admin">Super Admin</option>
        
       </select>

          <div class="d-flex justify-content-around align-items-center mb-4">

          <!-- Submit button -->
          <button type="submit" class="btn btn-success btn-lg m-3" name='submit'>Save</button>

        



        </form>
      
      </div>
      <?php 
      if(isset($error)){
        foreach($error as $er){
        echo "<h4 style='color:red'>" ."-> " .$er ."</h4>" ."<br>";}}?>
    </div>
    
  </div>
  
</section>

</body>
</html>







<?php require BLA.'inc/footer.php' ; ?>