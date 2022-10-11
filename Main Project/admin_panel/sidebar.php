<!-- Sidebar -->
<?php 


$conne = mysqli_connect('localhost','root','','urbogret') or die('connection failed');
$userid = $_SESSION['user_id'];

$fetch_name = "SELECT name from user_form WHERE id = '$userid' ";

$resnamefetch = mysqli_query($conne, $fetch_name);

$resnamedata = mysqli_fetch_assoc($resnamefetch);

$resname = $resnamedata['name'];


?>
<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="./assets/images/logo.png" width="120" height="120" alt="Swiss Collection"> 
    
    <h5 style="margin-top:10px;">Hello, <?php echo $resname; ?></h5>
</div>

<hr style="border:1px solid; background-color:black; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./index.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="#orders" onclick="showOrders()"><i class="fa fa-list"></i> Bookings</a>
  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


