
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
 
 <style>
     .button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 10px 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
  color: white;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
 </style>
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
    $sql = "SELECT sum(SoLanBinhChon) as tongso from phuongan where idBC='$idBC'";
    $rs = mysqli_query($conn,$sql);
    if($row= $rs->fetch_assoc()){
        $tongso = $row['tongso'];
    }


?>
<p><h1 class="text-center " style="letter-spacing: 3px;">BÌNH CHỌN</h1></p>
<div class="col-sm-12"> <p><h3><?php echo $mota; ?></h3></p></div>
<div class="container-fluid row" style="margin-left: 0px;">
<div class="col-sm-6 float-left">
   
    </p>
    <p><b>KẾT QUẢ BÌNH CHỌN</b></p>



    <table style="width:100%;border: 1px solid #ccc;">
<?php
 $mota = array();


 $sql ="SELECT * FROM phuongan where idBC = '$idBC' ";
 $rs = mysqli_query($conn,$sql);
 if ($rs->num_rows > 0) {
     while($row = $rs->fetch_assoc()) {
         $motacontent = array();
         $motacontent[] = $row["MoTaPA"];
         $motacontent[] = $row["SoLanBinhChon"];
      $mota[] = $motacontent;
      }
 }
   
 foreach($mota as $m){
    echo'
    <tr style="width:100%;">
     <td style="width:25%;padding:20px;"><b>'.$m[0].'</b>: </td>
      <td style="width:55%;">
        <table style="width:100%; ">
            <tr style="width:100%;">
                <td style="width:'.(($m[1]/$tongso)*100).'%;background-color:red"></td>
                <td>'.round(($m[1]/$tongso)*100).' %</td> 
            </tr>
        </table>
      </td>
      <td style="width:20%;">
      Tổng số lần bình chọn: <b>'.$m[1].'</b> lần
      </td>  
    </tr>';


 }

?>

</table>

</div>
<div class="col-sm-6 float-left">



<?php
 $mota = array();


 $sql ="SELECT * FROM phuongan where idBC = '$idBC' ";
 $rs = mysqli_query($conn,$sql);
 if ($rs->num_rows > 0) {
     while($row = $rs->fetch_assoc()) {
         $motacontent = array();
         $motacontent[] = $row["MoTaPA"];
         $motacontent[] = $row["SoLanBinhChon"];
      $mota[] = $motacontent;
      }
 }

 ?>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = [<?php 
foreach($mota as $m){
    echo '"'.$m[0].'",';
}

?>];
var yValues = [<?php 
foreach($mota as $m){
    echo ''.$m[1].',';
}


?>];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Cơ cấu kết quả bình chọn"
    }
  }
});
</script>


</div>
</div>
<div class="container-fluid text-center" style="margin:30px 0px">

<a href="index.php" class="button "><span>Trở lại bình chọn</span></a>

</div>