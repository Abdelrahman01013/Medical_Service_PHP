
<?php  
include("config.php") ;


if(isset($_POST['send'])){
  $name =$_POST['name'] ;
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $phone=trim($_POST['phone']) ;
  $not=$_POST['area'] ;
  $city = isset($_POST['city']) ? $_POST['city'] : "";
  $serv = isset($_POST['serv']) ? $_POST['serv'] : "";


  if(empty($city) || empty($serv)){
    $error="PLZ Choose Your City or nearest city to you And Service !!" ;
}elseif(empty($name)){ 
    $error="PLZ Enter Name !!" ;
  }elseif(empty($phone) ){
    $error="PLZ Enter Phone Number !!";
  }elseif(strlen($phone)>25 || strlen($phone)<5){
      $error="The number must be less than 25 and greater than 5  !!" ;
    }else{
    $insert= mysqli_query($con,"INSERT INTO orders(order_serv_name,order_city_name,order_name,order_mobile,order_email,order_notes) 
     VALUE ('$serv','$city','$name','$phone','$email','$not') ") ;
     if($insert){$alert="<div class='alert alert-info m-auto w-75 text-center' role='alert'>
      The request successfully </div>" ;

  }else{ $alert="  <div class='alert alert-info m-auto w-75 text-center' role='alert'>
      An error occurred sending the request... Please try again </div>" ;}
}}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href="<?php echo ASSTES.'style/bootstrap.min.css'?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
  font-size: 25px;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.content {
    
  position: fixed;

  background: rgba(0, 0, 0, 0.6);
  color: #f1f1f1;
  width: 100%;
  height:100% ;
  padding: 20px;
}

#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: black;
}

.hov {background-color:rgba(255, 255, 255, 0.712)}

.hov:hover{background-color:white}

.contact{font-size: 16px;}
.contact i{font-size: 20px; margin-left: 10px;}


</style>
</head>
<body>
<video autoplay muted loop id="myVideo">
  <source src="asstes/image/video (1080p).mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>



<form method="POST">
<div class="content">

 <?php if(isset($alert)){echo $alert ;}?> 
<div class="row m-5">

    <div class="col-6">
    <label for="sel">Choose City</label>
    <select class="form-select hov" aria-label="Default select example"  name='city' id='sel'>
  <optgroup label="Choose City" >
   <?php 
  $row= getRows('cities') ;
  foreach($row as $r){ ?> 
  <option value="<?php echo $r ['city_name']?>"> <?php echo $r['city_name']?> </option>
  <?php ;}?>
 
</select>
    </div>
    <div class="col-6">
    <label for="sv">Choose Service</label>
    <select class="form-select hov" aria-label="Default select example" name='serv' id='sv'>
    <optgroup label="Choose Service" >
 <?php
  $row= getRows('services') ;
  foreach($row as $r){ ?> 
  <option value="<?php echo $r ['serv_name']?>"> <?php echo $r['serv_name']?> </option>
  <?php ;}?>
  
</select>
    </div>
    </div>

<div class="row m-5">
<div class="col-4">
<label for="formGroupExampleInput">Your Name</label>
    <input type="text" class="form-control hov" id="formGroupExampleInput" placeholder="Name"
     name='name' value="<?php if(isset($name)){echo $name ;} ?>">
</div>
<div class="col-4">
<label for="formGroupExampleInput">Your Email</label>
    <input type="email" class="form-control hov" id="formGroupExampleInput" placeholder="Email"name='email'
    value="<?php if(isset($email)){echo $email ;} ?>">
</div>
<div class="col-4">
<label for="formGroupExampleInput">Your Mobile number</label>
    <input type="number" class="form-control hov" id="formGroupExampleInput" placeholder="Mobile number"
     name='phone' value="<?php if(isset($phone)){echo $phone ;} ?>">
</div>
<div class='mt-1 text-center'>
<?php if(isset($error)){echo "<p class='text-danger'>" .$error ."</p>";} ?>
  </div>
</div>
<div class="form-group shadow-textarea m-5">
  <label for="exampleFormControlTextarea6">Notes</label>
  <textarea class="form-control z-depth-1 hov" id="exampleFormControlTextarea6" rows="5" placeholder="Write Notes here..." name='area'>
  <?php echo isset($not) ? $not : ""; ?>
</textarea>
</div>
<br>
<div class="row text-center">
    <div class="col">

<button type="submit" class="btn btn-dark w-25" style='font-size:30px'name='send'>SEND</button>

</div>
</div>

<br>




</form>
<hr>
<div class="contact">
<span>
Abdelrahman Ahmed
<a href="https://wa.me/201013230248" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
<a href="https://www.facebook.com/abdelrahman.algeneral" target="_blank"><i class="fa-brands fa-facebook"></i></a>
<a href="https://github.com/Abdelrahman01013" target="_blank"><i class="fa-brands fa-github"></i></a>
<a href="mailto:generalal@gmail.com" target="_blank"><i class="fa-brands fa-google-plus"></i></a>
<a href="https://wa.me/201118003381" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
</span>
</div>
</div>


</body>
</html>