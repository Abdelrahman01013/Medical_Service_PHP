<?php 
require("../../config.php") ;
require BLA.'inc/header.php' ;

$id=$_GET['id'] ;
$date=mysqli_fetch_assoc(mysqli_query($con,"SELECT *FROM admins WHERE admin_id=$id")) ;


if(isset($_POST['submit'])){

    $name=$_POST['name'] ;
    $select=$_POST['select'] ;
$update=mysqli_query($con,"UPDATE admins SET admin_name='$name',admin_type='$select' WHERE admin_id=$id");

$msg="<h3>Success Edite </h3>" ;

header("Refresh:1 ;url=".BURLA ."admins/all.php")  ;

}





?>
<form method='POST' > 
<div class="alert alert-primary text-center" role="alert">
 <?php if(isset($msg)){echo $msg ;} else{echo "Update Admin" ;} ?>
</div>

<div class="container mt-5 w-50 text-center" >

<div class="form-outline mb-5" style="margin-top:150px">
            <input type="text" id="form1Example13" class="form-control form-control-lg" name='name' placeholder="New Name"
            value="<?php echo $date['admin_name'] ?>">
            
          </div>


        
          <select class="form-select" aria-label="Default select example" name='select' value="<?php echo $date['admin_type'] ?>">
          <!-- <option selected>Open this select menu</option> -->
         <option value="admin" <?php if ($date['admin_type'] == 'admin') echo 'selected' ?>>Admin</option>
<option value="super_admin" <?php if ($date['admin_type'] == 'super_admin') echo 'selected' ?>>Super Admin</option>

        
       </select>

       <button type="submit" class="btn btn-primary btn-lg m-5 " name='submit'>Update</button>

          </div>
</form>

<?php require BLA.'inc/footer.php' ; ?>