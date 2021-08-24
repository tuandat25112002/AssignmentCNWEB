<!-- phương án -->
<?php

include 'config.php';
session_start();
$idBC = $_SESSION['idBC'];
  
   if(isset($_POST['submit'])){
      
    $idPA=$_POST["phuongan"];

    $sql = "UPDATE binhchon SET SoLanChon=SoLanChon+1 WHERE idBC='$idBC'";
    $sql1 = "UPDATE phuongan SET SoLanBinhChon=SoLanBinhChon+1 WHERE idBC='$idBC' and idPA='$idPA'";

    if(mysqli_query($conn,$sql) && mysqli_query($conn,$sql1)){
        header("location:ketquabinhchon.php");
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("Thất bại")'; 
        echo '</script>';
    }
 }    
?>

