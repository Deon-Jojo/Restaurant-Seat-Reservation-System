<div id="ordersBtn" >
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sl no</th>
        <th>Customer</th>
        <th>Contact</th>
        <th>Booking Date</th>
        <th>No of seats</th>
        <th>Status</th>
     </tr>
    </thead>
     <?php
     session_start();
      $conne = mysqli_connect('localhost','root','','urbogret') or die('connection failed');
      $userid = $_SESSION['user_id'];

$fetch_name = "SELECT name from user_form WHERE id = '$userid' ";

$resnamefetch = mysqli_query($conne, $fetch_name);

$resnamedata = mysqli_fetch_assoc($resnamefetch);

$resname = $resnamedata['name'];

      $sql="SELECT * from bookings WHERE res_name = '$resname'";
      $result=$conne-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["id"]?></td>
          <td><?=$row["fullname"]?></td>
          <td><?=$row["phoneno"]?></td>
         
          <td><?=$row["date"]?></td>
           
          <td><?=$row["no_of_chairs"]?></td>
        <td><a class="btn btn-success openPopup">Accept</a>
        <a class="btn btn-warning openPopup">Decline</a></td>
        </tr>
    <?php
            
        }
      }
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>