<?php 
include("../config.php") ;

if(isset($_SESSION['admin'])){
  header("location:".BURLA."index.php") ;
}

?>


<?php
if(isset($_POST['submit'])){

 
    $email=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) ;
    $password=filter_var($_POST['password'],FILTER_SANITIZE_SPECIAL_CHARS)  ;

    if(empty($email)){$error="PLZ Enter Email " ;}else{
        if(empty($password)){$error="PLZ Enter Password" ;}
        else{
      $select="SELECT *FROM admins WHERE admin_email='$email'" ;
      $search_email=mysqli_query($con,$select);
      $date=mysqli_fetch_assoc($search_email);
      if(!$date){$error="Verify your email and password" ;

      }else{
        $password_hash=$date['admin_pass'] ;
        if(!password_verify($password,$password_hash)){$error="Verify your email and password";}
        else{
          $_SESSION['admin']=['name'=>$date['admin_name'],'email'=>$date['admin_email'],'id'=>$date['admin_id'],
          'type'=> $date['admin_type']] ;

          $error="DONE" ;
        header("location:".BURLA ."index.php") ;
        }
      }
          
          
          
          ;
        }
    }

    
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href="<?php echo ASSTES;?>style/bootstrap.min.css">
    <style>
      #intro {
        background-image: url(<?php echo ASSTES ."image/5.jpg" ?>);
        height: 100vh;
        background-size:100% 100% ;
       
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }
    </style>
</head>
<body>
    




    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
    
      <div class="container-fluid">
        
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link" target="_blank" 
        href="<?php echo BURL ?>">
          <strong>View Site</strong>
        </a>
       

                           
             
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.3);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
                
              <form class="bg-white  rounded-5 shadow-5-strong p-5" action="" method="POST">




                <!-- Email input -->
                <div class="alert alert-danger text-center" role="alert">
               <?php if(isset($error)){echo $error ;}else{echo "Enter Email And Password " ;} ?>
</div>


                <div class="form-outline mb-4">
                  <input type="email" id="form1Example1" class="form-control" name='email'/>
                  <label class="form-label" for="form1Example1">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form1Example2" class="form-control" name='password'/>
                  <label class="form-label" for="form1Example2">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                  

                  <div class="col text-center">
                  
                  </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block" name='submit'>Sign in</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>
  <!--Main Navigation-->



<script src="<?php echo ASSTES; ?>js/bootstrap.bundle.min.js?>"> </script>
<script src="<?php echo ASSTES; ?>js/main.js'> </script>"> </script>
</body>
</html>