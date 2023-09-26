<?php 

$con= mysqli_connect("localhost","root","","medical_serv") ;


//عرض الجدول
function getRows($tableName){
    global $con;

    $sql = "SELECT * FROM $tableName";
    $DoneQ = mysqli_query($con, $sql);

    $rows = array();

    if($DoneQ){
        while($row = mysqli_fetch_array($DoneQ)){
            $rows[] = $row;                            //جمعت كل الصفوف في مصفوفه واحده
}
}return $rows;}



//search in database

function serch($NTable,$fild,$val){
    global $con ;
    $search="SELECT * FROM $NTable WHERE `$fild`='$val'" ; ;
    $searchQ=mysqli_query($con,$search) ;
    if($searchQ){
        $rows=[] ;
        if(mysqli_num_rows($searchQ)>0){
            $rows=mysqli_fetch_assoc($searchQ) ;
            return $rows[0];
        }

    }
    return false;
}

//delet 
function delete($Ntable, $Ncolum,$id){
    global $con ;
    $delet=mysqli_query($con,"DELETE FROM $Ntable WHERE $Ncolum= $id") ;}


//get count Row

function getCountRow($Tname){
 global $con ;
$query = "SELECT COUNT(*) as total_rows FROM $Tname";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$totalRows = $row['total_rows'];
return $totalRows ;

}




?>

