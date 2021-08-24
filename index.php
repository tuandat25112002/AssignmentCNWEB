
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php
session_start();

   include 'config.php';
    $mota = array();


   $sql ="SELECT * FROM binhchon ";
   $rs = mysqli_query($conn,$sql);
   if ($rs->num_rows > 0) {
       while($row = $rs->fetch_assoc()) {
           $motacontent = array();
           $motacontent[] = $row["idBC"];
           $motacontent[] = $row["MoTa"];
           $motacontent[] = $row["SoLanChon"];
        $mota[] = $motacontent;
        }
   }


   if(isset($_POST['submit'])){
    if(isset($_POST['g-recaptcha-response'])){
        $secretkey = "6LcMzg0cAAAAABAT4pQHXim1EZP4FNwP3oggEwoF";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response = $_POST['g-recaptcha-response'];
        $url ="https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$ip";
        $fire = file_get_contents($url);
    
    //    echo $fire;
    // echo $idBC;
    $data = json_decode($fire);
    if($data->success==true){
        $idBC = $_POST['binhchon'];
        $_SESSION['idBC']=$idBC;
        header("location:xembinhchon.php");
  
  
    }
        else{
            echo '<script language="javascript">';
            echo 'alert("Let Fill The Captcha if you are not a Robot!!")'; 
            echo '</script>';
        }
        
   }
   else{
    echo "Lỗi Captcha";

   }
   }
   ?>
   
     


<div class="col-sm-6">
    
<p>BÌNH CHỌN</p>
<form method="post">
 <select class="form-control" name="binhchon" id="">
 
    <?php
    
        foreach($mota as $m){
            echo '<option value="'.$m[0].'">'.$m[1].' ('.$m[2].')</option>';
        }    
    
    ?>
     </select> 
     <div class="g-recaptcha" style="margin-top:20px" data-sitekey="6LcMzg0cAAAAAEPiYJ8-xFM6_Cvkg5v7Cxe9jpOV"></div>
    <button type="submit" name="submit" class="btn btn-success" style="margin-top:20px">Chọn danh mục</button>
 </form>



