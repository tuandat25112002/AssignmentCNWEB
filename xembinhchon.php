
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php

include 'config.php';
session_start();
$idBC = $_SESSION['idBC'];


$sql ="SELECT * FROM binhchon where idBC='$idBC' ";
$rs = mysqli_query($conn,$sql);
if ($rs->num_rows> 0) {
   while($row = $rs->fetch_assoc()) {

    //    $idBC = $row["idBC"];
       $mota = $row["MoTa"];

    }
}


?>
<div class="col-sm-6">
    <p><?php echo $mota; ?>
    </p>

<form action="xulibinhchon.php" method="post">
    <?php

   $mota = array();


  $sql ="SELECT * FROM phuongan where idBC = '$idBC' ";
  $rs = mysqli_query($conn,$sql);
  if ($rs->num_rows > 0) {
      while($row = $rs->fetch_assoc()) {
          $motacontent = array();
          $motacontent[] = $row["idPA"];
          $motacontent[] = $row["MoTaPA"];
       $mota[] = $motacontent;
       }
  }
    
  foreach($mota as $m){
      echo '<p><input type="radio" name="phuongan" value="'.$m[0].'"> '.$m[1].'</p>';
    
  }

    ?>

<button type="submit" name="submit" class="btn btn-success" style="margin-top:20px">Xem kết quả</button>
</form>

</div>
